<?php

require_once('db.php');

$title = trim($_POST['title']);
$description = trim($_POST['description']);
$price = trim($_POST['price']);

$imgSize = $_FILES['image']['size'];

$uploadDir = '../../images/';
$image = $uploadDir . basename($_FILES['image']['name']);

$fileExtension = pathinfo($image, PATHINFO_EXTENSION);

$allowedExtension = ['jpg', 'jpeg', 'png', 'bmp'];

if (in_array($fileExtension, $allowedExtension)) {
    if (move_uploaded_file($_FILES['image']['tmp_name'], $image . time())) {
        $sql = 'INSERT INTO `service`(`title`, `description`, `img`, `price`) VALUES (:t, :d, :i, :p)';
        $query = $connect->prepare($sql);
        $result = $query->execute(['t' => $title, 'd' => $description, 'i' => $image . time(), 'p' => $price]);
        if ($result) {
            echo 'Добавление услуги успешно';
        } else {
            echo 'Неудалось добавить услугу';
        }
    } else {
        echo 'Возможная атака с помощью файловой загрузки!';
    }
} else {
    echo 'Недопустимое расширение картинки';
}
