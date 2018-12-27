<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Change_Password extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url'));
		$this->load->model('students_model');
		$this->load->library(array('user_agent', 'functions', 'session', 'form_validation'));
    }
    
    public function index(){
        // var_dump($this->session->student_logged_in);
		$this->load->view('includes/head');
        $this->load->view('student/cs_changepass');
        $this->load->view('includes/footer-auth');
    }
  
    public function submit(){ 
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<li class="text-danger">', '</li>');
		$user_password = $this->input->post('cs_passconf');
		$this->form_validation->set_rules('cs_password', 'Password', 'required',
            array('required' => 'You must provide a %s.')
        );
        $this->form_validation->set_rules('cs_passconf', 'Password Confirmation', 'required|matches[cs_password]');

		// // USER NAME VALIDATION
		// $this->form_validation->set_rules('cs_login_name', 'cs_login_name', array(
		// 	'trim',
		// 	'required',
		// 	array('check_user',
		// 		function($val){
					
		// 		}
		// 	)
		// ), 
		// array(
		// 	'required'=>"You must provide a %s."
		// ));

		// // password validation
		// $this->form_validation->set_rules('cs_password', 'cs_password', 
		// 	array(
		// 		'trim',
		// 		'required',
		// 		array(
		// 			'password_check',
		// 			function($val){
        //                 $user_name = $this->input->post('cs_login_name');
        //                 $user_password = $this->input->post('cs_password');
        //                 $data = array(
        //                     'student_login_name'=> $user_name,
        //                     'student_password'=>$user_password
        //                 );
        //                 $user = $this->students_model->login_auth($data);
		// 				if (!empty($user)) {
		// 					if($user['student_password'] === $val){
		// 						return true;
		// 					}else{
		// 						$this->form_validation->set_message('password_check', 'Wrong Password');
		// 						return false;
		// 					}
		// 				}else{
		// 					$this->form_validation->set_message('password_check', 'Wrong Password');
		// 					return false;
		// 				}
		// 			}
		// 		)
		// 	), 
		// 	array(
		// 		'required'=>"You must provide a %s."
		// 	));
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('includes/head');
			$this->load->view('student/cs_changepass');
			$this->load->view('includes/footer-auth');
		}
		else
		{
			// $this->session->set_userdata('student_logged_in', $users);
			// redirect('student/', 'refresh');	
			$id = $this->session->student_logged_in['student_id'];
			$data = array(
				'student_id' => $id,
				'student_password' => $user_password,
				'date_updated' => mdate('%Y-%m-%d')
			);
			$result = $this->students_model->change_password($data);
			if($result){

				var_dump($this->session->student_logged_in);
			}
		}
    }

    public function logout(){
		$this->session->sess_destroy();
		redirect('', 'refresh');
	}
}