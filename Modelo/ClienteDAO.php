<?php

require_once "Database.php";
require_once "ClienteDTO.php";

class ClienteDAO
{
    private $connection;
    public function __construct() {
        $this->connection = Database::getConnection();
    }

    public function getClienteByID($id) {
        $stmt = $this->connection->prepare("SELECT * FROM cliente WHERE id = :id");
        $stmt->bindParam(":id", $id);
        $stmt->execute();

        $fila = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($fila) {
            $cliente = new ClienteDTO($fila["nickname"], $fila["password"]);
            $cliente->setNombre($fila["nombre"]);
            $cliente->setApellido($fila["apellido"]);
            $cliente->setTelefono($fila["telefono"]);
            $cliente->setDomicilio($fila["domicilio"]);
            return $cliente;
        } else {
            return null;
        }
    }

    public function getClienteByNickname($cliente) {
        $stmt = $this->connection->prepare("SELECT * FROM cliente WHERE nickname = :nickname");

        $stmt->bindParam(":nickname", $cliente->getNickname());
        $stmt->execute();

        $fila = $stmt->fetch(PDO::FETCH_ASSOC);
        return $fila;
    }

    public function addCliente($cliente) {
        $stmt = $this->connection->prepare("INSERT INTO cliente (nombre, apellido, nickname, password, telefono, domicilio) VALUES (:nombre, :apellido, :nickname, :password, :telefono, :domicilio)");

        $stmt->bindParam(":nombre", $cliente->getNombre());
        $stmt->bindParam(":apellido", $cliente->getApellido());
        $stmt->bindParam(":nickname", $cliente->getNickname());
        $stmt->bindParam(":password", $cliente->getPassword());
        $stmt->bindParam(":telefono", $cliente->getTelefono());
        $stmt->bindParam(":domicilio", $cliente->getDomicilio());
        $stmt->execute();
    }

    public function updateCliente($cliente) {
        $stmt = $this->connection->prepare("UPDATE clientes SET nombre = :nombre, apellido = :apellido, nickname = :nickname, password = :password, telefono = :telefono, domicilio = :domicilio WHERE id = :id");

        $stmt->bindParam(":nombre", $cliente->getNombre());
        $stmt->bindParam(":apellido", $cliente->getApellido());
        $stmt->bindParam(":nickname", $cliente->getNickname());
        $stmt->bindParam(":password", $cliente->getPassword());
        $stmt->bindParam(":telefono", $cliente->getTelefono());
        $stmt->bindParam(":domicilio", $cliente->getDomicilio());
        $stmt->bindParam(":id", $cliente->getId());
        $stmt->execute();
    }

    public function deleteCliente($id) {
        $stmt = $this->connection->prepare("DELETE FROM cliente WHERE id = :id");
        $stmt->bindParam(":id", $id);
        $stmt->execute();
    }
}