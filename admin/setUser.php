<?php
include_once "../config/functions.php";
goAwayIsNotAdmin("admin/index.php");

$id = $_GET['id'] ?? '';

if(is_numeric($id)){
setAsUser($id);
}
header('Location: users.php');

