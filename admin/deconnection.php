
<?php
include ('function/verified_session.php');
session_destroy();
header('location: index.php');
?>