<?php

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
            <a href="signin-page.html" class="link">Cuenta</a>
        </nav>
    </header>

    <div class="profile-content">
        <form class="profile-col" action="../Controlador/ControlCliente.php" method="POST">
            <img src="../Recursos/Imagenes/not-logged-in-1-48.png" alt="profile-picture" class="profile-col-img">
            <h2>Your username</h2>

            <hr>

            <button>Edit</button>
            <button type="submit" value="logout">Log Out</button>
        </form>

        <form class="profile-box" action="" method="POST">
            <div class="form-group-container">
                <div class="form-group">
                    <label for="profile-name">Name</label>
                    <input type="text" name="profile-name" id="profile-name" required disabled>
                </div>

                <div class="form-group">
                    <label for="profile-surname">Surname</label>
                    <input type="text" name="profile-surname" id="profile-surname" required disabled>
                </div>
            </div>

            <div class="form-group">
                <label for="profile-nickname">Nickname</label>
                <input type="text" name="profile-nickname" id="profile-nickname" required disabled>
            </div>

            <div class="form-group-container">
                <div class="form-group">
                    <label for="profile-telephone">Phone Number</label>
                    <input type="text" name="profile-telephone" id="profile-telephone" required disabled>
                </div>

                <div class="form-group">
                    <label for="profile-direction">Direction</label>
                    <input type="text" name="profile-direction" id="profile-direction" required disabled>
                </div>
            </div>

            <button type="submit" value="confirm">Confirm</button>
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
