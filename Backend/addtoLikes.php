<?php

include_once "../Backend/DbConnecter.php";

header('Content-Type: application/json');


$imagePath = $_POST['image'];
$dbConn = ConnGet();
$UserId = $_SESSION['UserId'];


$dataSet = checkifImageExists($dbConn, $imagePath);
if (mysqli_num_rows($dataSet) != null) {

    if ($row = mysqli_fetch_array($dataSet)) {
        $imageId = $row['ImageId'];
        $dataSet2 = checkIfAlreadyLiked($dbConn,$UserId ,$imageId);
        if (mysqli_num_rows($dataSet2) == null) {
            $Likes = 1;
            $LikesNum++;
            addToLikes($dbConn, $imageId, $UserId, $Likes, $LikesNum);
            mysqli_close($dbConn);
            header("Location: ../Home.php?Added=1");
        }else{

            $LikesNum ++;
            updateLikes($dbConn, $UserId, $imageId, $LikesNum);
            mysqli_close($dbConn);
        }


    } else {
        mysqli_close($dbConn);
    }
} else {
    mysqli_close($dbConn);
}
?>