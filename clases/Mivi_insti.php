<?php

class Mivi_insti extends Entidad {
    protected static $tabla = 'horizonte_inst';
    protected static $columnasDB = ['id', 'mision', 'vision', 'idEntidad'];

    public $id;
    public $mision;
    public $vision;
    public $idEntidad;

    public function __construct($argc = [])
    {

        $this->id = $argc['id'] ?? '';
        $this->nombre = $argc['mision'] ?? '';
        $this->nit = $argc['vision'] ?? '';
        $this->municipio = $argc['idEntidad'] ?? '';

    }

    public function consultarMivi($id)
    {
        $query = " SELECT * FROM horizonte_inst WHERE idEntidad = $id ";
        $resultado = self::$db->query($query);
        $entidad = $resultado->fetch_assoc();
        return $entidad;
    }

    public function actualizarMivi($id)
    {
        $mision = $_POST['mision_inst'];
        $vision = $_POST['vision_inst'];

        $query = " UPDATE horizonte_inst SET mision = '$mision', vision = '$vision' WHERE idEntidad = '$id' ";

        $inserta = self::$db->query($query);

        header('Location: index.php');
    }

}