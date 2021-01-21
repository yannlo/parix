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
                    <?php 
                        $get_reservation_to_date = $bdd-> prepare("SELECT * FROM reservation WHERE date_reservation >= :val1  ORDER BY date_reservation, heure DESC");
                        $get_reservation_to_date->execute(array(
                            "val1"=> date('y-m-d')
                        ));
                        

                        while ($row = $get_reservation_to_date->fetch()){
                            // Echo($row['date_reservation']);
                            $date = $row['date_reservation'];
                            $date1 = preg_replace('#([0-9]{4})-([0-9]{2})-([0-9]{2})#',"$2",$row['date_reservation']);
                            $date2 = preg_replace('#([0-9]{4})-([0-9]{2})-([0-9]{2})#',"$1",$row['date_reservation']);
                            $date3 = preg_replace('#([0-9]{4})-([0-9]{2})-([0-9]{2})#',"$3",$row['date_reservation']);
                            if($date == date('Y-m-d') ){


                                $date ="Aujourd'hui";

                                ?>

                                <h2><?php echo($date);?></h2>
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
                                    }
                                    ?> 
                                    </div>
                                    <?php

                            }else if($date3 == ((int)(date('d')) + 1)) {
                                $date = "Demain";

                                ?>
                                <h2><?php echo($date);?></h2>
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
                                }
                                                                    ?> 
                                    </div>
                                    <?php


                            }else{
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

                                    }
                                    ?> 
                                    </div>
                                    <?php


                            }
                        }

                    ?>

                    </div>
                </div>

            </section>

        </div>

        <?php include("footer.php"); ?>

        <script>
            actived_link_page("reservation");
        </script>
    </body>
</html>