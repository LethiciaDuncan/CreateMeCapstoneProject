<?php
include_once "../Backend/DbConnecter.php";

header('Content-Type: application/json');


$imagePath = $_POST['image'];
$dbConn = ConnGet();
$UserId = $_SESSION['UserId'];
$myJSON = "";


$dataSet = checkifImageExists($dbConn, $imagePath);
if (mysqli_num_rows($dataSet) != null) {

    if ($row = mysqli_fetch_array($dataSet)) {
        $myJSON = '[{"Name":"' . $row['Name'] . '"}]';



    } else {
        mysqli_close($dbConn);
    }

    echo $myJSON;
} 
?>