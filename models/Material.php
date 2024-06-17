<?php

namespace Model;

class Material extends ActiveRecord {
    // Base DE DATOS
    protected static $tabla = 'material';
    protected static $columnasDB = ['id_material','nombre','descripcion','estado','fecha_creacion','fecha_eliminacion'];
    
    public $id_material;
    public $nombre;
    public $descripcion;
    public $estado;
    public $fecha_creacion; 
    public $fecha_eliminacion;

    public function __construct($args = [])
    {
        $this->id_material = $args['id_material'] ?? '';
        $this->nombre = $args['nombre'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->estado = $args['estado'] ?? '';
        $this->fecha_creacion = $args['fecha_creacion'] ?? '';
        $this->fecha_eliminacion = $args['fecha_eliminacion'] ?? '';
    }

    // Busca un registro por su id
    public static function get_columnas() {

        return static::$columnasDB;
    }

    // Busca un registro por su id
    public static function listar_materiales() {
        //$query = "SELECT * FROM " . static::$tabla . " LIMIT {$limite}";
        $query = "call listar_materiales()";
        //$resultado = self::consultarSQL($query);
        $resultado = self::ejecutar_sp($query);

        return $resultado;
    }

    // Busca un registro por su id
    public static function materiales_producto_detalle($id_producto) {
        //$query = "SELECT * FROM " . static::$tabla . " LIMIT {$limite}";
        $query = "call materiales_producto_detalle({$id_producto})";
        //$resultado = self::consultarSQL($query);
        $resultado = self::ejecutar_sp($query);

        return $resultado;
    }

    // crea un nuevo registro producto
    public function crear() {

        //fecha de creación del producto
        $fecha_creacion = date('Y-m-d');
        
        // Insertar en la tabla de productos
        $query = "insert into material(nombre,descripcion,estado,fecha_creacion) values
        ('{$this->nombre}','{$this->descripcion}','1','{$fecha_creacion}')";

        $resultado = self::$db->query($query);

        return $resultado;
    }

    public static function detalle_material($id) {
        //$query = "SELECT * FROM " . static::$tabla . " LIMIT {$limite}";
        $query = "call detalle_material({$id})";
        //$resultado = self::consultarSQL($query);
        $resultado = self::ejecutar_sp($query);

        return $resultado;
    }

    public function actualizar($id_material) {

        //fecha de creación del producto
        $fecha_actualizacion = date('Y-m-d');
        // Actualiza la tabla de productos
        if($this->estado == 'Activo')
        {   
            $query = "update material set nombre='{$this->nombre}',descripcion='{$this->descripcion}',estado='1',fecha_creacion='{$fecha_actualizacion}'
                  where id_material={$id_material}";
            
            $resultado = self::$db->query($query);

        }
        else
        {
            $query = "update material set nombre='{$this->nombre}',descripcion='{$this->descripcion}',estado='0',fecha_creacion='{$fecha_actualizacion}'
                  where id_material={$id_material}";
            
            $resultado = self::$db->query($query);
        }

        return $resultado;
    }


}