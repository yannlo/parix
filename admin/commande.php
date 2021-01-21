<?php
    include('function/verified_session.php');
    include('function/acces_admin_verification.php');

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
            <section id="commande">
                <h1>Commandes</h1>
                <div id="content"></div>
            </section>

        </div>

        <?php include("footer.php"); ?>


        <div class="popup">
            <div class="content">
                <div class="form validation_msg">
                    <label for="checker1">
                        <i class="fas fa-times" ></i>
                    </label>
                    <input type="checkbox" id="checker1" />
                    <h2 id="title_part_h2">Message de confirmation</h2>
                    <p id="msg"></p>
                    <form method='POST' action='../php_acces/traitement_page.php'> 
                            <input type='hidden' name='id_value' id='id_value' class='button' value='0'/>
                            <input type='hidden' name='action' id="action" class='button' value='0'/>
                            <input type="submit" name='submit' class="button" value="Confirmer"/>
                    </form>
                </div>
            </div>
        </div>

        <script type="text/javascript" src="script1.js"></script>

        <script>
            actived_link_page("commande");
        </script>
    </body>
</html>