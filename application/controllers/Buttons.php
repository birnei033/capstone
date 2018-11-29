<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buttons extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
	}
	public function index()
	{
		$this->load->view('includes/head');
		$this->load->view('includes/top-navigation');
		$this->load->view('includes/left-navigation');
		$this->load->view('buttons');
		$this->load->view('includes/footer');
	}
}
