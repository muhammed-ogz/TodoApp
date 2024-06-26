<?php

if (!get_session('login') || get_session('login') != true) redirect('login');

if (route(0) == 'categories' && !route(1)) {

    /*
    if (isset($_POST['submit'])) {
        //parola yanlış girilirse en son girilen değerleri ekranda tutmak için.
        $_SESSION['post'] = $_POST;
        $email = post('email');
        $password = post('password');
        $return = model('auth/login', ['email' => $email, 'password' => $password], 'login');

        if ($return['success'] == true) {

            if (isset($return['redirect'])) {
                redirect($return['redirect']);
            }
        } else {
            add_session('error', [
                'message' => $return['message'] ?? '',
                'type' => $return['type'] ?? ''
            ]);
        }
    } 
    */
    view('categories/home');
}
else if (route(0) == 'todo' && route(1) == 'add') {
    $return = model('categories' , [], 'list');
    view('todo/add', $return['data']);
}
else if (route(0) == 'todo' && route(1) == 'list') {
    $return = model('todo', [], 'list');
    view('todo/list', $return['data']);
}
elseif (route(0) == 'todo' && route(1) == 'edit' && is_numeric(route(2))){
    $return = model('todo', ['id' => route(2)], 'getsingle');
    view('todo/edit', $return['data']);
}
