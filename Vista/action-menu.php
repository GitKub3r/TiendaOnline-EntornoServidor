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
    <a href="" class="link">Acciones</a>
    <a href="" class="link">Carrito</a>

    <?php
        session_start();

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
    <h2>Add Product</h2>
    <button type="submit" value="agregar" name="action-button">Add</button>
  </form>
  <form action="update-product.php" method="POST" class="action-box">
    <h2>Modify Product</h2>
    <button type="submit" value="modificar" name="action-button">Modify</button>
  </form>
  <form action="delete-product.php" method="POST" class="action-box">
    <h2>Delete Product</h2>
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