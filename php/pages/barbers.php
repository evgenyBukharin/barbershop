<?php require_once('../scripts/db.php'); ?>
<?php require_once('modal.php'); ?>

<link rel="stylesheet" href="/css/global.css">
<link rel="stylesheet" href="/css/header.css">
<link rel="stylesheet" href="/css/card.css">
<link rel="stylesheet" href="/css/barbers.css">

<title>Мастера | BarberShop</title>

<?php require_once('./../header.php'); ?>

<div class="container">
    <?php
    $sql = "SELECT * FROM `barbers`";
    $query = $connect->prepare($sql);
    $query->execute();
    $result = $query->fetchAll(PDO::FETCH_ASSOC);
    echo '<div class="card__container">';
    foreach ($result as $key => $value) {
        echo
        '   <form class="card" enctype="multipart/form-data">
                        <div>
                            <h3 class="card__title">' . $result[$key]["name"] . '</h3>
                            <input id="barber_id" type="hidden" value="' . $result[$key]["id"] . '">
                            <input id="user_id" type="hidden" value="' . $_SESSION['id'] . '">
                            <p class="card__description mt-12">Опыт работы: ' . $result[$key]["expierence"] . '</p>
                        </div>'
    ?>
        <h3 class="mt-12 mb-4">Выберите услугу</h3>
        <select id="service_id" class="card__select mb-12">
            <?php
            $sql1 = "SELECT * FROM `service`";
            $query1 = $connect->prepare($sql1);
            $query1->execute();
            $result1 = $query1->fetchAll(PDO::FETCH_ASSOC);
            foreach ($result1 as $key => $value) {
                echo
                '<option value="' . $result1[$key]["id"] . '">' . $result1[$key]["title"] . ' | Цена: ' . $result1[$key]['price'] . ' руб</option>';
            }
            ?>
        </select>
        <div class="flex jc-between" style="width: 60%;">
            <div>
                <h4 class="mb-0">Выберите дату</h4>
                <input type="date" id="date" name="date" class="mt-4" min="<?php echo date("20y-m-d") ?>">
            </div>
            <div id="timeContainer" style="display: none">
                <h4 class="mb-0">Выберите время</h4>
                <select id="time" class="card__select mt-12">
                </select>
            </div>
        </div>
    <?php
        echo '<button type="submit" class="btn-reset btn-primary">Записаться</button>
                    </form>
                ';
    }
    echo '</div>';
    ?>
</div>

<script src="/js/global.js"></script>
<script src="/js/barber.js"></script>