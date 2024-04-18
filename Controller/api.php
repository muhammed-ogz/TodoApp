<?php

if (route(1) == 'addtodo') {
    $post = filter($_POST);
    $start_date = date('Y-m-d H:i:s');
    $end_date = date('Y-m-d H:i:s');
    if (!$post['title']) {

        $status = 'error';
        $title = 'Ops! Warning';
        $msg = 'Please add title.';
        echo json_encode(['status' => $status, 'title' => $title, 'msg' => $msg]);
        exit();
    }
    if (!$post['description']) {

        $status = 'error';
        $title = 'Ops! Warning';
        $msg = 'Please add description.';
        echo json_encode(['status' => $status, 'title' => $title, 'msg' => $msg]);
        exit();
    }
    if ($post['start_date_time'] && $post['start_date']) {
        $start_date = $post['start_date'] . ' ' . $post['start_date_time'];
    }
    if ($post['end_date_time'] && $post['end_date']) {
        $end_date = $post['end_date'] . ' ' . $post['end_date_time'];
    }

    if ($post['category_id']) {
        $user_id = get_session('id');
        $c_id = $post['category_id'];
        $q = $db->query("SELECT id FROM categories WHERE user_id= '$user_id' && categories.id='$c_id'");
        $c = $q->fetch(PDO::FETCH_ASSOC);
        if (!$c) {
            $status = 'error';
            $title = 'Ops! Dikkat';
            $msg = 'Sadece oluşturduğunuz kategoriler için ekleme yapabilirsiniz.';
            echo json_encode(['status' => $status, 'title' => $title, 'msg' => $msg]);
            exit();
        }
    }


    $q = $db->prepare("INSERT INTO todos SET 
              todos.title=?, 
              todos.description=?, 
              todos.color=?, 
              todos.status=?, 
              todos.progress=?, 
              todos.start_date=?, 
              todos.end_date=?, 
              todos.category_id=?,
              todos.user_id=?
              ");
    $update = $q->execute([
        $post['title'],
        $post['description'],
        $post['color'] ?? '#007bff',
        $post['status'] ?? 'a',
        intval($post['progress']) ?? 1,
        $start_date,
        $end_date,
        $post['category_id'] ?? 0,
        get_session('id')
    ]);

    if ($update) {
        $status = 'success';
        $title = 'Success !';
        $msg = 'Todo edit process successfully.';
        echo json_encode(['status' => $status, 'title' => $title, 'msg' => $msg, 'redirect' => url('todo/list')]);
        exit();
    } else {
        $status = 'error';
        $title = 'Ops! Warning';
        $msg = 'An Unknown Error occurred.';
        echo json_encode(['status' => $status, 'title' => $title, 'msg' => $msg]);
        exit();
    }
} elseif (route(1) == 'edittodo') {
    $post = filter($_POST);
    $start_date = date('Y-m-d H:i:s');
    $end_date = date('Y-m-d H:i:s');
    if (!$post['title']) {

        $status = 'error';
        $title = 'Ops! Warning';
        $msg = 'Please add title.';
        echo json_encode(['status' => $status, 'title' => $title, 'msg' => $msg]);
        exit();
    }
    if (!$post['description']) {

        $status = 'error';
        $title = 'Ops! Warning';
        $msg = 'Please add description.';
        echo json_encode(['status' => $status, 'title' => $title, 'msg' => $msg]);
        exit();
    }
    if ($post['start_date_time'] && $post['start_date']) {
        $start_date = $post['start_date'] . ' ' . $post['start_date_time'];
    }
    if ($post['end_date_time'] && $post['end_date']) {
        $end_date = $post['end_date'] . ' ' . $post['end_date_time'];
    }

    if ($post['category_id']) {
        $user_id = get_session('id');
        $c_id = $post['category_id'];
        $q = $db->query("SELECT id FROM categories WHERE user_id= '$user_id' && categories.id='$c_id'");
        $c = $q->fetch(PDO::FETCH_ASSOC);
        if (!$c) {
            $status = 'error';
            $title = 'Ops! Dikkat';
            $msg = 'Sadece oluşturduğunuz kategoriler için ekleme yapabilirsiniz.';
            echo json_encode(['status' => $status, 'title' => $title, 'msg' => $msg]);
            exit();
        }
    }


    $q = $db->prepare("UPDATE todos SET 
              todos.title=?, 
              todos.description=?, 
              todos.color=?, 
              todos.status=?, 
              todos.progress=?, 
              todos.start_date=?, 
              todos.end_date=?, 
              todos.category_id=?
              WHERE todos.id=? && todos.user_id=?");
    $insert = $q->execute([
        $post['title'],
        $post['description'],
        $post['color'] ?? '#007bff',
        $post['status'] ?? 'a',
        intval($post['progress']) ?? 1,
        $start_date,
        $end_date,
        $post['category_id'] ?? 0,
        $post['id'],
        get_session('id')
    ]);

    if ($insert) {
        $status = 'success';
        $title = 'Success !';
        $msg = 'Todo add process successfully.';
        echo json_encode(['status' => $status, 'title' => $title, 'msg' => $msg, 'redirect' => url('todo/list')]);
        exit();
    } else {
        $status = 'error';
        $title = 'Ops! Warning';
        $msg = 'An Unknown Error occurred.';
        echo json_encode(['status' => $status, 'title' => $title, 'msg' => $msg]);
        exit();
    }
} elseif (route(1) == 'removetodo') {
    /*
        $status = 'error';
        $title = 'Ops! Warning';
        $msg = 'Please add title.';
        echo json_encode(['status' => $status, 'title' => $title, 'msg' => $msg]);
        exit();
        */

    $post = filter($_POST);

    if (!$post['id']) {
        $status = 'error';
        $title = 'Ops! Warning';
        $msg = 'Failed to get ID information !';
        echo json_encode(['status' => $status, 'title' => $title, 'msg' => $msg]);
        exit();
    }
    $id = $post['id'];
    $user = get_session('id');
    $q = $db->query("DELETE FROM todos WHERE id= '$id' && todos.user_id= '$user'");

    if ($q) {
        $status = 'success';
        $title = 'Operation Successful';
        $msg = 'Todo was successfully deleted.';
        echo json_encode(['status' => $status, 'title' => $title, 'msg' => $msg, 'id' => $id]);
        exit();
    } else {
        $status = 'error';
        $title = 'Ops! Warning';
        $msg = 'An error occurred';
        echo json_encode(['status' => $status, 'title' => $title, 'msg' => $msg]);
        exit();
    }
} elseif (route(1) == 'calendar') {

    $start = get('start');
    $end = get('end');
    $sql = "SELECT id, title,color, start_date as start, end_date as end, CONCAT('/todoapp/todo/edit/',todos.id) as url FROM todos WHERE todos.user_id =?";

    if ($start && $end) {
        $sql .= " && start_date BETWEEN '$start' AND '$end' OR end_date BETWEEN' $start' AND '$end'";
    }

    $q = $db->prepare($sql);
    $q->execute([get_session('id')]);
    $array = $q->fetchAll(PDO::FETCH_ASSOC);


    echo json_encode($array);
}

if (route(1) == "profile") {
    $post = filter($_POST);

    if (!$post['name']) {
        $status = 'error';
        $title = 'Ops! Warning';
        $msg = 'Please enter name.';
        echo json_encode(['status' => $status, 'title' => $title, 'msg' => $msg]);
        exit();
    }
    if (!$post['surname']) {
        $status = 'error';
        $title = 'Ops! Warning';
        $msg = 'Please enter surname.';
        echo json_encode(['status' => $status, 'title' => $title, 'msg' => $msg]);
        exit();
    }
    if (!$post['email']) {
        $status = 'error';
        $title = 'Ops! Warning';
        $msg = 'Please enter email.';
        echo json_encode(['status' => $status, 'title' => $title, 'msg' => $msg]);
        exit();
    }


    $name = $post['name'];
    $surname = $post['surname'];
    $email = $post['email'];
    $id = get_session('id');

    $q = $db->query("UPDATE users SET email = '$email', name = '$name', surname = '$surname' WHERE users.id = '$id' ");

    if ($q){

        add_session('name', $name);
        add_session('surname', $surname);
        add_session('fullname', $name.' '.$surname);
        add_session('email', $email);


        $status = 'success';
        $title = 'İşlem Başarılı';
        $msg = 'Profiliniz güncellendi';
        echo json_encode(['status' => $status, 'title' => $title, 'msg' => $msg]);
        exit();
    }else{
        $status = 'error';
        $title = 'Ops! Dikkat';
        $msg = 'Bir hata meydana geldi';
        echo json_encode(['status' => $status, 'title' => $title, 'msg' => $msg]);
        exit();
    }

}

if (route(1) == "changepassword") {

    $post = filter($_POST);

    if (!$post['old_password'] || (get_session('password') != md5($post['old_password']))) {
        $status = 'error';
        $title = 'Ops! Warning';
        $msg = 'Please enter your password correctly.';
        echo json_encode(['status' => $status, 'title' => $title, 'msg' => $msg]);
        exit();
    }

    $smallchar = preg_match('#[a-z]#', $post['password']);
    $bigchar = preg_match('#[A-Z]#', $post['password']);
    $number = preg_match('#[0-9]#', $post['password']);


    if (!$post['password'] || !$smallchar || !$bigchar || !$number || strlen($post['password']) < 6) {

        $status = 'error';
        $title = 'Ops! Dikkat';
        $msg = 'Your password must be at least six characters. It must contain uppercase, lowercase letters and numbers.';
        echo json_encode(['status' => $status, 'title' => $title, 'msg' => $msg]);
        exit();

    }


    if (!$post['password'] || !$post['password_again'] || ($post['password'] != $post['password_again'])) {

        $status = 'error';
        $title = 'Ops! Warning';
        $msg = 'Your new password does not match.';
        echo json_encode(['status' => $status, 'title' => $title, 'msg' => $msg]);
        exit();

    }

    $pass = md5($post['password']);
    $id = get_session('id');
    $upt = $db->query("UPDATE users SET password='$pass' WHERE users.id= '$id'");

    if ($upt) {
        add_session('password', $pass);
        $status = 'success';
        $title = 'Successfully !';
        $msg = 'Password update successfully.';
        echo json_encode(['status' => $status, 'title' => $title, 'msg' => $msg]);
        exit();
    } else {
        $status = 'error';
        $title = 'Ops Warning !';
        $msg = 'An error occurred';
        echo json_encode(['status' => $status, 'title' => $title, 'msg' => $msg]);
        exit();
    }
}
