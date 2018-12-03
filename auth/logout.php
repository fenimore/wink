<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

unset($_SESSION["admin"]);
unset($_SESSION["visitor"]);

header("Location: ../index.php");
?>
