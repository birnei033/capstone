<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_Model extends CI_Controller {
    private $CI;
    public function __construct()
	{
        $this->CI =& get_instance();
        $this->CI->load->helper('date');
		$this->CI->load->database();                                                          
    }

    public function test(){
        echo "eye";
    }

    public function getByName($name){
        $query = $this->CI->db->get_where('college_teachers', array('ct_login_name'=>$name));
        return $query->result();
    }

    public function getAll(){
        $query = $this->CI->db->get('college_teachers');
		return  $query->result();
    }
}