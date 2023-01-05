<?php
require_once 'connect.php'; // "Импорт" содержимого файла со строкой подключения

$id = $_POST["id"];

$query = "SELECT `a`.`id` AS `id`, `a`.`isGroup` AS `isGroup`, `t`.`name` AS `tariff`, `a`.`start_date` AS `start_date`, `a`.`end_date` AS `end_date` FROM `abonnements` `a` INNER JOIN `tariffs` `t` ON `t`.`id`=`a`.`tariff_id` WHERE `id`='$id'";

$result = mysqli_query($connect, $query);
$r = mysqli_fetch_assoc($result);

if ($r["isGroup"] == '1') {
    $query = "SELECT `a`.`id` AS `id`, `a`.`isGroup` AS `isGroup`, `ss`.`name` AS `section`, `t`.`name` AS `tariff`, `a`.`start_date` AS `start_date`, `a`.`end_date` AS `end_date` FROM `abonnements` `a` INNER JOIN `sport_sections` `ss` ON `ss`.`id`=`a`.`section_id` INNER JOIN `tariffs` `t` ON `t`.`id`=`a`.`tariff_id` WHERE `id`='$id'";
    $result = mysqli_query($connect, $query);
    $r = mysqli_fetch_assoc($result);
}

$response = [ // Создание JSON
    "status" => true,
    "abonemment" => $r,
];
echo json_encode($response); // Отправка JSON на страницу   