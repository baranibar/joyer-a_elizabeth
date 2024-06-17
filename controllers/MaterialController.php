<?php 

namespace Controllers;

use MVC\Router;
use Model\Producto;
use Model\Categoria;
use Model\Material;
use Model\Moneda;

class MaterialController  {
    

    public static function mantenimiento_crear(Router $router) {

        $auth = $_SESSION['login'] ?? null;

        $categorias = Categoria::listar_categorias();
        // Valor que queremos filtrar
        $estado_requerido = 'Activo';

        // Filtrar los productos cuyo nombre sea igual a $nombre_buscado
        $categorias = array_filter($categorias, function($categoria) use ($estado_requerido) {
            return $categoria->estado === $estado_requerido;
        });

        // Ejecutar el código después de que el usuario envia el formulario
        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            /** Crea una nueva instancia */
            $material = new Material($_POST['material']);
            //debuguear($_POST['producto']['id_material']);
            //debuguear($producto);
            // Guarda en la base de datos
            $resultado = $material->crear();


            if($resultado) {
                header('location: /admin?mantenimiento=3');
            }

        }

        $router->render('paginas/material_crear',[
            'categorias' => $categorias,
            'auth' => $auth
        ]);

    }

    public static function mantenimiento_actualizar(Router $router) {

        $auth = $_SESSION['login'] ?? null;

        $categorias = Categoria::listar_categorias();
            
        // Valor que queremos filtrar
        $estado_requerido = 'Activo';

        // Filtrar los productos cuyo nombre sea igual a $nombre_buscado
        $categorias = array_filter($categorias, function($categoria) use ($estado_requerido) {
            return $categoria->estado === $estado_requerido;
        });

        $id_material = isset($_GET['idmaterial']) ? (int)$_GET['idmaterial'] : null;
        $materiales = Material::detalle_material($id_material);    
        // Ejecutar el código después de que el usuario envia el formulario
        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            /** Crea una nueva instancia */
            $material = new Material($_POST['material']);
            // Guarda en la base de datos
            $resultado = $material->actualizar($id_material);

            if($resultado) {
                header('location: /admin?mantenimiento=3');
            }
        }

        $router->render('paginas/material_actualizar',[
            'categorias' => $categorias,
            'materiales' => $materiales,
            'auth' => $auth
        ]);

    }

}