<?php
session_start(); // Start de sessie

// Vernietig de sessie
session_destroy();

// Redirect naar de inlogpagina
header("Location: login.php");
exit();
?>
