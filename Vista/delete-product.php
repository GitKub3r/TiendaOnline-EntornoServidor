<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Shop-in</title>
    <link rel="stylesheet" href="estilos/style.css">
    <link rel="stylesheet" href="estilos/main-header.css">
    <link rel="stylesheet" href="estilos/main-footer.css">
    <link rel="stylesheet" href="estilos/main-content.css">
    <link rel="stylesheet" href="estilos/form.css">
    <link rel="stylesheet" href="estilos/products.css">
    <link rel="stylesheet" href="estilos/button.css">
    <link rel="stylesheet" href="estilos/action-forms.css">
</head>
<body>
<header class="main-header">
    <a href="index.php">
        <h1>Shop-In</h1>
    </a>

    <nav class="main-header-menu">
        <a href="action-menu.php" class="link">Acciones</a>
        <a href="carrito.php" class="link">Carrito</a>

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
    <form method="post" action="../Controlador/ControlPeticionesProducto.php">
        <div class="form-group">
            <label for="id">ID</label>

            <?php
                if (isset($_SESSION["product-error"]) && $_SESSION["product-error"]) {
                    print "<span class='error'>That product doesn't exist</span>";
                }
            ?>

            <input type="text" name="id" id="id" required>
        </div>

        <button type="submit" value="eliminar" name="action-button">Delete Product</button>
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