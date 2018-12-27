<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url'));
		$this->load->model('lessons_model');
		$this->load->library(array('user_agent', 'functions', 'session', 'form_validation'));
    }
    
    public function index(){
		var_dump($this->session->student_logged_in);
		if (!isset($this->session->student_logged_in)) {
            redirect('student/login');
        }
    }
}