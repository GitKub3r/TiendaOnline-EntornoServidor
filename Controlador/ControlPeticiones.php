<?php

session_start();

require "ControlCliente.php";

$usernameField = isset($_POST["username"]) ? $_POST["username"] : "";
$passwordField = isset($_POST["password"]) ? $_POST["password"] : "";
$logoutButton = isset($_POST["logout-button"]) ? $_POST["logout-button"] : "";

if ($logoutButton == "logout") {
    session_destroy();
    header("Location: ../Vista/landing-page.php");
    exit();
}

$clientControl = new ControlCliente();
$client = new ClienteDTO($usernameField, $passwordField);

$result = $clientControl->getClienteByNickname($client);

if ($result == null) {
    header("Location: ../Vista/signup-page.php");
    exit();
} elseif ($result->getPassword() == null) {
    $_SESSION["login-error"] = true;
    header("Location: ../Vista/signin-page.php");
    exit();
} elseif ($result->getPassword() != null) {
    $_SESSION["logged"] = $result->getId();
    header("Location: ../Vista/landing-page.php");
    exit();
}
