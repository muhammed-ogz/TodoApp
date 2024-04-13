<?php

if ($proccess == 'list') {

    $q = $db->prepare(" SELECT 
                        status, count(todos.id) as toplam,
                        (count(todos.id) * 100 / (SELECT COUNT(id) FROM todos WHERE user_id = ? )) as yuzde
                        FROM todos WHERE todos.user_id=? 
                        GROUP BY todos.status"
                    );
    $q->execute([get_session('id'),get_session('id')]);

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
