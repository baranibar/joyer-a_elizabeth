<?php 

namespace Controllers;

use MVC\Router;
use Model\Producto;
use Model\Categoria;
use Model\Material;
use Model\Moneda;

class MonedaController  {
    

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
            $moneda = new Moneda($_POST['moneda']);
            //debuguear($_POST['producto']['id_material']);
            //debuguear($producto);
            // Guarda en la base de datos
            $resultado = $moneda->crear();


            if($resultado) {
                header('location: /admin?mantenimiento=4');
            }

        }

        $router->render('paginas/moneda_crear',[
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
            
        $id_moneda = isset($_GET['idmoneda']) ? (int)$_GET['idmoneda'] : null;
        $monedas = Moneda::detalle_moneda($id_moneda);    
        // Ejecutar el código después de que el usuario envia el formulario
        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            /** Crea una nueva instancia */
            $moneda = new Moneda($_POST['moneda']);
            // Guarda en la base de datos
            $resultado = $moneda->actualizar($id_moneda);

            if($resultado) {
                header('location: /admin?mantenimiento=4');
            }
        }

        $router->render('paginas/moneda_actualizar',[
            'categorias' => $categorias,
            'monedas' => $monedas,
            'auth' => $auth
        ]);
    }

}