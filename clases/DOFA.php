<?php

class DOFA extends Entidad {
    protected static $tabla = 'matriz_dofa';
    protected static $columnasDB = ['id', 'factor_DOFA', 'descrip_factor', 'idEntidad'];

    public $id;
    public $factor_DOFA;
    public $descrip_factor;
    public $idEntidad;
   
    public function __construct($argc = [])
    {

        $this->id = $argc['id'] ?? '';
        $this->tipo_factor = $argc['factor_DOFA'] ?? '';
        $this->descripcion = $argc['descrip_factor'] ?? '';
        $this->idEntidad = $argc['idEntidad'] ?? '';
        
    }

    public function crearFactorDOFA($id)
    {
        $factor_DOFA = $_POST['factor_DOFA'];
        $descrip_factor = $_POST['descrip_factor'];

        $query = " INSERT INTO matriz_dofa (tipo_factor, descripcion, idEntidad) VALUES ('$factor_DOFA', '$descrip_factor', '$id') ";

        $inserta = self::$db->query($query);

        header('Location: layer-sActual.php');
    }

    public function borrarFactorDOFA ($borrar)
    {
        $query = " DELETE FROM matriz_dofa WHERE id = $borrar ";
        $objetivo = self::$db->query($query);
        header('Location: layer-sActual.php');
    }

}