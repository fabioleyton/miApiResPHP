<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Cargar el acrchivo de configuracion
require_once __DIR__ . '/api/config/config.php';

// Carga el archivo de rutas
require_once __DIR__ . '/api/routes/routes.php';