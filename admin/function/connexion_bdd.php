<?php 

// information de connexion a la base de donnée en PDO

$bdd = new PDO('mysql:host=localhost;dbname=parixproject','yannlo','', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

?>