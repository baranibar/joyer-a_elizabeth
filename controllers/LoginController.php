<?php 

namespace Controllers;

use MVC\Router;
use Model\Usuario;
use Model\Categoria;

class LoginController {
    public static function login( Router $router) {

        $categorias = Categoria::listar_categorias();
        // Valor que queremos filtrar
        $estado_requerido = 'Activo';

        // Filtrar los productos cuyo nombre sea igual a $nombre_buscado
        $categorias = array_filter($categorias, function($categoria) use ($estado_requerido) {
            return $categoria->estado === $estado_requerido;
        });

        $errores = [];

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $auth = new Usuario($_POST['usuario']);
            
            $errores = $auth->validar();
            
            if(empty($errores)) {

                $resultado = $auth->existeUsuario();
     
                
                if( !$resultado ) {
                    $errores = Usuario::getErrores();
                } else {

                    $autenticado = $auth->comprobarPassword($resultado);

                    if($autenticado) {
                       $auth->autenticar();
                    } else {
                        $errores =Usuario::getErrores();
                    }
                }
            }
        }

        $router->render('paginas/login', [
            'categorias' => $categorias,
            'auth' => false
        ]); 
    }

    public static function logout() {
        session_start();
        $_SESSION = [];
        header('Location: /inicio');
    }
}