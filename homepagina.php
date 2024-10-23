<?php
// Start de sessie
session_start();

// Controleer of de gebruiker is ingelogd
if (!isset($_SESSION['user_id'])) {
    // Als de gebruiker niet is ingelogd, redirect dan naar de loginpagina
    header("Location: login.php");
    exit();
}

// Haal de naam van de ingelogde gebruiker uit de sessie
$first_name = $_SESSION['first_name'];
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepagina</title>
</head>
<body>
    <h1>Welkom, <?php echo htmlspecialchars($first_name); ?>!</h1>
    <p>Dit is je persoonlijke homepage.</p>
    
    <!-- Voeg hier meer inhoud toe -->
    
    <a href="logout.php">Uitloggenn</a>
</body>
</html>