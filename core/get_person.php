<?php
require_once 'connect.php'; // "Импорт" содержимого файла со строкой подключения

$id = $_POST["id"];
$abonnements = [];

$query = "SELECT * FROM `persons` WHERE `id`='$id'";

$result = mysqli_query($connect, $query);
$row = mysqli_fetch_assoc($result);

$query = "SELECT * FROM `abonnements` WHERE `person_id`='$id'";
$result = mysqli_query($connect, $query);

while ($r = mysqli_fetch_assoc($result)){
    $abonnements[] = $r;
}

$response = [ // Создание JSON
    "status" => true,
    "fname" => $row["first_name"],
    "fatname" => $row["father_name"],
    "sname" => $row["second_name"],
    "birthday" => $row["birthday"],
    "abonnements" => $abonnements,
];
echo json_encode($response); // Отправка JSON на страницу