<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lessons extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('lessons_model');
		$this->load->library('user_agent');
		$this->load->helper('date');
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
        $data['lessons'] = $this->lessons_model->getAll();
		$this->load->view('includes/head');
		$this->load->view('includes/top-navigation');
		$this->load->view('includes/left-navigation');
		$this->load->view('lessons/lessons', $data);
		$this->load->view('includes/footer');
	}

	public function add(){ // adding lessons view
		$this->view("lessons/lesson_adding");
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
			$this->lesson_has_been_saved();
		}
	}
	public function lesson_has_been_saved(){
		$query = "SELECT * FROM lessons ORDER BY id DESC LIMIT 1";
		$res['lessons'] = $this->lessons_model->query($query);
		// var_dump($res['lessons']);
		
		$this->view('lessons/lesson_editing_page', $res);
	}
}

?>