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
		// var_dump($this->session->student_logged_in);
		student_logged();
		$query = "SELECT lesson_title FROM lessons";
		$result = $this->lessons_model->query($query);
		$data['lessons'] = array();
		foreach ($result as $lesson) {
			$temp = $lesson->lesson_title;
			$data['lessons'][] = $temp;
		}
		if (!isset($this->session->student_logged_in)) {
            // redirect('student/login');
		}
			// student_view('cs_dashboard', array(
			// 	'main'=>$data,
			// 	'sidebar'=>$data
			// ));
			
		$this->load->view('includes/head');
        $this->load->view('student/cs_dashboard');
        $this->load->view('includes/footer-auth');
	}
	public function lesson(){
		student_logged();
		$title = !isset($_GET['lesson']) ? "" : $_GET['lesson'] ;
		if (isset($_GET['lesson'])) {
			$query = "SELECT lesson_title, lesson_content FROM lessons WHERE lesson_title LIKE '$title'";
			$result = $this->lessons_model->query($query);
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