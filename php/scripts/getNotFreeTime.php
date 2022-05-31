<?php

require_once('db.php');

$date = $_POST['date'];
$master_id = $_POST['masterId'];

$sql = "SELECT `time` FROM `orders` WHERE `date` = :d AND `master_id` = :m";
$query = $connect->prepare($sql);
$query->execute(['d' => $date, 'm' => $master_id]);
$result = $query->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($result);
