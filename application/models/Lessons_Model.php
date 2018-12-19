<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lessons_Model extends CI_Model {

	public function __construct()
	{
        parent::__construct();
        $this->load->helper('date');
		$this->load->database();
    }

    public function getAll(){
        $query = $this->db->get('lessons');
		return  $query->result();
    }

    public function add($data){
        $add = $this->db->insert('lessons', $data);
        return $this->db->insert_id();
    }

    public function query($q){
        $query = $this->db->query($q);
        return $query->result();
    }

    public function getSubjects(){
        $query = $this->db->get('subjects');
		return  $query->result();
    }
    public function edit($a){
        $this->db->set($a);
        $this->db->where('id', $a['id']);
        return $this->db->update('lessons'); 
    }
    public function delete(){
        return $this->db->delete('lessons', array('id'=>$id));
    }
}

?>