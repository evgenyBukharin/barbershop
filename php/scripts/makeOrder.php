<?php

    require_once('db.php');
    $_POST = json_decode(file_get_contents("php://input"), true);

    $barber_id = $_POST['barber_id'];
    $service_id = $_POST['service_id'];
    $date = $_POST['date'];
    $time = $_POST['time'];

    $sql = 'INSERT INTO `orders`(`master_id`, `service_id`, `date`, `time`) VALUES (:b, :s, :d, :t)';
    $query = $connect -> prepare($sql);
    $result = $query->execute(['b' => $barber_id, 's' => $service_id, 'd' => $date, 't' => $time]);

    if ($result) {
        echo 'Вы успешно записались.';
    }

?>