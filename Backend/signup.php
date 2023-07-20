<?php
include_once "DbConnector.php";

header('Content-Type: application/json');


$Username = $_POST['Username'];
$Password = $_POST['Password'];

$myDbConn = ConnGet();

$dataSet = checkifUserExists($myDbConn, $Username);

if (mysqli_num_rows($dataSet) != 0) {
    header("Location: ../SignUp.php?UserAlreadyExists=1");

} else {
    addNewUser($myDbConn, $Username, $Password);
    mysqli_close($myDbConn);
    header("Location: ../Login.php?AddedUser=1");
}

?>