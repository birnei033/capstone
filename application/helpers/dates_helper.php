<?php

defined('BASEPATH') OR exit('No direct script access allowed');

function date_array($date){
    // $start_date = $date;
    $out = array();
    $month = array(
        '01'=>'January',
        '02'=>'February',
        '03'=>'March',
        '04'=>'April',
        '05'=>'May',
        '06'=>'June',
        '07'=>'July',
        '08'=>'August',
        '09'=>'September',
        '10'=>'October',
        '11'=>'November',
        '12'=>'December'
    );
    if ($date != 0) {
        $date_array = explode('-',$date);
        $out['year'] = $date_array[0];
        $out['month'] = $date_array[1];
        $out['day'] = explode('T',$date_array[2])[0];
        $out['hour'] = explode(':', explode('T',$date_array[2])[1])[0];
        $out['minute'] = explode(':', explode('T',$date_array[2])[1])[1];
        $out['str_month'] = $month[$out['month']];
    }else{
        $out['year'] = "0";
        $out['month'] = "0";
        $out['day'] = "0";
        $out['hour'] = "0";
        $out['minute'] = "0";
        $out['str_month'] = "";
    }
    return $out;
}

?>