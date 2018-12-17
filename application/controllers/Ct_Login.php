<?php
defined('BASEPATH') OR exit('No direct script access allowed');
// session_start();
// session_destroy();
class Ct_Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url', 'form', 'date'));
		$this->load->model('users_model');
		$this->load->library('session');
		$this->load->library(array('user_agent', 'test'));
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
		$this->load->view('includes/head');
        $this->load->view('authentication/college_teacher/ct_login');
        $this->load->view('includes/footer-auth');
	}
	
	public function login(){
		$this->load->library('form_validation');
		$config = array(
			array(
				'field' => 'ct_login_name',
				'label' => 'Ct_login_name',
				'rules' => 'trim|required',
				'errors'=> array(
					'required' => 'This field is required'
				)
			),
		);
		$this->form_validation->set_rules('ct_login_name', 'Ct_login_name', 'trim|required');
		$this->form_validation->set_rules('ct_password', 'Ct_password', 'trim|required', 
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
			$user_name = $this->input->post('ct_login_name');
			$ct = $this->users_model->getByName($user_name);
			$this->test->testing();
			// var_dump($ct);
		}
	}

}