<?php
    include('admin/function/connexion_bdd.php');
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Parix - Côte d'Ivoire</title>
        <link rel="shortcut icon" href="#" type="image/x-icon">
        <link rel="stylesheet" href="style.css" type="text/css" />
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;1,400&display=swap" rel="stylesheet" />
    </head>
    <body>
        <header>
            <nav class="navBar">

                <input type="checkbox" id="check">

                <label for="check" class="checkbtn">

                    <i class="fas fa-bars" id="icon"></i>

                </label>

                <label for="logo"><img src="images/logo1.png" alt="logo parix"></label>

                <ul>
                    <li> <a class="active" href="#">HOME</a></li>
                    <li> <a href="#menu">MENU</a></li>
                    <li> <a href="#service">SERVICES</a></li>
                    <li> <a href="#contacts">CONTACTS</a></li>
                </ul>

            </nav>
            <div class="wrapper">
                <div class="position">

                    <h1>
                        <span>P</span>arix,<br/>
                        Le restaurant Convivial par excellence
                    </h1>
                </div>
            </div>


        </header>

        <div class="center">

            <section id="menu">
                <h1>Menu</h1>
                <div class="parti n1">
                    <p class="elt1">
                        <img src="images/plats/steak.jpg" alt="plat de frite et steak"/>
                    </p>
                    <p class="elt2">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Consequuntur,
                        rerum unde deleniti quaerat quis iste incidunt quibusdam dolor aut nemo
                        mollitia obcaecati inventore corrupti, qui architecto explicabo ut. 
                        Repudiandae, numquam. Lorem ipsum dolor sit amet consectetur adipisicing
                        elit. Magni nisi perferendis veniam dolor architecto exercitationem doloribus
                        voluptas nihil dolore! Impedit at voluptas adipisci aspernatur natus. 
                        Ea magnam suscipit placeat nostrum? 
                    </p>
                </div>
                <div class="parti n2">
                    <p class="elt1">
                        <img src="images/plats/glace.jpg" alt="plat de frite et steak"/>
                    </p>
                    <p class="elt2">
                        Lorem, ipsum dolor sit amet consectetur adipisicing elit. Consequuntur,
                        rerum unde deleniti quaerat quis iste incidunt quibusdam dolor aut nemo
                        mollitia obcaecati inventore corrupti, qui architecto explicabo ut. 
                        Repudiandae, numquam. Lorem ipsum dolor sit amet consectetur adipisicing
                        elit. Magni nisi perferendis veniam dolor architecto exercitationem doloribus
                        voluptas nihil dolore! Impedit at voluptas adipisci aspernatur natus. 
                        Ea magnam suscipit placeat nostrum?
                        <a href="#" class="button" id="button_affiche_menu">Afficher le menu complet</a>

                    </p>
                </div>
            </section>

            <section id="service">
                <h1>Services</h1>
                <div class="parti">
                    <div class="part  av1">
                        <h2>Reservation</h2>
                        <form id="reservation">
                            <p> 
                                <label for="nomComplet">Entrer votre nom complet:  **</label>
                                <input type="text" id="nomComplet" name="nomComplet" />
                            </p>
                            <p>
                                <label for="date">Entrer la date et l'heure de la reservation:  **</label>
                                <div class="block">
                                    <input type="date" id="date" name="date"/>
                                    <input type="time" name="heure" min="10:00" max="22:00"  placeholder=" Entrer votre nom complet"/>
                                </div>
                            </p>
                            <p> 
                                <label for="contact">Entrer votre numéro de telephone:  **</label>
                                <input type="tel" id="contact" name="contact" placeholder="01 02 03 04" format="XX XX XX XX" />
                            </p>
                            <p> 
                                <label for="message">Entrer une note de préparation: (Optionnel)</label><br/>
                                <textarea id="message" name="message"></textarea>
                            </p>
                            <input type="submit" value="envoyer" class="button" />
        
                        </form>
                    </div>
                    <div class="part av2">
                        <h2>Commande en ligne</h2>
                        <p>
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Consequuntur,
                            rerum unde deleniti quaerat quis iste incidunt quibusdam dolor aut nemo
                            mollitia obcaecati inventore corrupti, qui architecto explicabo ut. 
                            Repudiandae, numquam. Lorem ipsum dolor sit amet consectetur adipisicing
                            elit. Magni nisi perferendis veniam dolor architecto exercitationem doloribus
                            voluptas nihil dolore! Impedit at voluptas adipisci aspernatur natus. 
                            Ea magnam suscipit placeat nostrum?
                            <a href="#" id="commandeLink" class="button">Commander</a>
        
                        </p>

                    </div>
                </div>
            </section>

            <section id="contacts">
                <h1>Contact</h1>
                <div class="parti">
                    <div class="cont_elemnt">
                        <div id="element">
                            <div class="blocked">
                                <h2>Adresse</h2>
                                <h3>Abidjan, Boulevar de Marseille</h3>
                            </div>
                            <div class="blocked">
                                <h2>Telephone</h2>
                                <h3>01 02 03 04</h3>
                                <h3>01 02 02 04</h3>
                            </div>
                            <div class="blocked">
                                <h2>Email</h2>
                                <h3>parix@restaurant.com</h3>
                            </div>
                        </div>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3972.882471263215!2d-3.985651584674635!3d5.2810259378211875!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xfc1eeb410f40961%3A0xa41861ea4418cf06!2sBoulevard%20de%20Marseille%2C%20Abidjan%2C%20C%C3%B4te%20d&#39;Ivoire!5e0!3m2!1sfr!2sfr!4v1610674295633!5m2!1sfr!2sfr" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
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

        <div class="popup">
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
        </div>

        <script type="text/javascript" src="index.js">


        </script>
    </body>
</html>