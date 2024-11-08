<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign In</title>
    <link rel="stylesheet" href="estilos/style.css">
    <link rel="stylesheet" href="estilos/main-header.css">
    <link rel="stylesheet" href="estilos/main-footer.css">
    <link rel="stylesheet" href="estilos/form.css">
</head>
<body>
<header class="main-header">
  <a href="landing-page.php">
    <h1>Shop-In</h1>
  </a>
</header>

<form action="../Controlador/ControlPeticionesCliente.php" method="post">
  <h1>Log in your account</h1>

  <div class="form-group">
    <label for="username">Username</label>
    <input type="text" name="username" id="username" required>
  </div>

  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" name="password" id="password">
  </div>

  <span>Don't have an account? <a href="signup-page.php">Sign up</a> now</span>

  <button type="submit">Sign In</button>
  <button type="reset">Reset</button>
</form>

<div class="error-box">
    <p>
        <?php

            if (isset($_SESSION["login-error"])) {
                print "Username or password is incorrect!";
            }

        ?>
    </p>
</div>

<footer class="main-footer">
  <h2>Copyright &copy; 2024 Shop-In Company</h2>

  <hr>

  <div class="main-footer-contact">
    <span>Email: <u>shopincompanyspain@gmail.com</u></span>
    <span>Phone Number: <u>+34 664 283 972</u></span>
  </div>
</footer>
</body>
</html>