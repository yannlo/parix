<?php


include('../admin/function/connexion_bdd.php');

$success = 0;
$msg = '';
if(!empty($_POST["table"]) AND count(json_decode($_POST["table"])) != 0 ){
    

    $table =$_POST["table"];



    // echo("tableau no vide \n");

    if (!empty($_POST["nomComplete"]) AND !empty($_POST["phone"]) AND !empty($_POST["adresse"]) AND !empty($_POST["paiement"])) {
        
        $nom = htmlspecialchars($_POST["nomComplete"]);
        $phone = htmlspecialchars($_POST["phone"]);
        $adresse = htmlspecialchars($_POST["adresse"]);
        $paiement = (int) $_POST["paiement"];
        
        // echo("formulaire correctement saisie \n");
        
        // foreach ($table as $key) {
        //     $key[1] = (int) $key[1];
        // }
        
        $add_command = $bdd -> prepare("INSERT INTO comande (commande,nomClient,numeroClient,adresseClient,idOptionPaiement, idEtatCommande,date_commande) VALUES (:commande, :nomClient, :numeroClient, :adresseClient, :idOptionPaiement,  :idEtatCommande,:date_commande) ");
        $add_command -> execute(array(
            "commande"=>$table,
            "nomClient"=> $nom,
            "numeroClient"=> $phone,
            "adresseClient"=> $adresse,
            "idOptionPaiement"=> $paiement,
            "idEtatCommande"=> 1,
            "date_commande"=>date("Y-m-d")
        ));



        $success = 1;
        $msg = 'Votre commande a parfaitement été enregisté. <br /> Nous vous contacterons pour la livraison';


    
    }else{
    $msg = 'Veuillez remplir tout les champs du formulaire';

    }


}else{
    $msg = 'Aucun plat n\'a été selectionné';
}


$result =["success"=>$success, "msg"=>$msg];

echo(json_encode($result));


?>