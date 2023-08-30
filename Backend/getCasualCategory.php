<?php

include_once "../Backend/DbConnecter.php";


header('Content-Type: application/json');




if ($_SESSION['signedIn'] == True) {
    $dbConn = ConnGet();
    $Casual = array();
    $Category = "Casual";
        if ($Category == "Casual") {

                $dataset = getCertainCreations($dbConn, $Category);

                 //getting the path for the images
            while ($row = mysqli_fetch_array($dataset)) {
            $Casual[] = $row['CreationPath'];
            }
        }

    mysqli_close($dbConn);
    //echo json_encode($myCategories);
    echo json_encode($Casual);

}
?>