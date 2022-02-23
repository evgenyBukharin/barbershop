<?php

    require_once('db.php');
    $_POST = json_decode(file_get_contents("php://input"), true);

    $barber_login = $_POST['barber_login'];

    $sql = "DELETE FROM `users` WHERE `login` = :l";
    $query = $connect -> prepare($sql);
    $result = $query->execute(['l' => $barber_login]);

    if ($result) {
        echo 'Барбер успешно удален';
    }

?>