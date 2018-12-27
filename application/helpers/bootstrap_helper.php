<?php

defined('BASEPATH') OR exit('No direct script access allowed');

function card($header = "", $block = ""){

    echo '<div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">'
                           .$header.
                       ' </div>
                        <!-- /.panel-heading -->
                        <div class="card-block">
                            <div class="table-responsive dt-responsive">'
                             .$block.  
                           ' </div>
                        </div>
                    </div>
                </div>
            </div>';

}

function nav_item($list, $link = "#", $icon = "feather icon-home"){
    $out = "";
    if (is_array($list)) {
        $list['drop'] = empty($list['drop']) ? false : $list['drop'];
        $list['title'] = empty($list['title']) ? "" : $list['title'];
        $list['link'] = empty($list['link']) ? "#" : $list['link'];
        $list['icon'] = empty($list['icon']) ? "feather icon-home" : $list['icon'];
        if ($list['drop'] == false) {
            $out .= '<li class="">';
            $out .=     '<a href="'.$list['link'].'" class="waves-effect waves-dark">';
            $out .=        '<span class="pcoded-micon">';
            $out .=            '<i class="'.$list['icon'].'"></i>';
            $out .=        '</span>';
            $out .=        '<span class="pcoded-mtext">'.$list['title'].'</span>';
            $out .=    '</a>';
        }else{
            $list['list'] = empty($list['list']) ? array() : $list['list'];
            $out .='<li class="pcoded-hasmenu ">';
            $out .=     '<a href="javascript:void(0)" class="waves-effect waves-dark">';
            $out .=         '<span class="pcoded-micon"><i class="'.$list['icon'].'"></i></span>';
            $out .=         '<span class="pcoded-mtext">'.$list['title'].'</span>';
            $out .=     '</a>';
            $out .='<ul class="pcoded-submenu">';
            foreach ($list['list'] as $key => $li) {
                $li['title'] = empty($li['title']) ? "title" : $li['title'];
                $li['link'] = empty($li['link']) ? "#" : $li['link'];
                $out .=        '<li class="">';
                $out .=            '<a href="'.$li['link'].'" class="waves-effect waves-dark">';
                $out .=                '<span class="pcoded-mtext">'.$key.'</span>';
                $out .=            '</a>';
                $out .=        '</li>';
            }
            $out .=    '</ul>';
            
        }
        
    }else{
        $out .= '<li>';
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

?>