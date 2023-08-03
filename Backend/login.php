
<?php
include_once "../Backend/DbConnecter.php";

header('Content-Type: application/json');


$adminUsername = "admin";
$adminPassword = "admin";


$username = $_POST['Username'];
$password = $_POST['Password'];



if($username == $adminUsername && $password == $adminPassword){
    $_SESSION['signedIn']=True;
    $_SESSION['signedInAdmin']= True;
    header("Location: ../Admin.php?alreadyTriedP=1");
}else{

    $myDbConn = ConnGet();

    $dataSet = checkifUserExists($myDbConn, $username);

    if (mysqli_num_rows($dataSet) != null){

        if($row = mysqli_fetch_array($dataSet)) {
            $storedPassword = $row['Password'];
            if($password == $storedPassword){
                $_SESSION['signedIn']=True;
                $_SESSION['UserId']= $row['UserId'];
                mysqli_close($myDbConn);
                header("Location: ../Profile.php");
            }else{
                mysqli_close($myDbConn);
                header("Location: ../login.php?alreadyTriedP=1");
            }
        }
    }else{
        mysqli_close($myDbConn);
        header("Location: ../login.php?alreadyTriedU=1");
    }
}


?>