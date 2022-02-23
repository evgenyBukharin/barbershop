<?php require_once('../scripts/db.php'); ?>
<?php require_once('modal.php'); ?>

<title>Логин | BarberShop</title>

<?php require_once('../header.php'); ?>

<link rel="stylesheet" href="/css/global.css">
<link rel="stylesheet" href="/css/header.css">
<link rel="stylesheet" href="/css/login.css">

<div class="container">
    <h1 class="mt-12">Войдите в аккаунт</h1>
    <form id="loginForm" class="mt-12">
        <div class="flex ai-center">
            <h3 class="mr-8">Введите ваш логин</h3>
            <input class="form__input" type="text" id="login" required>
        </div>
        <div class="flex ai-center mt-12">
            <h3 class="mr-8">Введите ваш пароль</h3>
            <input class="form__input" type="password" id="password" required>
        </div>
        <h2 class="mt-8"><a href="register.php">Еще не зарегистрированы?</a></h2>
        <button class="btn-reset btn-primary">Войти</button>
    </form>
</div>

<script src="/js/global.js"></script>
<script src="/js/login.js"></script>