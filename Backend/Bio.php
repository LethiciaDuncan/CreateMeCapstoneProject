<?php
include_once "../Backend/DbConnecter.php";

header('Content-Type: application/json');

$bio = $_POST['Bio'];


$myDbConn = ConnGet();

$UserId = $_SESSION['UserId'];



if ($_SESSION['signedIn'] == True) {

    updateBio($myDbConn, $UserId, $bio);
    mysqli_close($myDbConn);
    header("Location: ../Profile.php");
    echo ("bio updated");
} else {
    mysqli_close($myDbConn);
    header("Location: ../Profile.php");
    echo ("Can not update bio");
}

?>