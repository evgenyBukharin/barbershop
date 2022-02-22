<?php
    session_start();
    if ($_SESSION['role'] !== 'barber') {
        header('Location: /');
    }
?>

<?php require_once('../scripts/db.php'); ?>

<link rel="stylesheet" href="/css/global.css">
<link rel="stylesheet" href="/css/header.css">
<link rel="stylesheet" href="/css/card.css">
<link rel="stylesheet" href="/css/personal_cabinet.css">

<?php require_once('../header.php'); ?>

<title>Личный кабинет мастера | BarberShop</title>

<?php require_once('modal.php'); ?>

<?php

    $sql = 'SELECT * FROM `orders` WHERE `master_id` = :mid';
    $query = $connect -> prepare($sql);
    $query -> execute(['mid' => $_SESSION['master_id']]);
    $result = $query -> fetchAll(PDO::FETCH_ASSOC);

?>

<div class="container">
    <h1 class="mt-12">Здравствуйте, <?php 
            // тутт 1 иннер джион или другой джоин запрос который вернет таблицу в которой есть все записи к мастеру всех пользователей с данными пользователей и названиями услуг
            // $sql = "SELECT `name`, `surname` FROM `users` WHERE `id` = :i";
            $query = $connect -> prepare($sql);
            $query -> execute(["i" => $_SESSION['id']]);
            $result = $query -> fetch(PDO::FETCH_ASSOC);
            echo $result['name'] . ' ' . $result['surname'] . '.'
        ?></h1>
        <?php 
            $sql = "SELECT * FROM `orders` WHERE `master_id` = :mid";
            $query = $connect -> prepare($sql);
            $query -> execute(['mid' => $_SESSION['master_id']]);
            $result = $query -> fetchAll(PDO::FETCH_ASSOC);
            echo '<div class="card__container">';
            // либо тут в форыче делать под запрос и по текущему айди юзера из таблицы ордерс делать подзапрос в таблицу юзеров и может услуг что бы были данные для вывода
            foreach ($result as $key => $value) {
                echo 
                '
                    <form class="card">
                        <input class="user" type="hidden" value="' . $_SESSION['id'] . '">
                        <h2>Услуга: ' . $result[$key]["title"] . '</h2>
                        <h3 class="mt-8 master" value="' . $result[$key]["id"] . '">Имя мастера: ' . $result[$key]["name"] . '</h3 >
                        <h3 class="mt-8 date" value="' . $result[$key]["date"] . '">Запись на ' . $result[$key]["date"] . ' ' . '<span class="time" value="' . $result[$key]["time"] . '">' . $result[$key]["time"] . '</span></h3>';
                    if ($result[$key]["confirmed"] == 'false') {
                        echo '<button class="btn-reset btn-primary deleteOrderBtn">Отменить запись</button>';
                    }
                echo '</form>
                ';
            }
            echo '</div>';
    ?>
</div>
<script src="/js/global.js"></script>
