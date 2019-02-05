<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Take_Exercise extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
        $this->load->helper(array('url'));
        $this->load->helper(array('date','exercise'));
		$this->load->model('Common_Model');
		$this->load->library(array('user_agent', 'functions', 'session', 'form_validation'));
    }
    public function index(){
        if (!empty($this->input->post('ex_submit'))) {
            $this->exercise_submit();
        }else 
        if (!empty($this->input->post('ex_initial'))){
            $this->initial_start();
        }else{
            $ex_id = $this->input->get('ex_id');
            $get_finished_ex = $this->Common_Model->get_where('finished_exercises', array(
                'ex_id'=>$ex_id,
                'cs_id'=>student_session('student_id')
            ));
            $ex_subject_id = $this->input->get('subject');
            if (empty($get_finished_ex)) {
                $this->take_exercise_view($ex_id);
            }else{
                redirect(student_base(), "refresh");
            }
        }
    }
    private function initial_start(){
        $ex_id = $this->input->post('ex_id');
        $subject_id = $this->input->post('subject_id');
        $insert_data = array(
            'ex_id' => $ex_id,
            'subject_id' => $subject_id,
            'cs_id' => student_session('student_id'),
            'ct_id' => student_session('instructor_id'),
        );
        $query_result_id = $this->Common_Model->insert('finished_exercises', $insert_data);
        echo json_encode(array(
            'result'=>$insert_data
        ));        
    }
    private function take_exercise_view($id){
        $query_result['preview'] = $this->Common_Model->get_where('exercises', array(
            'id'=>$id,
            'subject_id'=>student_session('student_subject_id')
        ));
        // var_dump($query_result);
        if (!empty($query_result['preview'])) {
            student_exercise_view('student/cs_exercise', $query_result);
        }else{
            redirect(student_base(), 'refresh');
        }
    }

    private function exercise_submit(){
        $ex_id = $this->input->post('ex_id');
        $subject_id = $this->input->post('subject_id');
        $mc_answers = json_decode($this->input->post('mc_answers'));
        $tf_answers = json_decode($this->input->post('tf_answers'));
        $written_answers = $this->input->post('written_answers');
        $your_answers = array(
            'mc_answers'=>$mc_answers,
            'tf_answers'=>$tf_answers,
            'written_answers'=>$written_answers
        );
        $score = 0;
        $total = 0;
        $query_result = $this->Common_Model->get_where('exercises', array(
            'id'=>$ex_id
        ));
        // true answers
        $true_answers = json_decode($query_result[0]->ex_answers);
        $true_writtens = array();
        foreach ($true_answers->written_answers as $key => $value) {
            $true_writtens[$key] = $value;
            $total = $total + $true_writtens[$key]->points;
        }
        $true_mc_answers = array();
        // $total += count($true_answers->mc_answers);
        foreach ($true_answers->mc_answers as $key => $value) {
            $true_mc_answers[$key] = $value;
            $total++;
        }
        $true_tf_answers = array();
        foreach ($true_answers->tf_answers as $key => $value) {
            $true_tf_answers[$key] = $value;
            $total++;
        }
        
        // COMPARE BOTH ANSWERS
        if (!empty($mc_answers)) {
            foreach ($mc_answers as $key => $answers) {
                // multiple choice
                if ($true_mc_answers[$key] === $answers) {
                    $score++;
                }
            }
        }
        if (!empty($tf_answers)) {
            foreach ($tf_answers as $key => $answers) {
                // true or false
                if ($true_tf_answers[$key] === $answers) {
                    $score++;
                }
            }
        }
        if (!empty($written_answers)) {
            foreach ((array)$written_answers as $key => $value) {
                $isKeywodPresent = false;
                $points = $true_writtens['written-'.$key]->points;
                $questions = $true_writtens['written-'.$key]->question;
                $keywords = explode(',',strtolower($true_writtens['written-'.$key]->keywords));
                foreach ($keywords as $keyword) {
                    if (gettype($isKeywodPresent) === 'boolean')  {
                        $isKeywodPresent = stripos( strtolower(html_escape($value)), $keyword );
                    }
                }
                if (gettype($isKeywodPresent) === 'integer')  {
                    $score = $score + $points;
                }
                // echo json_encode(array(
                //     'test'=>gettype($isKeywodPresent),
                //     'res'=>$isKeywodPresent,
                //     'keywords'=>$keywords,
                //     'answers'=>$written_answers,
                //     'score'=> $score
                // ));
            }
        }
        $score_percent = $score == 0 ? 0 : floor($score/$total*100);
        $insert_data = array(
            'ex_id' => $ex_id,
            'subject_id' => $subject_id,
            'cs_id' => student_session('student_id'),
            'ct_id' => student_session('instructor_id'),
            'ex_score' => $score,
            'ex_total_item' => $total,
            'ex_cs_answers' => json_encode(array('cs_answer'=>$your_answers, 'correct_answers'=>$true_answers)),
            'ex_score_percent' => $score_percent,
            'date_exercise_taken'=>d()
        );

        $query_result_id = $this->Common_Model->update('finished_exercises', 
        array(
            'ex_id'=>$ex_id,
            'subject_id'=>$subject_id,
            'cs_id'=>student_session('student_id')
        ),$insert_data);

        echo json_encode(array(
            'data'=>$true_tf_answers, 
            'score'=>$score, 
            'total'=>$total,
            'percent'=>$score_percent,
            'message'=>"You have finished the exercise",
            'icon'=>"success",
            'test'=>$true_answers
        ));
    }
}