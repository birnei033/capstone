<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// $teacher = base_url('teacher/');
function teacher_base($str = ''){
    return base_url('teacher/'.$str);
}
function student_base($str = ''){
    return base_url('student/'.$str);
}
function themf(){
return base_url('assets/themf/');
}

function api_base(){
    return base_url('api/');
}

function assets(){
    return base_url('assets/');
}
function images($image){
    return base_url('assets/images/'.$image);
}
function is_admin(){
    $CI = get_instance();
    if (isset($CI->session->logged_in)) {
        return true;
    }else{
        // redirect('', 'refresh');
        return false;
    }
}

function button($text = "Button", $href = "#",  $class = "", $attribute = ""){
    return '<a class="btn  waves-effect waves-light ml-2 p-1 '.$class.'" 
    href="'.$href.'" '.$attribute.'>'.$text.'</a>';
}

function tooltip($text, $position = "top"){
    return 'data-toggle="tooltip" data-placement="'.$position.'" title="" data-original-title="'.$text.'"';
}

function editable_input($value, $class =""){

    $out = "<span class='$class-show' id='st-$value'>$value</span><input style='display:none' id='$value'  class='form-control $class-hidden name='st-$value' value='$value' place-holder='$value'>";
    return $out;
}

function toSecond($hour, $minutes = 0, $seconds = 0){
    if ($hour <= 24 && $minutes <= 60 && $seconds <= 60) {
        return ((60*$hour)*60)+(60*$minutes)+$seconds;
    }
    return 0;
}