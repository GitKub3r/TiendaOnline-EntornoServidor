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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Profile</title>
    <link rel="stylesheet" href="estilos/style.css">
    <link rel="stylesheet" href="estilos/main-header.css">
    <link rel="stylesheet" href="estilos/main-footer.css">
    <link rel="stylesheet" href="estilos/profile.css">
    <link rel="stylesheet" href="estilos/form.css">
</head>
<body>
<header class="main-header">
    <a href="landing-page.php">
        <h1>Shop-In</h1>
    </a>

    <nav class="main-header-menu">
        <a href="" class="link">Acciones</a>
        <a href="" class="link">Carrito</a>

        <?php

        if (isset($_SESSION["logged"])) {
            print "<a href='profile.php' class='pfp-image'><img alt='pfp' src='../Recursos/Imagenes/pfp-white.png'/></a>";
        } else {
            print "<a class='link' href='signin-page.php'>Log In</a>";
        }
        ?>
    </nav>
</header>

    <div class="profile-content">
        <form class="profile-col" action="../Controlador/ControlPeticiones.php" method="POST">
            <div class="profile-info">
                <img src="../Recursos/Imagenes/pfp-black.png" alt="profile-picture" class="profile-col-img">
                <h2>
                    <?php
                        print $client->getNickname();
                    ?>
                </h2>
            </div>

            <button type="submit" value="logout" name="action-button">Log Out</button>
        </form>

        <form class="profile-box" action="" method="POST">
            <div class="profile-info">
                <div class="form-group-container">
                    <div class="form-group">
                        <label for="profile-name">Name</label>
                        <span id="profile-name">
                            <?php
                                print $client->getNombre();
                            ?>
                        </span>
                    </div>

                    <div class="form-group">
                        <label for="profile-surname">Surname</label>
                        <span id="profile-surname">
                            <?php
                                print $client->getApellido();
                            ?>
                        </span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="profile-nickname">Nickname</label>
                    <span id="profile-nickname">
                        <?php
                            print $client->getNickname();
                        ?>
                    </span>
                </div>

                <div class="form-group-container">
                    <div class="form-group">
                        <label for="profile-telephone">Phone Number</label>
                        <span id="profile-telephone">
                            <?php
                                print $client->getTelefono();
                            ?>
                        </span>
                    </div>

                    <div class="form-group">
                        <label for="profile-direction">Direction</label>
                        <span id="profile-direction">
                            <?php
                                print $client->getDomicilio();
                            ?>
                        </span>
                    </div>
                </div>
            </div>
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
