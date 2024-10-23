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

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Inloggen</title>
  <script src="https://kit.fontawesome.com/b09c09de6f.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f0f0f0;
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .login-container {
      background-color: white;
      padding: 40px;
      border-radius: 10px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
      width: 100%;
      max-width: 400px;
    }

    .login-container h2 {
      margin-bottom: 20px;
      text-align: center;
    }

    .form-group {
      margin-bottom: 15px;
    }

    .form-control {
      height: 45px;
      font-size: 16px;
    }

    .btn {
      width: 100%;
      padding: 10px;
      font-size: 18px;
    }

    .form-text {
      text-align: center;
      margin-top: 10px;
    }
  </style>
</head>
<body>

<div class="login-container">
  <h2>Inloggen</h2>
  <form method="POST" action="">
    <div class="form-group">
      <label for="email">Emailadres</label>
      <input type="email" class="form-control" id="email" name="email" placeholder="Voer je email in" required>
    </div>
    <div class="form-group">
      <label for="password">Wachtwoord</label>
      <input type="password" class="form-control" id="password" name="password" placeholder="Voer je wachtwoord in" required>
    </div>
    <button type="submit" class="btn btn-primary">Inloggen</button>
    <p class="form-text">Nog geen account? <a href="register.php">Registreer hier</a></p>
  </form>
</div>

</body>
</html>
