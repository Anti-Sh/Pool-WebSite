<?
require_once 'connect.php'; // "Импорт" содержимого файла со строкой подключения

$email = $_POST['email']; // Взятие значения из POST
$password = $_POST['password'];  // Взятие значения из POST
$password_confirm = $_POST['password_confirm'];  // Взятие значения из POST

$error_fields = [];  // Незаполненные поля

if ($email === '') $error_fields[] = 'remail'; // Проверка полей на пустоту
if ($password === '') $error_fields[] = 'rpassword'; // Проверка полей на пустоту
if ($password_confirm === '') $error_fields[] = 'rpassword-confirm'; // Проверка полей на пустоту

if (!empty($error_fields)) { // Проверка на наличие пустых полей
    $response = [ // Создание JSON
        "status" => false,
        "message" => "Все поля должны быть заполнены!",
        "fields" => $error_fields
    ];
    echo json_encode($response); // Отправка JSON на страницу
    die(); // Прекращение выполнения кода
}
if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){ // Проверка почты на валидность
    $error_fields[] = 'remail'; 
    $response = [ // Создание JSON
        "status" => false,
        "message" => "Укажите существующую почту!",
        "fields" => $error_fields
    ];
    echo json_encode($response); // Отправка JSON на страницу
    die(); // Прекращение выполнения кода
}
if ($password !== $password_confirm){
    $error_fields[] = 'rpassword';
    $error_fields[] = 'rpassword-confirm';
    $response = [ // Создание JSON
        "status" => false,
        "message" => "Пароли не совпадают!",
        "fields" => $error_fields
    ];
    echo json_encode($response); // Отправка JSON на страницу
    die(); // Прекращение выполнения кода
}
if (strlen($password) < 6){
    $error_fields[] = 'rpassword';
    $response = [ // Создание JSON
        "status" => false,
        "message" => "Длина пароля не может быть меньше 6 символов!",
        "fields" => $error_fields
    ];
    echo json_encode($response); // Отправка JSON на страницу
    die(); // Прекращение выполнения кода
}

$check_email = mysqli_query($connect, "SELECT * FROM `users` WHERE `email` = '$email'");

if (mysqli_num_rows($check_email) > 0) $msg = "Пользователь с такой почтой уже зарегистрирован!";

if (!empty($msg)){
    $response = [ // Создание JSON
        "status" => false,
        "message" => $msg
    ];
    echo json_encode($response); // Отправка JSON на страницу
    die(); // Прекращение выполнения кода
}

$insert_query = "INSERT INTO `users`(`id`, `email`, `password`) VALUES (NULL,'$email','$password')";
mysqli_query($connect, $insert_query);

$response = [ // Создание JSON
    "status" => true,
    "message" => "Аккаунт зарегистрирован. Авторизируйтесь"
];
echo json_encode($response); // Отправка JSON на страницу

