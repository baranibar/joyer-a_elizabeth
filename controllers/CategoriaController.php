<?php 

namespace Controllers;

use MVC\Router;
use Model\Categoria;

class CategoriaController  {
    
    

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
            $categoria = new Categoria($_POST['categoria']);
            //debuguear($_POST['producto']['id_material']);
            //debuguear($producto);
            // Guarda en la base de datos

            $resultado = $categoria->crear();

            if($resultado) {
                header('location: /admin?mantenimiento=2');
            }

        }

        $router->render('paginas/categoria_crear',[
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

        $id_categoria = isset($_GET['idcategoria']) ? (int)$_GET['idcategoria'] : null;
        $categorias2 = Categoria::detalle_categoria($id_categoria);

        // Ejecutar el código después de que el usuario envia el formulario
        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            /** Crea una nueva instancia */
            $categoria = new Categoria($_POST['categoria']);

            // Guarda en la base de datos
            $resultado = $categoria->actualizar($id_categoria);

            if($resultado) {
                header('location: /admin?mantenimiento=2');
            }

        }

        $router->render('paginas/categoria_actualizar',[ 
            'categorias' => $categorias,
            'categorias2' => $categorias2,
            'auth' => $auth
        ]);

    }

}