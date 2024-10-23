<?php
// Schakel foutmeldingen in
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Databaseverbinding
$host = 'localhost';  
$dbname = 'marketplaceinloggen';  
$user = 'bit_academy';  
$pass = 'bit_academy';  

try {
    $pdo = new PDO("mysql:host=$host", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Maak de database aan als deze nog niet bestaat
    $pdo->exec("CREATE DATABASE IF NOT EXISTS $dbname");
    // Selecteer de database
    $pdo->exec("USE $dbname");

    // Maak de tabel aan als deze nog niet bestaat
    $sql = "
    CREATE TABLE IF NOT EXISTS users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        first_name VARCHAR(100) NOT NULL,
        last_name VARCHAR(100) NOT NULL,
        email VARCHAR(255) NOT NULL UNIQUE,
        password VARCHAR(255) NOT NULL
    )";
    $pdo->exec($sql);

    echo "Verbinding met database is succesvol.<br>";
} catch (PDOException $e) {
    die("Fout bij verbinden met database: " . $e->getMessage());
}

// Controleer of het formulier is ingediend
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Haal formuliergegevens op
    $first_name = $_POST['first_name'] ?? '';
    $last_name = $_POST['last_name'] ?? '';
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    
    // Controleer of alle velden zijn ingevuld
    if (empty($first_name) || empty($last_name) || empty($email) || empty($password)) {
        die("Vul alle velden in.");
    }

    // Controleer of het e-mailadres al bestaat
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);

    if ($stmt->rowCount() > 0) {
        die("Dit e-mailadres is al geregistreerd.");
    }

    // Hash het wachtwoord
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Voeg de gebruiker toe aan de database
    $stmt = $pdo->prepare("INSERT INTO users (first_name, last_name, email, password) VALUES (?, ?, ?, ?)");
    
    // Controleer of de query goed wordt uitgevoerd
    if ($stmt->execute([$first_name, $last_name, $email, $hashedPassword])) {
        echo "Registratie succesvol!";
    } else {
        $errorInfo = $stmt->errorInfo();
        echo "Er is iets misgegaan: " . $errorInfo[2];  // Geeft de specifieke SQL-foutmelding weer
    }
}
?>

<!-- HTML formulier voor registratie -->
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registratie</title>
</head>
<body>
    <h2>Registratieformulier</h2>
    <form method="POST" action="">
        <label>Voornaam:</label>
        <input type="text" name="first_name" required><br><br>
        <label>Achternaam:</label>
        <input type="text" name="last_name" required><br><br>
        <label>Email:</label>
        <input type="email" name="email" required><br><br>
        <label>Wachtwoord:</label>
        <input type="password" name="password" required><br><br>
        <button type="submit">Registreren</button>
    </form>

    
</body>
</html>
