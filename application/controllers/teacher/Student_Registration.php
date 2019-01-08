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
		$this->load->library('form_validation');
		$s_login_name = $this->input->post('s-login-name');
		$s_school_id = $this->input->post('s-school-id');
		$s_full_name = $this->input->post('s-full-name');
		$s_subject = $this->input->post('s-subject');
		$s_program = $this->input->post('s-program');
		$res = $this->students_model->get_where('college_students', array(
			'school_id'=>$s_school_id,
			'student_subjects'=>$s_subject
		));
		$this->form_validation->set_rules('s-login-name', 'Username', 'required');
		$this->form_validation->set_rules('s-school-id', 'school-id', 'required');
		$this->form_validation->set_rules('s-full-name', 'name', 'required');
		$this->form_validation->set_rules('s-program', 'program', 'required');
		$this->form_validation->set_rules('s-subject', 'subject', 'required');
		if ($this->form_validation->run() == FALSE)
		{
			echo json_encode(array(
				'message'=> "All fields are required.",
				'icon'=>"error"
			));
		}
		else
		{	
			if (!empty($res)) {
				$subj = $this->students_model->get_where('subjects', array(
					'subject_id'=>$s_subject,
				));
				$subj_title = "";
				foreach ($subj as $value) {
					$subj_title = $value->subject_title;
				}
				echo json_encode(array(
				'message'=> "Student ".$s_school_id." with subject ".$subj_title." already exist.",
				'icon'=>"error"
				));
				
			}else{
				$data = array(
					'school_id' => $s_school_id,
					'student_login_name' => $s_login_name,
					'student_full_name' => $s_full_name,
					'student_program' => $s_program,
					'student_subjects' => $s_subject,
					'added_by' => teacher_session('id')
				);
				$add = $this->students_model->add($data);
				echo json_encode(array(
					'message'=> "Student added successfully.",
					'icon'=>"success"
				));
			}
		}
		// redirect(teacher_base('your_students'), 'refresh');
	}
}