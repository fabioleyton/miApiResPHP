<?php


use App\controllers\UsuarioController;

require_once __DIR__ . '/../../vendor/autoload.php';

$app = new Slim\App();
// $app = new \Slim\App();

 ;

//Ruta para obtener todos los usuarios
// $app->get('/usuarios', function () use ($usuarioController) {
//     var_dump("Hola");
//     $usuarioController->obtenerTodos();
// });

$app->get('/usuarios', function ($request, $response, $args) {
    $usuarioController = new UsuarioController();
    $response->write($usuarioController->obtenerTodos());
    return $response;
});

// //ruta para obtener un usuario por su ID
// $app->get('/usuarios/{id}', function ($id) use ($usuarioController) {
//     $usuarioController = new UsuarioController();
//     $usuarioController->obtenerPorId($id);
// });

//ruta para crear un nuevo usuario
$app->post('/usuarios', function ($request, $response, $args) {
    $usuarioController = new UsuarioController();
    $params = $request->getParsedBody();
    $response->write($usuarioController->crear($params));
    return $response;
});

// // Ruta para actualizar un usuario existente
// $app->put('/usuarios/{id}', function ($id) use ($usuarioController){
//     $usuarioController = new UsuarioController();
//     $usuarioController->actualizar($id);
// });

// // Ruta para eliminar un usuario
// $app->delete('/usuarios/{id}', function ($id) use ($usuarioController) {
//     $usuarioController = new UsuarioController();
//     $usuarioController->eliminar($id);
// });

$app->run();