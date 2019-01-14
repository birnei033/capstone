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
        view('exercise/exercise_list');
    }
    public function ajax_get_exercise_data(){
        $this_user_id = teacher_session('id');
        $exercises = $this->common_model->get_where('exercises', 'teacher_id = '. $this_user_id);
        $teachers = $this->common_model->get('college_teachers');
        $subject_query_result = $this->common_model->get('subjects');
        foreach ($teachers as $teacher) {
            $teacher_temp[$teacher->ct_id] = $teacher->ct_login_name;
        }
        foreach ($subject_query_result as $subj) {
            $subject_temp[$subj->subject_id] = $subj->subject_title;
        }
        $data = array();
        $all_teacher = $teacher_temp;
        $subjects = $subject_temp;
        // var_dump($all_teacher);
        foreach ($exercises as $exercise) {
            $temp = array();
            $temp['ex_name'] = $exercise->ex_name;
            $temp['subject_id'] = $subjects[$exercise->subject_id];
            $temp['author'] = $all_teacher[$exercise->teacher_id];
            $temp['date_created'] = $exercise->date_added;
            $temp['tool'] = '<button onclick="" '.tooltip("Delete").' class="btn btn-danger waves-effect waves-light ml-2 p-1" >Delete</button>'
                                            .'<button onclick="" '.tooltip("Update").' href=""  class="student-update btn btn-inverse waves-effect waves-light ml-2 p-1" >Update</button>';
                       
           
            
            $data[] = $temp;
        }
        $datas = json_encode($data);
        $dataa['data'] = $data;
        echo json_encode($dataa);
    }
    public function add($submit = 0)
    {
        if (!empty($this->input->post('ex_submit'))) {
            $this->submit_exercise();
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
    private function submit_exercise(){
        $this->load->library('form_validation');
        $title = $this->input->post('exercise_title');
        $subject_id = $this->input->post('ex_subject');
        $teacher_id = teacher_session('id');
        $ex_questions=$this->input->post('ex_elems');
        $ex_answers=$this->input->post('answers');
        $date_added=mdate('%Y-%m-%d');
        $errors = "";
        $data = array(
            "ex_name"=> $this->input->post('exercise_title'),
            "subject_id"=>$subject_id,
            "teacher_id"=>$teacher_id,
            "ex_questions"=>$ex_questions,
            "ex_answers"=>$ex_answers,
            "date_added"=>$date_added,
        );
     
        $query = "SELECT * FROM exercises WHERE ex_name = '$title'";
        $get_title = $this->common_model->query($query);
        $titletemp = "";
        $title_exist = false;
        $has_content = false;
        foreach ($get_title as $thetitle) {
            $titletemp = $thetitle->ex_name;
        }
        if (empty($get_title)) {
            $title_exist = true;
        }else{
            $errors = "Title already exist.";
            $title_exist = false;
        }
        if($title == ""){
            $errors .= "\nSpecify the title of this exercise.";
        }
        if (empty($subject_id)) {
            $errors .= "\nSelect one subject";
        }
        if ($ex_questions == "") {
            $errors .= "\nYou do not have content yet.";
        }else{
            $has_content = true;
        }
     
        $this->form_validation->set_rules('exercise_title', 'Title', array(
            'required',
        ));
        $this->form_validation->set_rules('ex_subject', 'Subject', array(
            'required'
        ));
        // $this->form_validation->set_rules('ex_questions', 'questions', array(
        //     'required'
        // ));
        if ($this->form_validation->run() == TRUE && $title_exist === true && $has_content === true)
        {
            $result_id = $this->common_model->insert('exercises', $data);
            echo json_encode(array('message'=> '"'.$title.'" added successfuly.', 'icon'=>'success','test'=>$result_id));
        }else{
            echo json_encode(array('message'=> $errors, 'icon'=>'warning'));
        }
    }

    public function test(){
        $this->load->library('form_validation');
        $title = $this->input->post('exercise-title');
        $subject_id = $this->input->post('ex-subject');
        $teacher_id = teacher_session('id');
        $ex_questions="df";
        $ex_answers="fgd";
        $date_added=mdate('%Y-%m-%d');
        $data = array(
            "ex_name"=> $this->input->post('exercise-title'),
            "subject_id"=>$subject_id,
            "teacher_id"=>$teacher_id,
            "ex_questions"=>$ex_questions,
            "ex_answers"=>$ex_answers,
            "date_added"=>$date_added,
        );
        $query = "SELECT * FROM exercises WHERE ex_name LIKE '$title'";
        $get_title = $this->common_model->query($query);
        $titletemp = "";
        $title_exist = false;
        foreach ($get_title as $thetitle) {
            $titletemp = $thetitle->ex_name;
        }
        if (!empty($titletemp)) {
            $title_exist = true;
        }else{
            $errors = "Duplicate Title";
            $title_exist = false;
        }

        $this->form_validation->set_rules('exercise-title', 'Title', array(
            'required',
            'min_length[6]|',
        ));
        $this->form_validation->set_rules('subject_id', 'Subject', array(
            'required'
        ));
        $this->form_validation->set_rules('ex_questions', 'questions', array(
            'required'
        ));
        if ($this->form_validation->run() == TRUE)
        {
            $result_id = $this->common_model->insert('exercises', $data);
            echo json_encode(array('message'=> '"'.$title.'" added successfuly.', 'icon'=>'success','test'=>$result_id));
        }else{
            echo json_encode(array('message'=> 'All Fields are required.', 'icon'=>'warning'));
        }
}

}