<?php
session_start();


$imageData = $_POST['imgData'];

$imageData2 = base64_decode($imageData);

$_SESSION['imagePath'] = $imageData2;

?>
