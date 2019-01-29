<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class View_Test extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url'));
		$this->load->model('Common_Model');
		$this->load->library(array('user_agent', 'functions', 'session', 'form_validation'));
    }

    public function index(){
        // $this->load->view('includes/head');
        $this->load->view('blank');
        // $this->load->view('includes/footer');
    }

}