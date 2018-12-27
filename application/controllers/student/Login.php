<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

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
        $this->load->view('student/cs_login');
        $this->load->view('includes/footer-auth');
    }
  
    public function login_submit(){ 
        $this->load->library('form_validation');
        $this->form_validation->set_error_delimiters('<li class="text-danger">', '</li>');
        $user_name = $this->input->post('cs_login_name');
        $user_password = $this->input->post('cs_password');
        $data = array(
            'student_login_name'=> $user_name,
            'student_password'=>$user_password
        );
		$users = $this->students_model->login_auth($data);

		// USER NAME VALIDATION
		$this->form_validation->set_rules('cs_login_name', 'cs_login_name', array(
			'trim',
			'required',
			array('check_user',
				function($val){
					$user_name = $this->input->post('cs_login_name');
                    $user_password = $this->input->post('cs_password');
                    $data = array(
                        'student_login_name'=> $user_name,
                        'student_password'=>$user_password
                    );
                    $user = $this->students_model->login_auth($data);
					if (!empty($user)) {
						if($user['student_login_name'] === $val){
							return true;
						}else{
							$this->form_validation->set_message('check_user', 'Wrong User Name');
							return false;
						}
					}else{
						$this->form_validation->set_message('check_user', 'Wrong User Name');
						return false;
					}
				}
			)
		), 
		array(
			'required'=>"You must provide a %s."
		));

		// password validation
		$this->form_validation->set_rules('cs_password', 'cs_password', 
			array(
				'trim',
				'required',
				array(
					'password_check',
					function($val){
                        $user_name = $this->input->post('cs_login_name');
                        $user_password = $this->input->post('cs_password');
                        $data = array(
                            'student_login_name'=> $user_name,
                            'student_password'=>$user_password
                        );
                        $user = $this->students_model->login_auth($data);
						if (!empty($user)) {
							if($user['student_password'] === $val){
								return true;
							}else{
								$this->form_validation->set_message('password_check', 'Wrong Password');
								return false;
							}
						}else{
							$this->form_validation->set_message('password_check', 'Wrong Password');
							return false;
						}
					}
				)
			), 
			array(
				'required'=>"You must provide a %s."
			));
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('includes/head');
			$this->load->view('student/cs_login');
			$this->load->view('includes/footer-auth');
		}
		else
		{
            $this->session->set_userdata('student_logged_in', $users);
            if($users['student_password'] === 'changeme'){
                redirect('student/change_password', 'refresh');
            }
            redirect('student/', 'refresh');
            var_dump($this->session->student_logged_in);
		}
    }

    public function logout(){
		$this->session->sess_destroy();
		redirect('', 'refresh');
	}
}