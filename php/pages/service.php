<?php require_once('../scripts/db.php'); ?>

<link rel="stylesheet" href="/css/global.css">
<link rel="stylesheet" href="/css/header.css">
<link rel="stylesheet" href="/css/card.css">

<title>Услуги | BarberShop</title>

<?php require_once('./../header.php'); ?>

<div class="container card__container fw-wrap">
    <?php 
        if (empty($_GET)) {
            $sql = "SELECT * FROM `service`";
            $query = $connect -> prepare($sql);
            $query -> execute();
            $result = $query -> fetchAll(PDO::FETCH_ASSOC);
            foreach ($result as $key => $value) {
                echo '
                    <form class="card">
                        <h3 class="card__title">' . $result[$key]["title"] . '</h3>
                        <p class="card__description">' . $result[$key]["description"] . '</p>
                        <img src=""/>
                        <input type="hidden" name="serviceId" value="' . $result[$key]["id"] . '">
                        <button type="submit" class="btn-reset btn-primary">Записаться</button>
                    </form>
                ';
            }
        } else {
            echo '<pre>';
            print_r($_GET);
            echo '</pre>';
        }
    ?>
</div>
<script src="/js/service.js"></script>




