<?php

include_once "../Backend/DbConnecter.php";

header('Content-Type: application/json');


$imageData = $_POST['image'];

    $imagePath = base64_decode($imageData);

    $dbConn = ConnGet();
    $UserId = $_SESSION['UserId'];


    $dataSet = checkifImageExists($dbConn, $imagePath);
    if (mysqli_num_rows($dataSet) != null){

            if ($row = mysqli_fetch_array($dataSet)) {
                $imageId = $row['ImageId'];
                $Likes = "true";
                $LikesNum++;
                addToLikes($dbConn,$imageId,$UserId,$Likes,$LikesNum);
                 mysqli_close($dbConn);
                 header("Location: ../home.php?Added=1");

            }else{
                mysqli_close($dbConn);
                header("Location: ../home.php?CanNotAdd=1");
            }
    }else{
            mysqli_close($dbConn);
    }
?>