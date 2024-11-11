<?php
require '../Modelo/ProductosDAO.php';

class ControlProducto{
    public function __construct(){
        $this->ProductosDAO = new ProductosDAO();
    }

    public function getProducto($id)
    {
        return $this->ProductosDAO->getProuctosByID($id);
    }

    public function getProductos() {
        return $this->ProductosDAO->getProuctos();
    }

    public function addProducto($product) {
        this->ProductosDTO->addProducto($product);
    }

    public function updateProducto($product)
    {
        this->ProductosDTO->updateProducto($product);
    }

    public function deleteProducto($id) {
        this->ProductosDTO->deleteProducto($id);
    }

    public function deleteProductoByName($nombre) {
        this->ProductosDTO->deleteProductoByName($nombre);
    }
}