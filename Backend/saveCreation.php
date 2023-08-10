<?php

include_once "DbConnector.php";

header('Content-Type: application/json');




if ($_SESSION['signedIn'] == True) {
    $myDbConn = ConnGet();
    $UserId = $_SESSION['UserId'];
    $CreationPath = $_GET['CreationPath'];
    $Catergory = $_GET['Catergory'];

    $dataset = saveCreation($myDbConn, $userId, $CreationPath, $Catergory);




    if ($dataset) {
        mysqli_close($myDbConn);
        echo True;
    } else {
        mysqli_close($myDbConn);

        //send them back 
        header("Location: ../index.php");
    }

}


?>