<?php
    include('function/connexion_bdd.php');
    include('function/verified_session.php');
    include('function/acces_admin_verification.php');

?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Reservation - Parix</title>
        <link rel="shortcut icon" href="#" type="image/x-icon">
        <link rel="stylesheet" href="../style.css" type="text/css" />
        <link rel="stylesheet" href="style.css" type="text/css" />
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;1,400&display=swap" rel="stylesheet" />
    </head>
    <body>
        <?php include("header.php"); ?>

        <div class="center">
            <section id="reserved">
                <h1>Réservation</h1>
                <div class="group">
                    <h2>Aujourd'hui</h2>
                    <div id="today">
                    <?php 
                        $get_reservation_to_date = $bdd-> prepare("SELECT * FROM reservation WHERE date_reservation = :val1  ORDER BY heure DESC ");
                        $get_reservation_to_date->execute(array(
                            "val1"=> date('y-m-d')
                        ));

                        while ($row = $get_reservation_to_date->fetch()){
                    ?>


                                            <div class="info_reserved">
                                                <h3 >Nom du client: </h3>
                                                <p class="nom"><?php echo($row['nomComplet']);?></p>
                                                <h3 >Heure: </h3>
                                                <p class="date"><?php echo($row['heure']);?></p>
                                                <h3 >Contact: </h3>
                                                <p class="contact"><?php echo($row['contact']);?></p>
                    <?php 
                    if($row['messages']!== NULL){

                    ?>
                                                <h3 >message: </h3>
                                                <p class="message"><?php echo($row['messages']);?></p>
                                            
                    <?php
                    };?>
                    </div>
                    <?php
                        }

                    ?>

                    </div>
                </div>

                <div class="group">
                    <?php 
                        $get_reservation_to_date = $bdd-> prepare("SELECT * FROM reservation WHERE date_reservation > :val1  ORDER BY heure DESC ");
                        $get_reservation_to_date->execute(array(
                            "val1"=> date('y-m-d')
                        ));

                        while ($row = $get_reservation_to_date->fetch()){
                            $date1 = preg_replace('#([0-9]{4})-([0-9]{2})-([0-9]{2})#',"$2",$row['date_reservation']);
                            $date2 = preg_replace('#([0-9]{4})-([0-9]{2})-([0-9]{2})#',"$1",$row['date_reservation']);
                            $date3 = preg_replace('#([0-9]{4})-([0-9]{2})-([0-9]{2})#',"$3",$row['date_reservation']);

                            switch ($date1) {
                                case '1':
                                    $date = " $date3 Janvier $date2";
                                    break;
                                case '2':
                                    $date = " $date3 Fevrier $date2";
                                    break;
                                case '3':
                                    $date = " $date3 Mars $date2";
                                    break;
                                case '4':
                                    $date = " $date3 Avril $date2";
                                    break;
                                case '5':
                                    $date = " $date3 Mai $date2";
                                    break;
                                case '6':
                                    $date = " $date3 Juin $date2";
                                    break;
                                case '7':
                                    $date = " $date3 Juillet $date2";
                                    break;
                                case '8':
                                    $date = " $date3 Aout $date2";
                                    break;
                                case '9':
                                    $date = " $date3 Septembre $date2";  
                                    break;
                                case '10':
                                    $date = " $date3 Octobre $date2";
                                    break;
                                case '11':
                                    $date = " $date3 Novembre $date2";
                                    break;
                                case '12':
                                    $date = " $date3 Decembre $date2";
                                    break;
                                
                                default:
                                    $date = preg_replace('#([0-9]{4})-([0-9]{2})-([0-9]{2})#',"$3 $2 $1",$row['date_reservation']);

                                    break;
                            }
                    ?>
                    <h2><?php echo($date);?></h2>
                    <div id="next">


                                            <div class="info_reserved">
                                                <h3 >Nom du client: </h3>
                                                <p class="nom"><?php echo($row['nomComplet']);?></p>
                                                <h3 >Heure: </h3>
                                                <p class="date"><?php echo($row['heure']);?></p>
                                                <h3 >Contact: </h3>
                                                <p class="contact"><?php echo($row['contact']);?></p>
                    <?php 
                    if($row['messages']!== NULL){

                    ?>
                                                <h3 >message: </h3>
                                                <p class="message"><?php echo($row['messages']);?></p>
                                            
                    <?php
                    };?>
                    </div>
                    <?php
                        }

                    ?>

                    </div>
                </div>

            </section>

        </div>

        <footer>
            <div id="footer">
                <div>
                    <h2>A Propos de nous</h2>
                    <p>
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Consequuntur,
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta asperiores 
                        excepturi libero delectus officia quidem laboriosam. Maxime quas nulla vel ipsum,
                        voluptas porro dolor perspiciatis reiciendis hic, odit magnam neque.
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Placeat et,
                        voluptatibus exercitationem facere iste repudiandae delectus officia
                        deleniti saepe velit? Quos consectetur eos deserunt asperiores vitae explicabo
                        rem possimus ullam?
                    </p>
                </div>
                <img src="images/logo1.png" alt="logo parix"/>
            </div>
            <p id="copyright">Copyright © 2021 School Project All Rights Reserved</p>
        </footer>

        <!-- <div class="popup">
            <div class="content">
                <div class="form validation_msg">
                    <label for="checker1">
                        <i class="fas fa-times" ></i>
                    </label>
                    <input type="checkbox" id="checker1" />
                    <h2 id="title_part_h2"></h2>
                    <p id = "msg"></p>
                </div>
            </div>
        </div>

        <div class="popup">

            <div class="content">

                <div class="form commande">

                    <label for="checker2">
                        <i class="fas fa-times" ></i>
                    </label>

                    <input type="checkbox" id="checker2" />

                    <h2>Commande</h2>

                    <div id="cont_com">

                        <div id="ver1">

                            <h2>Facture</h2>

                            <div id="fact_menu">

                                <div id="cont_menu"></div>


                                <div id="total_menu">
                                    <h3>
                                        TOTAL :   <div><span id=result>0</span>f cfa</div>
                                    </h3>
                                </div>

                            </div>


                        </div>

                        <div id="ver2">
                            <h2 id="title_ver2">Menu</h2>

                            <div class="fact_menu2">

                                
                                    <?php 


                                    $get_categorie = $bdd-> query('SELECT * FROM categorieplat ORDER BY id');
                                    
                                    while ($categorie = $get_categorie -> fetch()){

                                    ?>



                                <div class='group_plat'>
                                    <h2><?php echo($categorie["nomCategorie"] ); ?></h2>

                                <?php

                                    $get_plat = $bdd -> prepare("SELECT * FROM menu WHERE idCategoriePlat = :idCategoriePlat ORDER BY nomPlat");

                                    $get_plat -> execute(array(
                                        "idCategoriePlat" => $categorie["id"]
                                    ));

                                    while ($plat = $get_plat -> fetch()){
                                ?>



                                    <div class="menu_elt" id="meo<?php echo($plat["id"] ); ?>"  onclick='let prix_val = trans_action(<?php echo($plat["id"] ); ?>);'>
                                    
                                    <p >
                                            <img src="images/plats/<?php echo($plat["photoPlat"] ); ?>" alt=""/>
                                            <input type="hidden" value="<?php echo($plat["id"] ); ?>" />
                                        </p>
                                
                                        <div class="menu_center" id="ppp<?php echo($plat["id"] ); ?>"  >
                                            <h3><?php echo($plat["nomPlat"] ); ?></h3>
                                            <p class="ppp" style="text-align:right;width:90%;" id="medic<?php echo($plat["id"]); ?>" ><label style="font-size:1.5em; color:#ff6633;"><i class="fas fa-check-circle"></i></label></p>

                                        </div>
                                
                                        <table>
                                            <tr>
                                                <th>prix</th>
                                            </tr>
                                            <tr>
                                                <td><?php echo($plat["prix"] ); ?> fcfa</td>
                                            </tr>
                                        </table>
                                
                                    </div>

                                                                    
                                    <?php
                                    
                                        }
                                    ?>                                
                                </div>

                                <?php
                                }
                                ?>


                            </div>

                            <div class="fact_menu2">
                                <form id="adresse_paiement">
                                    <p>
                                        <label for="nomComplete">Entrer votre nom et prénom:</label>
                                        <input type="text" name="nomComplete" id="nomComplete" />
                                    </p>
                                    <p>
                                        <label for="phone">Entrer votre numero :</label>
                                        <input type="tel" name="phone" id="phone" />
                                    </p>
                                    <p>
                                        <label for="adresse">Entrer l'adresse de livraison :</label>
                                        <input type="text" name="adresse" id="adresse" />
                                    </p>
                                    <p> 
                                        <label>Selectionner un mode de paiement :</label> 
                                        <?php 
                                        
        

                                        $get_option = $bdd -> query("SELECT * FROM optionpaiment");

                                        while ($option = $get_option -> fetch()){

                                        ?>

                                        <input type="radio" name="paiement" class="livraison" id="option<?php echo $option["id"];?>" value="<?php echo $option["id"];?>" />
                                        <label for="option<?php echo $option["id"];?>">
                                            <?php echo $option["optionP"];?>
                                        </label>
                                        <?php

                                        }

                                        ?>
                                    </p>

                                    <input type="submit" value="confirmer" class="button" />

                                    
                                </form>
                            </div>

                            <div id="fact_select_part">
                                <p class="previous">
                                    <label for="previous" id="prev">
                                        <i class="fas fa-angle-left" ></i>
                                    </label>
                                    <input type="checkbox" name="previous" id="previous"/>
                                </p>
                                <p class="next">
                                    <label for="next" id="nex">
                                        <i class="fas fa-angle-right" ></i>
                                    </label>
                                    <input type="checkbox" name="next" id="next"/>
                                </p>
                            </div>


                        </div>
        
                    </div>
                </div>
            </div>
        </div>

        <div class="popup">

            <div class="content">

                <div class="form affiche_menu_principale_liste">

                    <label for="checker3">
                        <i class="fas fa-times" ></i>
                    </label>

                    <input type="checkbox" id="checker3" />

                    <h2>Menu</h2>
                    <div class="fact_menu2">

                                
                        <?php 

                        $bdd = new PDO('mysql:host=localhost;dbname=parixproject','yannlo','', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

                        $get_categorie = $bdd-> query('SELECT * FROM categorieplat ORDER BY id');

                        while ($categorie = $get_categorie -> fetch()){

                        ?>



                        <div class='group_plat'>
                        <h2><?php echo($categorie["nomCategorie"] ); ?></h2>

                        <?php

                        $get_plat = $bdd -> prepare("SELECT * FROM menu WHERE idCategoriePlat = :idCategoriePlat ORDER BY nomPlat");

                        $get_plat -> execute(array(
                            "idCategoriePlat" => $categorie["id"]
                        ));

                        while ($plat = $get_plat -> fetch()){
                        ?>



                        <div class="menu_elt" id="meo<?php echo($plat["id"] ); ?>"  onclick='let prix_val = trans_action(<?php echo($plat["id"] ); ?>);'>

                        <p >
                                <img src="images/plats/<?php echo($plat["photoPlat"] ); ?>" alt=""/>
                                <input type="hidden" value="<?php echo($plat["id"] ); ?>" />
                            </p>

                            <div class="menu_center" >
                                <h3><?php echo($plat["nomPlat"] ); ?></h3>

                            </div>

                            <table>
                                <tr>
                                    <th>prix</th>
                                </tr>
                                <tr>
                                    <td><?php echo($plat["prix"] ); ?> fcfa</td>
                                </tr>
                            </table>

                        </div>

                                                        
                        <?php
                            }
                        ?>                                
                        </div>

                        <?php
                        }
                        ?>


                        </div>



                </div>
            </div>
        </div> -->

        <script type="text/javascript" src="../index.js">


        </script>
    </body>
</html>