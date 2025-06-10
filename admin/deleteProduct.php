<?php
include_once "../config/functions.php";
goAwayIsNotAdmin("admin/index.php");

$id = $_POST['id'] ?? '';

if(is_numeric($id)){
deleteProduct($id);
}
header('Location: index.php');

