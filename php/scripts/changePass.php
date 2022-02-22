<?php
    require_once('db.php');
    $_POST = json_decode(file_get_contents("php://input"), true);
    $last_pass = $_POST['last_pass'];
    $new_pass = $_POST['new_pass'];
    $sql = "SELECT * FROM `users` WHERE `id` = :i";
    $query = $connect -> prepare($sql);
    $query->execute(['i' => $_SESSION['id']]);
    $result = $query -> fetch(PDO::FETCH_ASSOC);
    if (password_verify($last_pass, $result['password'])) {
        $sql_update = 'UPDATE `users` SET `password`= :p WHERE `id` = :i';
        $query = $connect -> prepare($sql_update);
        $query->execute(['p' => password_hash($new_pass, PASSWORD_DEFAULT), 'i' => $_SESSION['id']]);
        echo 'Пароль изменен';
    } else {
        echo 'Введенный пароль неверен.';
    }
?>