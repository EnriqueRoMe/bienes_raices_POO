<?php 

namespace App;

use APP\ActiveRecord;

class Vendedor extends ActiveRecord {
   
    protected static $tabla = "vendedores";
    protected static $columnaDB = ['id', 'nombre', 'apellido', 'telefono'];


    public $id;
    public $nombre;
    public $apellido;
    public $telefono;


    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
  
    }
}