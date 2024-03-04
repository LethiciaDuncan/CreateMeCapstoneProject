<?php

include_once "../Backend/DbConnecter.php";

header('Content-Type: application/json');

$userId = $_SESSION['UserProfileId'];
$dbConn = ConnGet();
$myJSON = "";

$dataset2 = getUser($dbConn, $userId);
//getting user information
if ($row2 = mysqli_fetch_array($dataset2)) {
    $myJSON = '[{"Id":"' . $userId . '","Username":"' . $row2['Username'] . '","Password":"' . $row2['Password'] . '","Bio":"' . $row2['Bio'] . '"}]';


    header("Location: ../UserProfile.php");
    echo $myJSON;
} else {
    mysqli_close($dbConn);
}
?>