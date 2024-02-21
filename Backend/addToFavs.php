<?php

include_once "../Backend/DbConnecter.php";

header('Content-Type: application/json');


$imagePath = $_POST['image'];
$dbConn = ConnGet();
$UserId = $_SESSION['UserId'];


$dataSet = checkifImageExists($dbConn, $imagePath);
if (mysqli_num_rows($dataSet) != null) {

    if ($row = mysqli_fetch_array($dataSet)) {
        $imageId = $row['ImageId'];
        $Favs = 1;
        $FavsNum++;
        addToFavs($dbConn, $imageId, $UserId, $Favs, $FavsNum);
        mysqli_close($dbConn);
        header("Location: ../home.php?Added=1");

    } else {
        mysqli_close($dbConn);
    }
} else {
    mysqli_close($dbConn);
}
?>