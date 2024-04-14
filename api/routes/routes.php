<?php


use App\controllers\UsuarioController;

require_once __DIR__ . '/../../vendor/autoload.php';

$app = new Slim\App();

//Ruta para obtener todos los usuarios
$app->get('/usuarios', function ($request, $response, $args) {
    $usuarioController = new UsuarioController();
    $response->write($usuarioController->obtenerTodos());
    return $response;
});

// Ruta para obtener un usuario por su ID
$app->get('/usuarios/{id}', function ($request, $response, $args) {
    $usuarioController = new UsuarioController();
    $id = $args['id'];
    $response->write($usuarioController->obtenerPorId($id));
    return $response;
});

//ruta para crear un nuevo usuario
$app->post('/usuarios', function ($request, $response, $args) {
    $usuarioController = new UsuarioController();
    $params = $request->getParsedBody();
    $response->write($usuarioController->crear($params));
    return $response;
});

// Ruta para actualizar un usuario existente
$app->put('/usuarios/{id}', function ($request, $response, $args) {
    $usuarioController = new UsuarioController();
    $id = $args['id'];
    $params = $request->getParsedBody();
    $response->write($usuarioController->actualizar($id, $params));
    return $response;
});


// // Ruta para eliminar un usuario
$app->delete('/usuarios/{id}', function ($request, $response, $args) {
    $usuarioController = new UsuarioController();
    $id = $args['id'];
    $response->write($usuarioController->eliminar($id));
    return $response;
});


$app->run();