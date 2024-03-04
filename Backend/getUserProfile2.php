<?php

include_once "../Backend/DbConnecter.php";

header('Content-Type: application/json');

$userId = $_SESSION['UserProfileId'];
$dbConn = ConnGet();
$myJSON = "";

$dataset = getUser($dbConn, $userId);
//getting user information
if ($row = mysqli_fetch_array($dataset)) {
    $myJSON = '[{"Id":"' . $userId . '","Username":"' . $row['Username'] . '","Password":"' . $row['Password'] . '","Bio":"' . $row['Bio'] . '"}]';

} else {


    header("Location: ../UserProfile.php");
}
mysqli_close($dbConn);

echo $myJSON;
?>