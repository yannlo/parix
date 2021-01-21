<?php 

include("../admin/function/connexion_bdd.php ");

print_r($_POST);
if(!empty($_POST["submit"]) AND $_POST["action"]){

    echo($_POST["id_value"]);

    $upgrade_commande = $bdd -> prepare(" UPDATE comande SET idEtatCommande = :idEtatCommande WHERE id = :id ");
    if($_POST["action"] == "annuler"){
        $upgrade_commande -> execute(array(
            "idEtatCommande" => 3,
            "id" => $_POST["id_value"]
        ));
    }
    if($_POST["action"]== "terminer"){

        $upgrade_commande -> execute(array(
            "idEtatCommande" => 2,
            "id" => $_POST["id_value"]
        ));

    }

    header('Location: ../admin/commande.php');
    exit();


}


?>