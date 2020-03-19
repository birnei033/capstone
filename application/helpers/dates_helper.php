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
    
    $hour = array(
        '00'=>'12',
        '01'=>'01',
        '02'=>'02',
        '03'=>'03',
        '04'=>'04',
        '05'=>'05',
        '06'=>'06',
        '07'=>'07',
        '08'=>'08',
        '09'=>'09',
        '10'=>'10',
        '11'=>'11',
        '12'=>'12',
        '13'=>'01',
        '14'=>'02',
        '15'=>'03',
        '16'=>'04',
        '17'=>'05',
        '18'=>'06',
        '19'=>'07',
        '20'=>'08',
        '21'=>'09',
        '22'=>'10',
        '23'=>'11',
        '24'=>'12',
    );

    if ($date != 0) {
        $date_array = explode('-',$date);
        $out['year'] = $date_array[0];
        $out['month'] = $date_array[1];
        $out['day'] = explode('T',$date_array[2])[0];
        $out['hour'] = explode(':', explode('T',$date_array[2])[1])[0];
        $out['minute'] = explode(':', explode('T',$date_array[2])[1])[1];
        $s = $out['hour'] < 12 ? "AM" : "PM";
        $out['str_month'] = $month[$out['month']];
        $out['hour_format'] = $hour[$out['hour']].":".$out['minute']."$s";
    }else{
        $out['year'] = "0";
        $out['hour_format'] = "0";
        $out['month'] = "0";
        $out['day'] = "0";
        $out['hour'] = "0";
        $out['minute'] = "0";
        $out['str_month'] = "";
    }
    return $out;
}

?>