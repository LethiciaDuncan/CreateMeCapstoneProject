<?php
include_once "../Backend/DbConnecter.php";


header('Content-Type: application/json');


if ($_SESSION['signedIn'] == True) {
    $dbConn = ConnGet();
    $UserId = $_SESSION['UserId'];
    $dataset = getUserCreation($dbConn, $UserId);
    $name = array();


    // getting the path for the images
    while ($row = mysqli_fetch_array($dataset)) {
        $name[] = $row['Name'];
    }


    mysqli_close($dbConn);
    echo json_encode($name);
} else {
    echo "Not signed in";
    mysqli_close($dbConn);


}