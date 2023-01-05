<?
require_once "connect.php";

$person_id = $_POST["person_id"];
$tarrif_id = $_POST["tarrif_id"];
$isGroup = $_POST["isGroup"];
$section_id = $_POST["section_id"];
$start_date = $_POST["start_date"];

if ($isGroup == 0){
    $section_id = "NULL";
}

$query = mysqli_query($connect, "SELECT `days` FROM `tariffs` WHERE `id`='$tarrif_id'");
$days_q = mysqli_fetch_assoc($query);
$days = $days_q["days"];

$sd_arr = explode('-', $start_date);
$end_date = date('Y-m-d', mktime(0, 0, 0, $sd_arr[1], intval($sd_arr[2]) + intval($days), $sd_arr[0]));

$query = "INSERT INTO `abonnements`(`id`, `person_id`, `isGroup`, `section_id`, `tariff_id`, `start_date`, `end_date`) VALUES (NULL,'$person_id','$isGroup', $section_id,'$tarrif_id','$start_date','$end_date')";
mysqli_query($connect, $query);

$response = [ // Создание JSON
    "status" => true,
    "message" => "Абонемент создан. Ожидайте, с вами свяжется менеджер по указанному почтовому адресу!"
];
echo json_encode($response); // Отправка JSON на страницу