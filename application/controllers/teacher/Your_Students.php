<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Your_Students extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Students_Model');
		$this->load->helper('url');
		$this->load->library(array('user_agent', 'functions', 'session'));
    }
    public function index(){
        teacher_logged();
        $data['students'] = $this->Students_Model->getAllWith($this->session->userdata['logged_in']['id']);
        $data['programs'] = $this->Students_Model->getAllPrograms();
        $data['subjects'] = $this->Students_Model->ajax_getAllSubjects(teacher_session('id'));
        // var_dump($data['programs']);
        $data['ajax'] = json_encode(array("students" => $data['students'], "programs"=>$data['programs']));
        // die($data['ajax']);
        $this->functions->view('authentication/college_teacher/ct_students_list', $data);
        
    }

    public function ajax_get(){
        $students = $this->Students_Model->getAllWith($this->session->userdata['logged_in']['id']);
        $programs = $this->Students_Model->getAllPrograms();
        $subjects = $this->Students_Model->getAllSubjectTitles();
        $data = array();
        foreach ($students as $student) {
            $url = teacher_base("your_students/ajax_delete");
			$delete_alert = $student->student_id. ", '".$url."', 'Are You Sure?', 'You are about to delete student # ".$student->school_id."'";
            $subarray = array();
           
            $subarray["student_id"] = $student->student_id;
            $subarray['school_id'] = $student->school_id;
            $subarray['student_login_name'] = $student->student_login_name;
            $subarray['student_full_name'] = $student->student_full_name;
            $subarray['student_subject'] =  "<div hidden>".str_replace(" ", "",!empty($subjects[$student->student_subjects]) ? $subjects[$student->student_subjects] : "")."</div>";
            $subarray['student_subject'] .=  !empty($subjects[$student->student_subjects]) ? $subjects[$student->student_subjects] : "";
            $subarray['student_program'] =$retVal = $student->student_program != 0 ? $programs[$student->student_program] : "" ; ;
            $subarray['actions'] = '<button '.tooltip("Reset Password").' onclick="student_password_reset('.$student->student_id.', \''.teacher_base().'\')" class="btn btn-primary waves-effect waves-light ml-2 p-1" >Reset</button>'
                                            .'<button onclick="delete_alert('.$delete_alert.')" '.tooltip("Delete").' class="btn btn-danger waves-effect waves-light ml-2 p-1" >Delete</button>'
                                            .'<button onclick="open_update_modal('.$student->student_id.', \''.teacher_base().'\', \'#student-update-form\')"  data-modal="modal-update-student" '.tooltip("Update").' href="'.teacher_base().'"  class="student-update btn btn-inverse waves-effect waves-light ml-2 p-1" up-id="'.$student->student_id.'">Update</button>';
                                           
            $data[] = $subarray;
        }
        $datas = json_encode($data);

        $dataa['data'] = $data;
        echo json_encode($dataa);
    }

    public function ajax_delete(){
        $id = $this->input->post('id');
		$dataType = $this->input->post('data_type');
		if($dataType == "ajax"){	
			$delete_result = $this->Students_Model->delete($id);	
			echo json_encode(array("status" => true));
		}
    }
    public function ajax_get_students($id){
        $result = $this->Students_Model->getById($id);
        $data = array();
        foreach ($result as $key => $value) {
            $data[$key] = $value;
        }
        echo json_encode($data[0]);
    }
    
    public function ajax_update_your_student($id){
        $name = $this->input->post('name');
		$scool_id = $this->input->post('id');
		$fname = $this->input->post('fname');
        $program = $this->input->post('program');
        $subject = $this->input->post('subject');
		$data = array(
            'student_id' => $id,
			'school_id'=> $scool_id,
			'student_login_name'=>$name,
			'student_full_name' => $fname,
            'student_program' =>$program ,
            'student_subjects' =>$subject,
			'date_updated' => mdate('%Y-%m-%d')
		);
		$result = $this->Students_Model->update($data);
		echo json_encode(array('result'=>true));
    }

    public function ajax_student_password_reset($id){
        $data = array(
            'student_id' => $id,
            'student_password' => "changeme",
			'date_updated' => mdate('%Y-%m-%d')
        );
        $result = $this->Students_Model->reset_password($data);
		echo json_encode(array('result'=>true));
    }
}