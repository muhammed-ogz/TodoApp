<?php

function route($index){
    global $config;
    if(isset($config['route'][$index])) return $config['route'][$index];
    else return false;
}

function view($viewName,$pagedata = []){
    $data = $pagedata;
    if(file_exists(BASEDIR.'/view/'.$viewName.'.php')) require BASEDIR.'/view/'.$viewName.'.php';
    else return false;
}

function assets($assetName){
    if(file_exists(BASEDIR.'/public/'.$assetName)) return URL.'public/'.$assetName;
    else return false;
}