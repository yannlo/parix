<?php
include('function/connexion_bdd.php');
include('function/verified_session.php');

if(isset($_SESSION['session_validation']) AND $_SESSION['session_validation'] =="on"){
    header('Location: reservation.php');
    exit();
}


$error ='test';
$result=0;
if(isset($_POST['email']) AND isset($_POST['password'])){

    if(!empty($_POST["email"]) AND !empty($_POST["password"])){

        $email = $_POST["email"];
        $password = $_POST["password"];

        if(filter_var($email, FILTER_VALIDATE_EMAIL)){

            $get_list_admin = $bdd -> query("SELECT id, email, pass_word FROM list_admin");

            while($admin = $get_list_admin -> fetch()){
                if($admin['email'] == $email AND $admin['pass_word'] == $password){

                    session_start();
                    $_SESSION['id_user'] = $admin['id'];
                    $_SESSION['session_validation'] ="on";
                    header('Location: reservation.php');
                    exit();


                }else{

                    $error ='Email ou mot de passe incorrect';
                    $result=1;


                }

            }



            

        }else{
            $error ='Format de l\'email invalide';
            $result=1;

        }
    
    }else{
        $error ='Veuillez remplir tout les champs';
        $result=1;
    }
    

}





?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Parix - Côte d'Ivoire</title>
    <link rel="shortcut icon" href="#" type="image/x-icon">
    <link rel="stylesheet" href="../style.css" type="text/css" />
    <link rel="stylesheet" href="style.css" type="text/css" />
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;1,400&display=swap" rel="stylesheet" />
</head>
<body>
    <header id="font_header">
        <div class="wrapper">
            <div class="position">

                <div class="formulaire_connexion">
                    <h1>Connectez-vous</h1>
                    <form method="POST" action="index.php">
                        <p>
                            <label for="email">Entrer votre email:</label>
                            <input type="email" name="email" id="email"/>
                        </p>
                        <p>
                            <label for="password">Entrer votre password:</label>
                            <input type="password" name="password" id="password" />
                        </p>
                        <input type="submit" class="button" value="Connexion" />
                    
                    </form>
                </div>


            </div>
        </div>


    </header>


    <div class="popup">
        <div class="content">
            <div class="form validation_msg">
                <label for="checker1">
                    <i class="fas fa-times" ></i>
                </label>
                <input type="checkbox" id="checker1" />
                <h2 id="title_part_h2">Error</h2>
                <p id = "msg"></p>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="script.js"></script>
    
    <script>
        var popup = document.getElementsByClassName('popup')[0];

        var variable = <?php echo($result); ?>;
        console.log("<?php echo($error); ?>");
        var msg= document.getElementById("msg");
        if(variable==1){
            popup.style.display= "table";
            msg.innerHTML ="<?php echo($error); ?>";
        }
    </script>
</body>
</html>