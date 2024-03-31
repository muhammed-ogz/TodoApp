<?php

if(get_session('login') && get_session('login') == true) redirect('home');

if (route(0) == 'login') {

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

    view('auth/login');
}
