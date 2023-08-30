<?php

include_once "../Backend/DbConnecter.php";


header('Content-Type: application/json');




if ($_SESSION['signedIn'] == True) {
    $dbConn = ConnGet();
    $Cute = array();
    $Category = "Cute";
    if ($Category == "Cute") {

        $dataset = getCertainCreations($dbConn, $Category);

        //getting the path for the images
        while ($row = mysqli_fetch_array($dataset)) {
            $Cute[] = $row['CreationPath'];
        }
    }

    mysqli_close($dbConn);
    //echo json_encode($myCategories);
    echo json_encode($Cute);

}
?>