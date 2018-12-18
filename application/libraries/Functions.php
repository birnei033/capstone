<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Functions extends CI_Controller {
    private $CI;
    public function __construct()
	{
        $this->CI =& get_instance();
        $this->CI->load->helper(array('url', 'date'));   
        $this->CI->load->library('user_agent', 'session');                                                    
    }

    public function view($view, $data = "", $single = false){
		if ($single) {
			$this->CI->load->view('includes/head');
			$this->CI->load->view($view, $data);
		}else{
			$this->CI->load->view('includes/head');
			$this->CI->load->view('includes/top-navigation');
			$this->CI->load->view('includes/left-navigation');
			$this->CI->load->view($view, $data);
			$this->CI->load->view('includes/footer');
		}
    }
    public function is_admin(){
        if (isset($this->CI->session->logged_in)) {
            return true;
        }else{
            redirect('', 'refresh');
            // return false;
        }
    }
}