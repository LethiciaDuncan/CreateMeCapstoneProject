<?php
session_start();

include_once "../Backend/DbConnecter.php";


header('Content-Type: application/json');


$Category = $_POST['Category'];
$Name = $_POST['Name'];

$dbConn = ConnGet();

if ($Category == null){
    $Category = "None";

    if ($_SESSION['signedIn'] == True) {
        $UserId = $_SESSION['UserId'];
        $CreationPath = $_SESSION['CreationPath'];

        saveCreation($dbConn, $UserId, $CreationPath, $Category, $Name);
        mysqli_close($dbConn);
        header("Location: ../Create.php");


    } else {
        mysqli_close($dbConn);
        header("Location: ../Create.php");
        echo ("Can not save you are not signed in");
    }
}else{
    if ($_SESSION['signedIn'] == True) {
        $UserId = $_SESSION['UserId'];
        $CreationPath = $_SESSION['CreationPath'];

        saveCreation($dbConn, $UserId, $CreationPath, $Category, $Name);
        mysqli_close($dbConn);
        header("Location: ../Create.php");


    } else {
        mysqli_close($dbConn);
        header("Location: ../Create.php");
        echo ("Can not save you are not signed in");
    }
}


?>