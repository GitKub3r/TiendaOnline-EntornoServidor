<?php

session_start();

require_once "ControlProducto.php";
require_once '../Modelo/ProductosDTO.php';
require_once "ControlCarrito.php";

if (!isset($_SESSION['listaCarrito'])) {
    $_SESSION['listaCarrito'] = [];
}

$button = isset($_POST["action-button"]) ? $_POST["action-button"] : "";

$controlProducto = new ControlProducto();

$controlCarrito = new ControlCarrito();

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

        $existe = $controlProducto->getProducto($id);

        if ($existe == null) {
            $_SESSION["product-error"] = true;
            header("Location: ../Vista/update-product.php");
        } else {
            $_SESSION["product-error"] = false;
            $controlProducto->updateProducto($newProduct);
            header("Location: ../Vista/index.php");
        }
        break;

    case "eliminar":
        $id = isset($_POST["id"]) ? $_POST["id"] : "";
        $existe = $controlProducto->getProducto($id);

        if ($existe == null) {
            $_SESSION["product-error"] = true;
            header("Location: ../Vista/delete-product.php");
        } else {
            $_SESSION["product-error"] = false;
            $controlProducto->deleteProducto($id);
            header("Location: ../Vista/index.php");
        }
        break;
    case "carrito":
        $id = isset($_POST["id-producto"]) ? $_POST["id-producto"] : "";
        $id = str_replace("#", "", $id);
        $controlCarrito->agregarCarrito($id);
        header("Location: ../Vista/index.php");
        break;
    case "eliminarid":
        $id = isset($_POST["id-carrito"]) ? $_POST["id-carrito"] : "";
        $controlCarrito->eliminarUnoCarrito($id);
        header("Location: ../Vista/carrito.php");
        break;
    case "eliminartodos":
        $controlCarrito->eliminarTodosCarrito();
        header("Location: ../Vista/carrito.php");
        break;
}
?>