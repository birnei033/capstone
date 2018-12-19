<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Your_Students extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('students_model');
		$this->load->helper('url');
		$this->load->library(array('user_agent', 'functions', 'session'));
    }
    public function index(){
        $this->functions->is_admin();
        $data['students'] = $this->students_model->getAllWith($this->session->userdata['logged_in']['id']);
        $data['programs'] = $this->students_model->getAllPrograms();
        // var_dump($data['programs']);
        $this->functions->view('authentication/college_teacher/ct_students_list', $data);
    }
}