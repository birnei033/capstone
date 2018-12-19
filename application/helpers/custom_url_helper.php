<?php

defined('BASEPATH') OR exit('No direct script access allowed');

// $teacher = base_url('teacher/');
function teacher_base($str = ''){
    return base_url('teacher/'.$str);
}

function themf(){
return base_url('assets/themf/');
}

function assets(){
    return base_url('assets/');
}