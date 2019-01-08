<?php

defined('BASEPATH') OR exit('No direct script access allowed');

function view($page, $data = ""){
    $CI = get_instance();
    $CI->load->view('exercise/head');
    $CI->load->view('includes/top-navigation');
    $CI->load->view('includes/left-navigation');
    $CI->load->view($page, $data);
    $CI->load->view('exercise/footer');
}

?>