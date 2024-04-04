<?php

// use Slim\App;

use App\controllers\UsuarioController;

// require_once __DIR__ . '/../../vendor/autoload.php';

// $app = new App();
// $app = new \Slim\App();

$usuarioController = new UsuarioController();

//Ruta para obtener todos los usuarios
$app->get('/usuarios', function () use ($usuarioController) {
    $usuarioController->obtenerTodos();
});

//ruta para obtener un usuario por su ID
$app->get('/usuarios/{id}', function ($id) use ($usuarioController) {
    $usuarioController->obtenerPorId($id);
});

//ruta para crear un nuevo usuario
$app->post('/usuarios', function () use ($usuarioController) {
    $usuarioController->crear();
});

// Ruta para actualizar un usuario existente
$app->put('/usuarios/{id}', function ($id) use ($usuarioController){
    $usuarioController->actualizar($id);
});

// Ruta para eliminar un usuario
$app->delete('/usuarios/{id}', function ($id) use ($usuarioController) {
    $usuarioController->eliminar($id);
});