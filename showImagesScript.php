<?php

$id = $_GET['id'] ?? null;
if(!$id){
    header("Location: ../error.php");
}
header("Content-type: image/png");

$file = "images/products/$id.png";

$size = filesize($file);
header("Content-length: $size bytes");
readfile($file);