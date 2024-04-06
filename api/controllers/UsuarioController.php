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
        // Obtener los usuarios
        $usuarios = $this->usuarioModel->obtenerTodos();

        // Inicializar un array para almacenar los usuarios como arrays asociativos
        $usuariosArray = [];

        // Convertir cada usuario en un array asociativo
        foreach ($usuarios as $usuario) {
            $usuarioArray = $usuario->getProperties();
            $usuariosArray[] = $usuarioArray;
        }

        // Codificar el array de usuarios como JSON y devolverlo
        echo json_encode($usuariosArray);
    }

    public function obtenerPorId($id)
    {
        $usuario = $this->usuarioModel->obtenerPorId($id);
        echo json_encode($usuario);
    }

    public function crear($datos)
    {
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