<?php
    session_start();
    if ($_SESSION['role'] !== 'user') {
        header('Location: /');
    }
?>

<?php require_once('../scripts/db.php'); ?>
<?php require_once('modal.php'); ?>

<title>Личный кабинет | BarberShop</title>

<?php require_once('../header.php'); ?>

<link rel="stylesheet" href="/css/global.css">
<link rel="stylesheet" href="/css/header.css">
<link rel="stylesheet" href="/css/card.css">
<link rel="stylesheet" href="/css/login.css">
<link rel="stylesheet" href="/css/personal_cabinet.css">

<div class="container">
    <h1 class="mt-12">Здравствуйте, <?php 
        $sql = "SELECT `name`, `surname` FROM `users` WHERE `id` = :i";
        $query = $connect -> prepare($sql);
        $query -> execute(["i" => $_SESSION['id']]);
        $result = $query -> fetch(PDO::FETCH_ASSOC);
        echo $result['name'] . ' ' . $result['surname'] . '.'
    ?></h1>
    <?php 
        $sql = "SELECT b.id, b.name, s.title, o.date, o.time, o.confirmed FROM orders o INNER JOIN barbers b ON o.master_id = b.id INNER JOIN service s ON s.id = o.service_id WHERE o.user_id = :i";
        $query = $connect -> prepare($sql);
        $query -> execute(['i' => $_SESSION['id']]);
        $result = $query -> fetchAll(PDO::FETCH_ASSOC);
        echo '<div class="card__container">';
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
<div class="container">
    <hr>
    <h2 class="mt-12">Изменить пароль</h2>
    <form id="changePassForm" class="mt-18">
        <div class="flex ai-center">
            <h3 class="mr-8">Введите предыдущий пароль</h3>
            <input class="form__input" type="password" id="last_pass">
        </div>
        <div class="flex ai-center mt-12">
            <h3 class="mr-8">Введите новый пароль</h3>
            <input class="form__input" type="password" id="new_pass">
        </div>
        <button type="submit" class="btn-reset btn-primary">Изменить</button>
    </form>
</div>

<script src="/js/global.js"></script>
<script src="/js/userCabinet.js"></script>