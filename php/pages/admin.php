<?php
session_start();
if ($_SESSION['role'] !== 'admin') {
    header('Location: /');
}
?>

<?php require_once('../scripts/db.php'); ?>
<?php require_once('modal.php'); ?>

<title>Панель администратора | BarberShop</title>

<?php require_once('../header.php'); ?>

<link rel="stylesheet" href="/css/global.css">
<link rel="stylesheet" href="/css/header.css">
<link rel="stylesheet" href="/css/login.css">
<link rel="stylesheet" href="/css/card.css">

<div class="container">
    <h1 class="mt-12">Панель админитратора</h1>
    <hr class="mt-12">
    <h2 class="mt-12">Добавить барбера</h2>
    <form id="barberForm" class="mt-12">
        <div class="flex ai-center">
            <h3 class="mr-8">Введите имя</h3>
            <input class="form__input" type="text" id="name" required>
        </div>
        <div class="flex ai-center mt-12">
            <h3 class="mr-8">Введите фамилию</h3>
            <input class="form__input" type="text" id="surname" required>
        </div>
        <div class="flex ai-center mt-12">
            <h3 class="mr-8">Опыт работы</h3>
            <input class="form__input" type="text" id="expierence" required>
        </div>
        <div class="flex ai-center mt-12">
            <h3 class="mr-8">Логин для входа в аккаунт</h3>
            <input class="form__input" type="text" id="login" required>
        </div>
        <div class="flex ai-center mt-12">
            <h3 class="mr-8">Пароль для входа в аккаунт</h3>
            <input class="form__input" type="password" id="password" required>
        </div>
        <div class="flex ai-center mt-12">
            <h3 class="mr-8">Электронная почта</h3>
            <input class="form__input" type="email" id="email" required>
        </div>
        <input type="hidden" id="role" value="barber">
        <button class="btn-reset btn-primary">Добавить</button>
    </form>
    <hr class="mt-12">
    <h2 class="mt-12">Удалить барбера</h2>
    <form id="deleteBarberForm" class="mt-12">
        Выберите барбера
        <select id="barber_login" class="card__select" required>
            <?php

            $sql = 'SELECT * FROM `barbers`';
            $query = $connect->prepare($sql);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);

            foreach ($result as $key => $value) {
                echo
                '<option value="' . $result[$key]["barber_login"] . '">' . $result[$key]["name"] . '</option>';
            }

            ?>
        </select><br>
        <button class="btn-reset btn-primary">Удалить</button>
    </form>
    <hr class="mt-12">
    <h2 class="mt-12">Добавить услугу</h2>
    <form id="serviceForm" class="mt-12" enctype="multipart/form-data">
        <div class="flex ai-center">
            <h3 class="mr-8">Введите название</h3>
            <input class="form__input" type="text" id="title" name="title" required>
        </div>
        <div class="flex ai-center">
            <h3 class="mr-8">Введите цену</h3>
            <input class="form__input" type="number" id="price" name="price" required>
        </div>
        <div class="flex ai-center">
            <h3 class="mr-8">Введите описание</h3>
            <textarea class="form__input mt-12" type="text" id="description" name="description" required></textarea>
        </div>
        Загрузите изображение: <input class="mt-12" type="file" id="image" name="image" required> <br>
        <button class="btn-reset btn-primary">Добавить</button>
    </form>
    <hr class="mt-12">
    <h2 class="mt-12">Удалить услугу</h2>
    <form id="deleteServiceForm" class="mt-12">
        Выберите услугу
        <select id="service_id" class="card__select" required>
            <?php

            $sql = 'SELECT * FROM `service`';
            $query = $connect->prepare($sql);
            $query->execute();
            $result = $query->fetchAll(PDO::FETCH_ASSOC);

            foreach ($result as $key => $value) {
                echo
                '<option value="' . $result[$key]["id"] . '">' . $result[$key]["title"] . '</option>';
            }

            ?>
        </select><br>
        <button class="btn-reset btn-primary" type="submit">Удалить</button>
    </form>
</div>

<script src="/js/global.js"></script>
<script src="/js/admin.js"></script>