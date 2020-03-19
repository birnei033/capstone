<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Help extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url'));
		$this->load->model('Students_Model');
		$this->load->library(array('user_agent', 'functions', 'session', 'form_validation'));
    }
    
    public function index(){
        // var_dump($this->session->student_logged_in);
		// $this->load->view('includes/head');
        // $this->load->view('student/cs_changepass');
        // $this->load->view('includes/footer-auth');
	}
	public function date_string_to_array(){
		
		echo json_encode(array(
			'start'=>date_array($this->input->post('start')),
			'end'=>date_array($this->input->post('end'))
		));
		// $start = '2020-03-19T12:59';
		// $end = '2020-03-20T00:59';
		// echo json_encode(array(
		// 	'start'=>date_array($start),
		// 	'end'=>date_array($end)
		// ));
	}
  
}