<?php require_once('php/scripts/db.php'); ?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barbershop</title>
    <link rel="stylesheet" href="css/global.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/header.css">
</head>

<body>
    <?php
    require_once('php/header.php')
    ?>
    <div class="flex jc-center ai-center min-h-100">
        <div class="container container__fix">
            <h1 class="main__title">Мы - профессиональный барбершоп с лучшими мастерами</h1>
            <span class="custom-hr"></span>
            <h2 class="main__title_sub">Множество довольных клиентов и отзывов</h2>
            <button class="btn-reset btn-primary main__btn" id="service-link">Просмотреть услуги</button>
            <h2 class="main__title_address">Вы можете найти нас по адресу: улица Ворошилова, 57.</h2>
            <img src="images/map.png" alt="Изображение карты" class="main__map">
        </div>
    </div>
    <script src="js/index.js"></script>
</body>

</html>