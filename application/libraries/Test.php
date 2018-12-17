<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Test extends CI_Controller {
    private $CI;
    public function __construct()
	{
        $this->CI =& get_instance();
        $this->CI->load->helper(array('url', 'date'));   
        $this->CI->load->library('user_agent');                                                    
    }

    public function testing(){
        echo "testing only";
    }
}