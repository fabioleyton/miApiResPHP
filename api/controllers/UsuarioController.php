<?php

namespace App\controllers;

use App\Models\Usuario;

class UsuarioController
{
    private $usuarioModel;

    public function __construct()
    {
        $this->usuarioModel = new Usuario();
    }

    public function obtenerTodos()
    {
        $usuarios = $this->usuarioModel->obtenerTodos();
        echo json_encode($usuarios);
    }

    public function obtenerPorId($id)
    {
        $usuario = $this->usuarioModel->obtenerPorId($id);
        echo json_encode($usuario);
    }

    public function crear()
    {
        $datos = json_decode(file_get_contents('php://input'), true);
        $id = $this->usuarioModel->crear($datos);
        echo json_encode(['id' => $id]);
    }

    public function actualizar($id)
    {
        $datos = json_decode(file_get_contents('php://input'), true);
        $this->usuarioModel->actualizar($id, $datos);
        echo json_encode(['mensaje' => 'Usuario actualizado correctamente']);
    }

    public function eliminar($id)
    {
        $this->usuarioModel->eliminar(($id));
        echo json_encode(['mensaje' => 'Usuario eliminado correctamente']);
    }
    
}