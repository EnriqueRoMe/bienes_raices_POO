<?php

namespace APP;

class ActiveRecord {
     //Base de Datos
     protected static $db;
     protected static $columnaDB = [];

     protected static $tabla = "";
     //Errores
     protected static $errores = [];
 
 
 
 
     //Defininir la conexion a la base ded datos
 
     public static function setDB($database)
     {
         self::$db = $database;
     }
 
     public function guardar()
     {
         if(!is_null($this->id)) {
             //Actualizar
           
             $this->actualizar();
         } else {
             //Nuevo Registro
             $this->crear();
         }
     }
 
     public function crear()
     {
 
         //Sanitizar la entrada de los datos
         $atributos = $this->sanitizarAtributos();
 
 
 
         //Insertar en la base de datos
         $query = "INSERT INTO ". static::$tabla ." ( ";
         $query .= join(', ', array_keys($atributos));
         $query .= " ) VALUES (' ";
         $query .= join("', '", array_values($atributos));
         $query .= " ') ";
 
         $resultado =  self::$db->query($query);
         //Mensaje de Exito o error
     if($resultado) {
         header('Location: /admin?resultado=1');
     }
 
         
     }
     public function actualizar(){
         //Sanitizar los datos
        
 
         $atributos = $this->sanitizarAtributos();
 
        
 
         $valores = [];
         foreach($atributos as $key => $value){
             $valores[] = "{$key} = '{$value}'" ; //Creacion de una string ejem "titulo = 'Casa en la playa'"
         }
         $query = "UPDATE ". static::$tabla ." SET ";
         $query .= join(', ', $valores);
         $query .= " WHERE id = '" . self::$db->escape_string($this->id) . "' ";
         $query .= " LIMIT 1";
 
         $resultado = self::$db->query($query);
 
         if ($resultado) {
             //Redirecionar al usuario
             header('Location: /admin?resultado=2');
         }
         
     }
 
     //Eliminar un registro
 
     public function eliminar(){
         //Eliminar Propiedad
         $query = "DELETE FROM ". static::$tabla." WHERE id = ". self::$db-> escape_string($this->id) . " LIMIT 1";
 
         $resultado = self::$db->query($query);
 
         if($resultado){
             $this->borrarImagen();
             header('Location: /admin?resultado=3');
         }
     }
 
     //Identificar y unir los atributos de la BD
     public function atributos()
     {
         $atributos = [];
         foreach (self::$columnaDB as $columna) {
             if ($columna === 'id') continue;
 
             $atributos[$columna] = $this->$columna;
         }
         return $atributos;
     }
 
     public function sanitizarAtributos()
     {
         $atributos = $this->atributos();
         $sanitizado = [];
 
         foreach ($atributos as $key => $value) {
             $sanitizado[$key] = self::$db->escape_string($value);
         }
         return $sanitizado;
     }
     //Subida de archivos
     public function setImagen($imagen)
     {
 
         if (!is_null($this->id)) {
             $this->borrarImagen();
             }
         
         if($imagen) {
             $this->imagen = $imagen;
         }
     }
 
     //Elimina el archivo
     public function borrarImagen(){
         $existeArchivo = file_exists(CARPETA_IMAGENES . $this->imagen);
             if (($existeArchivo)) {
                 unlink(CARPETA_IMAGENES . $this->imagen);
             }
             
     }
 
     public static function getErrores()
     {
         return static::$errores;
     }
 
 
     public function validar()
     {
         
        static::$errores = []; //Se limipia el arreglo
         return static::$errores;
     }
 
     //Lista todas la all
 
     public static function all()
     {
         $query = "SELECT * FROM ". static::$tabla; //Hereda el metodo y busca el atributo en la Clase que se esta usando
         $resultado = self::consultarSQL($query); //
         return $resultado;
     }
 
     //Busca una propiedad por su id
     public static function find($id)
     {
         $consultaPropiedad = "SELECT * FROM ". static::$tabla ." WHERE id = ${id}";
         $resultado = self::consultarSQL($consultaPropiedad);
 
         return array_shift($resultado);
     }
 
     public static function consultarSQL($query)
     {
         //Consulta base de datos
         $resultado = self::$db->query($query);
         //Iterar los resultados
         $array = [];
         while ($registro = $resultado->fetch_assoc()) {
             $array[] = self::crearObjeto($registro);
         }
         //Liberar la memoria
         $resultado->free();
         //Retornar los resultados
         return $array;
     }
 
     protected static function crearObjeto($registro)
     {
         //Se crea una nueva instancia del objeto
         $objeto = new static;
         foreach ($registro as $key => $value) {
             if (property_exists($objeto, $key)) {
                 $objeto->$key = $value;
             }
         }
         return $objeto;
     }
 
     //Sincroniza el objeto en memoria por los cambios realizados por el usuario
     public function sincronizar($args = [])
     {
         foreach ($args as $key => $value) {
             if (property_exists($this, $key) && !is_null($value)) {
                 $this->$key = $value;
             }
         }
     }
}