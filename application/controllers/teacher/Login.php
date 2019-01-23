<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url', 'form', 'date'));
		$this->load->model('Users_Model');
		$this->load->library(array('user_agent', 'functions', 'session', 'form_validation'));
    }
	
    public function index(){
		// var_dump($this->session->logged_in);
		if (teacher_session() != null) {
            redirect('teacher/dashboard');
        }
		$this->load->view('includes/head');
        $this->load->view('authentication/college_teacher/ct_login');
        $this->load->view('includes/footer-auth');
	}

	public function login(){
		$this->load->library('form_validation');
		$this->form_validation->set_error_delimiters('<li class="text-danger">', '</li>');
		$user_name = $this->input->post('ct_login_name');
		$user_password = $this->input->post('ct_password');
		$users = $this->Users_Model->getByName($user_name);
		if (!isset($user_name)) {
			redirect(teacher_base(), 'refresh');
		}
		// USER NAME VALIDATION
		$this->form_validation->set_rules('ct_login_name', 'Ct_login_name', array(
			'trim',
			'required',
			array('check_user',
				function($val){
					$user = $this->Users_Model->getByName($val);
					if (!empty($user)) {
						if($user['name'] === $val){
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
		$this->form_validation->set_rules('ct_password', 'Ct_password', 
			array(
				'trim',
				'required',
				array(
					'password_check',
					function($val){
						$user_name = $this->input->post('ct_login_name');
						$user = $this->Users_Model->getByName($user_name);
						if (!empty($user)) {
							if($user['password'] === $val){
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
			$this->load->view('authentication/college_teacher/ct_login');
			$this->load->view('includes/footer-auth');
		}
		else
		{
			$this->session->set_userdata('logged_in', $users);
			redirect('teacher/dashboard', 'refresh');
		}
	}

	public function logout(){
		$this->session->unset_userdata('logged_in');
		redirect(base_url('admin'), 'refresh');
	}

}