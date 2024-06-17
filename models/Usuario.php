<?php

namespace Model;

class Usuario extends ActiveRecord {
    // Base DE DATOS
    protected static $tabla = 'usuario';
    protected static $columnasDB = ['id_usuario','correo','clave'];
    
    public $id_usuario;
    public $correo;
    public $clave;

    public function __construct($args = [])
    {
        $this->id_usuario = $args['id_usuario'] ?? '';
        $this->correo = $args['correo'] ?? '';
        $this->clave = $args['clave'] ?? '';
    }

    // Busca un registro por su id
    public static function get_columnas() {

        return static::$columnasDB;
    }

    public function validar() {

        if(!$this->correo) {
            self::$errores[] = "El Email del usuario es obligatorio";
        }
        if(!$this->clave) {
            self::$errores[] = "El Password del usuario es obligatorio";
        }
        return self::$errores;
    }

    public function existeUsuario() {
        // Revisar si el usuario existe.
        $query = "select * from usuario where correo='{$this->correo}'";

        $resultado = self::$db->query($query);

        if(!$resultado->num_rows) {
            self::$errores[] = 'El Usuario No Existe';
            return;
        }

        return $resultado;
    }

    public function comprobarPassword($resultado) {
        $usuario = $resultado->fetch_object();

        $autenticado = password_verify( $this->clave, $usuario->clave );

        if(!$autenticado) {
            self::$errores[] = 'El Password es Incorrecto';
            
        }

        return $autenticado;
    }

    public function autenticar() {
        // El usuario esta autenticado
        session_start();

        // Llenar el arreglo de la sesión
        $_SESSION['usuario'] = $this->correo;
        $_SESSION['login'] = true;

        header('Location: /admin');
   }

}