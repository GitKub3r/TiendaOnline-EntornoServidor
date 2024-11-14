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
        if (isset($_SESSION['lista_tareas'][$id])) {
            unset($_SESSION['lista_tareas'][$id]);
        }
    }

    public function eliminarTodosCarrito()
    {
        $_SESSION['lista_tareas'] = [];
    }
}