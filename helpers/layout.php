<?php 


function status($stat){
    if($stat == 'a'){
        return[
            'title' => 'Active',
            'color' => 'success',
            'icon' => 'fa fa-check',
            'statusmsg' => 'completed' 
        ];
    }elseif($stat == 'p'){
        return[
            'title' => 'Deactive',
            'color' => 'danger',
            'icon' => 'fa fa-trash',
            'statusmsg' => 'incomplete'
        ];
    }elseif($stat == 's'){
        return[
            'title' => 'In the process',
            'color' => 'warning',
            'icon' => 'fa fa-info',
            'statusmsg' => 'process'
        ];
    }
}