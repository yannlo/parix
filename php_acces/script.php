<?php

$bdd = new PDO('mysql:host=localhost;dbname=parixproject','yannlo','', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

$message="";
$success = 0;
$msg="Une erreur de traitement est survenue...";

if(!empty($_POST["nomComplet"]) AND !empty($_POST["date"]) AND !empty($_POST["heure"]) AND  !empty($_POST["contact"]) ){

    $nomComplet = htmlspecialchars($_POST["nomComplet"]);
    $date = preg_replace('#([0-9]{2})/([0-9]{2})/([0-9]{4})#',"$1-$2-$3",$_POST["date"]);
    $heure = $_POST["heure"];
    $contact = htmlspecialchars($_POST["contact"]);

    if(strlen($_POST["nomComplet"]) < 60){
        
        if (empty($_POST["message"])){


            $request = $bdd -> prepare("INSERT INTO reservation (nomComplet,date_reservation,heure,contact) VALUES (:nomComplet, :date_reservation, :heure, :contact ) ");
            $request -> execute(array(
    
                "nomComplet" => $nomComplet,
                "date_reservation" => $date,
                "heure" => $heure,
                "contact" => $contact
            ));
            
            $msg="Votre reservation a bien été prise en compte";
    
    
            
    
    
            }else if (!empty($_POST["message"])){

                $message=htmlspecialchars($_POST["message"]);

                $request = $bdd -> prepare("INSERT INTO reservation (nomComplet,date_reservation,heure,contact, messages) VALUES (:nomComplet, :date_reservation, :heure, :contact, :messages) ");
                $request -> execute(array(
        
                    "nomComplet" => $nomComplet,
                    "date_reservation" => $date,
                    "heure" => $heure,
                    "contact" => $contact,
                    "messages" => $message
                ));

                
                $msg="Votre reservation a bien été prise en compte <br/>Le message a bien été envoyer";
            }



    }
    else
    {
        $msg="Le nom entrer contient trop de caractère";
    }

}else{
    $msg="Veillez remplir tout les champs obligatoires";
}






$res=["success"=> $success, "msg"=> $msg, "message"=>$message];

echo(json_encode($res));


?>