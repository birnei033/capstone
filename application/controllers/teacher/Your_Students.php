<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Your_Students extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('students_model');
		$this->load->helper('url');
		$this->load->library(array('user_agent', 'functions', 'session'));
    }
    public function index(){
        $this->functions->is_admin();
        $data['students'] = $this->students_model->getAllWith($this->session->userdata['logged_in']['id']);
        $data['programs'] = $this->students_model->getAllPrograms();
        // var_dump($data['programs']);
        $data['ajax'] = json_encode(array("students" => $data['students'], "programs"=>$data['programs']));
        // die($data['ajax']);
        $this->functions->view('authentication/college_teacher/ct_students_list', $data);
        
    }

    public function ajax_get(){
        $students = $this->students_model->getAllWith($this->session->userdata['logged_in']['id']);
        $programs = $this->students_model->getAllPrograms();
        $data = array();
        $this->datatables->select('*')->from('college_students');
        foreach ($students as $student) {
            $subarray = array();
            $subarray["student_id"] = $student->student_id;
            $subarray['school_id'] = $student->school_id;
            $subarray['student_login_name'] = $student->student_login_name;
            $subarray['student_full_name'] = $student->student_full_name;
            $subarray['student_program'] = $programs[$student->student_program];
            $subarray['student_subjects'] = '<a class="btn btn-primary waves-effect waves-light ml-2 p-1" href="'.teacher_base('your_student/password_reset/').$student->student_id.'">Reset</a>'
                                            .'<a class="btn btn-danger waves-effect waves-light ml-2 p-1" href="'.teacher_base('your_student/delete/').$student->student_id.'">Delete</a>'
                                            .'<a class="btn btn-inverse waves-effect waves-light ml-2 p-1" href="'.teacher_base('your_student/update/').$student->student_id.'">Update</a>';
            $data[] = $subarray;
        }
        // echo $this->datatables->generate();
        $datas = json_encode($data);
        // echo $datas;
        $dataa['data'] = $data;
        $dataa['draw'] = 20;
        $dataa['recordsTotal']= count($students);
        $dataa['recordsFiltered']= $students;
        echo json_encode($dataa);
    }
}