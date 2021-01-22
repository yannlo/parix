<?php
    include('function/verified_session.php');
    include('function/acces_admin_verification.php');
    include('function/connexion_bdd.php');
    $error="";
    if (isset($_FILES) AND isset($_POST["nomPlat"]) AND isset($_POST["prixPlat"]) AND isset($_POST["categorie"])){
        
        if(!empty($_FILES) AND !empty($_POST["nomPlat"]) AND !empty($_POST["prixPlat"]) AND !empty($_POST["categorie"])){
            $image = $_FILES['photo_plat'];

            if($image['error'] == 0 ){

                $nom = htmlspecialchars($_POST["nomPlat"]);
                $prix = (int) $_POST["prixPlat"];   
                $categorie = $_POST["categorie"];
        
                $ext_image = strtolower(substr($image['name'], -3));
                
                $allow_ext = array('jpg', 'gif', 'png');
                
                if (in_array($ext_image, $allow_ext)) {

                    $add_plat = $bdd -> prepare("INSERT INTO menu (nomPlat, prix, idCategoriePlat) VALUES (:nom, :prix, :categorie)");
            
                    $add_plat-> execute(array(
                        "nom" => $nom,
                        "prix" => $prix,
                        "categorie"=> $categorie
                    ));
    
                    $id = 0;
    
                    $get_last_plat = $bdd -> query("SELECT * FROM menu ORDER BY id DESC LIMIT 1");
    
                    while ($last_plat = $get_last_plat -> fetch()){
                        $id = $last_plat["id"];
                    }
                                        
                    $fichier_partiel_nom = str_replace(' ','_',$id);
                    
                    $fichier_final_nom = (string)($fichier_partiel_nom.".".$ext_image);
                    
                    move_uploaded_file($image['tmp_name'], "../images/plats/".$fichier_final_nom);
                    
                    $add_photoPlat = $bdd -> prepare("UPDATE menu SET photoPlat = :photoPlat ORDER BY id DESC LIMIT 1");
        
                    $add_photoPlat -> execute(array(
                        'photoPlat'=> $fichier_final_nom
                    ));
                
                }
            
            }else if($image['error'] == 1 OR $image['error'] == 2 ){
                $error="Photo trop grande";
            }else if($image['error'] == 3 ){
                $error="Probleme de telechagement... <br/>Veuillez ressayer plus tard";
            }else if($image['error'] == 4){
                $error="Veuillez ajouter une photo du plat";
            }

        }else{
            $error ="Veuillez remplir tout les champs";
        }
    }

    
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Commande - Parix</title>
        <link rel="shortcut icon" href="#" type="image/x-icon">
        <link rel="stylesheet" href="../style.css" type="text/css" />
        <link rel="stylesheet" href="style.css" type="text/css" />
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;1,400&display=swap" rel="stylesheet" />
    </head>
    <body>
        <?php include("header.php"); ?>
        
        <div class="center">
            <section id="menu">
                <h1>Menu</h1>
                <div class="etat_commande">
                    <a href="#" class="button" id="ajout_plat">Ajouter un plat</a>
                    <a href="#" class="button" id="suppression_plat">Supprimer un plat</a>
                </div>
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
                                        <img src="../images/plats/<?php echo($plat["photoPlat"] ); ?>" alt=""/>
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

</section>

</div>

<?php include("footer.php"); ?>

<div class="popup">

    <div class="content">

        <div class="form affiche_menu_principale_liste">

            <label for="checker3">
                <i class="fas fa-times" ></i>
            </label>

            <input type="checkbox" id="checker3" />
            <h2>Formulaire d'ajout de plat</h2>
            <div class="fact_menu2">
                <form method="POST" action="menu.php" enctype="multipart/form-data">
                <p>
                    <label for="photo_plat">Ajouter la photo du plat: <br/>

                        <img src="../images/basic.png"   id="output"/>
                    </label>
                    <input type="file" name="photo_plat" id="photo_plat" accept="image/*" onchange="loadFile(event)" required="required" />
                 </p>

                <p>
                    <label for="nomPlat">Entrer le nom du plat: </label>
                    <input type="text" name="nomPlat" id="nomPlat" required="required" />
                </p>
                <p>
                    <label for="prixPlat">le prix du plat(sans unité ni espace):</label>
                    <input type="number" name="prixPlat" id="prixPlat" min="0" placeholder="XXXXX" required="required" />
                </p>
                <p>
                    <label>Selectionner une categorie:</label>
                <?php
                    $get_categorie = $bdd -> query("SELECT * FROM categoriePlat");
                     while ($categorie = $get_categorie -> fetch()){
                    ?>
                    <label class="select_label" for="categorie<?php echo $categorie['id'];?>"><input type="radio" name="categorie" id="categorie<?php echo $categorie['id'];?>" value="<?php echo $categorie['id'];?>" required="required" /><?php echo $categorie['nomCategorie'];?></label>
                    <?php
                    }
                    ?>
                    
                </p>
                <input type="submit" value="confirmer" class="button"/>
    
                </form>

            </div>

        </div>
    </div>
</div> 

<div class="popup">

    <div class="content">

        <div class="form affiche_menu_principale_liste">

            <label for="checker2">
                <i class="fas fa-times" ></i>
            </label>

            <input type="checkbox" id="checker2" />
            <h2>Selectionner les plats a supprimer</h2>
            
            <div class="fact_menu2 version_fact2">

                                
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
                        <img src="../images/plats/<?php echo($plat["photoPlat"] ); ?>" alt="photo de <?php echo($plat["nomPlan"] ); ?>"/>
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

            <a href="#" class="button" id="confirmer_suo">Confirmer</a>

            
            

        </div>
    </div>
</div> 


<!--

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

-->

     <script type="text/javascript" src="script2.js"></script>
        <script>
            actived_link_page("menu");
            <?php echo "console.log($error)" ?>
        </script>
    </body>
</html>