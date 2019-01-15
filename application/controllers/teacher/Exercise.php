<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Exercise extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('common_model', null, "cm");
		$this->load->helper(array('date','exercise'));
		$this->load->library(array('user_agent', 'functions', 'session'));
    }
    public function index()
    {
        view('blank');
    }
    public function add($submit = 0)
    {
        if (!empty($this->input->post('save'))) {
            $data = array(
                'ex_name'=>$this->input->post('ex_title'),
                'subject_id'=>$this->input->post('ex_subject'),
                'teacher_id'=>teacher_session('id'),
                'ex_questions'=>json_encode(array(
                    'data'=>$this->input->post('ex_elem')
                )),
                'date_added'=>mdate('%Y-%m-%d')
            );
            $is_inserted = $this->common_model->insert('exercises', $data);
            echo json_encode(array("data"=>$is_inserted));
        }else{
            $query_results = $this->common_model->query('
            SELECT subjects.subject_id, subjects.subject_title FROM subjects 
            INNER JOIN college_teachers ON subjects.added_by=college_teachers.ct_id 
            WHERE subjects.added_by= '.teacher_session('id').'
            ');
            $data['subjects'] = array();
            foreach ($query_results as $query_result) {
                $data['subjects'][$query_result->subject_id] = $query_result->subject_title;
            }
            // var_dump($data['subjects']);
            
            if ($submit) {
                
            }else{
                view('exercise/add_exercise', $data);
            }

        }
    }

}