<?php
include_once "../config/functions.php";

goAwayIsNotAdmin("admin/index.php");

$id = $_POST['id'] ?? '';

if(is_numeric($id)){
unDeleteProduct($id);
}

header('Location: index.php');

if (!isLogged()) {
    header('Location: ../login.php');
} elseif (!isAdmin()) {
    header('Location: ../index.php');
}
