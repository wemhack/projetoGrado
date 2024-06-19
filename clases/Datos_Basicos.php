<?php

class Datos_Basicos extends Entidad {
    protected static $tabla = 'datosBasicos';
    protected static $columnasDB = ['id', 'nombre', 'nit', 'municipio', 'direccion', 'telefono', 'correo'];

    public $id;
    public $nombre;
    public $nit;
    public $municipio;
    public $direccion;
    public $telefono;
    public $correo;

    public function __construct($argc = [])
    {
        $this->id = $argc['id'] ?? '';
        $this->nombre = $argc['nombre'] ?? '';
        $this->nit = $argc['nit'] ?? '';
        $this->municipio = $argc['municipio'] ?? '';
        $this->direccion = $argc['direccion'] ?? '';
        $this->telefono = $argc['telefono'] ?? '';
        $this->correo = $argc['correo'] ?? '';
    }

    public function consultarDatosBasicos($id)
    {
        $query = " SELECT * FROM datosBasicos WHERE id = '$id' ";
        $resultado = self::$db->query($query);
        $entidad = $resultado->fetch_assoc();
        return $entidad;
    }

}