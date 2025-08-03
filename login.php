<?php
ob_start();
session_start();
$message = "";

$default_username = "admin";
$default_password = "destroyer";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = trim($_POST['username'] ?? '');
  $password = trim($_POST['password'] ?? '');

  if ($username && $password) {
    if ($username === $default_username && $password === $default_password) {
      $_SESSION['user'] = $username;
      $_SESSION['role'] = 'admin';
      header("Location: admin.php");
      exit;
    } else {
      $message = "❌ Invalid username or password!";
    }
  } else {
    $message = "⚠️ Please fill in all fields.";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body, html {
      height: 100%;
      font-family: 'Segoe UI', sans-serif;
      color: white;
    }

    .video-bg {
      position: fixed;
      top: 0; left: 0;
      width: 100%;
      height: 100%;
      object-fit: cover;
      z-index: -1;
    }

    .overlay {
      position: fixed;
      top: 0; left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.5); /* darken video */
      z-index: 0;
    }

.login-box {
  position: relative;
  z-index: 1;
  padding: 40px 30px;
  border-radius: 15px;
  max-width: 500px;
  width: 90%; /* Responsive */
  height: 80%; 
  margin: 10% auto 0 auto;
  text-align: center;

}


    h2 {
      margin-bottom: 30px;
      font-weight: bold;
      text-transform: uppercase;
      letter-spacing: 2px;
    }

    .form-control {
      background: transparent;
      border: 1px solid white;
      border-radius: 10px;
      color: white;
    }

    .form-control::placeholder {
      color: white;
    }

    .input-group-text {
      background: transparent;
      border: 1px solid white;
      border-right: none;
      color: white;
      border-radius: 10px 0 0 10px;
    }

    .btn-register {
      background: linear-gradient(to right, #764ba2, #667eea);
      color: white;
      border: none;
      border-radius: 50px;
      padding: 10px;
      margin-top: 20px;
      font-weight: bold;
      width: 100%;
    }

    .desc {
      font-size: 13px;
      margin-top: 20px;
    }

    .error {
      color: #ffcccb;
      font-size: 14px;
      margin-bottom: 15px;
    }
  </style>
</head>
<body>

<!-- 🔄 Background Video -->
<video class="video-bg" autoplay muted loop>
  <source src="bg-vid.mp4" type="video/mp4">
  Your browser does not support the video tag.
</video>
<div class="overlay"></div>

<div class="login-box">
  <h2>Admin Login</h2>

  <?php if ($message): ?>
    <div class="error"><?= htmlspecialchars($message) ?></div>
  <?php endif; ?>

  <form method="POST">
    <div class="mb-3 input-group">
      <span class="input-group-text"><i class="bi bi-person-fill"></i></span>
      <input type="text" class="form-control" name="username" placeholder="Username" required>
    </div>
    <div class="mb-3 input-group">
      <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
      <input type="password" class="form-control" name="password" placeholder="Password" required>
    </div>
    <button type="submit" class="btn btn-register">
      <i class="bi bi-box-arrow-in-right"></i> Login
    </button>

    <div class="desc">
      Default login: <strong>admin</strong> 
    </div>
  </form>
</div>

</body>
</html>
