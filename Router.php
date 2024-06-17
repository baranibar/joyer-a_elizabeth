<?php

namespace MVC;

class Router
{
    public array $getRoutes = [];
    public array $postRoutes = [];

    public function get($url, $fn) {
        $this->getRoutes[$url] = $fn;
    }

    public function post($url, $fn) {
        $this->postRoutes[$url] = $fn;
    }

    public function comprobarRutas() {

        session_start();
        $auth = $_SESSION['login'] ?? null;

        $rutas_protegidas = ['/admin','/producto_crear','/producto_actualizar','/categoria_crear','categoria_actualizar',
        '/material_crear','/material_actualizar','/moneda_crear','/moneda_actualizar'
        ];

        //$currentUrl = $_SERVER['PATH_INFO'] ?? '/';
        //$currentUrl = strtok($_SERVER['SCRIPT_NAME'], '?') ?? '/';
        $currentUrl = $_SERVER['SCRIPT_NAME'] ?? '/';
        debuguear($currentUrl);
        $method = $_SERVER['REQUEST_METHOD'];
        
        if ($method === 'GET') {
            $fn = $this->getRoutes[$currentUrl] ?? null;
        } else {
            $fn = $this->postRoutes[$currentUrl] ?? null;
        }
        //Proteger las rutas
        if(in_array($currentUrl,$rutas_protegidas) && !$auth)
        {
            header('Location:/');
        }
        
        
        if ( $fn ) {
            // Call user fn va a llamar una función cuando no sabemos cual sera
            call_user_func($fn, $this); // This es para pasar argumentos
        } else {
            echo "Página No Encontrada o Ruta no válida";
        }
    }

    public function render($view, $datos = []) {
        // Leer lo que le pasamos  a la vista
        foreach ($datos as $key => $value) {
            $$key = $value;  // Doble signo de dolar significa: variable variable, básicamente nuestra variable sigue siendo la original, pero al asignarla a otra no la reescribe, mantiene su valor, de esta forma el nombre de la variable se asigna dinamicamente
        }

        ob_start(); // Almacenamiento en memoria durante un momento...

        // entonces incluimos la vista en el layout
        include_once __DIR__ . "/views/$view.php";
        //$contenido = ob_get_clean(); // Limpia el Buffer
        //include_once __DIR__ . '/views/layout.php';
    }
}
