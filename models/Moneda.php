<?php

namespace Model;

class Moneda extends ActiveRecord {
    // Base DE DATOS
    protected static $tabla = 'moneda';
    protected static $columnasDB = ['id_moneda', 'nombre', 'simbolo', 'pais','estado','fecha_creacion','fecha_eliminacion'];
    
    public $id_moneda;
    public $nombre;
    public $simbolo;
    public $pais;
    public $estado;
    public $fecha_creacion;
    public $fecha_eliminacion;

    public function __construct($args = [])
    {
        $this->id_moneda = $args['id_moneda'] ?? '';
        $this->nombre = $args['nombre'] ?? '';
        $this->simbolo = $args['simbolo'] ?? '';
        $this->pais = $args['pais'] ?? '';
        $this->estado = $args['estado'] ?? '';
        $this->fecha_creacion = $args['fecha_creacion'] ?? '';
        $this->fecha_eliminacion = $args['fecha_eliminacion'] ?? '';
    }

    // Busca un registro por su id
    public static function get_columnas() {

        return static::$columnasDB;
    }

    // Listar la tabla de monedas
    public static function listar_monedas() {
        //$query = "SELECT * FROM " . static::$tabla . " LIMIT {$limite}";
        $query = "call listar_monedas()";
        //$resultado = self::consultarSQL($query);
        $resultado = self::ejecutar_sp($query);

        return $resultado;
    }

    // Busca un registro por su id
    public static function monedas_producto_detalle($id_producto) {
        //$query = "SELECT * FROM " . static::$tabla . " LIMIT {$limite}";
        $query = "call monedas_producto_detalle({$id_producto})";
        //$resultado = self::consultarSQL($query);
        $resultado = self::ejecutar_sp($query);

        return $resultado;
    }

    public static function detalle_moneda($id) {
        //$query = "SELECT * FROM " . static::$tabla . " LIMIT {$limite}";
        $query = "call detalle_moneda({$id})";
        //$resultado = self::consultarSQL($query);
        $resultado = self::ejecutar_sp($query);

        return $resultado;
    }
        // crea un nuevo registro producto
    public function crear() {

        //fecha de creación del producto
        $fecha_creacion = date('Y-m-d');
        
        // Insertar en la tabla de productos
        $query = "insert into moneda(nombre,simbolo,pais,estado,fecha_creacion) values
        ('{$this->nombre}','{$this->simbolo}','{$this->pais}','1','{$fecha_creacion}')";
        
        $resultado = self::$db->query($query);

        return $resultado;
    }

    public function actualizar($id_moneda) {

        //fecha de creación del producto
        $fecha_actualizacion = date('Y-m-d');
        // Actualiza la tabla de productos
        if($this->estado == 'Activo')
        {   
            $query = "update moneda set nombre='{$this->nombre}',simbolo='{$this->simbolo}',pais='{$this->pais}',estado='1',fecha_creacion='{$fecha_actualizacion}'
                  where id_moneda={$id_moneda}";
            
            $resultado = self::$db->query($query);

        }
        else
        {
            $query = "update moneda set nombre='{$this->nombre}',simbolo='{$this->simbolo}',pais='{$this->pais}',estado='0',fecha_creacion='{$fecha_actualizacion}'
                  where id_moneda={$id_moneda}";
            
            $resultado = self::$db->query($query);
        }

        return $resultado;
    }

}