<?php
    require "../Controlador/ControlCliente.php";
    $clientController = new ControlCliente();
    session_start();

    if (!$_SESSION["logged"]) {
        header("Location: signin-page.php");
        exit();
    } else {
        $client = $clientController->getClienteByID($_SESSION["logged"]);
    }

    if (isset($_SESSION["product-error"])) {
        $_SESSION["product-error"] = false;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Shop-in</title>
  <link rel="stylesheet" href="estilos/style.css">
  <link rel="stylesheet" href="estilos/main-header.css">
  <link rel="stylesheet" href="estilos/main-footer.css">
    <link rel="stylesheet" href="estilos/main-content.css">
    <link rel="stylesheet" href="estilos/actions.css">
  <link rel="stylesheet" href="estilos/products.css">
  <link rel="stylesheet" href="estilos/button.css">
</head>
<body>
<header class="main-header">
  <a href="index.php">
    <h1>Shop-In</h1>
  </a>

  <nav class="main-header-menu">
    <a href="" class="link">Actions</a>
    <a href="" class="link">Cart</a>

    <?php

        if (isset($_SESSION["logged"])) {
            print "<a href='profile.php' class='pfp-image'><img alt='pfp' src='../Recursos/Imagenes/pfp-white.png'/></a>";
        } else {
            print "<a class='link' href='signin-page.php'>Log In</a>";
        }
    ?>
  </nav>
</header>

<div class="main-content">
  <form action="add-product.php" method="POST" class="action-box">
    <div class="action">
        <h2>Add Product</h2>
        <img src="../Recursos/Imagenes/add-product.png" alt="add-product-icon">
    </div>
    <hr>
    <button type="submit" value="agregar" name="action-button">Add</button>
  </form>
  <form action="update-product.php" method="POST" class="action-box">
    <div class="action">
        <h2>Edit Product</h2>
        <img src="../Recursos/Imagenes/edit-product.png" alt="edit-product-icon">
    </div>
    <hr>
    <button type="submit" value="modificar" name="action-button">Edit</button>
  </form>
  <form action="delete-product.php" method="POST" class="action-box">
    <div class="action">
        <h2>Delete Product</h2>
        <img src="../Recursos/Imagenes/delete-product.png" alt="delete-product-icon">
    </div>
    <hr>
    <button type="submit" value="eliminar" name="action-button">Delete</button>
  </form>
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