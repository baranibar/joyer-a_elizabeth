<?php 

namespace Controllers;

use MVC\Router;
use Model\Producto;
use Model\Categoria;
use Model\Material;

class PaginasController  {
    
    public static function inicio(Router $router) {

        $auth = $_SESSION['login'] ?? null;

        $productos = Producto::listar_productos(14);
        // Valor que queremos filtrar
        $nombre_buscado = 'CATEGORIA';
        $estado_requerido = 'Activo';

        // Filtrar los productos cuyo nombre sea igual a $nombre_buscado
        $productos = array_filter($productos, function($producto) use ($nombre_buscado,$estado_requerido) {
            return $producto->descripcion !== $nombre_buscado && $producto->estado == $estado_requerido;
        });

        $categorias = Categoria::listar_categorias();
        // Valor que queremos filtrar
        $estado_requerido = 'Activo';

        // Filtrar los productos cuyo nombre sea igual a $nombre_buscado
        $categorias = array_filter($categorias, function($categoria) use ($estado_requerido) {
            return $categoria->estado === $estado_requerido;
        });
        $nuestas_colecciones = Categoria::nuestras_colecciones(4);
        //$categorias = null;

        $router->render('paginas/index', [
            'productos' => $productos,
            'nuestas_colecciones' => $nuestas_colecciones,
            'categorias' => $categorias,
            'auth' => $auth
        ]);
    }


    public static function joyas_detalle(Router $router) {

        $auth = $_SESSION['login'] ?? null;
        // Captura el filtro de categoría si está presente
        $categorias = Categoria::listar_categorias();
        // Valor que queremos filtrar
        $estado_requerido = 'Activo';

        // Filtrar los productos cuyo nombre sea igual a $nombre_buscado
        $categorias = array_filter($categorias, function($categoria) use ($estado_requerido) {
            return $categoria->estado === $estado_requerido;
        });

        $productoid = isset($_GET['idproducto']) ? (int)$_GET['idproducto'] : null;

        $productos = Producto::detalle_productos($productoid);
        $productos_carrusel = Producto::carrusel_productos($productoid);

        $materiales = Material::materiales_producto_detalle($productoid);

        foreach($productos as $producto):
            $categoriaId = $producto->id_categoria;
        endforeach;
        
        $productos_categoria = Producto::listar_productos_por_categoria($categoriaId);
        // Valor que queremos filtrar
        $nombre_buscado = 'CATEGORIA';
        $estado_requerido = 'Activo';
        // Filtrar los productos cuyo nombre sea igual a $nombre_buscado
        $productos_categoria = array_filter($productos_categoria, function($producto) use ($nombre_buscado,$estado_requerido) {
            return $producto->descripcion !== $nombre_buscado && $producto->estado == $estado_requerido;
        });


        $router->render('paginas/shop-single', [
            'productos' => $productos,
            'productos_categoria' => $productos_categoria,
            'categorias' => $categorias,
            'productos_carrusel'  => $productos_carrusel,
            'materiales' => $materiales,
            'auth' => $auth

        ]);
    }

    public static function joyas(Router $router) {

        $auth = $_SESSION['login'] ?? null;
        // Captura el filtro de categoría si está presente
        $categoriaId = isset($_GET['categoria']) ? (int)$_GET['categoria'] : null;

        // Modifica la consulta de productos según el filtro de categoría
        if ($categoriaId) {
        $productos = Producto::listar_productos_por_categoria($categoriaId);
        //$productos = Producto::listar_productos(100);
        } else {
        $productos = Producto::listar_productos(1000);
        }
        
        // Valor que queremos filtrar
        $nombre_buscado = 'CATEGORIA';
        $estado_requerido = 'Activo';

        // Filtrar los productos cuyo nombre sea igual a $nombre_buscado
        $productos = array_filter($productos, function($producto) use ($nombre_buscado,$estado_requerido) {
            return $producto->descripcion !== $nombre_buscado && $producto->estado == $estado_requerido;
        });

        //$productos = Producto::listar_productos(100);
        $categorias = Categoria::listar_categorias();
        // Valor que queremos filtrar
        $estado_requerido = 'Activo';

        // Filtrar los productos cuyo nombre sea igual a $nombre_buscado
        $categorias = array_filter($categorias, function($categoria) use ($estado_requerido) {
            return $categoria->estado === $estado_requerido;
        });

        // Total de productos
        $totalProductos = count($productos);

        // Productos por página
        $productosPorPagina = 12;

        // Total de páginas
        $totalPaginas = ceil($totalProductos / $productosPorPagina);

        // Página actual (por defecto es la 1 si no está presente en la URL)
        $paginaActual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;

        // Calcula el desplazamiento (offset)
        $offset = ($paginaActual - 1) * $productosPorPagina;

        // Extrae los productos para la página actual
        $productos = array_slice($productos, $offset, $productosPorPagina);


        $router->render('paginas/shop',[ 
            'productos' => $productos,
            'totalPaginas' => $totalPaginas,
            'paginaActual' => $paginaActual,
            'categorias' => $categorias,
            'categoriaId' => $categoriaId,
            'auth' => $auth
        ]);
    }
}