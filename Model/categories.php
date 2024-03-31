<?php

global $db;
if ($proccess == 'add') {
    if (!$data['title']) {
        return [
            'success' => false,
            'type' => 'danger',
            'message' => 'Please add category title'
        ];
    }

    $title = $data['title'];
    $q = $db->prepare("INSERT INTO categories SET title=?, user_id=?");
    $q->execute([$title, get_session('id')]);

    if ($q->rowCount()) {

        return [
            'success' => true,
            'type' => 'success',
            'message' => 'Category added succesfully',
            'redirect' => 'categories/list'
        ];
    }
    else {
        return [
            'success' => false,
            'type' => 'danger',
            'message' => 'An error occurred while adding a category.'
        ];
    }
}
elseif ($proccess == 'list') {

    $q = $db->prepare("SELECT * FROM categories WHERE user_id = ?");
    $q->execute([get_session('id')]);

    if ($q->rowCount()) {

        return [
            'success' => true,
            'type' => 'success',
            'data' => $q->fetchAll(PDO::FETCH_ASSOC)
        ];
    } else {
        return [
            'success' => true,
            'type' => 'success',
            'data' => []
        ];
    }
}
elseif ($proccess == 'remove') {

    $id = $data['id'];
    $q = $db->prepare("DELETE FROM categories WHERE categories.id = ? && categories.user_id=?");
    $q->execute([$id, get_session('id')]);

    if ($q->rowCount()) {
        return [
            'success' => true,
            'type' => 'success',
            'message' => 'Category delete proccess is successfully'
        ];
    } else {
        return [
            'success' => true,
            'type' => 'danger',
            'message' => 'an error occurred',

        ];
    }
}
elseif ($proccess == 'getsingle') {

    $id = $data['id'];
    $q = $db->prepare("SELECT * FROM categories WHERE categories.id =? && user_id =?");
    $q->execute([$id, get_session('id')]);

    if ($q->rowCount()) {

        return [
            'success' => true,
            'type' => 'success',
            'data' => $q->fetch(PDO::FETCH_ASSOC),
        ];
    }
    else {
        return [
            'success' => true,
            'type' => 'success',
            'data' => []
        ];
    }
}
elseif ($proccess == 'edit') {

    $id = $data['id'];
    $title = $data['title'];
    $q = $db->prepare("UPDATE categories SET categories.title=? WHERE categories.id =? && user_id =?");
    $edit = $q->execute([$title,$id,get_session('id')]);

    if ($edit) {

        return [
            'success' => true,
            'type' => 'success',
            'data' => $q->fetch(PDO::FETCH_ASSOC),
            'message' => 'Todo update is succesfully'
        ];
    }
    else {
        return [
            'success' => true,
            'type' => 'danger',
            'message' => 'an error occurred during todo update ',
            'data' => []
        ];
    }
}
else {
    return [
        'success' => true,
        'type' => 'success',
        'data' => []
    ];
}