<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Exercise extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->model('Common_Model', null, "cm");
		$this->load->helper(array('date','exercise'));
		$this->load->library(array('user_agent', 'functions', 'session'));
    }
    public function index()
    {
        if (isset($_GET['preview'])) {
            teacher_logged();
            $this->exercise_preview($_GET['preview']);
        }else if(!empty($this->input->post('ex_submit'))){
            $this->exercise_submit();
        }else if($this->input->post('delete')){
            $id = $this->input->post('id');
            $this->json_delete_exercise($id);
        }else if($this->input->post('undo')){
            $this->exercise_trashed_undo($this->input->post('id'));
        }else if($this->input->post('delete_permanent')){
            $this->delete_permanently($this->input->post('id'));
        }else{
            teacher_logged();
            $this_user_id = teacher_session('id');
            $data['trashed'] = $this->Common_Model->get_where('exercises', 'teacher_id = '. $this_user_id.' AND trashed = 1');
            teacher_view('exercise/exercise_list', $data);
        }
    }
    private function exercise_trashed_undo($id){
        $exercise_undo = $this->Common_Model->update('exercises', array('id'=>$id), array('trashed'=>0));
        $subject_id = $this->db->get_where('exercises', array('id'=>$id))->result()[0]->subject_id;
        $subject_undo = $this->Common_Model->update('subjects', array('subject_id'=>$subject_id), array('trashed'=>0));
        $finished_exercise_deleted = $this->Common_Model->update('finished_exercises', array('ex_id'=>$id), array('trashed'=>0));
        echo json_encode(array(
            'undo'=>$exercise_undo,
            
        ));
    }

    public function get_trashed_exerceercises(){
        $this_user_id = teacher_session('id');
        $data = $this->Common_Model->get_where('exercises', 'teacher_id = '. $this_user_id.' AND trashed = 1');
        // $count = $this->Common_Model->get_where('exercises', 'teacher_id = '. $this_user_id.' AND trashed = 1', 1);
        echo json_encode(array(
            'trashed'=>$data,
            // 'count'=>$count
        ));
    }
    private function delete_permanently($id){
        $exercise_deleted = $this->Common_Model->delete('exercises', array('id'=>$id));
        $finished_exercise_deleted = $this->Common_Model->delete('finished_exercises', array('ex_id'=>$id));
        echo json_encode(array(
            'deleted'=>$exercise_deleted
        ));
    }
    private function json_delete_exercise($id){
        
            $exercise_deleted = $this->Common_Model->update('exercises', array('id'=>$id), array('trashed'=>1));
            $finished_exercise_deleted = $this->Common_Model->update('finished_exercises', array('ex_id'=>$id), array('trashed'=>1));
            echo json_encode(array(
                'deleted'=>$exercise_deleted
            ));
        
    }
    private function exercise_preview($id){
        $query_result['preview'] = $this->Common_Model->get_where('exercises', array(
            'id'=>$id
        ));
        view('exercise/preview_exercise', $query_result);
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
        $true_mc_answers = array();
        $true_answers = json_decode($query_result[0]->ex_answers);
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
        foreach ($mc_answers as $key => $answers) {
            // multiple choice
            if ($true_mc_answers[$key] === $answers) {
                $score++;
            }
        }
        foreach ($tf_answers as $key => $answers) {
            // true or false
            // $tempx = $answers == "true" ? 1 : 0 ;
            if ($true_tf_answers[$key] == $answers) {
                $score++;
            }
        }
        $score_percent = floor($score/$total*100);
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

        // $query_result_id = $this->Common_Model->insert('finished_exercises', $insert_data);

        echo json_encode(array(
            'data'=>$true_answers, 
            'score'=>$score, 
            'total'=>$total,
            'percent'=>$score_percent,
            'message'=>"You have finished the quiz",
            'icon'=>"success"
        ));
    }

    public function ajax_get_exercise_data(){
        $this_user_id = teacher_session('id');
        $exercises = $this->Common_Model->get_where('exercises', 'teacher_id = '. $this_user_id.' AND trashed = 0');
        $teachers = $this->Common_Model->get('college_teachers');
        // $trash_count = $this->Common_Model->query("SELECT COUNT()")
        $subject_query_result = $this->Common_Model->get('subjects');
        foreach ($teachers as $teacher) {
            $teacher_temp[$teacher->ct_id] = $teacher->ct_login_name;
        }
        foreach ($subject_query_result as $subj) {
            $subject_temp[$subj->subject_id] = $subj->subject_title;
        }
        $data = array();
        $all_teacher = $teacher_temp;
        $subjects = $subject_temp;
        foreach ($exercises as $exercise) {
            $temp = array();
            $temp['ex_name'] = $exercise->ex_name;
            $temp['subject_id'] = $subjects[$exercise->subject_id];
            $temp['author'] = $all_teacher[$exercise->teacher_id];
            $temp['date_created'] = $exercise->date_added;
            $temp['tool'] = '<a href="#delete"  '.tooltip("Trash").' delete_exercise="'.$exercise->id.'"  style="font-size:21px; vertical-align:middle; " class="delete_exercise text-danger waves-effect waves-light ml-2 p-1" ><i class="ti-trash"></i></a>'
                                            // .'<button onclick="" '.tooltip("Update").' href=""  class="student-update btn btn-inverse waves-effect waves-light ml-2 p-1" >Update</button>'
                                            .'<a '.tooltip("View").' href="'.teacher_base('exercise?preview=').$exercise->id.'" target="blank" style="font-size:21px; vertical-align:middle; " class="text-c-green student-update  waves-effect waves-light ml-2 p-1" ><i class="ti-eye"></i></a>';
            $data[] = $temp;
        }
        $datas = json_encode($data);
        $dataa['data'] = $data;
        echo json_encode($dataa);
    }
    public function add($submit = 0)
    {
        teacher_logged();
        if (!empty($this->input->post('ex_submit'))) {
            $this->submit_exercise();
        }else{
            $query_results = $this->Common_Model->query('
            SELECT subjects.subject_id, subjects.subject_title FROM subjects 
            INNER JOIN college_teachers ON subjects.added_by=college_teachers.ct_id 
            WHERE subjects.added_by= '.teacher_session('id').' AND trashed = 0
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
        $all_questions = $this->input->post('all_questions');
        $ex_questions=$this->input->post('ex_elems');
        $ex_schedule = $this->input->post('ex_schedule');
        $ex_time=$this->input->post('ex_time');
        $ex_answers=$this->input->post('answers');
        $date_added=mdate('%Y-%m-%d');
        $errors = "";
        $data = array(
            "ex_name"=> $this->input->post('exercise_title'),
            "subject_id"=>$subject_id,
            "teacher_id"=>$teacher_id,
            "ex_questions"=>$ex_questions,
            'ex_time'=> $ex_time,
            'ajax_questions'=>$all_questions,
            "ex_answers"=>$ex_answers,
            "date_added"=>$date_added,
            "ex_schedule"=>$ex_schedule,
        );
        $sub = !empty($subject_id) ? " AND subject_id=$subject_id" : "";
        $query = "SELECT * FROM exercises WHERE ex_name = '$title' AND teacher_id = ".teacher_session('id').$sub ;
        $get_title = $this->Common_Model->query($query);
        $titletemp = "";
        $title_exist = false;
        $has_content = false;
        foreach ($get_title as $thetitle) {
            $titletemp = $thetitle->ex_name;
        }
        if (empty($get_title && ($sub != ""))) {
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
        if (empty((array)json_decode($ex_answers)->mc_answers || (array)json_decode($ex_answers)->tf_answers || (array)json_decode($ex_answers)->written_answers )) {
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
            $result_id = $this->Common_Model->insert('exercises', $data);
            echo json_encode(array('message'=> '"'.$title.'" added successfuly.', 'icon'=>'success','test'=>$result_id));
        }else{
            echo json_encode(array('message'=> $errors, 'icon'=>'warning'));
        }
    }

    public function Report(){
        teacher_logged();
        $data = array();
        $result = $this->Common_Model->join('subjects', array(
            array(
                'table'=>'exercises',
                'on'=>'subjects.subject_id = exercises.subject_id'
            ),
            array(
                'table'=>'finished_exercises',
                'on'=>'finished_exercises.ex_id = exercises.id'
            ),
            array(
                'table'=>'college_students',
                'on'=>'college_students.student_id = finished_exercises.cs_id'
            ),
        ), "subjects.added_by = ".teacher_session('id'));
        // var_dump($data['results']);
        rsort($result);
        $data['results'] = $result;
        $data['subjects'] = $this->Common_Model->get_where('subjects', array(
            'added_by'=>teacher_session('id')
        ));
        // var_dump($data['subjects']);
        teacher_view('exercise/report', $data);
    }

}