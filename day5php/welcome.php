<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
$username = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home - Intensive Code Camp</title>
    <link rel="stylesheet" href="src/style.css">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Arial, sans-serif;
            background: #fff;
        }
        .header-bg {
            background: #f8ecd7;
        }
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 32px;
            height: 70px;
        }
        .nav-links {
            display: flex;
            gap: 32px;
        }
        .nav-links a {
            text-decoration: none;
            color: black;
            font-weight: bold;
            font-size: 1.2em;
        }
        .nav-logo {
            height: 60px;
            margin-right: 24px;
        }
        .hero-section {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
            min-height: 80vh;
            background: #fff;
            padding-top: 40px;
        }
        .hero-img {
            width: 850px;
            max-width: 99vw;
            border-radius: 32px;
            box-shadow: 0 8px 40px rgba(180,0,0,0.09);
            margin-bottom: 14px;
        }
        .welcome-message {
            text-align: center;
            font-size: 1.3em;
            color: #333;
            margin-top: 30px;
            margin-bottom: 6px;
        }
        .signout-link {
            display: inline-block;
            background: #b51118;
            color: #fff;
            text-decoration: none;
            padding: 8px 22px;
            border-radius: 5px;
            font-size: 1.1em;
            margin: 10px auto 0 auto;
            transition: background 0.2s;
        }
        .signout-link:hover {
            background: #8d0c13;
        }
        @media (max-width: 700px) {
            .hero-img {
                width: 99vw;
                max-width: 99vw;
            }
        }
    </style>
</head>
<body>
    <div class="header-bg">
        <nav class="navbar">
            <div class="nav-links">
                <a href="welcome.php">Home</a>
                <a href="roadmap.html">Road Map</a>
                <a href="profile.html">Course Application</a>
                <a href="https://iti.gov.eg/home">Contact</a>
            </div>
            <img src="https://iti.gov.eg/assets/images/ColoredLogo.svg" alt="Information Technology Institute" class="nav-logo">
        </nav>
    </div>
    <?php
// Assume session_start() and $username already set
$username = $_SESSION['username'] ?? 'Student';
?>
<div class="welcome-card">
    <div class="welcome-header">
        <span class="wave">👋</span>
        Hi <span class="username"><?= htmlspecialchars($username) ?></span>,
        <br>
        Welcome to <span class="iti">Information Technology Institute</span>
    </div>
    <div class="welcome-message">
        <p>
            <b>Dear <?= htmlspecialchars($username) ?>,</b> I encourage you to keep on going, even when the going gets tough. <br>
            Learning is a lifelong enriching journey. You are the founders of our future and collectively, the beacon of hope for the betterment of our world.<br>
            You are not alone, <span class="highlight">We are here to help you.</span>
        </p>
    </div>
</div>

<style>
.welcome-card {
    max-width: 650px;
    margin: 40px auto;
    padding: 32px 28px 20px 28px;
    background: linear-gradient(120deg, #f8ecd7 60%, #fff8e1 100%);
    border-radius: 22px;
    box-shadow: 0 4px 24px rgba(180,17,24,0.07);
    font-family: 'Segoe UI', 'Tahoma', 'Geneva', 'Verdana', sans-serif;
    text-align: center;
}

.welcome-header {
    font-size: 1.6em;
    font-weight: 500;
    color: #b51118;
    margin-bottom: 15px;
}

.wave {
    font-size: 1.2em;
    vertical-align: -3px;
    margin-right: 6px;
}

.username {
    color: #222;
    font-weight: bold;
}

.iti {
    color: #b51118;
    font-weight: bold;
    letter-spacing: 0.5px;
}

.welcome-message {
    font-size: 1.13em;
    color: #3d3d3d;
    background: #fff9f1;
    border-radius: 14px;
    padding: 18px 12px;
    margin-top: 7px;
    line-height: 1.65;
}

.highlight {
    color: #b51118;
    font-weight: 500;
}
</style>
</body>
</html>