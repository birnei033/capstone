<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Exercises_Report extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Common_Model');
		$this->load->helper(array('date','exercise'));
		$this->load->library(array('user_agent', 'functions', 'session'));
    }
    public function index()
    {
        $subjects['subjects'] = $this->Common_Model->get('subjects');
        $test = $this->Common_Model->join('subjects', array('joins'=> array(
            'table'=>'finished_exercises',
            'where'=>"finished_exercises.subject_id = subjects.subject_id"
        )));
        var_dump($test);
        view('exercise/exercises_report', $subjects);
    }
   
}