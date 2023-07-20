<?php
include_once "DbConnector.php";

header('Content-Type: application/json');


$adminUsername = "admin";
$adminPassword = "password";


$Username = $_POST['Username'];
$Password = $_POST['Password'];



if ($Username == $adminUsername && $Password == $adminPassword) {
    $_SESSION['signedIn'] = True;
    $_SESSION['signedInAdmin'] = True;
    header("Location: ../Admin.php?alreadyTriedP=1");
} else {

    $myDbConn = ConnGet();

    $dataSet = checkifUserExists($myDbConn, $Username);

    if (mysqli_num_rows($dataSet) != null) {

        if ($row = mysqli_fetch_array($dataSet)) {
            $storedPassword = $row['Password'];
            if ($Password == $storedPassword) {
                $_SESSION['signedIn'] = True;
                $_SESSION['UserId'] = $row['UserId'];
                mysqli_close($myDbConn);
                header("Location: ../Profile.php");
            } else {
                mysqli_close($myDbConn);
                header("Location: ../login.php?alreadyTriedP=1");
            }
        }
    } else {
        mysqli_close($myDbConn);
        header("Location: ../login.php?alreadyTriedU=1");
    }
}


?>