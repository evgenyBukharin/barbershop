<?php require_once('../scripts/db.php'); ?>
<?php require_once('modal.php'); ?>

<title>Регистрация | BarberShop</title>

<?php require_once('../header.php'); ?>


<link rel="stylesheet" href="/css/global.css">
<link rel="stylesheet" href="/css/header.css">
<link rel="stylesheet" href="/css/login.css">

<div class="container">
    <h1 class="mt-12">Создайте аккаунт</h1>
    <form id="regForm" class="mt-12">
        <div class="flex ai-center">
            <h3 class="mr-8">Введите ваше имя</h3>
            <input class="form__input" type="text" id="name" required>
        </div>
        <div class="flex ai-center mt-12">
            <h3 class="mr-8">Введите вашу фамилию</h3>
            <input class="form__input" type="text" id="surname" required>
        </div>
        <div class="flex ai-center mt-12">
            <h3 class="mr-8">Введите ваш логин</h3>
            <input class="form__input" type="text" id="login" required>
        </div>
        <div class="flex ai-center mt-12">
            <h3 class="mr-8">Введите ваш пароль</h3>
            <input class="form__input" type="password" id="password" required>
        </div>
        <div class="flex ai-center mt-12">
            <h3 class="mr-8">Повторите пароль</h3>
            <input class="form__input" type="password" id="password_confirmation" required>
        </div>
        <div class="flex ai-center mt-12" required>
            <h3 class="mr-8">Введите ваш email</h3>
            <input class="form__input" type="email" id="email" required>
        </div>
        <button type="submit" class="btn-reset btn-primary">Зарегистрироваться</button>
    </form>
</div>

<script src="/js/global.js"></script>
<script src="/js/register.js"></script>
