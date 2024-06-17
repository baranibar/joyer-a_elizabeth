<?php

namespace Model;

class Categoria extends ActiveRecord {
    // Base DE DATOS
    protected static $tabla = 'categoria';
    protected static $columnasDB = ['id_categoria', 'nombre','imagen1_nombre','imagen1_url','estado','fecha_creacion','fecha_eliminacion'];
    
    public $id_categoria;
    public $nombre;
    public $imagen1_nombre;
    public $imagen1_url;
    public $estado;
    public $fecha_creacion;
    public $fecha_eliminacion;

    public function __construct($args = [])
    {
        $this->id_categoria = $args['id_categoria'] ?? '';
        $this->nombre = $args['nombre'] ?? '';
        $this->imagen1_nombre = $args['imagen1_nombre'] ?? '';
        $this->imagen1_url = $args['imagen1_url'] ?? '';
        $this->estado = $args['estado'] ?? '';
        $this->fecha_creacion = $args['fecha_creacion'] ?? '';
        $this->fecha_eliminacion = $args['fecha_eliminacion'] ?? '';

    }
    // Listar la seccion nuestras colecciones limit
    public static function nuestras_colecciones($limite) {
        //$query = "SELECT * FROM " . static::$tabla . " LIMIT {$limite}";
        $query = "call nuestras_colecciones({$limite})";
        //$resultado = self::consultarSQL($query);
        $resultado = self::ejecutar_sp($query);

        return $resultado;
    }

    public static function listar_categorias() {
        //$query = "SELECT * FROM " . static::$tabla . " LIMIT {$limite}";
        $query = "call listar_categorias()";
        //$resultado = self::consultarSQL($query);
        $resultado = self::ejecutar_sp($query);

        return $resultado;
    }

    public static function detalle_categoria($id) {
        //$query = "SELECT * FROM " . static::$tabla . " LIMIT {$limite}";
        $query = "call detalle_categoria({$id})";
        //$resultado = self::consultarSQL($query);
        $resultado = self::ejecutar_sp($query);

        return $resultado;
    }

    // crea un nuevo registro producto
    public function crear() {

        //fecha de creación del producto
        $fecha_creacion = date('Y-m-d');
        
        // Insertar en la tabla de productos
        $query = "insert into categoria(nombre,estado,fecha_creacion) values
        ('{$this->nombre}','1','{$fecha_creacion}')";
        $resultado = self::$db->query($query);


        return $resultado;
    }
    
    public function actualizar($id_categoria) {

        //fecha de creación del producto
        $fecha_actualizacion = date('Y-m-d');
        // Actualiza la tabla de productos
        if($this->estado == 'Activo')
        {   
            $query = "update categoria set nombre='{$this->nombre}',estado='1',fecha_creacion='{$fecha_actualizacion}'
                  where id_categoria={$id_categoria}";
            
            $resultado = self::$db->query($query);

        }
        else
        {
            $query = "update categoria set nombre='{$this->nombre}',estado='0',fecha_creacion='{$fecha_actualizacion}'
                  where id_categoria={$id_categoria}";
            
            $resultado = self::$db->query($query);
        }

        return $resultado;
    }

}