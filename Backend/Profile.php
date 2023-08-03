<?php

include_once "../Backend/DbConnecter.php";

header('Content-Type: application/json');



//checking for sesion then retriveing userId
if ($_SESSION['signedIn'] == True) {
    $myDbConn = ConnGet();
    $userId = $_SESSION['UserId'];
    $dataset = getUser($myDbConn, $userId);
    $myJSON = "";

//getting user information
    if ($row = mysqli_fetch_array($dataset)) {
        $myJSON = '[{"Id":"' . $userId . '","Username":"' . $row['Username'] . '","Password":"' . $row['Password'] . '"}]';

    } else {

        //send them back and alert them they used the wrong password
        header("Location: ../index.php");
    }
    mysqli_close($myDbConn);

    echo $myJSON;
}