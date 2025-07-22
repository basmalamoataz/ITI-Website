<?php
include 'database.php';
session_start();
$error = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $password = $_POST['password'];
    $confirm = $_POST['confirm_password'];

    if ($password !== $confirm) {
        $error = "Passwords do not match!";
    } elseif (empty($username) || empty($password)) {
        $error = "All fields are required!";
    } else {
        // 1. Check if username already exists
        $check = $conn->prepare("SELECT id FROM members WHERE username=?");
        $check->bind_param("s", $username);
        $check->execute();
        $check->store_result();

        if($check->num_rows > 0){
            $error = "Username already exists. Please choose a different username.";
            $check->close();
        } else {
            $check->close();
            // Save user in the database (hash the password!)
            $hashed = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $conn->prepare("INSERT INTO members (username, password) VALUES (?, ?)");
            $stmt->bind_param("ss", $username, $hashed);
            if ($stmt->execute()) {
                $_SESSION['signup_success'] = "Account created! Please login.";
                header("Location: login.php");
                exit();
            } else {
                $error = "Error: " . $stmt->error;
            }
            $stmt->close();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Sign Up</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="src/style.css">
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
    <div class="auth-title">Sign Up</div>
    <div class="auth-desc">Create your ITI account.</div>
    <form class="auth-form" action="index.php" method="post">
      <label for="username">Username</label>
      <input type="text" name="username" id="username" required>

      <label for="email">Email</label>
      <input type="email" name="email" id="email" required>

      <label for="password">Password</label>
      <input type="password" name="password" id="password" required>

      <label for="confirm_password">Confirm Password</label>
      <input type="password" name="confirm_password" id="confirm_password" required>

      <input type="submit" value="Sign Up">
      <input type="reset" value="Reset">
    </form>
    <a class="auth-link" href="login.php">Already have an account? Login here.</a>
  </div>
</body>
</html>
