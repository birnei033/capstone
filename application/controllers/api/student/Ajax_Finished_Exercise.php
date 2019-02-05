<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax_Finished_Exercise extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url'));
		$this->load->model('Common_Model');
		$this->load->library(array('user_agent', 'functions', 'session', 'form_validation'));
    }
    
    public function index(){ 
			$id = $this->input->get('id');
			// $exercise = $this->Common_Model->get_where('finished_exercises', 'id = '.$id);
			$exercise = $this->Common_Model->join('finished_exercises', array(
				array(
					'table'=>'exercises',
					'on'=>'exercises.id = finished_exercises.ex_id'
				),
			), 'finished_exercises.id = '.$id)[0];
			// $ex_cs_answers = json_decode($exercise[0]->ex_cs_answers);
			// $ex_multiple_choice = $ex_cs_answers->correct_answers->mc_answers;

			// multiple choice
			$mc_choice = json_decode($exercise->ajax_questions)->mc_ajax_questions;
			$mc_correct_answers = json_decode($exercise->ex_answers)->mc_answers;
			$mc_cs_answers = json_decode($exercise->ex_cs_answers)->cs_answer->mc_answers;
			$data['mc_choice']['question'] = array();
			$data['mc_choice']['answer'] = array();
			$data['mc_choice']['correct'] = array();
			foreach ($mc_choice as $key => $value) {
				$data['mc_choice']['question'][$key] = $value;
			}
			$count = 1;
			foreach ($mc_correct_answers as $key => $value) {
				$data['mc_choice']['correct'][$count] = $value;
				$count++;
			}
			$count2 = 1;
			foreach ($mc_cs_answers as $key => $value) {
				$data['mc_choice']['answer'][$count2] = $value;
				$count2++;
			}

			// true or false
			$tf_choice = json_decode($exercise->ajax_questions)->tf_ajax_questions;
			$tf_correct_answers = json_decode($exercise->ex_answers)->tf_answers;
			$tf_cs_answers = json_decode($exercise->ex_cs_answers)->cs_answer->tf_answers;
			$data['tf_choice']['question'] = array();
			$data['tf_choice']['answer'] = array();
			$data['tf_choice']['correct'] = array();
			foreach ($tf_choice as $key => $value) {
				$data['tf_choice']['question'][$key] = $value;
			}
			$count3 = 1;
			foreach ($tf_correct_answers as $key => $value) {
				$data['tf_choice']['correct'][$count3] = $value;
				$count3++;
			}
			$count4 = 1;
			foreach ($tf_cs_answers as $key => $value) {
				$data['tf_choice']['answer'][$count4] = $value;
				$count4++;
			}

			// written
			$data['written']['question'] = array();
			$data['written']['answer'] = array();
			$written_question = json_decode($exercise->ex_cs_answers)->cs_answer->written_answers;
			$written_answer = json_decode($exercise->ex_cs_answers)->cs_answer->tf_answers;
			$count5 = 1;
			foreach ($written_question as $key => $value) {
				$data['written']['question'][$count5] = (array)$value['written-'.$count5]->question;
				$count5++;
			}
			echo json_encode(array(
				'data'=>$exercise,
				'test'=>$data
				// 'answers'=>$ex_cs_answers
			));
	}
    
}