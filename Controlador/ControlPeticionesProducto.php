<?php

session_start();

require_once "ControlProducto.php";
require_once '../Modelo/ProductosDTO.php';

$button = isset($_POST["action-button"]) ? $_POST["action-button"] : "";

$controlProducto = new ControlProducto();

switch ($button) {
    case "agregar":
        $nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : "";
        $precio = isset($_POST["precio"]) ? $_POST["precio"] : "";
        $descripcion = isset($_POST["descripcion"]) ? $_POST["descripcion"] : "";

        $newProduct = new ProductosDTO($nombre, $descripcion, $precio);

        $existe = $controlProducto->getProductosByNombre($nombre);

        if ($existe != null) {
            $_SESSION["product-error"] = true;
            header("Location: ../Vista/add-product.php");
        } else {
            $_SESSION["product-error"] = false;
            $controlProducto->addProducto($newProduct);
            header("Location: ../Vista/index.php");
        }
        break;

    case "modificar":
        $nombre = isset($_POST["nombre"]) ? $_POST["nombre"] : "";
        $precio = isset($_POST["precio"]) ? $_POST["precio"] : "";
        $descripcion = isset($_POST["descripcion"]) ? $_POST["descripcion"] : "";
        $id = isset($_POST["id"]) ? $_POST["id"] : "";

        $newProduct = new ProductosDTO($nombre, $descripcion, $precio);
        $newProduct->setId($id);
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