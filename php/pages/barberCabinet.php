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

<?php require_once('modal.php'); ?>
<?php require_once('../header.php'); ?>

<title>Личный кабинет мастера | BarberShop</title>

<?php

    $sql = 'SELECT * FROM `orders` WHERE `master_id` = :mid';
    $query = $connect -> prepare($sql);
    $query -> execute(['mid' => $_SESSION['master_id']]);
    $result = $query -> fetchAll(PDO::FETCH_ASSOC);

?>

<div class="container">
    <h1 class="mt-12">Здравствуйте, <?php 
        $sql = "SELECT `name`, `surname` FROM `users` WHERE `id` = :i";
        $query = $connect -> prepare($sql);
        $query -> execute(["i" => $_SESSION['id']]);
        $result = $query -> fetch(PDO::FETCH_ASSOC);
        echo $result['name'] . ' ' . $result['surname'] . '.'
    ?></h1>
    <?php 
        $sql_orders = "SELECT * FROM `orders` WHERE `master_id` = :mid";
        $query_orders = $connect -> prepare($sql_orders);
        $query_orders -> execute(['mid' => $_SESSION['master_id']]);
        $result_orders = $query_orders -> fetchAll(PDO::FETCH_ASSOC);
        echo '<div class="card__container">';                    
            foreach ($result_orders as $key => $value) {
                $sql_user = "SELECT `name`, `surname` FROM `users` WHERE `id` = :uid";
                $query_user = $connect -> prepare($sql_user);
                $query_user -> execute(['uid' => $result_orders[$key]['user_id']]);
                $result_user = $query_user -> fetch(PDO::FETCH_ASSOC);

                $sql_service = "SELECT `title` FROM `service` WHERE `id` = :sid";
                $query_service = $connect -> prepare($sql_service);
                $query_service -> execute(['sid' => $result_orders[$key]['service_id']]);
                $result_service = $query_service -> fetch(PDO::FETCH_ASSOC);
                echo 
                '
                    <form class="card">
                        <h2>Клиент: ' . $result_user["name"] . ' ' . $result_user["surname"] .'</h2>
                        <h3 class="mt-8 service">Услуга: ' . $result_service["title"] . '</h3>
                        <h3 class="mt-8 date" value="' . $result_orders[$key]["date"] . '">Запись на ' . $result_orders[$key]["date"] . ' ' . '<span class="time" value="' . $result_orders[$key]["time"] . '">' . $result_orders[$key]["time"] . '</span></h3>';
                    if ($result_orders[$key]["confirmed"] == 'false') {
                        echo '<button class="btn-reset btn-primary confirmOrderBtn">Подтвердить запись</button>';
                    }
                echo '</form>
                ';
            }
        echo '</div>';
    ?>
</div>
<script src="/js/global.js"></script>
<script src="/js/barberCabinet.js"></script>

