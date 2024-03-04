<?php

include_once "../Backend/DbConnecter.php";

header('Content-Type: application/json');

$imagePath = $_POST['image'];
$dbConn = ConnGet();



$dataSet = checkifImageExists($dbConn, $imagePath);
if (mysqli_num_rows($dataSet) != null) {

    if ($row = mysqli_fetch_array($dataSet)) {
        $imageId = $row['ImageId'];
        deleteCreationFromOtherTable($dbConn,$imageId);
        deleteCreation($dbConn,$imageId);
        mysqli_close($dbConn);

    } else {
        mysqli_close($dbConn);
    }
} else {
    mysqli_close($dbConn);
}
?>