<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lessons extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url'));
		$this->load->model('lessons_model');
		$this->load->helper('url');
		$this->load->library(array('user_agent', 'functions', 'session'));
	}
	
    private function alert($message = "", $type = 'default'){
		$alert = '<div class="alert alert-'.$type.'" id="subject-alert">';
		$alert .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close">';
		$alert .= '	<i class="fa fa-close"></i>';
		$alert .= '</button>';
		$alert .= '<span id="alert-text">';
		$alert .= $message;
		$alert .= '</span>';
		$alert .= '</div>';
		return $alert;
	}
	
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
		$this->functions->is_admin();
		// $data['data']['lessons'] = $this->lessons_model->getAll();
		// $subj = $this->lessons_model->getSubjects();
		// var_dump($subj);
		// foreach ($subj as $s) {
		// 	$data['data']['subject'][$s->subject_id] = $s->subject_title;
		// 	// var_dump($s->subject_id);
		// }
		// var_dump($data['data']);
		
		$this->load->view('includes/head');
		$this->load->view('includes/top-navigation');
		$this->load->view('includes/left-navigation');
		$this->load->view('lessons/lessons');
		$this->load->view('includes/footer');

	}

	public function ajax_get_lessons(){
		$lessons = $this->lessons_model->getAll();
		$subj = $this->lessons_model->getSubjectsArray();
		$data = array();
		
		foreach ($lessons as $lesson) {
			$sub['id'] = $lesson->id;
			$sub['lesson_title'] = $lesson->lesson_title;
			$sub['lesson_author'] = $lesson->lesson_author;
			$sub['subject'] = $subj[$lesson->subject_id];
			$sub['tool'] = '<a class="btn btn-primary waves-effect waves-light ml-2 p-1" href="'.teacher_base('lessons/lesson_preview').'?preview=.'.$lesson->lesson_title.'">Preview</a>'
			.'<a class="btn btn-inverse waves-effect waves-light ml-2 p-1" href="'.teacher_base('lessons').'/edit?edit='.$lesson->lesson_title.'">Edit</a>'
			.'<a class="delete btn btn-danger waves-effect waves-light ml-2 p-1" lesson_id="'.$lesson->id.'" href="#">Delete</a>';
			$data[] = $sub;
		}
		$dataa['data'] = $data;
        // $dataa['draw'] = 20;
        // $dataa['recordsTotal']= count($lessons);
        // $dataa['recordsFiltered']= $students;
        echo json_encode($dataa);
	}

	public function add(){ // adding lessons view
		$this->functions->is_admin();
		$data['subjects'] = $this->lessons_model->getSubjects();
		// var_dump($data);
		$this->view("lessons/lesson_adding", $data);
	}

	public function save(){
		if($this->input->post('save') != ""){
			$lesson_content = $this->input->post('lesson-content');
			$lesson_title = $this->input->post('lesson-title');
			$lesson_subject = $this->input->post('lesson-subject');

			$data = array(
				'lesson_content'=> $lesson_content,
				'subject_id'=> $lesson_subject,
				'lesson_title' => $lesson_title,
				'lesson_author' => 'Bernz',
				'date_created' => date('Y-d-m')
			);
			$add = $this->lessons_model->add($data);
			redirect('/lessons/lesson_preview?preview='.$lesson_title, 'refresh');
			// $this->lesson_has_been_saved();
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
				$data['content'] = $content->lesson_content;
				$data['id'] = $content->id;
				$data['subject_id'] = $content->subject_id;
			}
			$subj = $this->lessons_model->getSubjects();
			$data['subjects'] = array();
			foreach ($subj as $s) {
				array_push($data['subjects'], array(
					'subject_id'=> $s->subject_id,
					'subject_title' => $s->subject_title
				));
			}
			// var_dump($data);
			$this->view('lessons/lesson_editing_page', $data);
		}
	}

	public function edit_submited(){
		$lesson_content = $this->input->post('lesson-content');
		$lesson_title = $this->input->post('lesson-title');
		$lesson_subject = $this->input->post('lesson-subject');
		$lesson_id = $this->input->post('lesson-id');
		$data = array(
			'lesson_content'=> $lesson_content,
			'subject_id'=> $lesson_subject,
			'lesson_title' => $lesson_title,
			'lesson_author' => 'Bernz',
			'id'=> $lesson_id,
			'date_created' => date('Y-d-m')
		);
		$result = $this->lessons_model->edit($data);
		redirect('teacher/lessons/edit?edit='.$lesson_title.'&result='.$result, 'refresh');
		// echo $result;
	}

	public function lesson_preview(){
		if(isset($_GET['preview']))
		{
			$previewQuery = $_GET['preview'];
			$query = "SELECT * FROM lessons WHERE lesson_title = '$previewQuery'";
			$res = $this->lessons_model->query($query);
			foreach ($res as $content) {
				$data['preview'] = $content->lesson_content;
			}
			// var_dump($data);
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
}

?>