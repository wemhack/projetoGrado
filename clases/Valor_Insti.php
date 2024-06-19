<?php

class Valor_Insti extends Entidad {
    protected static $tabla = 'valoresInstitucionales';
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

    public function crearValorInstitucional ($nombre, $id) {

        $query = " INSERT INTO valoresInstitucionales (nombre, IdEntidad) VALUES ('$nombre', $id) ";
        $objetivo = self::$db->query($query);
        header('Location: index.php');

    }

    public function borrarValorInstitucional ($borrar) {

        $query = " DELETE FROM valoresInstitucionales WHERE id = $borrar ";
        $objetivo = self::$db->query($query);
        header('Location: index.php');

    }

}