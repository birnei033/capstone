<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subjects_Model extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
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

    public function delete($id){
        $this->db->delete('subjects', array('id'=>$id));
    }
 
}