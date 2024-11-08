<?php
require '../Modelo/ProductosDAO.php';
require '../Modelo/ProductosDTO.php';

class ControlProducto{
    public function __construct(){
        $this->ProductosDAO = new ProductosDAO();
    }

    public function getProducto($id)
    {
        return $this->ProductosDAO->getProuctosByID($id);
    }

    public function getProducts() {
        return $this->ProductosDAO->getProuctos();
    }

    public function addProduct($product) {
        this->ProductosDTO->addProduct($product);
    }

    public function deleteProduct($id) {
        this->ProductosDTO->deleteProduct($id);
    }
}