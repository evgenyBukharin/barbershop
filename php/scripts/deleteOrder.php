<?php

    require_once('db.php');
    $_POST = json_decode(file_get_contents("php://input"), true);

    $barber_id = $_POST['barber_id'];
    $user_id = $_POST['user_id'];
    $date = $_POST['date'];
    $time = $_POST['time'];

    $sql = "DELETE FROM `orders` WHERE `master_id` = :b && `date` = :d && `time` = :t && `user_id` = :u";
    $query = $connect -> prepare($sql);
    $result = $query->execute(['b' => $barber_id, 'd' => $date, 't' => $time, 'u' => $user_id]);

    if ($result) {
        echo 'Запись удалена';
    }

?>