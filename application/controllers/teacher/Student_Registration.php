<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student_Registration extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// $this->load->model('subjects_model');
		$this->load->helper('url');
		$this->load->library(array('user_agent', 'functions', 'session'));
    }

    public function index(){
        $this->functions->is_admin();
        $this->functions->view('authentication/college_teacher/ct_reg_student');
    }
}