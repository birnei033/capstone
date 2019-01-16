<?php

defined('BASEPATH') OR exit('No direct script access allowed');

function student_view($page, $data = ""){
    $CI = get_instance();
    if (is_array($data)) {
        $data['sidebar'] = empty($data['sidebar']) ? "" : $data['sidebar'];
        $data['main'] = empty($data['main']) ? "" : $data['main'];
        $CI->load->view('includes/head');
        $CI->load->view('student/top-navigation');
        $CI->load->view('student/cs_sidebar_lessons', $data['sidebar']);
        $CI->load->view($page, $data['main']);
        $CI->load->view('includes/footer'); 
    }else{
        $CI->load->view('includes/head');
        $CI->load->view('student/top-navigation');
        $CI->load->view('student/cs_sidebar_lessons');
        $CI->load->view($page, $data);
        $CI->load->view('includes/footer');
    }
}
function student_lesson($page, $data = ""){
    $CI = get_instance();
    $CI->load->model('lessons_model');
    $subjid = student_session('student_subject_id');
    $query = "SELECT lesson_title FROM lessons WHERE subject_id = $subjid";
    $result = $CI->lessons_model->query($query);
    $lessons['lessons'] = array();
    foreach ($result as $lesson) {
        $temp = $lesson->lesson_title;
        $lessons['lessons'][] = $temp;
    }
    // var_dump(student_session());
    $CI->load->view('includes/head');
    $CI->load->view('student/top-navigation');
    $CI->load->view('student/cs_sidebar_lessons', $lessons);
    $CI->load->view($page, $data);
    $CI->load->view('includes/footer');
}
function student_exercise_view($page, $data = ""){
    $CI = get_instance();
    $CI->load->view('includes/head');
    $CI->load->view('student/top-navigation');
    $CI->load->view('student/cs_no_sidebar');
    $CI->load->view($page, $data);
    $CI->load->view('student/footer');
}
function student_session($index = ""){
    $CI = get_instance();
    $session = !isset($CI->session->userdata['student_logged_in']) ? "" : $CI->session->userdata['student_logged_in'];
    if ($index === "") {
        return $session;
    }
    return $session[$index];
}
function student_logged(){
    $CI = get_instance();
    $isloggedin = isset($CI->session->userdata['student_logged_in']) ? false : true;
    if($isloggedin){
        redirect(student_base('login'), 'refresh');
    }
}
function page_header($text, $class = ""){
   echo '<script>
    jQuery(document).ready(function ($) {
        $(\'#page-title\').text(\''.$text.'\').addClass(\''.$class.'\');
    });
</script>';
}
?>