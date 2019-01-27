<?php

defined('BASEPATH') OR exit('No direct script access allowed');


function teacher_session($index = ""){
    $CI = get_instance();
    $session = !isset($CI->session->userdata['logged_in']) ? "" : $CI->session->userdata['logged_in'];
    if ($index === "") {
        return $session;
    }
    return $session[$index];
}
function teacher_logged(){
    $CI = get_instance();
    $isloggedin = isset($CI->session->userdata['logged_in']) ? false : true;
    if($isloggedin){
        redirect('admin', 'refresh');
    }
}

function teacher_view($url, $data = ""){
    $CI = get_instance();
    $CI->load->view('includes/head');
    $CI->load->view('includes/top-navigation');
    $CI->load->view('includes/left-navigation');
    $CI->load->view($url, $data);
    $CI->load->view('includes/footer');
}
?>