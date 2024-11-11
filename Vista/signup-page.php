<?php
    session_start();

    if (isset($_SESSION["login-error"])) {
        session_destroy();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Sign Up</title>
  <link rel="stylesheet" href="estilos/style.css">
  <link rel="stylesheet" href="estilos/main-header.css">
  <link rel="stylesheet" href="estilos/main-footer.css">
  <link rel="stylesheet" href="estilos/form.css">
</head>
<body>
<header class="main-header">
  <a href="index.php">
    <h1>Shop-In</h1>
  </a>
</header>

<form action="../Controlador/ControlPeticionesCliente.php" method="post">
  <h1>Create your account</h1>

  <div class="form-group-container">
    <div class="form-group">
      <label for="new-name">Name</label>
      <input type="text" name="new-name" id="new-name" pattern="^[a-zA-Z0-9]+$" required>
    </div>

    <div class="form-group">
      <label for="new-surname">Surname</label>
      <input type="text" name="new-surname" id="new-surname" pattern="^[a-zA-Z0-9]+$" required>
    </div>
  </div>

  <div class="form-group">
    <label for="new-username">Username</label>
    <input type="text" name="new-username" id="new-username" pattern="^[a-zA-Z0-9]+$" required>
  </div>

  <div class="form-group-container">
    <div class="form-group">
      <label for="new-direction">Domicilio</label>
      <input type="text" name="new-direction" id="new-direction" required>
    </div>

    <div class="form-group">
      <label for="new-tel">Telephone Number</label>
      <input type="tel" name="new-tel" id="new-tel" required>
    </div>
  </div>

  <div class="form-group">
    <label for="new-password">Password</label>
    <input type="password" name="new-password" id="new-password" pattern="[A-Za-z0-9!?-]{8,}" required>
  </div>

  <span>Have an account? <a href="signin-page.php">Sign in</a> here</span>

  <button type="submit" value="create-client" name="action-button">Sign Up</button>
  <button type="reset">Reset</button>
</form>

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