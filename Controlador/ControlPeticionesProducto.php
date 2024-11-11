<?php

require_once "ControlProducto.php";
require_once '../Modelo/ProductosDTO.php';

$button = isset($_POST["action-button"]) ? $_POST["action-button"] : "";

$controlProducto = new ControlProducto();

switch ($button) {
    case "agregar":
        $nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : "";
        $precio = isset($_POST["precio"]) ? $_POST["precio"] : "";
        $descripcion = isset($_POST["descripcion"]) ? $_POST["descripcion"] : "";

        $newProduct = new ProductosDTO($nombre, $precio, $descripcion);
        $controlProducto->addProducto($newProduct);
        header("Location: ../Vista/index.php");
        break;

    case "modificar":
        $nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : "";
        $precio = isset($_POST["precio"]) ? $_POST["precio"] : "";
        $descripcion = isset($_POST["descripcion"]) ? $_POST["descripcion"] : "";

        $newProduct = new ProductosDTO($nombre, $precio, $descripcion);
        $controlProducto->updateProducto($newProduct);
        header("Location: ../Vista/index.php");
        break;

    case "eliminar":
        $nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : "";
        $controlProducto->deleteProductoByName($nombre);
        break;
    case "carrito":
        break;
}
?>