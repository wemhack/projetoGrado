<?php

class Meta_insti extends Entidad {
    protected static $tabla = 'metasInstitucionales';
    protected static $columnasDB = ['id', 'nombre', 'IdEntidad'];

    public $id;
    public $nombre;
    public $IdEntidad;


    public function __construct($argc = [])
    {
        $this->id = $argc['id'] ?? '';
        $this->nombre = $argc['nombre'] ?? '';
        $this->nit = $argc['IdEntidad'] ?? '';
    }

    public function crearMetaInstitucional ($nombre, $id) {

        $query = " INSERT INTO metasInstitucionales (nombre, IdEntidad) VALUES ('$nombre', $id) ";
        $objetivo = self::$db->query($query);
        header('Location: index.php');

    }

    public function borrarMetaInstitucional ($borrar) {

        $query = " DELETE FROM metasInstitucionales WHERE id = $borrar ";
        $objetivo = self::$db->query($query);
        header('Location: index.php');

    }

}