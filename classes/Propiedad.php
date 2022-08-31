<?php

namespace App;

use App\ActiveRecord;

class Propiedad extends ActiveRecord {

    protected static $tabla = "propiedades";
    protected static $columnaDB = ['id', 'titulo', 'precio', 'imagen', 'descripcion', 'habitaciones', 'wc', 'estacionamiento', 'creado', 'vendedorId'];

    public $id;
     public $titulo;
     public $precio;
     public $imagen;
     public $descripcion;
     public $habitaciones;
     public $wc;
     public $estacionamiento;
     public $creado;
     public $vendedorId;

     public function __construct($args = [])
     {
         $this->id = $args['id'] ?? null;
         $this->titulo = $args['titulo'] ?? '';
         $this->precio = $args['precio'] ?? '';
         $this->imagen = $args['imagen'] ?? null;
         $this->descripcion = $args['descripcion'] ?? '';
         $this->habitaciones = $args['habitaciones'] ?? '';
         $this->wc = $args['wc'] ?? '';
         $this->estacionamiento = $args['estacionamiento'] ?? '';
         $this->creado = date('Y/m/d');
         $this->vendedorId = $args['vendedorId'] ?? '';
     }


     public function validar()
     {
        if (!$this->titulo) {
            self::$errores[] = "Debes añadir un titulo";
        }
        if (!$this->precio) {
            self::$errores[] = "El precio es obligatoria";
        }
        if (strlen($this->descripcion) < 20) {
            self::$errores[] = "Debes añadir una descripcion y debe tener al menos 50 caracteres";
        }
        if (!$this->habitaciones) {
            self::$errores[] = "Debes añadir un numero de habitaciones";
        }
        if (!$this->wc) {
            self::$errores[] = "Debes añadir un numero de baños";
        }
        if (!$this->estacionamiento) {
            self::$errores[] = "Debes añadir un numero de habitaciones";
        }
        if (!$this->vendedorId) {
            self::$errores[] = "Debes elegir un Vendedor";
        }
        if (!$this->imagen) {
            self::$errores[] = "La imagen es obligatoria";
        }

     }
   
}
