<?php

include('../admin/function/connexion_bdd.php');
include('../admin/function/convert_tab.php');

$text="";

    $date = date("Y-m-d");


    $get_commande = $bdd -> query("SELECT * FROM comande WHERE date_commande = '$date' AND idEtatCommande = 1 ORDER BY id DESC");

    if ($get_commande->rowCount() != 0){
        $text .= "<h2>En cours</h2>";
        while($commande = $get_commande->fetch()){
            $get_optionpaiement = $bdd -> query("SELECT * FROM optionpaiment");
            $text .="
                    <div class='commande_list'>
                        <div class='bon_commande'>
                            <h2>Bon de commande</h2>
                            <table>
                                <tr class='number_com'> 
                                    <th colspan='4'>N° <span>".$commande['id']."</span></th>
                                </tr>
                                <tr>
                                    <th>Nom du plat</th>
                                    <th>Quantité</th>
                                    <th>Prix unité</th>
                                    <th>Montant</th>
                                </tr>
     ";
    $total = 0;
    $tab = convert_tab( $commande["commande"] );
    foreach ($tab as $elt) {
        $get_plat = $bdd -> prepare("SELECT * FROM menu WHERE id = :id");
        $get_plat->execute(array(
            "id" => $elt[0]
        ));
    while ($plat = $get_plat->fetch()){
        $text.="
                                <tr>
                                    <td>".$plat["nomPlat"]."</td>
                                    <td>". $elt[1]."</td>
                                    <td>". $plat["prix"]."</td>
                                    <td>".$plat["prix"]*$elt[1]."</td>
                                </tr>
                ";  
    $total += $plat["prix"]*$elt[1];  
    }   
    }
    $text .="
                                <tr class='total'>
                                    <th colspan='3' >TOTAL:</th>
                                    <th colspan='1'>".$total." F FCA</th>
                                </tr>
                            </table>
                        </div>

                        <div class='infoclient'>
                            <h2>Bon de livraison</h2>
                            <h3>Nom du client: <span>".$commande["nomClient"]."</span></h3>
                            <h3>Adresse: <span>".$commande["adresseClient"]."</span></h3>
                            <h3>Contact: <span>".$commande["numeroClient"]."</span></h3>
                            <h3>mode de paiement: <span>";
                             while ($optionpaiement = $get_optionpaiement->fetch()){ if ($optionpaiement["id"] == $commande["idOptionPaiement"]){$text .=$optionpaiement["optionP"]; }}
                             $text .=" </span></h3>
                        </div>
                        <div class='etat_commande'>
                            <input type='submit' name='submit'  class='button' value='annuler' onClick='confirme_action(".$commande['id'].", 0)' />
                            <input type='submit' name='submit'  class='button' value='terminer'onClick='confirme_action(".$commande['id'].", 1)' />
                        </div>

                    </div>
    ";
        }
    }

    $get_commande = $bdd -> query("SELECT * FROM comande WHERE date_commande = '$date' AND idEtatCommande = 2 ORDER BY id DESC");

    if ($get_commande->rowCount() != 0){
        $text .="<h2> Terminés </h2>";
        while($commande = $get_commande->fetch()){
            $get_optionpaiement = $bdd -> query("SELECT * FROM optionpaiment");
            $text .="
                    <div class='commande_list'>
                        <div class='bon_commande'>
                            <h2>Bon de commande</h2>
                            <table>
                                <tr class='number_com'> 
                                    <th colspan='4'>N° <span>".$commande['id']."</span></th>
                                </tr>
                                <tr>
                                    <th>Nom du plat</th>
                                    <th>Quantité</th>
                                    <th>Prix unité</th>
                                    <th>Montant</th>
                                </tr>
     ";
    $total = 0;
    $tab = convert_tab( $commande["commande"] );
    foreach ($tab as $elt) {
        $get_plat = $bdd -> prepare("SELECT * FROM menu WHERE id = :id");
        $get_plat->execute(array(
            "id" => $elt[0]
        ));
    while ($plat = $get_plat->fetch()){
        $text.="
                                <tr>
                                    <td>".$plat["nomPlat"]."</td>
                                    <td>". $elt[1]."</td>
                                    <td>". $plat["prix"]."</td>
                                    <td>".$plat["prix"]*$elt[1]."</td>
                                </tr>
                ";  
    $total += $plat["prix"]*$elt[1];  
    }   
    }
    $text .="
                                <tr class='total'>
                                    <th colspan='3' >TOTAL:</th>
                                    <th colspan='1'>".$total." F FCA</th>
                                </tr>
                            </table>
                        </div>

                        <div class='infoclient'>
                            <h2>Bon de livraison</h2>
                            <h3>Nom du client: <span>".$commande["nomClient"]."</span></h3>
                            <h3>Adresse: <span>".$commande["adresseClient"]."</span></h3>
                            <h3>Contact: <span>".$commande["numeroClient"]."</span></h3>
                            <h3>mode de paiement: <span>";
                             while ($optionpaiement = $get_optionpaiement->fetch()){ if ($optionpaiement["id"] == $commande["idOptionPaiement"]){$text .=$optionpaiement["optionP"]; }}
                             $text .=" </span></h3>
                        </div>
                    </div>
    ";

        }
    }

    $get_commande = $bdd -> query("SELECT * FROM comande WHERE date_commande = '$date' AND idEtatCommande = 3 ");

    if ($get_commande->rowCount() != 0){
        $text .= "<h2>Annulés</h2>";
        while($commande = $get_commande->fetch()){
            $get_optionpaiement = $bdd -> query("SELECT * FROM optionpaiment");
            $text .="
                    <div class='commande_list'>
                        <div class='bon_commande'>
                            <h2>Bon de commande</h2>
                            <table>
                                <tr class='number_com'> 
                                    <th colspan='4'>N° <span>".$commande['id']."</span></th>
                                </tr>
                                <tr>
                                    <th>Nom du plat</th>
                                    <th>Quantité</th>
                                    <th>Prix unité</th>
                                    <th>Montant</th>
                                </tr>
     ";
    $total = 0;
    $tab = convert_tab( $commande["commande"] );
    foreach ($tab as $elt) {
        $get_plat = $bdd -> prepare("SELECT * FROM menu WHERE id = :id");
        $get_plat->execute(array(
            "id" => $elt[0]
        ));
    while ($plat = $get_plat->fetch()){
        $text.="
                                <tr>
                                    <td>".$plat["nomPlat"]."</td>
                                    <td>". $elt[1]."</td>
                                    <td>". $plat["prix"]."</td>
                                    <td>".$plat["prix"]*$elt[1]."</td>
                                </tr>
                ";  
    $total += $plat["prix"]*$elt[1];  
    }   
    }
    $text .="
                                <tr class='total'>
                                    <th colspan='3' >TOTAL:</th>
                                    <th colspan='1'>".$total." F FCA</th>
                                </tr>
                            </table>
                        </div>

                        <div class='infoclient'>
                            <h2>Bon de livraison</h2>
                            <h3>Nom du client: <span>".$commande["nomClient"]."</span></h3>
                            <h3>Adresse: <span>".$commande["adresseClient"]."</span></h3>
                            <h3>Contact: <span>".$commande["numeroClient"]."</span></h3>
                            <h3>mode de paiement: <span>";
                             while ($optionpaiement = $get_optionpaiement->fetch()){ if ($optionpaiement["id"] == $commande["idOptionPaiement"]){$text .=$optionpaiement["optionP"]; }}
                             $text .=" </span></h3>
                        </div>
                    </div>
    ";

        }
    }

$result = ["msg" => $text];

echo json_encode($result);



?>
