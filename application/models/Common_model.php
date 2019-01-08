<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Common_model extends CI_Model {

	public function __construct()
	{
        parent::__construct();
        $this->load->helper('date');
		$this->load->database();
    }

    public function get_where($table, $query){
        $query = $this->db->get_where($table, $query);
		return  $query->result();
    }
}