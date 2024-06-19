<?php

class Objet_insti extends Entidad {
    protected static $tabla = 'objetivosInstitucionales';
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

    public function crearObjetivoInstitucional ($nombre, $id) {

        $query = " INSERT INTO objetivosInstitucionales (nombre, IdEntidad) VALUES ('$nombre', $id) ";
        $objetivo = self::$db->query($query);
        header('Location: index.php');

    }

    public function borrarObjetivoInstitucional ($borrar) {

        $query = " DELETE FROM objetivosInstitucionales WHERE id = $borrar ";
        $objetivo = self::$db->query($query);
        header('Location: index.php');

    }

}