<?php
require_once 'connect.php'; // "Импорт" содержимого файла со строкой подключения

$sname = $_POST['sname']; // Взятие значения из POST
$fname = $_POST['fname'];  // Взятие значения из POST
$fatname = $_POST['fatname'];  // Взятие значения из POST
$birthday = $_POST['birthday'];  // Взятие значения из POST
$author_id = $_SESSION['user']['id'];

if ($sname === '' ||  $fname === '' || $birthday === '') {
    $response = [ // Создание JSON
        "status" => false,
        "message" => "Все поля (кроме \"Отчество\") должны быть заполнены!"
    ];
    echo json_encode($response); // Отправка JSON на страницу
    die(); // Прекращение выполнения кода
}

$query = "INSERT INTO `persons`(`id`, `first_name`, `father_name`, `second_name`, `birthday`, `created_by`) VALUES (NULL,'$fname','$fatname','$sname','$birthday','$author_id')";
mysqli_query($connect, $query);

$response = [ // Создание JSON
    "status" => true,
    "message" => "Личность создана!"
];
echo json_encode($response); // Отправка JSON на страницу