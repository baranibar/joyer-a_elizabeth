<?php

namespace Model;

class ActiveRecord {

    // Base DE DATOS
    protected static $db;
    protected static $tabla = '';
    protected static $columnasDB = [];

    // Errores
    protected static $errores = [];

    
    // Definir la conexión a la BD
    public static function setDB($database) {
        self::$db = $database;
    }

    // Validación
    public static function getErrores() {
        return static::$errores;
    }

    public function validar() {
        static::$errores = [];
        return static::$errores;
    }

    public static function all() {
        $query = "SELECT * FROM " . static::$tabla;

        $resultado = self::consultarSQL($query);

        return $resultado;
    }

    // Busca un registro por su id
    public static function find($id) {
        $query = "SELECT * FROM " . static::$tabla  ." WHERE id = {$id}";

        $resultado = self::consultarSQL($query);

        return array_shift( $resultado ) ;
    }

    public static function get($limite) {
        $query = "SELECT * FROM " . static::$tabla . " LIMIT {$limite}";
        //$query = "call listar_productos({$limite})";
        $resultado = self::consultarSQL($query);

        return $resultado;
    }

    public static function consultarSQL($query) {
        // Consultar la base de datos
        $resultado = self::$db->query($query);

        // Iterar los resultados
        $array = [];
        while($registro = $resultado->fetch_assoc()) {
            $array[] = static::crearObjeto($registro);
        }

        // liberar la memoria
        $resultado->free();

        // retornar los resultados
        return $array;
    }

    public static function ejecutar_sp($sp) {
        // Preparar la consulta
        $stmt = self::$db->prepare($sp);

        // Verificar si la preparación fue exitosa
        if ($stmt === false) {
            die('Error al preparar el procedimiento almacenado: ' . self::$db->error);
        }

        // Ejecutar la consulta
        if (!$stmt->execute()) {
            die('Error al ejecutar el procedimiento almacenado: ' . self::$db->error);
        }

        // Obtener el resultado
        $resultado = $stmt->get_result();

        // Verificar si se obtuvo un resultado
        if ($resultado === false) {
            die('Error al obtener el resultado: ' . self::$db->error);
        }

        // Iterar sobre los resultados
        $array = [];
        while ($registro = $resultado->fetch_assoc()) {
            $array[] = static::crearObjeto($registro);
        }

        // Liberar recursos
        $resultado->free();
        $stmt->close();

        // Procesar cualquier resultado adicional
        while (self::$db->more_results() && self::$db->next_result()) {
            if ($res = self::$db->store_result()) {
                $res->free();
            }
        }

        // Retornar los resultados
        return $array;
    }

    protected static function crearObjeto($registro) {
        $objeto = new static;

        foreach($registro as $key => $value ) {
            if(property_exists( $objeto, $key  )) {
                $objeto->$key = $value;
            }
        }

        return $objeto;
    }

    // Identificar y unir los atributos de la BD
    public function atributos() {
        $atributos = [];
        foreach(static::$columnasDB as $columna) {
            if($columna === 'id') continue;
            $atributos[$columna] = $this->$columna;
        }
        return $atributos;
    }

    public function sanitizarAtributos() {
        $atributos = $this->atributos();
        $sanitizado = [];
        foreach($atributos as $key => $value ) {
            $sanitizado[$key] = self::$db->escape_string($value);
        }
        return $sanitizado;
    }

    public function sincronizar($args=[]) { 
        foreach($args as $key => $value) {
          if(property_exists($this, $key) && !is_null($value)) {
            $this->$key = $value;
          }
        }
    }

}