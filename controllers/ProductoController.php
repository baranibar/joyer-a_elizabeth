<?php 

namespace Controllers;

use MVC\Router;
use Model\Producto;
use Model\Categoria;
use Model\Material;
use Model\Moneda;

class ProductoController  {
    
    public static function mantenimiento_consultar(Router $router) {

        $auth = $_SESSION['login'] ?? null;

        $columnasdb = Producto::get_columnas();
        $categorias = Categoria::listar_categorias();
        // Valor que queremos filtrar
        $estado_requerido = 'Activo';

        // Filtrar los productos cuyo nombre sea igual a $nombre_buscado
        $categorias = array_filter($categorias, function($categoria) use ($estado_requerido) {
            return $categoria->estado === $estado_requerido;
        });

        $productos = Producto::listar_productos(1000);
        // Captura el filtro de categoría si está presente
        $mantenimiento = isset($_GET['mantenimiento']) ? (int)$_GET['mantenimiento'] : null;

        // Modifica la consulta de productos según el filtro de categoría
        if($mantenimiento=='1' || $mantenimiento == null) {
            $consultar = Producto::listar_productos(1000);
        } 
        if($mantenimiento=='2') 
        {
            $consultar = Categoria::listar_categorias();
        }
        if($mantenimiento=='3') 
        {
            $consultar = Material::listar_materiales();
        }
        if($mantenimiento=='4') 
        {
            $consultar = Moneda::listar_monedas();
        }

        // Total de productos
        $totalProductos = count($consultar);

        // Productos por página
        $productosPorPagina = 10;

        // Total de páginas
        $totalPaginas = ceil($totalProductos / $productosPorPagina);

        // Página actual (por defecto es la 1 si no está presente en la URL)
        $paginaActual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;

        // Calcula el desplazamiento (offset)
        $offset = ($paginaActual - 1) * $productosPorPagina;

        // Extrae los productos para la página actual
        $consultar = array_slice($consultar, $offset, $productosPorPagina);


        $router->render('paginas/admin',[ 
            'consultar' => $consultar,
            'totalPaginas' => $totalPaginas,
            'paginaActual' => $paginaActual,
            'columnasdb' => $columnasdb,
            'categorias' => $categorias,
            'productos' => $productos,
            'mantenimiento' => $mantenimiento,
            'auth' => $auth

        ]);

    }

    public static function mantenimiento_crear(Router $router) {

        $auth = $_SESSION['login'] ?? null;

        $categorias = Categoria::listar_categorias();
        // Valor que queremos filtrar
        $estado_requerido = 'Activo';

        // Filtrar los productos cuyo nombre sea igual a $nombre_buscado
        $categorias = array_filter($categorias, function($categoria) use ($estado_requerido) {
            return $categoria->estado === $estado_requerido;
        });

        $materiales = Material::listar_materiales();
        // Filtrar los productos cuyo nombre sea igual a $nombre_buscado
        $materiales = array_filter($materiales, function($material) use ($estado_requerido) {
            return $material->estado === $estado_requerido;
        });

                
        $monedas = Moneda::listar_monedas();
        // Filtrar los productos cuyo nombre sea igual a $nombre_buscado
        $monedas = array_filter($monedas, function($moneda) use ($estado_requerido) {
            return $moneda->estado === $estado_requerido;
        });

        // Ejecutar el código después de que el usuario envia el formulario
        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            /** Crea una nueva instancia */
            $producto = new Producto($_POST['producto']);
            //debuguear($_POST['producto']['id_material']);
            //debuguear($producto);
            // Guarda en la base de datos

            $id_materiales = $_POST['producto']['id_material'];

            $resultado = $producto->crear($id_materiales);

            if($resultado) {
                header('location: /admin?mantenimiento=1');
            }

        }

        $router->render('paginas/producto_crear',[ 
            'categorias' => $categorias,
            'materiales' => $materiales,
            'monedas' => $monedas,
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

        $materiales = Material::listar_materiales();     
        // Filtrar los productos cuyo nombre sea igual a $nombre_buscado
        $materiales = array_filter($materiales, function($material) use ($estado_requerido) {
            return $material->estado === $estado_requerido;
        });
        
        $monedas = Moneda::listar_monedas();
        // Filtrar los productos cuyo nombre sea igual a $nombre_buscado
        $monedas = array_filter($monedas, function($moneda) use ($estado_requerido) {
            return $moneda->estado === $estado_requerido;
        });

        $productoid = isset($_GET['idproducto']) ? (int)$_GET['idproducto'] : null;
        $productos = Producto::detalle_productos($productoid);
        $materiales_selected = Material::materiales_producto_detalle($productoid);
        $moneda_selected =  Moneda::monedas_producto_detalle($productoid);

        $ids_materiales_select = array_map(function($material) {
            return $material->id_material;
        }, $materiales_selected);

        $ids_moneda_select = array_map(function($moneda) {
            return $moneda->id_moneda;
        }, $moneda_selected);

        // Ejecutar el código después de que el usuario envia el formulario
        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            /** Crea una nueva instancia */
            $producto = new Producto($_POST['producto']);
            //debuguear($_POST['producto']['id_material']);
            //debuguear($producto);
            // Guarda en la base de datos

            //$id_materiales = $_POST['producto']['id_material'];
            $id_materiales = $_POST['producto']['id_material'];

            $resultado = $producto->actualizar($productoid,$id_materiales);

            if($resultado) {
                header('location: /admin');
            }

        }

        $router->render('paginas/producto_actualizar',[ 
            'productos' => $productos,
            'categorias' => $categorias,
            'materiales' => $materiales,
            'ids_materiales_select' => $ids_materiales_select,
            'monedas' => $monedas,
            'ids_moneda_select' => $ids_moneda_select,
            'auth' => $auth
        ]);

    }

}