<?
require_once "connect.php";

$person_id = $_POST["person_id"];
$tarrif_id = $_POST["tarrif_id"];
$isGroup = $_POST["isGroup"];
$dpw = $_POST["dpw"];
$section_id = $_POST["section_id"];
$start_date = $_POST["start_date"];
$price = 300;

if($isGroup == "1"){
    $price = 400;
}
else{
    $section_id = "NULL";
}

$query = mysqli_query($connect, "SELECT `days`, `coefficient` FROM `tariffs` WHERE `id`='$tarrif_id'");
$days_q = mysqli_fetch_assoc($query);
$days = $days_q["days"];

if ($days == '1'){
    $cost = $price * floatval($days_q["coefficient"]);
}
else{
    $cost = $price * floatval($days_q["coefficient"]) * intdiv(intval($days), 7) * intval($dpw);
}

$sd_arr = explode('-', $start_date);
$end_date = date('Y-m-d', mktime(0, 0, 0, $sd_arr[1], intval($sd_arr[2]) + intval($days), $sd_arr[0]));

$query = "INSERT INTO `abonnements`(`id`, `person_id`, `isGroup`, `section_id`, `tariff_id`, `days_per_week`, `start_date`, `end_date`, `cost`) VALUES (NULL,'$person_id','$isGroup', $section_id, '$tarrif_id', '$dpw','$start_date','$end_date', '$cost')";
mysqli_query($connect, $query);

$response = [ // Создание JSON
    "status" => true,
    "message" => "Абонемент создан. Стоимость " . $cost . ". Ожидайте, с вами свяжется менеджер по адресу " . $_SESSION["user"]["email"] . " для согласования способа оплаты!"
];
echo json_encode($response); // Отправка JSON на страницу