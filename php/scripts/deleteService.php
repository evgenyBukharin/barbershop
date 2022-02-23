<?php

    require_once('db.php');
    $_POST = json_decode(file_get_contents("php://input"), true);

    $service_id = $_POST['service_id'];

    $sql_deletefile = "SELECT * FROM `service` WHERE `id` = :i";
    $query_deletefile = $connect -> prepare($sql_deletefile);
    $query_deletefile -> execute(['i' => $service_id]);
    $result_deletefile = $query_deletefile -> fetch(PDO::FETCH_ASSOC); 

    if (!unlink($result_deletefile['img'])) {
        die();
    }

    $sql = "DELETE FROM `service` WHERE `id` = :i";
    $query = $connect -> prepare($sql);
    $result = $query->execute(['i' => $service_id]);

    if ($result) {
        echo 'Услуга успешно удалена.';
    } else {
        echo 'Неудалось удалить услугу.';
    }

?>