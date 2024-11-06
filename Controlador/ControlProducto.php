<?php
require '../Modelo/ProductosDAO.php';
require '../Modelo/ProductosDTO.php';

class ControlProducto
{
    public function __construct()
    {
        $this->ProductosDAO = new ProductosDAO();
    }

    public function getProducto($id)
    {
        return $this->ProductosDAO->getProuctosByID($id);
    }
}