<?php


$bdd = new PDO('mysql:host=localhost;dbname=parixproject','yannlo','', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

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
        
        $add_command = $bdd -> prepare("INSERT INTO comande (commande,nomClient,numeroClient,adresseClient,idOptionPaiement, idEtatCommande) VALUES (:commande, :nomClient, :numeroClient, :adresseClient, :idOptionPaiement,  :idEtatCommande ) ");
        $add_command -> execute(array(
            "commande"=>$table,
            "nomClient"=> $nom,
            "numeroClient"=> $phone,
            "adresseClient"=> $adresse,
            "idOptionPaiement"=> $paiement,
            "idEtatCommande"=> 0
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