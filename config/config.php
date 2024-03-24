<?php

const BASEDIR = 'C:\xampp\htdocs\TodoApp';
const URL = 'http://localhost/todoapp/';
const DEV_MODE = true; //developer modunu açar. hata mesajlarını görüntülerken ayrıntılı bilgi verir.

try{
    $db = new PDO('mysql:host=localhost; dbname=todoapp;','root','12345');
}catch(PDOException $e){
    echo $e->getMessage();
}