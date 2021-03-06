<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lessons extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url'));
		$this->load->model('Lessons_Model');
		$this->load->library(array('user_agent', 'functions', 'session', 'form_validation'));
	}
	
    // private function alert($message = "", $type = 'default'){
	// 	$alert = '<div class="alert alert-'.$type.'" id="subject-alert">';
	// 	$alert .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
	// 	$alert .= '	<i class="fa fa-close"></i>';
	// 	$alert .= '</button>';
	// 	$alert .= '<span id="alert-text">';
	// 	$alert .= $message;
	// 	$alert .= '</span>';
	// 	$alert .= '</div>';
	// 	return $alert;
	// }
	
	private function view($view, $data = "", $single = false){
		$this->functions->is_admin();
		if ($single) {
			$this->load->view('includes/head');
			$this->load->view($view, $data);
		}else{
			$this->load->view('includes/head');
			$this->load->view('includes/top-navigation');
			$this->load->view('includes/left-navigation');
			$this->load->view($view, $data);
			$this->load->view('includes/footer');
		}
    }
    
    public function index()
	{
		// $datestring = 'Year: %Y Month: %m Day: %d - %h:%i %a';
		// $time = time();
		// echo standard_date();
		// echo time('-172736.1700000763');
		teacher_logged();
		$data['subjects'] = $this->Lessons_Model->ajax_getAllSubjects(teacher_session('id'));
		// var_dump($data);
		$this->load->view('includes/head');
		$this->load->view('includes/top-navigation');
		$this->load->view('includes/left-navigation');
		$this->load->view('lessons/lessons',$data);
		$this->load->view('includes/footer');

	}

	public function ajax_get_lessons(){
		$lessons = $this->Lessons_Model->getAllByAuthor(teacher_session('id'));
		$subj = $this->Lessons_Model->getSubjectsArray();
		$data = array();
		
		foreach ($lessons as $lesson) {
			$url = teacher_base("lessons/ajax_delete_lesson");
			$delete_alert = $lesson->id. ", '".$url."', 'Are You Sure?', 'You are about to delete ".$lesson->lesson_title."'";
			// $sub['id'] = $lesson->id;
			$sub['lesson_title'] = $lesson->lesson_title;
			$sub['lesson_author'] = $lesson->lesson_author;
			$sub['subject'] =  "<div hidden>".str_replace(" ", "",!empty($subj[$lesson->subject_id]) ? $subj[$lesson->subject_id] : "")."</div>";
            $sub['subject'] .=  !empty($subj[$lesson->subject_id]) ? $subj[$lesson->subject_id] : "";
			// $sub['subject'] = !empty($subj[$lesson->subject_id]) ? $subj[$lesson->subject_id] : 
			btn(array(
				'onclick'=>"open_lesson_modal_update_subject('#modal-add-subject', '".$lesson->subject_id."')",
				'text'=> "<i class='fa fa-plus'></i>",
				'class'=>"p-1",
				'attr'=> 'id="'.$lesson->id.'"'
			));
			$sub['tool'] = '<a '.tooltip("Preview").' style="font-size:21px; vertical-align:middle; " class="text-c-green waves-effect waves-light ml-2 p-1" href="'.teacher_base('lessons/lesson_preview').'?preview='.$lesson->lesson_title.'"><i class="ti-eye"></i></a>'
			.'<a '.tooltip("Edit").' style="font-size:21px; vertical-align:middle; " class="text-c-inverse waves-effect waves-light ml-2 p-1" href="'.teacher_base('lessons').'/edit?edit='.$lesson->lesson_title.'"><i class="ti-pencil-alt"></i></a>'
			.'<a '.tooltip("Delete").' onclick="delete_alert('.$delete_alert.')" style="font-size:21px; vertical-align:middle; " class="text-danger waves-effect waves-light ml-2 p-1" lesson_id="'.$lesson->id.'" href="#delete"><i class="ti-trash"></i></a>';
			$data[] = $sub;
		}
		$dataa['data'] = $data;
        echo json_encode($dataa);
	}

	public function add(){ // adding lessons view
		teacher_logged();
		$data['subjects'] = $this->Lessons_Model->ajax_getAllSubjects(teacher_session('id'));
		$this->view("lessons/lesson_adding_inline", $data);
	}

	public function save(){
		if($this->input->post('save') != ""){
			$lesson_content = $this->input->post('lesson-content');
			$lesson_title = $this->input->post('lesson-title');
			$lesson_subject = $this->input->post('lesson-subject');

			$this->form_validation->set_error_delimiters('<li class="text-danger">', '</li>');

			$this->form_validation->set_rules('lesson-title', 'Lesson Title', array(
				'trim',
				'required',
				array('check_lesson_title',
					function($val){
						$lesson = $this->input->post('lesson-title');
						$q = "SELECT lesson_title FROM lessons WHERE lesson_title LIKE '$lesson'";
						$result = $this->Lessons_Model->query($q);
						$title = "";
						foreach ($result as $thetitle) {
							$title = $thetitle->lesson_title;
						}
						if (empty($title)) {
						 
							return true;
						}else{
							$this->form_validation->set_message('check_lesson_title', 'Lesson Title Already Exist.');
							return false;
						}
					}
				)
			), 
			array(
				'required'=>"You must provide a %s."
			));
			if ($this->form_validation->run() == TRUE)
			{
				$data = array(
					'lesson_content'=> json_encode(array('content'=>$lesson_content)),
					'subject_id'=> $lesson_subject,
					'lesson_title' => $lesson_title,
					'lesson_author' => teacher_session('id'),
					'date_created' => date('Y-d-m')
				);
				$add = $this->Lessons_Model->add($data);
				redirect(teacher_base().'/lessons/lesson_preview?preview='.$lesson_title, 'refresh');
			}else{
				$data['subjects'] = $this->Lessons_Model->getSubjects();
				// $this->functions->view('lessons/lesson_adding',$data);
				redirect(teacher_base('lessons/add'));
			}
		}
		
	} 
	public function edit(){
		teacher_logged();
		if($this->input->get('edit'))
		{
			$previewQuery = $this->input->get('edit');
			$query = "SELECT * FROM lessons WHERE lesson_title = '$previewQuery'";
			$res = $this->Lessons_Model->query($query);
			foreach ($res as $content) {
				$data['title'] = $content->lesson_title;
				$data['content'] = json_decode($content->lesson_content)->content;
				$data['id'] = $content->id;
				$data['subject_id'] = $content->subject_id;
				// var_dump($content->lesson_content);
			}
			$subj = $this->db->get_where('subjects', array('added_by'=>teacher_session('id')))->result();
			$data['subjects'] = array();
			foreach ($subj as $s) {
				array_push($data['subjects'], array(
					'subject_id'=> $s->subject_id,
					'subject_title' => $s->subject_title
				));
			}
			// var_dump($data['content']);
			$this->view('lessons/lesson_editing_page_inline', $data);
		}
	}

	public function edit_submited(){
		$lesson_content = $this->input->post('lesson-content');
		$lesson_title = str_replace("  "," ",$this->input->post('lesson-title'));
		$lesson_subject = $this->input->post('lesson-subject');
		$lesson_id = $this->input->post('lesson-id');
		$data = array(
			'lesson_content'=> json_encode(array('content'=>$lesson_content)),
			'subject_id'=> $lesson_subject,
			'lesson_title' => $lesson_title,
			'lesson_author' => teacher_session('id'),
			'id'=> $lesson_id,
			'date_created' => date('Y-d-m')
		);
		$result = $this->Lessons_Model->edit($data);
		$get_title = $this->db->get_where('lessons', array(
			'id'=>$lesson_id
		))->result();
		redirect(teacher_base().'lessons/edit?edit='.$get_title[0]->lesson_title.'&result='.$result);
		// echo $result;
	}

	public function lesson_preview(){
		teacher_logged();
		if(isset($_GET['preview']))
		{
			$previewQuery = $_GET['preview'];
			$query = "SELECT * FROM lessons WHERE lesson_title = '$previewQuery'";
			$res = $this->Lessons_Model->query($query);
			$data = array();
			foreach ($res as $content) {
				$data['preview'] = json_decode($content->lesson_content)->content;
				$data['title'] = $content->lesson_title;
			}
			// var_dump($data['preview']);
			$this->view('lessons/lesson_preview', $data);
		}
	}
	public function delete(){
		$id = $this->input->post('lesson_id');
		$dataType = $this->input->post('data_type');
		if($dataType == "ajax"){	
			$delete_result = $this->Lessons_Model->delete($id);
			echo json_encode(array("status" => true));
		}
	
	}
	public function ajax_delete_lesson(){
		$id = $this->input->post('id');
		$dataType = $this->input->post('data_type');
		if($dataType == "ajax"){	
			$delete_result = $this->Lessons_Model->delete($id);	
			echo json_encode(array("status" => true));
		}
	}
	public function ajax_update_subject($id){
		$dataType = $this->input->post('dataType');
		// if($dataType == 'ajax'){
			$data = array(
				'subject_id'=> $this->input->post('subject_id'),
				'id' => $id,
				'updated_on'=>mdate('%Y-%m-%d')
			);
			$updateResult = $this->Lessons_Model->update_subject($data);
			echo json_encode(array("status" => $updateResult));
		// }	
	}
}

?>