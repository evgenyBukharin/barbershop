<?php require_once('../scripts/db.php'); ?>
<?php require_once('modal.php'); ?>

<link rel="stylesheet" href="/css/global.css">
<link rel="stylesheet" href="/css/header.css">
<link rel="stylesheet" href="/css/card.css">

<title>Услуги | BarberShop</title>

<?php require_once('./../header.php'); ?>

<div class="container mb-4">
    <?php 
        $sql = "SELECT * FROM `service`";
        $query = $connect -> prepare($sql);
        $query -> execute();
        $result = $query -> fetchAll(PDO::FETCH_ASSOC);
        echo '<div class="card__container">';
        foreach ($result as $key => $value) {
            echo 
            '
                <form class="card">
                    <div>
                        <h3 class="card__title">' . $result[$key]["title"] . '</h3>
                        <p class="card__description">' . $result[$key]["description"] . '</p>
                    </div>
                    <div style="width: 100%" class="flex jc-center">
                        <img class="card__image" src="' . $result[$key]["img"] . '"/>
                    </div>
                </form>
            ';
        }
        echo '</div>';
    ?>    
</div>

<script src="/js/global.js"></script>
