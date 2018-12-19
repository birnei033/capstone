<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library(array('user_agent', 'functions', 'session'));
	}

	public function index()
	{
		// $this->functions->is_admin();
		$this->load->view('includes/head');
		$this->load->view('includes/top-navigation');
		$this->load->view('includes/left-navigation');
		// $this->load->view('dashboard');
		// echo "This is a landing page";
		$this->load->view('includes/footer');
	}
}
