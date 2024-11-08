<?php

session_start();

require "ControlCliente.php";
require "../Modelo/ClienteDTO.php";

$usernameField = isset($_POST["username"]) ? $_POST["username"] : "";
$passwordField = isset($_POST["password"]) ? $_POST["password"] : "";
$button = isset($_POST["action-button"]) ? $_POST["action-button"] : "";

if ($button == "logout") {
    session_destroy();
    header("Location: ../Vista/landing-page.php");
    exit();
} elseif ($button == "create-client") {
    $nameField = isset($_POST["new-name"]) ? $_POST["new-name"] : "";
    $surnameField = isset($_POST["new-surname"]) ? $_POST["new-surname"] : "";
    $nicknameField = isset($_POST["new-username"]) ? $_POST["new-username"] : "";
    $directionField = isset($_POST["new-direction"]) ? $_POST["new-direction"] : "";
    $telephoneField = isset($_POST["new-tel"]) ? $_POST["new-tel"] : "";
    $passwordField = isset($_POST["new-password"]) ? $_POST["new-password"] : "";

    $newClient = new ClienteDTO($nicknameField, $passwordField);
    $newClient->setNombre($nameField);
    $newClient->setApellido($surnameField);
    $newClient->setDomicilio($directionField);
    $newClient->setTelefono($telephoneField);

    $this->ControlCliente->addClient($newClient);
    header("Location: ../Vista/signin-page.php");
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
