<?php

class Contexto_Insti extends Entidad {
    protected static $tabla = 'contexto_inst';
    protected static $columnasDB = ['id', 'aspecto_economico', 'aspecto_social', 'aspecto_politico', 'aspecto_cultural', 'idEntidad'];

    public $id;
    public $aspecto_economico;
    public $aspecto_social;
    public $aspecto_politico;
    public $aspecto_cultural;
    public $idEntidad;
   
    public function __construct($argc = [])
    {

        $this->id = $argc['id'] ?? '';
        $this->aspecto_economico = $argc['aspecto_economico'] ?? '';
        $this->aspecto_social = $argc['aspecto_social'] ?? '';
        $this->aspecto_politico = $argc['aspecto_politico'] ?? '';
        $this->aspecto_cultural = $argc['aspecto_cultural'] ?? '';
        $this->idEntidad = $argc['idEntidad'] ?? '';
        
    }

    public function consultarContextoInsti($id)
    {
        $query = " SELECT * FROM contexto_inst WHERE idEntidad = $id ";
        $resultado = self::$db->query($query);
        $entidad = $resultado->fetch_assoc();
        return $entidad;
    }

    public function actualizarContextoInsti($id)
    {
        $asp_econo = $_POST['asp_econo'];
        $asp_socia = $_POST['asp_socia'];
        $asp_polit = $_POST['asp_polit'];
        $asp_cultu = $_POST['asp_cultu'];

        $query = " UPDATE contexto_inst SET aspecto_economico = '$asp_econo', aspecto_social = '$asp_socia', aspecto_politico = '$asp_polit', aspecto_cultural = '$asp_cultu' WHERE idEntidad = '$id' ";

        $inserta = self::$db->query($query);

        header('Location: index.php');
    }

}