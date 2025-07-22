<?php
include 'database.php';
session_start();

$error = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT password FROM members WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->bind_result($hashed);
    if ($stmt->fetch() && password_verify($password, $hashed)) {
        $_SESSION['username'] = $username;
        header("Location: welcome.php");
        exit();
    } else {
        $error = "Invalid username or password!";
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="src/style.css"><!-- or paste the CSS above here -->
</head>
<body>
  <div class="header-bg">
    <nav class="navbar">
      <div class="nav-links">
        <a href="welcome.php">Home</a>
        <a href="roadmap.html">Road Map</a>
        <a href="profile.html">Course Application</a>
        <a href="https://iti.gov.eg/home" target="_blank">Contact</a>
      </div>
      <img src="https://iti.gov.eg/assets/images/ColoredLogo.svg" alt="Information Technology Institute" class="nav-logo">
    </nav>
  </div>

  <div class="auth-container">
    <div class="auth-title">Login</div>
    <!-- Show this message only after registration success -->
    <!-- <div class="auth-message">Account created! Please login.</div> -->
    <form class="auth-form" action="login.php" method="post">
      <label for="username">Username</label>
      <input type="text" name="username" id="username" required>

      <label for="password">Password</label>
      <input type="password" name="password" id="password" required>

      <input type="submit" value="Login">
    </form>
    <a class="auth-link" href="index.php">Don't have an account? Register here.</a>
  </div>
</body>
</html>