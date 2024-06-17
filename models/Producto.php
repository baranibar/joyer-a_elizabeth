<?php

namespace Model;

class Producto extends ActiveRecord {
    // Base DE DATOS
    protected static $tabla = 'producto';
    protected static $columnasDB = ['id_producto', 'nombre', 'descripcion', 'genero','precio','peso','largo','id_categoria','categoria'
    ,'id_material','nombre_material','des_material','id_moneda','nombre_moneda','simbolo_moneda','pais_moneda','imagen1_nombre','imagen1_url'
    ,'imagen2_nombre','imagen2_url','imagen3_nombre','imagen3_url','estado','fecha_creacion','fecha_eliminacion'
    ];
    
    public $id_producto;
    public $nombre;
    public $descripcion;
    public $genero;
    public $precio;
    public $peso;
    public $largo;
    public $id_categoria;
    public $categoria;
    public $id_material;
    public $nombre_material;
    public $des_material;
    public $id_moneda;
    public $nombre_moneda;
    public $simbolo_moneda;
    public $pais_moneda;
    public $imagen1_nombre;
    public $imagen1_url;
    public $imagen2_nombre;
    public $imagen2_url;
    public $imagen3_nombre;
    public $imagen3_url;
    public $estado;
    public $fecha_creacion;
    public $fecha_eliminacion;

    public function __construct($args = [])
    {
        $this->id_producto = $args['id_producto'] ?? '';
        $this->nombre = $args['nombre'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->genero = $args['genero'] ?? '';
        $this->precio = $args['precio'] ?? '';
        $this->peso = $args['peso'] ?? '';
        $this->largo = $args['largo'] ?? '';
        $this->id_categoria = $args['id_categoria'] ?? '';
        $this->categoria = $args['categoria'] ?? '';
        $this->id_material = $args['id_material'] ?? '';
        $this->nombre_material = $args['nombre_material'] ?? '';
        $this->des_material = $args['des_material'] ?? '';
        $this->id_moneda = $args['id_moneda'] ?? '';
        $this->nombre_moneda = $args['nombre_moneda'] ?? '';
        $this->simbolo_moneda = $args['simbolo_moneda'] ?? '';
        $this->pais_moneda = $args['pais_moneda'] ?? '';
        $this->imagen1_nombre = $args['imagen1_nombre'] ?? '';
        $this->imagen1_url = $args['imagen1_url'] ?? '';
        $this->imagen2_nombre = $args['imagen2_nombre'] ?? '';
        $this->imagen2_url = $args['imagen2_url'] ?? '';
        $this->imagen3_nombre = $args['imagen3_nombre'] ?? '';
        $this->imagen3_url = $args['imagen3_url'] ?? '';
        $this->estado = $args['estado'] ?? '';
        $this->fecha_creacion = $args['fecha_creacion'] ?? '';
        $this->fecha_eliminacion = $args['fecha_eliminacion'] ?? '';

    }

    // Busca un registro por su id
    public static function get_columnas() {

        return static::$columnasDB;
    }

    // Busca un registro por su id
    public static function listar_productos($limite) {
        //$query = "SELECT * FROM " . static::$tabla . " LIMIT {$limite}";
        $query = "call listar_productos({$limite})";
        //$resultado = self::consultarSQL($query);
        $resultado = self::ejecutar_sp($query);

        return $resultado;
    }

    // Busca un registro por su id
    public static function detalle_productos($id) {

        //$query = "SELECT * FROM " . static::$tabla . " LIMIT {$limite}";
        $query = "call detalle_productos({$id})";
        //$resultado = self::consultarSQL($query);
        $resultado = self::ejecutar_sp($query);

        return $resultado;
    }
    // Busca un registro por su id para el carrusel de imagenes
    public static function carrusel_productos($id) {

        //$query = "SELECT * FROM " . static::$tabla . " LIMIT {$limite}";
        $query = "call carrusel_producto({$id})";
        //$resultado = self::consultarSQL($query);
        $resultado = self::ejecutar_sp($query);

        return $resultado;
    }
    

    public static function listar_productos_por_categoria($categoriaId) {
        //$query = "SELECT * FROM " . static::$tabla . " LIMIT {$limite}";
        $query = "call listar_productos_por_categoria({$categoriaId})";
        //$resultado = self::consultarSQL($query);
        $resultado = self::ejecutar_sp($query);

        return $resultado;
    }


    // crea un nuevo registro producto
    public function crear(array $id_materiales) {

        //fecha de creación del producto
        $fecha_creacion = date('Y-m-d');
        

        // Insertar en la tabla de productos
        $query = "insert into producto(nombre,descripcion,genero,precio,peso,largo,estado,fecha_creacion) values
        ('{$this->nombre}','{$this->descripcion}','{$this->genero}',$this->precio,$this->peso,$this->largo,'1','{$fecha_creacion}')";
        $resultado = self::$db->query($query);

        // Obtener el id del nuevo producto
        $query = "call get_last_id()";
        $productos = self::ejecutar_sp($query);

        foreach($productos as $producto):
            $id_producto = $producto->id_producto;
        endforeach;

        // Insert a la tabla de imagenes: 

        //Insert imagen 1
        if($this->imagen1_nombre != '' && $this->imagen1_url != '')
        {
            $query = "insert into imagen(nombre,id_producto,id_categoria,url,orden,estado,fecha_creacion) values
            ('{$this->imagen1_nombre}',{$id_producto},'{$this->id_categoria}','{$this->imagen1_url}','1',1,'{$fecha_creacion}')";

            //debuguear($query);
            $resultado = self::$db->query($query);
            
        }
        
        //Insert imagen 2
        if($this->imagen2_nombre != '' && $this->imagen2_url != '')
        {
            $query = "insert into imagen(nombre,id_producto,id_categoria,url,orden,estado,fecha_creacion) values
            ('{$this->imagen2_nombre}',{$id_producto},'{$this->id_categoria}','{$this->imagen2_url}','2',1,'{$fecha_creacion}')";
    
            $resultado = self::$db->query($query);
        }

        //Insert imagen 3
        if($this->imagen3_nombre != '' && $this->imagen3_url != '')
        {
            $query = "insert into imagen(nombre,id_producto,id_categoria,url,orden,estado,fecha_creacion) values
            ('{$this->imagen3_nombre}',{$id_producto},'{$this->id_categoria}','{$this->imagen3_url}','3',1,'{$fecha_creacion}')";
    
            $resultado = self::$db->query($query);
        }

        // Insert a la tabla de monedas_producto: 
        $query = "insert into moneda_producto(id_moneda,id_producto,estado,fecha_creacion) values
        ('{$this->id_moneda}',{$id_producto},1,'{$fecha_creacion}')";

        $resultado = self::$db->query($query);


        // Insert a la tabla de material_producto: 
        foreach($id_materiales as $id_material):
            $query = "insert into material_producto(id_material,id_producto,estado,fecha_creacion) values
            ('{$id_material}',{$id_producto},1,'{$fecha_creacion}')";

            $resultado = self::$db->query($query);
        endforeach;

        return $resultado;
    }

    // actualizar un producto
    public function actualizar($id_producto,array $id_materiales) {

        //fecha de creación del producto
        $fecha_actualizacion = date('Y-m-d');
        // Actualiza la tabla de productos
        //debuguear($this);
        
        if($this->estado == 'Activo')
        {   
            $query = "update producto set nombre='{$this->nombre}',descripcion='{$this->descripcion}',genero='{$this->genero}',precio={$this->precio},
                  peso={$this->peso},largo={$this->largo},estado='1'
                  where id_producto={$id_producto}";
            
            $resultado = self::$db->query($query);

        }
        else
        {
            $query = "update producto set nombre='{$this->nombre}',descripcion='{$this->descripcion}',genero='{$this->genero}',precio={$this->precio},
            peso={$this->peso},largo={$this->largo},estado='0',fecha_eliminacion='{$fecha_actualizacion}' 
            where id_producto={$id_producto}";
    
            $resultado = self::$db->query($query);
        }

        /*
        $query = "update imagen set nombre='{$this->imagen1_nombre}',url='{$this->imagen1_url}' 
        where id_producto={$id_producto} and orden = 1";

        $resultado = self::$db->query($query);

        $query = "update imagen set nombre='{$this->imagen2_nombre}',url='{$this->imagen2_url}' 
        where id_producto={$id_producto} and orden = 2";
        
        $resultado = self::$db->query($query);

        $query = "update imagen set nombre='{$this->imagen3_nombre}',url='{$this->imagen3_url}' 
        where id_producto={$id_producto} and orden = 3";

        $resultado = self::$db->query($query);

        $query = "update moneda_producto set id_moneda='{$this->id_moneda}'
        where id_producto={$id_producto}";

        $resultado = self::$db->query($query);
        */

        // Insert a la tabla de imagenes: 

        $query = "delete from imagen where id_producto={$id_producto}";

        $resultado = self::$db->query($query);

        //Insert imagen 1
        if($this->imagen1_nombre != '' && $this->imagen1_url != '')
        {
            $query = "insert into imagen(nombre,id_producto,id_categoria,url,orden,estado,fecha_creacion) values
            ('{$this->imagen1_nombre}',{$id_producto},'{$this->id_categoria}','{$this->imagen1_url}','1',1,'{$fecha_actualizacion}')";

            //debuguear($query);
            $resultado = self::$db->query($query);
            
        }
        
        //Insert imagen 2
        if($this->imagen2_nombre != '' && $this->imagen2_url != '')
        {
            $query = "insert into imagen(nombre,id_producto,id_categoria,url,orden,estado,fecha_creacion) values
            ('{$this->imagen2_nombre}',{$id_producto},'{$this->id_categoria}','{$this->imagen2_url}','2',1,'{$fecha_actualizacion}')";
    
            $resultado = self::$db->query($query);
        }

        //Insert imagen 3
        if($this->imagen3_nombre != '' && $this->imagen3_url != '')
        {
            $query = "insert into imagen(nombre,id_producto,id_categoria,url,orden,estado,fecha_creacion) values
            ('{$this->imagen3_nombre}',{$id_producto},'{$this->id_categoria}','{$this->imagen3_url}','3',1,'{$fecha_actualizacion}')";
    
            $resultado = self::$db->query($query);
        }

        // Insert a la tabla de material_producto: 
        $query = "delete from material_producto where id_producto={$id_producto}";

        $resultado = self::$db->query($query);

        foreach($id_materiales as $id_material):

            $query = "insert into material_producto(id_material,id_producto,estado,fecha_creacion) values
            ('{$id_material}',{$id_producto},1,'{$fecha_actualizacion}')";

            $resultado = self::$db->query($query);

        endforeach;

        // Insert a la tabla de material_producto: 
        $query = "delete from moneda_producto where id_producto={$id_producto}";

        $resultado = self::$db->query($query);
        
        $query = "insert into moneda_producto(id_moneda,id_producto,estado,fecha_creacion) values
            ('{$this->id_moneda}',{$id_producto},1,'{$fecha_actualizacion}')";

        $resultado = self::$db->query($query);

        return $resultado;
    }

}