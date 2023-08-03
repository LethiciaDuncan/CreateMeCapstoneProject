<?php
include_once "../Backend/DbConnecter.php";

header('Content-Type: application/json');

$username = $_POST['Username'];
$password = $_POST['Password'];

$myDbConn = ConnGet();

$dataSet = checkifUserExists($myDbConn, $username);

if (mysqli_num_rows($dataSet) != 0) {
   header("Location: ../SignUp.php?UserAlreadyExists=1");


} else {
    addNewUser($myDbConn, $username, $password);
    mysqli_close($myDbConn);
    header("Location: ../Login.php?AddedUser=1");
}

?>