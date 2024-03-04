<?php
include_once "../Backend/DbConnecter.php";

header('Content-Type: application/json');

$name = $_POST['Name'];


$dbConn = ConnGet();



$dataSet = searchUsers($dbConn, $name);
if (mysqli_num_rows($dataSet) == null) {
    header("Location: ../Home.php?NotFound=1");

} else {

    $_SESSION['Name']= $name;


        mysqli_close($dbConn);
        header("Location: ../searchPage.php");
    echo $newName;

    }



?>