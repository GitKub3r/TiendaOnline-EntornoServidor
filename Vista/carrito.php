<?php
require "../Controlador/ControlProducto.php";
$controlProducto = new ControlProducto();
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
    <link rel="stylesheet" href="estilos/products.css">
    <link rel="stylesheet" href="estilos/button.css">
    <link rel="stylesheet" href="estilos/carrito.css">
</head>
<body>
<header class="main-header">
    <a href="index.php">
        <h1>Shop-In</h1>
    </a>

    <nav class="main-header-menu">
        <a href="action-menu.php" class="link">Actions</a>
        <a href="" class="link">Cart</a>

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
    <form method="POST" action="../Controlador/ControlPeticionesProducto.php">
        <?php
            if (isset($_SESSION["listaCarrito"]) && count($_SESSION["listaCarrito"]) > 0) {
                $carrito = $_SESSION["listaCarrito"];

                for ($i = 0; $i < count($carrito); $i++) {
                    if ($carrito[$i] != null) {
                        $producto = $controlProducto->getProducto($carrito[$i]);

                        print "<form method='POST' action='../Controlador/ControlPeticionesProducto.php' class='carrito-container'>";
                        print "<div class='product-info'>";
                        $id = $carrito[$i];
                        print "<div class='product-data'>";
                        print "<span class='product-name'>" . $producto->getNombre() . "</span>";
                        print "<input type='text' class='product-id' name='id-producto' value='#$id' readonly>";
                        print "</div>";
                        print "<span class='product-price'>" . $producto->getPrecio() . " €</span>";
                        print "</div>";
                        print "<hr/>";
                        print "<span class='product-desc'>". $producto->getDescripcion() . "</span>";

                        print "<input  name='id-carrito' value='$i'>";

                        print "<button type='submit' value='eliminarid' name='action-button'><img src='../Recursos/Imagenes/shopping-cart.png' alt='shopping-cart-icon'></button>";
                        print "</form>";
                    }

                }
            }
        ?>
        <button type="submit" name="action-button" value="eliminartodos">ELIMINAR TODOS</button>
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