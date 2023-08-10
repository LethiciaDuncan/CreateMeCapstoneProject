<?php
    $imageData = $_POST['imgData'];

    $imageData = str_replace('data:image/png;base64,', '', $imageData);

    $imageData = base64_decode($imageData);

    $filename = uniqid() . '.png';

    $path = 'Creation/';

    $images = file_put_contents($path . $filename, $imageData);

$CreationPath = $_POST[$images];
?>