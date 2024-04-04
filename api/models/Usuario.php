<?php

namespace App\Models;

use RedBeanPHP\R;

class Usuario

{
    public function obtenerTodos()
    {
        $usuarios = R::findAll("usuarios");
        return $usuarios;

    }

    public function obtenerPorId($id)
    {
        $usuario = R:: load('usuarios', $id);
        return $usuario;
    }

    public function crear($datos)
    {
        $usuario = R::dispense('usuarios');
        $usuario->import($datos);
        $id = R::store($usuario);
        return $id;
    }

    public function actualizar($id, $datos)
    {
        $usuario = R::load('usuarios', $id);
        $usuario->import($datos);
        R::store($usuario);
    }

    public function eliminar($id)
    {
        $usuario = R::load('usuarios', $id);
        R::trash($usuario);
    }
}