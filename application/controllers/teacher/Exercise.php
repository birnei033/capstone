<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Exercise extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('common_model', null, "db");
		$this->load->helper(array('date','exercise'));
		$this->load->library(array('user_agent', 'functions', 'session'));
    }
    public function index()
    {
        view('blank');
    }
    public function add($submit = 0)
    {
        if ($submit) {
        
        }else{
            view('exercise/add_exercise');
        }
    }

}