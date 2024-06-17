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
        // Activar informe de errores
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);

        session_start();
        $auth = $_SESSION['login'] ?? null;

        $rutas_protegidas = ['/admin', '/producto_crear', '/producto_actualizar', '/categoria_crear', 'categoria_actualizar',
            '/material_crear', '/material_actualizar', '/moneda_crear', '/moneda_actualizar'];

        $currentUrl = strtok($_SERVER['REQUEST_URI'], '?') ?? '/';
        $method = $_SERVER['REQUEST_METHOD'];

        // Depuración
        echo "Current URL: " . htmlspecialchars($currentUrl) . "<br>";
        echo "Request Method: " . htmlspecialchars($method) . "<br>";
        echo "Auth Status: " . ($auth ? "Logged In" : "Not Logged In") . "<br>";

        echo "<pre>";
        var_dump($this->getRoutes);
        var_dump($this->postRoutes);
        echo "</pre>";

        if ($method === 'GET') {
            $fn = $this->getRoutes[$currentUrl] ?? null;
        } else {
            $fn = $this->postRoutes[$currentUrl] ?? null;
        }

        if (in_array($currentUrl, $rutas_protegidas) && !$auth) {
            echo "Redirigiendo a la página de inicio<br>";
            header('Location: /');
            exit;
        }

        if ($fn) {
            // Call user fn va a llamar una función cuando no sabemos cual será
            call_user_func($fn, $this); // This es para pasar argumentos
        } else {
            echo "Página No Encontrada o Ruta no válida";
        }
    }

    public function render($view, $datos = []) {
        // Leer lo que le pasamos a la vista
        foreach ($datos as $key => $value) {
            $$key = $value;  // Doble signo de dólar significa: variable variable, básicamente nuestra variable sigue siendo la original, pero al asignarla a otra no la reescribe, mantiene su valor, de esta forma el nombre de la variable se asigna dinámicamente
        }

        ob_start(); // Almacenamiento en memoria durante un momento...

        // entonces incluimos la vista en el layout
        include_once __DIR__ . "/views/$view.php";
        //$contenido = ob_get_clean(); // Limpia el Buffer
        //include_once __DIR__ . '/views/layout.php';
    }
}
