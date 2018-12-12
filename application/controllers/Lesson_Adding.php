<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lesson_adding extends CI_Controller {

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

    public function index(){
		// $this->load->view('includes/head');
		// $this->load->view('includes/top-navigation');
		// $this->load->view('includes/lesson-add-elements-side-bar');
		// $this->load->view('lessons/lesson_adding');
		// $this->load->view('includes/footer');
        $this->view("lessons/lesson_adding");
	}
	
}