<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Students_Model extends CI_Model {

	public function __construct()
	{
        parent::__construct();
        $this->load->helper('date');
		$this->load->database();                                                          
    }
    public function add($data){
        $insert = $this->db->insert('college_students', $data);
        return $this->db->insert_id();
    }
    public function getAll(){
        $query = $this->db->get('college_students');
		return  $query->result();
    }
    public function update($a){
        $this->db->set($a);
        $this->db->where('student_id', $a['student_id']);
        return $this->db->update('college_students');
    }
    public function login_auth($a){
        // // $this->db->set($a);
        // $this->db->get_where('student_login_name', $a['student_login_name']);
        // $this->db->where('student_password', $a['student_password']);
        $instructors = $this->db->get('college_teachers');
        $subjects = $this->db->get('subjects');
        $programs = $this->db->get('programs');
        // $ins = ""; $subs= "" ;
        foreach ($programs->result() as $program) {
            $prog[$program->program_id] = $program->program_title;
        }
        foreach ($subjects->result() as $subject) {
            $subs[$subject->subject_id] = $subject->subject_title;
        }
        foreach ($instructors->result() as $instructor) {
            $ins[$instructor->ct_id] = $instructor->ct_full_name;
        }
        $result = $this->db->get_where('college_students', array(
            'student_login_name'=> $a['student_login_name'],
            'student_password'=> $a['student_password']
        ));
        $data = array();
        // var_dump(count($subjects->result()));
        foreach ($result->result() as $student) {
            $temp['student_id'] = $student->student_id;
            $temp['school_id'] = $student->school_id;
            $temp['student_login_name'] = $student->student_login_name;
            $temp['student_full_name'] = $student->student_full_name;
            $temp['student_program'] = $prog[$student->student_program];
            $temp['student_password'] = $student->student_password;
            $temp['student_subject'] = $subs[$student->student_subjects];
            $temp['student_subject_id'] = $student->student_subjects;
            $temp['instructor'] = $ins[$student->added_by];
            $data = $temp;
        }
        return $data;
    }
    public function delete($id){
        return $this->db->delete('college_students', array('student_id'=>$id));
    }
    public function getById($id){
        $query = $this->db->get_where('college_students', array('student_id'=>$id));
        return $query->result();
    }
    public function getAllWith($id){
        $query = $this->db->get_where('college_students', array('added_by'=>$id));
        return $query->result();
    }
    public function ajax_getAllSubjects($id = ""){
        $query = $this->db->get_where('subjects',array('added_by'=>$id));
        $subjects =  $query->result();
        $data = array();
        foreach ($subjects as $subject) {
            $data[$subject->subject_id] = $subject->subject_title;
        }
        return $data;
    }
    public function getAllPrograms(){
        $query = $this->db->get('programs');
        $programs =  $query->result();
        $data = array();
        foreach ($programs as $program) {
            $data[$program->program_id] = $program->program_title;
        }
        return $data;
    }
    public function getAllSubjectTitles(){
        $query = $this->db->get('subjects');
        $subjects =  $query->result();
        foreach ($subjects as $subject) {
            $data[$subject->subject_id] = $subject->subject_title;
        }
        return $data;
    }
    public function reset_password($a){
        $this->db->set($a);
        $this->db->where('student_id', $a['student_id']);
        return $this->db->update('college_students');
    }
    public function change_password($a){
        $this->db->set($a);
        $this->db->where('student_id', $a['student_id']);
        return $this->db->update('college_students');
    }
}