<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lessons extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url'));
		$this->load->model('lessons_model');
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
		$this->functions->is_admin();
		$data['subjects'] = $this->lessons_model->ajax_getAllSubjects(teacher_session('id'));
		// var_dump($data);
		$this->load->view('includes/head');
		$this->load->view('includes/top-navigation');
		$this->load->view('includes/left-navigation');
		$this->load->view('lessons/lessons',$data);
		$this->load->view('includes/footer');

	}

	public function ajax_get_lessons(){
		$lessons = $this->lessons_model->getAllByAuthor(teacher_session('id'));
		$subj = $this->lessons_model->getSubjectsArray();
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
			$sub['tool'] = '<a '.tooltip("Preview").' class="btn btn-primary waves-effect waves-light ml-2 p-1" href="'.teacher_base('lessons/lesson_preview').'?preview='.$lesson->lesson_title.'">Preview</a>'
			.'<a '.tooltip("Edit").' class="btn btn-inverse waves-effect waves-light ml-2 p-1" href="'.teacher_base('lessons').'/edit?edit='.$lesson->lesson_title.'">Edit</a>'
			.'<a '.tooltip("Delete").' onclick="delete_alert('.$delete_alert.')" class="delete btn btn-danger waves-effect waves-light ml-2 p-1" lesson_id="'.$lesson->id.'" href="#delete">Delete</a>';
			$data[] = $sub;
		}
		$dataa['data'] = $data;
        echo json_encode($dataa);
	}

	public function add(){ // adding lessons view
		$this->functions->is_admin();
		$data['subjects'] = $this->lessons_model->ajax_getAllSubjects(teacher_session('id'));
		$this->view("lessons/lesson_adding", $data);
	}

	public function save(){
		if($this->input->post('save') != ""){
			$lesson_content = $this->input->post('lesson-content');
			$lesson_title = $this->input->post('lesson-title');
			$lesson_subject = $this->input->post('lesson-subject');

			$this->form_validation->set_error_delimiters('<li class="text-danger">', '</li>');

			$this->form_validation->set_rules('lesson-content', 'Lesson-content', array(
				'trim',
				'required',
				array('check_lesson_title',
					function($val){
						$lesson = $this->input->post('lesson-title');
						$q = "SELECT lesson_title FROM lessons WHERE lesson_title LIKE '$lesson'";
						$result = $this->lessons_model->query($q);
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
				$add = $this->lessons_model->add($data);
				redirect(teacher_base().'/lessons/lesson_preview?preview='.$lesson_title, 'refresh');
			}else{
				$data['subjects'] = $this->lessons_model->getSubjects();
				$this->functions->view('lessons/lesson_adding',$data);
			}
		}
		
	} 
	public function edit(){
		if(isset($_GET['edit']))
		{
			$previewQuery = $_GET['edit'];
			$query = "SELECT * FROM lessons WHERE lesson_title = '$previewQuery'";
			$res = $this->lessons_model->query($query);
			foreach ($res as $content) {
				$data['title'] = $content->lesson_title;
				$data['content'] = json_decode($content->lesson_content)->content;
				$data['id'] = $content->id;
				$data['subject_id'] = $content->subject_id;
				// var_dump($content->lesson_content);
			}
			$subj = $this->lessons_model->getSubjects();
			$data['subjects'] = array();
			foreach ($subj as $s) {
				array_push($data['subjects'], array(
					'subject_id'=> $s->subject_id,
					'subject_title' => $s->subject_title
				));
			}
			// var_dump($data['content']);
			$this->view('lessons/lesson_editing_page', $data);
		}
	}

	public function edit_submited(){
		$lesson_content = $this->input->post('lesson-content');
		$lesson_title = $this->input->post('lesson-title');
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
		$result = $this->lessons_model->edit($data);
		redirect(teacher_base().'/lessons/edit?edit='.$lesson_title.'&result='.$result, 'refresh');
		// echo $result;
	}

	public function lesson_preview(){
		if(isset($_GET['preview']))
		{
			$previewQuery = $_GET['preview'];
			$query = "SELECT * FROM lessons WHERE lesson_title = '$previewQuery'";
			$res = $this->lessons_model->query($query);
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
			$delete_result = $this->lessons_model->delete($id);
			echo json_encode(array("status" => true));
		}
	
	}
	public function ajax_delete_lesson(){
		$id = $this->input->post('id');
		$dataType = $this->input->post('data_type');
		if($dataType == "ajax"){	
			$delete_result = $this->lessons_model->delete($id);	
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
			$updateResult = $this->lessons_model->update_subject($data);
			echo json_encode(array("status" => $updateResult));
		// }	
	}
}

?>