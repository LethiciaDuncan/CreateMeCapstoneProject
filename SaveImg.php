<?php
session_start();

$imageData = $_POST['imgData'];

$imageData = str_replace('data:image/png;base64,', '', $imageData);

$imageData = base64_decode($imageData);

$filename = uniqid() . '.png';

$path = 'Creation/' . $filename;

file_put_contents($path, $imageData);


$_SESSION['CreationPath'] = $path;



?>
