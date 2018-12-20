<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student_Registration extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('students_model');
		$this->load->helper('url');
		$this->load->library(array('user_agent', 'functions', 'session'));
    }

    public function index(){
		$this->functions->is_admin();
		$data['programs'] = $this->students_model->getAllPrograms();
        $this->functions->view('authentication/college_teacher/ct_reg_student', $data);
	}
	public function add(){
		$this->functions->is_admin();
		$s_login_name = $this->input->post('s-login-name');
		$s_school_id = $this->input->post('s-school-id');
		$s_full_name = $this->input->post('s-full-name');
		$s_program = $this->input->post('s-program');
		$data = array(
			'school_id' => $s_school_id,
			'student_login_name' => $s_login_name,
			'student_full_name' => $s_full_name,
			'student_program' => $s_program,
			'student_subjects' => '',
			'added_by' => $this->session->userdata['logged_in']['id']
		);
		$add = $this->students_model->add($data);
		// redirect(teacher_base('your_students'), 'refresh');
	}
}