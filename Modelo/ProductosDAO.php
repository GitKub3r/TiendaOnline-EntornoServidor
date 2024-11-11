<?php
require_once 'Database.php';
require_once 'ProductosDTO.php';
class ProductosDAO
{
    private $conn;
    public function __construct() {
        $this->conn = Database::getConnection();
    }

    public function getProductosByID($id) {
        $stmt = $this->conn->prepare("SELECT * FROM producto WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $fila = $stmt->fetch(PDO::FETCH_ASSOC);

        
        if ($fila) {
            $productos = new ProductosDTO($fila['nombre'], $fila['descripcion'], $fila['precio']);
            return $productos;
        } else {
            return null;
        }
    }

    public function getProductosByName($nombre) {
        $stmt = $this->conn->prepare("SELECT * FROM producto WHERE nombre = :nombre");
        $stmt->bindParam(':nombre', $nombre);
        $stmt->execute();
        $fila = $stmt->fetch(PDO::FETCH_ASSOC);


        if ($fila) {
            $productos = new ProductosDTO($fila['nombre'], $fila['descripcion'], $fila['precio']);
            return $productos;
        } else {
            return null;
        }
    }

    public function getProductos() {
        $stmt = $this->conn->prepare("SELECT * FROM producto");
        $stmt->execute();
        $filas = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $productos = [];

        foreach ($filas as $fila) {
            $producto = new ProductosDTO($fila['nombre'], $fila['descripcion'], $fila['precio']);
            $producto->setId($fila['id']);
            $productos[] = $producto;
        }

        return $productos;
    }

    public function addProducto($producto) {
        $stmt = $this->conn->prepare("INSERT INTO producto (nombre, descripcion, precio) VALUES (:nombre, :descripcion, :precio)");

        $name = $producto->getNombre();
        $description = $producto->getDescripcion();
        $price = $producto->getPrecio();

        $stmt->bindParam(':nombre', $name);
        $stmt->bindParam(':descripcion', $description);
        $stmt->bindParam(':precio', $price);
        $stmt->execute();
    }

    public function updateProducto($producto) {
        $stmt = $this->conn->prepare("UPDATE producto SET nombre = :nombre, descripcion = :descripcion, precio = :precio WHERE id = :id");

        $name = $producto->getNombre();
        $description = $producto->getDescripcion();
        $price = $producto->getPrecio();
        $id = $producto->getId();

        $stmt->bindParam(':nombre', $name);
        $stmt->bindParam(':descripcion', $description);
        $stmt->bindParam(':precio', $price);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    public function deleteProducto($id) {
        $stmt = $this->conn->prepare("DELETE FROM producto WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }

    public function deleteProductoByName($nombre) {
        $stmt = $this->conn->prepare("DELETE FROM producto WHERE nombre = :nombre");
        $stmt->bindParam(':nombre', $nombre);
        $stmt->execute();
    }
}