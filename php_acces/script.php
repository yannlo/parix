<?php

$success =0;
$msg="Une erreur de traitement est survenue...";

if(!empty($_POST["nomComplet"]) AND !empty($_POST["date"]) AND !empty($_POST["heure"]) AND  !empty($_POST["contact"]) ){

    $nomComplet = htmlspecialchars($_POST["nomComplet"]);
    $date = preg_replace('#([0-9]{4})-([0-9]{2})-([0-9]{2})#',"$3/$2/$1",$_POST["date"]);
    $heure = $_POST["heure"];
    $contact = htmlspecialchars($_POST["contact"]);
    $message = htmlspecialchars($_POST["message"]);

    if(strlen($_POST["nomComplet"]) < 60){
        


        if (!empty($_POST["message"]) AND strlen($_POST["message"]) < 255){


            // traitement



            $success =1;
            $msg="Votre reservation a bien été enregistré";

        }
        else if(!empty($_POST["message"])){
            $msg="Le message doit contenir main de 255 caractères";
        }else{
                    // traitement


            $success =1;
            $msg="Votre reservation a bien été enregistré";
        }

    }else{
        $msg="Le nom entrer contient trop de caractère";
    }

}else{
    $msg="Veillez remplir tout les champs obligatoires";
}






$res=["success"=> $success, "msg"=> $msg];

echo(json_encode($res));


?>