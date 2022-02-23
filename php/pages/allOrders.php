<?php
    session_start();
    if ($_SESSION['role'] !== 'admin') {
        header('Location: /');
    }
?>

<?php require_once('../scripts/db.php'); ?>
<?php require_once('modal.php'); ?>

<title>Все записи | BarberShop</title>

<?php require_once('../header.php'); ?>

<link rel="stylesheet" href="/css/global.css">
<link rel="stylesheet" href="/css/header.css">
<link rel="stylesheet" href="/css/card.css">
<link rel="stylesheet" href="/css/login.css">

<div class="container card__container">
    <?php
    
        $sql = "SELECT b.id as 'master_id', b.name as 'master_name', s.title as 'service_title', o.date, o.time, o.confirmed, u.id as 'user_id', u.name as 'user_name', u.surname as 'user_surname' FROM orders o INNER JOIN barbers b ON o.master_id = b.id INNER JOIN service s ON s.id = o.service_id INNER JOIN users u ON u.id = o.user_id";
        $query = $connect -> prepare($sql);
        $query -> execute();
        $result = $query -> fetchAll(PDO::FETCH_ASSOC);

        foreach ($result as $key => $value) {
            echo 
            '
                <form class="card">
                    <h2>Услуга: ' . $result[$key]["service_title"] . '</h2>
                    <h3 class="mt-8 master" value="' . $result[$key]["master_name"] . '">Имя мастера: ' . $result[$key]["master_name"] . '</h3 >
                    <h3 class="mt-8 user" value="' . $result[$key]["user_name"] . '">Имя клиента ' . $result[$key]["user_name"] . ' ' . '<span class="time" value="' . $result[$key]["user_surname"] . '">' . $result[$key]["user_surname"] . '</span></h3>
                    <h3 class="mt-8 date" value="' . $result[$key]["date"] . '">Запись на ' . $result[$key]["date"] . ' ' . '<span class="time" value="' . $result[$key]["time"] . '">' . $result[$key]["time"] . '</span></h3>
                    <div class="w-100 flex jc-between">
                        <button class="btn-reset btn-primary finishOrderBtn">Завершить заказ</button>';
                        if ($result[$key]["confirmed"] == 'false') {
                            echo '<button class="btn-reset btn-primary confirmOrderBtn">Подтвердить запись</button>';
                        }
                    echo '</div>';
                echo '</form>
            ';
        }
    ?>
</div>

<script src="/js/global.js"></script>
<script src="/js/allOrders.js"></script>
