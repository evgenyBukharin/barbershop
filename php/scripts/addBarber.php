<?php

    require_once('db.php');
    $_POST = json_decode(file_get_contents("php://input"), true);

    $name = trim($_POST['name']);
    $surname = trim($_POST['surname']);
    $login = trim($_POST['login']);
    $password = trim($_POST['password']);
    $email = trim($_POST['email']);
    $role = trim($_POST['role']);
    $expierence = trim($_POST['expierence']);

    $sql = "SELECT `login` FROM `users` WHERE `login` = :l";
    $query = $connect -> prepare($sql);
    $query->execute(['l' => $login]);
    $dbLogin = $query -> fetchAll(PDO::FETCH_COLUMN);

    if (empty($dbLogin)) {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $sql = 'INSERT INTO `users`(`name`, `surname`, `login`, `password`, `email`, `role`) VALUES (:n, :s, :l, :p, :e, :r)';
        $query = $connect -> prepare($sql);
        $result = $query->execute(['n' => $name, 's' => $surname, 'l' => $login, 'p' => $password, 'e' => $email, 'r' => $role]);    
        
        if (!$result) {
            die();
        } else {
            $sql_barber = 'INSERT INTO `barbers`(`name`, `expierence`, `barber_login`) VALUES (:n, :e, :bl)';
            $query_barber = $connect -> prepare($sql_barber);
            $nameSurname = $name . ' ' . $surname;
            $result_barber = $query_barber -> execute(['n' => $nameSurname, 'e' => $expierence, 'bl' => $login]);
        }       

        if ($result && $result_barber) {
            echo 'Барбер добавлен';
        } else {
            echo 'Барбер не добавлен.';
        }
    } else {
        echo 'Такой логин уже существует';
    }


?>