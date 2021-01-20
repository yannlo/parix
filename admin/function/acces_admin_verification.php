<?php 
if ($_SESSION['session_validation'] !== 'on'){
    header('location: index.php');
    exit();
}
?>