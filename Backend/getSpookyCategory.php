<?php

include_once "../Backend/DbConnecter.php";


header('Content-Type: application/json');




if ($_SESSION['signedIn'] == True) {
    $dbConn = ConnGet();
    $Spooky = array();
    $Category = "Spooky";
    if ($Category == "Spooky") {

        $dataset = getCertainCreations($dbConn, $Category);

        //getting the path for the images
        while ($row = mysqli_fetch_array($dataset)) {
            $Spooky[] = $row['CreationPath'];
        }
    }

    mysqli_close($dbConn);
    //echo json_encode($myCategories);
    echo json_encode($Spooky);

}
?>