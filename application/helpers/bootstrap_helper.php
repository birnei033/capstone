<?php

defined('BASEPATH') OR exit('No direct script access allowed');

function card_open($header = "", $col="12", $class="", $attr="", $card_block_class = ""){

    echo '<div class="col-sm-'.$col.'">';
               echo '     <div class="card '.$class.'" '.$attr.'>';
               if ($header != "") {
                echo '   <div class="card-header '.$card_block_class.'">'
                      .$header.
                  ' </div>
                  <!-- /.panel-heading -->';
                   
               }
                echo '<div class="card-block '.$card_block_class.'">';
}
function card_close($footer = "", $class=""){
       echo           
            '       </div>';
            if ($footer != "") {
                echo '<div class="card-footer '.$class.'">';
                echo $footer;
                echo '</div>';
            }
             echo    '</div>
            </div>';
}
function btn($btn){
    $btn['onclick'] = empty($btn['onclick']) ? "" : 'onclick="'.$btn['onclick'].'"' ;
    $btn['class'] = empty($btn['class']) ? "" : $btn['class'];
    $btn['type'] = empty($btn['type']) ? "primary" : $btn['type'];
    $btn['attr'] = empty($btn['attr']) ? "" : $btn['attr'];
    $btn['text'] = empty($btn['text']) ? "" : $btn['text'];
    $btntype = empty($btn['href']) ? "button" : "a";
    $btn['href'] = empty($btn['href']) ? "" : 'href="'.$btn['href'].'"';

    return  '<'.$btntype.' '.$btn['href'].' '.$btn['attr'].' '. $btn['onclick'].' class="'.$btn['class'].' btn btn-'.$btn['type'].' waves-effect">'
    .$btn['text'].
    '</'.$btntype.'>';
}

function nav_item($list, $link = "#", $icon = "feather icon-home"){
    $out = "";
    if (is_array($list)) {
        $list['drop'] = empty($list['drop']) ? false : $list['drop'];
        $list['title'] = empty($list['title']) ? "" : $list['title'];
        $list['link'] = empty($list['link']) ? "#" : $list['link'];
        $list['icon'] = empty($list['icon']) ? "feather icon-home" : $list['icon'];
        if ($list['drop'] == false) {
            $out .= '<li class="" '.tooltip($list['title'], 'right').'>';
            $out .=     '<a href="'.$list['link'].'" class="waves-effect waves-dark">';
            $out .=        '<span class="pcoded-micon">';
            $out .=            '<i class="'.$list['icon'].'"></i>';
            $out .=        '</span>';
            $out .=        '<span class="pcoded-mtext">'.$list['title'].'</span>';
            $out .=    '</a>';
        }else{
            $list['list'] = empty($list['list']) ? array() : $list['list'];
            $out .='<li '.tooltip($list['title'], 'right').' class="pcoded-hasmenu ">';
            $out .=     '<a href="javascript:void(0)" class="waves-effect waves-dark">';
            $out .=         '<span class="pcoded-micon"><i class="'.$list['icon'].'"></i></span>';
            $out .=         '<span class="pcoded-mtext">'.$list['title'].'</span>';
            $out .=     '</a>';
            $out .='<ul class="pcoded-submenu">';
            foreach ($list['list'] as $key => $li) {
                $li['title'] = empty($li['title']) ? "title" : $li['title'];
                $li['link'] = empty($li['link']) ? "#" : $li['link'];
                $out .=        '<li>';
                $out .=            '<a href="'.$li['link'].'" class="waves-effect waves-dark">';
                $out .=                '<span class="pcoded-mtext">'.$key.'</span>';
                $out .=            '</a>';
                $out .=        '</li>';
            }
            $out .=    '</ul>';
            
        }
        
    }else{
        $out .= '<li '.tooltip($list, 'right').'>';
        $out .=     '<a href="'.$link.'" class="waves-effect waves-dark">';
        $out .=        '<span class="pcoded-micon">';
        $out .=            '<i class="'.$icon.'"></i>';
        $out .=        '</span>';
        $out .=        '<span class="pcoded-mtext">'.$list.'</span>';
        $out .=    '</a>';
    }
    $out .=' </li>';
    echo $out;
}

function select($values, $name = "", $attr="", $default="", $sameKeyAndValue = false){
    $out = '<select class="form-control" name="'.$name.'" '.$attr.'>';
    $out .= $default != "" ? '<option value selected>'.$default.'</option>' : "" ;
    foreach ($values as $key => $value) {
        // $out .= '<option value="'.$key.'">'.$value.'</option>';
        $out .= $sameKeyAndValue ? '<option value="'.str_replace(" ","",$value).'">'.$value.'</option>' : '<option value="'.$key.'">'.$value.'</option>' ;
    }
    $out .= '</select>';
    return $out;
}
function d($format = '%Y-%m-%d'){
    return mdate($format);
}
function hide_header(){
    echo '<style>
    
        .page-header{
            display:none;
        }
   
    </style>';
}

function loader( $id="", $show = 0, $style= "", $color = 'loader-success'){
    $d = $show == 0 ? "none" : "flex" ;
    $out = '<div id="'.$id.'" class=" preloader5 loader-block" style="display:'.$d.'; '.$style.'">';
    $out .= '<div class="circle-5 l '.$color.'"></div>';
    $out .= '<div class="circle-5 m '.$color.'"></div>';
    $out .= '<div class="circle-5 r '.$color.'"></div>';
    // $out .= '<div class="circ4 '.$color.'"></div>';
    $out .= '</div>';
    return $out;
}

function loader_modal($modal_id = "", $class=""){
    $out =  '<div class="md-modal '.$class.' md-effect-1" id="'.$modal_id.'">';
    $out .= '<div class="md-content" style="background: transparent">';
    // $out .= '<div class="card p-0">';
    // $out .= '<div class="card-block cards" style="position: relative;min-height: 250px">';
    // $out .= "<h4 class='text-center text-white'>Loading...</h4>";
    $out .= loader('trash-loader-modal', 1, "", 'bg-white');
    // $out .= '</div>';
    // $out .= '</div>';
    $out .= '</div>';
    $out .= '</div>';
    $out .= '<div class="md-overlay"></div>';
    return $out;
}

?>