<?php

//carga el OMR RedBeanPHP
require_once __DIR__ .'/../../vendor/autoload.php';
// Configuracion de la conexion a la base de datos

$host = 'localhost';
$dbname = 'mi_api_rest';
$username = 'root';
$password = '90112276040Aa*';

// Establece la conexion a la base de datos
\RedBeanPHP\R::setup('mysql:host=' . $host . ';dbname=' . $dbname, $username, $password);

// Habilitar modo debug
// \RedBeanPHP\R::debug(true);
