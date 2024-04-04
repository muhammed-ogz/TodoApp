<?php

if (route(1) == 'addtodo'){
    $post = filter($_POST);

    if(!$post['title']){

        $status = 'error';
        $title = 'Ops! Warning';
        $msg = 'Please add title.';
        echo json_encode(['status' => $status, 'title' => $title, 'msg' => $msg]);
        exit();
    }
    if(!$post['description']){

        $status = 'error';
        $title = 'Ops! Warning';
        $msg = 'Please add description.';
        echo json_encode(['status' => $status, 'title' => $title, 'msg' => $msg]);
        exit();
    }

    $q = $db->prepare("INSERT INTO todos SET 
              todos.title=?, 
              todos.description=?, 
              todos.color=?, 
              todos.start_date=?, 
              todos.end_date=?, 
              todos.category_id=?,
              todos.user_id=?
              ");
    $insert = $q->execute([
        $post['title'],
        $post['description'],
        $post['color'] ?? '#007bff',
        $post['start_date'] ?? date('Y-m-d H:i:s'),
        $post['end_date'] ?? NULL,
        $post['category_id'] ?? 0,
        get_session('id')
    ]);

    if($insert){
        $status = 'success';
        $title = 'Success !';
        $msg = 'Todo add process successfully.';
        echo json_encode(['status' => $status, 'title' => $title, 'msg' => $msg]);
        exit();
    }else{
        $status = 'error';
        $title = 'Ops! Warning';
        $msg = 'An Unknown Error occurred.';
        echo json_encode(['status' => $status, 'title' => $title, 'msg' => $msg]);
        exit();
    }

}