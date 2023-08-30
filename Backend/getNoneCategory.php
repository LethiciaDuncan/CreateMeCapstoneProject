<?php

include_once "../Backend/DbConnecter.php";


header('Content-Type: application/json');




if ($_SESSION['signedIn'] == True) {
    $dbConn = ConnGet();
    $None = array();
    $Category = "None";
    if ($Category == "None") {

        $dataset = getCertainCreations($dbConn, $Category);

        //getting the path for the images
        while ($row = mysqli_fetch_array($dataset)) {
            $None[] = $row['CreationPath'];
        }
    }

    mysqli_close($dbConn);
    //echo json_encode($myCategories);
    echo json_encode($None);

}
?>