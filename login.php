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
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Fout bij verbinden met database: " . $e->getMessage());
}

// Start de sessie
session_start();

// Controleer of het formulier is ingediend
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Haal formuliergegevens op
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    
    // Controleer of de velden zijn ingevuld
    if (empty($email) || empty($password)) {
        die("Vul alle velden in.");
    }

    // Zoek de gebruiker in de database
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    
    if ($stmt->rowCount() == 0) {
        die("E-mailadres of wachtwoord is onjuist.");
    }
    
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
    // Controleer het wachtwoord
    if (password_verify($password, $user['password'])) {
        // Start sessie en sla gebruikersinformatie op
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['first_name'] = $user['first_name'];
        $_SESSION['last_name'] = $user['last_name'];

        // Redirect naar homepagina.php
        header("Location: homepagina.php");
        exit();
    } else {
        die("E-mailadres of wachtwoord is onjuist.");
    }
}
?>

<!-- HTML formulier voor login -->
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inloggen</title>
</head>
<body>
    <h2>Inlogformulier</h2>
    <form method="POST" action="">
        <label>Email:</label>
        <input type="email" name="email" required><br><br>
        <label>Wachtwoord:</label>
        <input type="password" name="password" required><br><br>
        <button type="submit">Inloggen</button>
    </form>
</body>
</html>


 
