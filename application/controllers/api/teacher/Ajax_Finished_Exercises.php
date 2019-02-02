<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax_Finished_Exercises extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper(array('url'));
		$this->load->model('Common_Model');
		$this->load->library(array('user_agent', 'functions', 'session', 'form_validation'));
    }
    
    public function index(){ 
			$cs_id = $this->input->get('cs_id');
			$ex_id = $this->input->get('ex_id');
			$checked = $this->input->Get('checked');
			if ($checked) {
			$all =	$this->Common_Model->query('SELECT * FROM finished_exercises
			INNER JOIN subjects ON subjects.subject_id = finished_exercises.subject_id
			INNER JOIN college_students ON finished_exercises.cs_id = college_students.student_id
			INNER JOIN exercises ON finished_exercises.ex_id = exercises.id
			WHERE cs_id = '.$cs_id.' AND ex_id = '.$ex_id.' AND is_checked = '.$checked
			);
			}else{
				$all =	$this->Common_Model->query('SELECT * FROM finished_exercises
				INNER JOIN subjects ON subjects.subject_id = finished_exercises.subject_id
				INNER JOIN college_students ON finished_exercises.cs_id = college_students.student_id
				INNER JOIN exercises ON finished_exercises.ex_id = exercises.id
				WHERE cs_id = '.$cs_id.' AND ex_id = '.$ex_id
				);
			}
			$mc_answer = array();
			$tf_answers = array();
			$written_answers = array();
			$test = array();
			$answers = json_decode($all[0]->ex_cs_answers);
			$answerss = json_decode($all[0]->ex_cs_answers);
			// $correct_answers = json_decode($all[0]->correct_answers);
		 foreach ($answerss as $value) {
			 $temp['mc_answer']['cs_answer'] = $answerss->cs_answer->mc_answers;
			 $temp['mc_answer']['correct_answer'] = $answerss->correct_answers->mc_answers;
			 $temp['tf_answers']['cs_answer'] = $answerss->cs_answer->tf_answers;
			 $temp['tf_answers']['correct_answer'] = $answerss->correct_answers->tf_answers;
			 $temp['written_answers']['cs_answer'] = $answerss->cs_answer->written_answers;
			 $temp['written_answers']['correct_answer'] = $answerss->correct_answers->written_answers;
			 $test[] = $temp;
		 }
			foreach ($answers->cs_answer->mc_answers as $key => $value) {
				$temp[''] = $value;
				$mc_answer[] = $temp;
			}
			foreach ($answers->cs_answer->tf_answers as $key => $value) {
				$temp = $value;
				$tf_answers[] = $temp;
			}
			// foreach ($answers->cs_answer->written_answers as $key => $value) {
			// 	$temp = $value;
			// 	$written_answers[] = $temp;
			// }
			echo json_encode(array(
				// 'mc_answers'=>$mc_answer,
				// 'tf_answers'=>$tf_answers,
				'written_answers'=>$test,
				'answers'=>$all[0],
				// 'test'=>$all
			));
		}

		public function exercise_answers($ct_id){
			$checked = $this->input->get('checked');
			$is_return = $this->input->get('return-type');
				$query = 'SELECT * FROM finished_exercises 
				INNER JOIN subjects ON subjects.subject_id = finished_exercises.subject_id
				INNER JOIN college_students ON finished_exercises.cs_id = college_students.student_id
				INNER JOIN exercises ON finished_exercises.ex_id = exercises.id
				WHERE finished_exercises.ct_id = '.$ct_id.' AND is_checked = '.$checked . ' ORDER BY finished_exercises.id DESC'; 
			$exercises =	$this->Common_Model->query($query);
			$out = array();
			foreach ($exercises as $value) {
				$temp['cs_id'] = $value->cs_id;
				$temp['ex_id'] = $value->ex_id;
				$temp['ex_name'] = $value->ex_name;
				$temp['student_name'] = $value->student_full_name;
				$temp['student_subject'] = $value->subject_title;
				$temp['ex_score'] = $value->ex_score;
				$temp['ex_total_item'] = $value->ex_total_item;
				$temp['ex_cs_answers'] =json_decode($value->ex_cs_answers);
				$out[] = $temp;
			}
			if ($is_return) {
				return json_encode(array(
					'ex_cs_answers'=> $out
				) );
			}else{
				echo json_encode(array(
					// 'test'=>$exercises,
					'ex_cs_answers'=> $out,
				) );
			}
		}
		
  
    
}