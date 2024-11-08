<?php

require "../Modelo/ClienteDAO.php";

class ControlCliente
{
    public function __construct() {
        $this->ClienteDAO = new ClienteDAO();
    }

    public function getClienteByNickname($cliente) {
        $fila = $this->ClienteDAO->getClienteByNickname($cliente);
        $sha1 = sha1($cliente->getPassword());

        if ($fila) {
            if ($fila["password"] == $sha1) {
                $cliente = new ClienteDTO($fila["nickname"], $fila["password"]);
                $cliente->setId($fila["id"]);

                return $cliente;
            } else {
                $cliente = new ClienteDTO($fila["nickname"], null);
                return $cliente;
            }
        } else {
            return null;
        }
    }

    public function getClienteByID($id) {
       return $this->ClienteDAO->getClienteById($id);
    }
}