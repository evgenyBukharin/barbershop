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



<script src="/js/global.js"></script>
