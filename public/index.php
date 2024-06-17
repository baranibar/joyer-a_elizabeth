<?php 
require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../includes/app.php';


use MVC\Router;
use Controllers\ProductoController;
use Controllers\PaginasController;
use Controllers\CategoriaController;
use Controllers\MaterialController;
use Controllers\MonedaController;
use Controllers\LoginController;
use Model\Producto;

$router = new Router();

$router->get('/', [PaginasController::class, 'inicio']);
$router->get('/inicio', [PaginasController::class, 'inicio']);
$router->get('/joyas', [PaginasController::class, 'joyas']);
$router->get('/login', [LoginController::class, 'login']);
$router->post('/login', [LoginController::class, 'login']);
$router->get('/logout', [LoginController::class, 'logout']);
$router->get('/joyas_detalle', [PaginasController::class, 'joyas_detalle']);
$router->get('/admin', [ProductoController::class, 'mantenimiento_consultar']);
$router->get('/producto_crear', [ProductoController::class, 'mantenimiento_crear']);
$router->post('/producto_crear', [ProductoController::class, 'mantenimiento_crear']);
$router->get('/categoria_crear', [CategoriaController::class, 'mantenimiento_crear']);
$router->post('/categoria_crear', [CategoriaController::class, 'mantenimiento_crear']);
$router->get('/material_crear', [MaterialController::class, 'mantenimiento_crear']);
$router->post('/material_crear', [MaterialController::class, 'mantenimiento_crear']);
$router->get('/moneda_crear', [MonedaController::class, 'mantenimiento_crear']);
$router->post('/moneda_crear', [MonedaController::class, 'mantenimiento_crear']);

$router->get('/producto_actualizar', [ProductoController::class, 'mantenimiento_actualizar']);
$router->post('/producto_actualizar', [ProductoController::class, 'mantenimiento_actualizar']);
$router->get('/categoria_actualizar', [CategoriaController::class, 'mantenimiento_actualizar']);
$router->post('/categoria_actualizar', [CategoriaController::class, 'mantenimiento_actualizar']);
$router->get('/material_actualizar', [MaterialController::class, 'mantenimiento_actualizar']);
$router->post('/material_actualizar', [MaterialController::class, 'mantenimiento_actualizar']);
$router->get('/moneda_actualizar', [MonedaController::class, 'mantenimiento_actualizar']);
$router->post('/moneda_actualizar', [MonedaController::class, 'mantenimiento_actualizar']);
//debuguear($router);
// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();