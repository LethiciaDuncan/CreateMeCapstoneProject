<?php
include_once "../Backend/DbConnecter.php";


header('Content-Type: application/json');

$userId = $_SESSION["searchedUserId"];


if ($_SESSION['signedIn'] == True) {
    $dbConn = ConnGet();
    $dataset = getUserCreation($dbConn, $userId);
    $imagePath = array();


    // getting the path for the images
    while ($row = mysqli_fetch_array($dataset)) {
        $imagePath[] = $row['CreationPath'];
    }


    mysqli_close($dbConn);
    echo json_encode($imagePath);
} else {
    echo "Not signed in";
    mysqli_close($dbConn);


}
?>