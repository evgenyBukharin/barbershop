<?php

    require_once('db.php');
    $_POST = json_decode(file_get_contents("php://input"), true);

    $name = trim($_POST['name']);
    $surname = trim($_POST['surname']);
    $login = trim($_POST['login']);
    $password = trim($_POST['password']);
    $email = trim($_POST['email']);

    $sql = "SELECT `login` FROM `users` WHERE `login` = :l";
    $query = $connect -> prepare($sql);
    $query->execute(['l' => $login]);
    $dbLogin = $query -> fetchAll(PDO::FETCH_COLUMN);

    if (empty($dbLogin)) {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $sql = 'INSERT INTO `users`(`name`, `surname`, `login`, `password`, `email`) VALUES (:n, :s, :l, :p, :e)';
        $query = $connect -> prepare($sql);
        $result = $query->execute(['n' => $name, 's' => $surname, 'l' => $login, 'p' => $password, 'e' => $email]);        
        if ($result) {
            echo 'Вы зарегистрировались!';
        }
    } else {
        echo 'Такой логин уже существует';
    }


?>