<?php

session_start();
unset($_SESSION["loggedin"]);
header("Location: ../index.php");

?>
