<?php
require_once 'connect.php'; // "Импорт" содержимого файла со строкой подключения

$id = $_POST["id"];

$query = "SELECT * FROM `persons` WHERE `id`='$id'";

$result = mysqli_query($connect, $query);
$row = mysqli_fetch_assoc($result);

$response = [ // Создание JSON
    "status" => true,
    "fname" => $row["first_name"],
    "fatname" => $row["father_name"],
    "sname" => $row["second_name"],
    "birthday" => $row["birthday"],
];
echo json_encode($response); // Отправка JSON на страницу