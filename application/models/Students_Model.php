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
    public function update(){
        
    }
    public function delete(){
        
    }
    public function getById(){
        
    }
    public function getAllWith($id){
        $query = $this->db->get_where('college_students', array('added_by'=>$id));
        return $query->result();
    }
    public function getAllPrograms(){
        $query = $this->db->get('programs');
        $programs =  $query->result();
        foreach ($programs as $program) {
            $data[$program->program_id] = $program->program_title;
        }
        return $data;
    }
}