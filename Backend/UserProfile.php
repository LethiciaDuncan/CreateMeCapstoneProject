<?php
include_once "../Backend/DbConnecter.php";

header('Content-Type: application/json');


$imagePath = $_POST['image'];
$dbConn = ConnGet();

$dataset = checkifImageExists($dbConn, $imagePath);
if (mysqli_num_rows($dataset) == null) {
    mysqli_close($dbConn);
}else{
    if ($row = mysqli_fetch_array($dataset)) {
        $userId = $row['UserId'];
        $_SESSION['UserProfileId'] = $userId;

        mysqli_close($dbConn);
        header("Location: ../UserProfile.php");
    } else {
        mysqli_close($dbConn);

    }
}
?>