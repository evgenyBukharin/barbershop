<?php

    require_once("db.php");

    $_POST = json_decode(file_get_contents("php://input"), true);

    $login = trim($_POST["login"]);
    $password = trim($_POST["password"]);    

    $sql = "SELECT `id`, `login`, `password`, `role` FROM `users` WHERE `login` = :l";
    $query = $connect -> prepare($sql);
    $query -> execute(["l" => $login]);
    $result = $query -> fetch(PDO::FETCH_ASSOC);
    
    if ($result !== false) {
        if (password_verify($password, $result["password"])) {
            $_SESSION["id"] = $result["id"];
            $_SESSION["role"] = $result["role"];
            if ($result["role"] == 'barber') {
                $sql_barber = 'SELECT `id` FROM `barbers` WHERE `barber_login` = :l';
                $query_barber = $connect -> prepare($sql_barber);
                $query_barber -> execute(['l' => $result['login']]);
                $result_barber = $query_barber -> fetch(PDO::FETCH_ASSOC);
                $_SESSION['master_id'] == $result_barber['id'];
            }
            echo "Вы успешно авторизированны!";
        } else {
            echo "Не верный пароль";
        }
    } else {
        echo 'Данные неверны'; 
    }

?>