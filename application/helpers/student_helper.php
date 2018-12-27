<?php

defined('BASEPATH') OR exit('No direct script access allowed');

function student_view($page, $data = ""){
    $CI = get_instance();
    $CI->load->view('includes/head');
    $CI->load->view('student/top-navigation');
    $CI->load->view('student/cs_sidebar');
    $CI->load->view($page, $data);
    $CI->load->view('includes/footer');
}
function student_session($index = ""){
    $CI = get_instance();
    if ($index === "") {
        return $CI->session->userdata['student_logged_in'];
    }
    return $CI->session->userdata['student_logged_in'][$index];
}
?>