<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url'));
		$this->load->model('Lessons_Model');
		$this->load->library(array('user_agent', 'functions', 'session', 'form_validation'));
    }
    
    public function index(){

		student_logged();
		$query = "SELECT lesson_title FROM lessons WHERE subject_id = ".student_session('student_subject_id');
		$result = $this->Lessons_Model->query($query);
		$data['lessons'] = array();
		foreach ($result as $lesson) {
			$temp = $lesson->lesson_title;
			$data['lessons'][] = $temp;
		}
		$data['answered'] = $this->db->get_where('finished_exercises', array(
			'cs_id'=>student_session('student_id')
		))->result();
		// var_dump($data['answered']);
		$exercises = $this->db->get_where('exercises', array(
			'subject_id'=>student_session('student_subject_id')
		));
		$data['exercises'] = $exercises->result();

		$this->load->view('includes/head');
		$this->load->view('student/top-navigation');
		$this->load->view('student/cs_sidebar_dashboard');
        $this->load->view('student/cs_dashboardv2',$data);
        $this->load->view('student/footer');
	}
	public function lesson(){
		student_logged();
		$title = !isset($_GET['lesson']) ? "" : $_GET['lesson'] ;
		if (isset($_GET['lesson'])) {
			$query = "SELECT lesson_title, lesson_content FROM lessons WHERE lesson_title LIKE '$title'";
			$result = $this->Lessons_Model->query($query);
			$data['lessons'] = "";	
			
			foreach ($result as $lesson) {
				$temp['lesson_title'] = $lesson->lesson_title;
				$temp['lesson_content'] = json_decode($lesson->lesson_content)->content;
				$data['lessons'] = $temp;
			}
			}else {
				$temp['lesson_title'] = "Welcome to Your Lessons";
				$temp['lesson_content'] = "<h4>Please Select Your Lesson To Start</h4>";
				$data['lessons'] = $temp;
			}	
		// var_dump($data);
		student_lesson('student/cs_lesson', $data);
	}
}