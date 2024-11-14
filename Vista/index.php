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
        <div class="title-group">
            <h1>What will you buy today?</h1>
            <span>Your confidence shopping center</span>
        </div>

        <div class="shop-content">
            <?php
                $productos = $controlProducto->getProductos();

                foreach ($productos as $producto) {
                    print "<form action='../Controlador/ControlPeticionesProducto.php' method='POST' class='product'>";
                        print "<div class='product-info'>";
                        $id = $producto->getId();
                            print "<div class='product-data'>";
                                print "<span class='product-name'>" . $producto->getNombre() . "</span>";
                                print "<input type='text' class='product-id' name='id-producto' value='#$id' readonly>";
                            print "</div>";
                            print "<span class='product-price'>" . $producto->getPrecio() . " €</span>";
                        print "</div>";

                        if ($producto->getPrecio() < 10) {
                            print "<div class='product-label sale'>";
                                print "<span>Producto de Oferta</span>";
                                print "<img src='../Recursos/Imagenes/offer-label.png' alt='offer-label-icon'>";
                            print "</div>";
                        } elseif ($producto->getPrecio() > 200) {
                            print "<div class='product-label quality'>";
                                print "<span>Producto de Calidad</span>";
                                print "<img src='../Recursos/Imagenes/quality-label.png' alt='quaility-label-icon'>";
                            print "</div>";
                        } else {
                            print "<div class='product-label original'>";
                            print "<span>Producto Original</span>";
                            print "<img src='../Recursos/Imagenes/check-label.png' alt='original-label-icon'>";
                            print "</div>";
                        }

                        print "<hr/>";
                        print "<span class='product-desc'>". $producto->getDescripcion() . "</span>";

                        print "<button type='submit' value='carrito' name='action-button'><img src='../Recursos/Imagenes/shopping-cart.png' alt='shopping-cart-icon'></button>";
                    print "</form>";
                }
            ?>
        </div>
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