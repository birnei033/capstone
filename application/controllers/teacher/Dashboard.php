<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Common_Model');
		$this->load->library(array('user_agent', 'functions', 'session'));
	}

	public function index()
	{
		teacher_logged();
		$action = $this->input->get('action');
		if ($action == 'view quiz result') {
			$this->view_quiz_result();
		}else{
			$number_of_lessons = $this->db->query('SELECT COUNT(lesson_author) AS \'lessons\' FROM lessons WHERE lesson_author = '.teacher_session('id') )->result()[0]->lessons;
			$number_of_subjects = $this->db->query('SELECT COUNT(added_by) AS \'subjects\' FROM subjects WHERE added_by = '.teacher_session('id') )->result()[0]->subjects;
			$number_of_students = $this->db->query('SELECT COUNT(added_by) AS \'students\' FROM college_students WHERE added_by = '.teacher_session('id') )->result()[0]->students;
			$number_of_exercises = $this->db->query('SELECT COUNT(teacher_id) AS \'exercises\' FROM exercises WHERE teacher_id = '.teacher_session('id') )->result()[0]->exercises;
			$data['lessons'] = $number_of_lessons;
			$data['subjects'] = $number_of_subjects;
			$data['students'] = $number_of_students;
			$data['exercises'] = $number_of_exercises;
			$this->functions->is_admin();
			$this->load->view('includes/head');
			$this->load->view('includes/top-navigation');
			$this->load->view('includes/left-navigation');
			$this->load->view('teacher_dashboard', $data);
			// echo "This is a landing page";
			$this->load->view('includes/footer');
		}
	}

	private function view_quiz_result(){
		$cs_id = $this->input->get('cs_id');
		$ex_id = $this->input->get('ex_id');
		$student = $this->Common_Model->query('SELECT student_full_name FROM college_students 
		WHERE student_id = '.$cs_id);
		$update = $this->Common_Model->update('finished_exercises', array(
			'ex_id'=>$ex_id,
			'cs_id'=>$cs_id,
		), array(
			'is_checked'=>1
		));
		$data['get'] = array(
			'ex_id'=>$ex_id,
			'cs_id'=>$cs_id,
			'cs_name'=>$student[0]->student_full_name
		);
		// var_dump($student);
		teacher_view('exercise/exercise_result', $data);
	}
}
