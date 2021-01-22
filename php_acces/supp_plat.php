<?php

$success= 0;
$var= json_decode($_POST["var"]);


include('../admin/function/connexion_bdd.php');

foreach($var as $value){

    $verif_plat = $bdd-> query("SELECT * FROM menu WHERE id = $value ");
    $nom_photo="";
    while ($plat = $verif_plat->fetch()){
        if($plat['photoPlat'] != NULL) {
            $nom_photo = $plat['photoPlat'];
            unlink("../images/plats/$nom_photo");
            echo $nom_photo;
        }
    }
    $del_plat = $bdd-> query("DELETE FROM menu WHERE id = $value ");

    $success=1;

}

echo json_encode(["success"=>$success]);


?>