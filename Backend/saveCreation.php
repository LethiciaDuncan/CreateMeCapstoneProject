<?php

include_once "../Backend/DbConnecter.php";


header('Content-Type: application/json');



$CreationPath = $_POST["CreationPath"];
$Category = $_POST['Category'];

$dbConn = ConnGet();


if ($_SESSION['signedIn'] == True) {
    $UserId = $_SESSION['UserId'];

    saveCreation($dbConn,$UserId ,$CreationPath, $Category);
    mysqli_close($dbConn);
    header("Location: ../Create.php");


}else{
    mysqli_close($dbConn);
    header("Location: ../Create.php");
    echo("Can not save you are not signed in");
}


?>