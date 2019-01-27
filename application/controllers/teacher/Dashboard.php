<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Common_Model');
		$this->load->library(array('user_agent', 'functions', 'session'));
	}

	public function index()
	{
		$action = $this->input->get('action');
		if ($action == 'view quiz result') {
			$this->view_quiz_result();
		}else{
			$this->functions->is_admin();
			$this->load->view('includes/head');
			$this->load->view('includes/top-navigation');
			$this->load->view('includes/left-navigation');
			$this->load->view('blank');
			// echo "This is a landing page";
			$this->load->view('includes/footer');
		}
	}

	private function view_quiz_result(){
		$cs_id = $this->input->get('cs_id');
		$ex_id = $this->input->get('ex_id');
		$student = $this->Common_Model->query('SELECT student_full_name FROM college_students 
		WHERE student_id = '.$cs_id);
		$data['get'] = array(
			'ex_id'=>$ex_id,
			'cs_id'=>$cs_id,
			'cs_name'=>$student[0]->student_full_name
		);
		// var_dump($student);
		teacher_view('exercise/exercise_result', $data);
	}
}
