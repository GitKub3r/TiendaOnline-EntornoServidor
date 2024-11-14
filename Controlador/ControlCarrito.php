<?php

class ControlCarrito
{


    public function __construct()
    {
    }

    public function agregarCarrito($id) {
        $_SESSION['listaCarrito'][] = $id;
    }

    public function eliminarUnoCarrito($id) {
        if (isset($_SESSION['listaCarrito'][$id])) {
            $_SESSION['listaCarrito'][$id] = null;
        }
    }

    public function eliminarTodosCarrito()
    {
        $_SESSION['listaCarrito'] = [];
    }
}