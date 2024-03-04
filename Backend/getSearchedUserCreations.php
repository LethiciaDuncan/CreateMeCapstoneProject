<?php
include_once "../Backend/DbConnecter.php";

header('Content-Type: application/json');


$dbConn = ConnGet();

$name = $_SESSION['Name'];



$dataSet = searchUsers($dbConn, $name);
if (mysqli_num_rows($dataSet) == null) {
    header("Location: ../Home.php?NotFound=1");

} else {
    if ($row = mysqli_fetch_array($dataSet)) {
        $userId = $row['UserId'];
        $username = $name;
        $dataset2 = getUser($dbConn, $userId);
        $myJSON = "";

        //getting user information
        if ($row = mysqli_fetch_array($dataset2)) {
            $myJSON = '[{"Id":"' . $userId . '","Username":"' . $name  . '"}]';
           $_SESSION["searchedUserId"] = $userId;
        } else {
            header("Location: ../home.php");
        }

        mysqli_close($dbConn);
        echo $myJSON;
    } else {
        mysqli_close($dbConn);
    }

}



?>