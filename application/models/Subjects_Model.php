<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subjects_Model extends CI_Model {

	public function __construct()
	{
        parent::__construct();
        $this->load->helper('date');
		$this->load->database();                                                          
    }
    
    public function add($data){
        
        $insert = $this->db->insert('subjects', $data);
        return $this->db->insert_id();
    }

    public function getAll(){
        $query = $this->db->get('subjects');
		return  $query->result();
    }
    public function getSubjectByID($id){
        $query = $this->db->get_where('subjects', array('subject_id'=>$id));
        return $query->result();
    }

    public function delete($id){
        return $this->db->delete('subjects', array('subject_id'=>$id));
    }

    public function update($data){
        $a = array(
            'subject_title'=> $data["subject_title"],
			'update_on'=>$data['update_on']
        );
        $this->db->set($a);
        $this->db->where('subject_id', $data['subject_id']);
        return $this->db->update('subjects'); 
    }
  
}