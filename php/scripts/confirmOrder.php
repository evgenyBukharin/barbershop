<?php

    require_once('db.php');
    $_POST = json_decode(file_get_contents("php://input"), true);

    $date = $_POST['date'];
    $time = $_POST['time'];

    $sql = "UPDATE `orders` SET `confirmed` = 'true' WHERE `date` = :d && `time` = :t";
    $query = $connect -> prepare($sql);
    $result = $query->execute(['d' => $date, 't' => $time]);

    if ($result) {
        echo 'Запись подтверждена';
    }

?>