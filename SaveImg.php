<?php
if(isset($_Post['imgUrl'])) {
    $imgUrl = $_Post['imgURL'];

    $imageData = str_replace('data:image/png;base64,', '', $imgUrl);

    $imageDataDecoded = base64_decode($imageData);

    $path = 'Creation/';

    $filename = $path . 'image_' . uniqid() . '.png';

    if(file_put_contents($filename, $imageDataDecoded)){
        echo 'Image saved';
    }else{
        echo 'error saving image';
    }
}
?>