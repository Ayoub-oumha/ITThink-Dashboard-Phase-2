<?php 
include "./db/database.php";

session_start(); // Start the session to store error messages

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['name_login']) && isset($_POST['password_login'])) {
        // Login functionality
        $name = $_POST['name_login'];
        $password = $_POST['password_login'];

        // Prepared statement to prevent SQL injection
        $stmt = $connection->prepare("SELECT * FROM utilisateurs WHERE nom_utilisateur = ?");
        $stmt->bind_param("s", $name);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if ($result && $result->num_rows > 0) {
            $user = $result->fetch_assoc();
            // Verify the hashed password
            if (password_verify($password, $user['mot_de_passe'])) {
                echo "Login successful! Welcome, " . htmlspecialchars($user['nom_utilisateur']);
                // Redirect to dashboard or any page
                header("Location: admin_dashboard.php");
                exit();
            } else {
                $_SESSION['error'] = "Invalid username or password.";
            }
        } else {
            $_SESSION['error'] = "User  not found.";
        }
    } elseif (isset($_POST['name_sign']) && isset($_POST['email_sign']) && isset($_POST['password_sign'])) {
        // Signup functionality
        $name = $_POST['name_sign'];
        $email = $_POST['email_sign'];
        $password = $_POST['password_sign'];

        // Prepared statement to prevent SQL injection
        $stmt = $connection->prepare("SELECT * FROM utilisateurs WHERE nom_utilisateur = ? OR email = ?");
        $stmt->bind_param("ss", $name, $email);
        $stmt->execute();
        $checkResult = $stmt->get_result();

        if ($checkResult && $checkResult->num_rows > 0) {
            $_SESSION['error'] = "Username or Email already exists. Please use another.";
        } else {
            // Hash the password
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            // Insert user into the database
            $insertStmt = $connection->prepare("INSERT INTO utilisateurs (nom_utilisateur, email, mot_de_passe) VALUES (?, ?, ?)");
            $insertStmt->bind_param("sss", $name, $email, $hashedPassword);
            if ($insertStmt->execute()) {
                echo "Signup successful!";
                // Redirect to login or any page
                header("Location: index.php");
                exit();
            } else {
                $_SESSION['error'] = "Error: " . $connection->error;
            }
        }
    }
}

$connection->close();
?>



 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./style/style.css" >
</head>
<body>
    
<div class="wrapper">
      <div class="title-text">
        <div class="title login">Login Form</div>
        <div class="title signup">Signup Form</div>
      </div>
      <div class="form-container">
        <div class="slide-controls">
          <input type="radio" name="slide" id="login" checked>
          <input type="radio" name="slide" id="signup">
          <label for="login" class="slide login">Login</label>
          <label for="signup" class="slide signup">Signup</label>
          <div class="slider-tab"></div>
        </div>
        <div class="form-inner">
            <!-- -1- -->
          <form action="index.php" method="POST" class="login">
            <div class="field">
              <input type="text" placeholder="name " name="name_login" required>
            </div>
            <div class="field">
              <input type="password" placeholder="Password" name="password_login" required>
            </div>
            <!-- <div class="pass-link"><a href="#">Forgot password?</a></div> -->
            <div class="field btn">
              <div class="btn-layer"></div>
              <input type="submit" value="Login">
            </div>
            <div class="signup-link">Not a member? <a href="">Signup now</a></div>
          </form>
          <!-- -2- -->
          <form action="index.php" method="POST" class="signup">
            <div class="field">
              <input type="text" placeholder="name" name="name_sign" required>
            </div>
            <div class="field">
              <input type="email" placeholder="email" name="email_sign"  required>
            </div>
            <div class="field">
              <input type="password" placeholder=" password" name="password_sign" required>
            </div>
            <div class="field btn">
              <div class="btn-layer"></div>
              <input type="submit" value="Signup">
            </div>
          </form>
        </div>
      </div>
    </div>
 <script src="./js/js.js"></script>
</body>
</html>


