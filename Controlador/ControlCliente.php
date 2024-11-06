<?php

require "Modelo/ClienteDAO.php";

class ControlCliente
{
    public function __construct() {
        $this->ClienteDAO = new ClienteDAO();
    }
}