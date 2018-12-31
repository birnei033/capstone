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
        redirect(student_base('login'), 'refresh');
    }
}
?>