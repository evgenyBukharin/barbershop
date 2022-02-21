<?php

    require_once('db.php');
    $_POST = json_decode(file_get_contents("php://input"), true);

    $barber_id = $_POST['barber_id'];
    $user_id = $_POST['user_id'];
    $service_id = $_POST['service_id'];
    $date = $_POST['date'];
    $time = $_POST['time'];

    $sql_check = "SELECT * FROM `orders` WHERE `master_id` = :b && `date` = :d && `time` = :t && `user_id` = :u";
    $query_check = $connect -> prepare($sql_check);
    $result_check = $query_check->execute(['b' => $barber_id, 'd' => $date, 't' => $time, 'u' => $user_id]);
    $result_check = $query_check -> fetchAll(PDO::FETCH_ASSOC);
    if ($result_check == []) {
        $sql = 'INSERT INTO `orders`(`master_id`, `service_id`, `date`, `time`, `user_id`) VALUES (:b, :s, :d, :t, :u)';
        $query = $connect -> prepare($sql);
        $result = $query->execute(['b' => $barber_id, 's' => $service_id, 'd' => $date, 't' => $time, 'u' => $user_id]);
        if ($result) {
            echo 'Вы успешно записались.';
        }
    } else {
        echo 'Выбранная дата и время у данного мастера занята.';
    }
?>