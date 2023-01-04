<?php
require_once "connect.php";

$id = $_POST["id"];

$query = "DELETE FROM `persons` WHERE `id` = '$id'";

mysqli_query($connect, $query);