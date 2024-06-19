<?php

class Seguimiento extends Entidad
{
    protected static $tabla = 'seguimiento';
    protected static $columnasDB = ['id', 'estado', 'avance', 'idEntidad', 'idPlanAccion', 'idObjetMeta'];

    public $id;
    public $estado;
    public $avance;
    public $idEntidad;
    public $idPlanAccion;
    public $idObjetMeta;

    public function __construct($argc = [])
    {

        $this->id = $argc['id'] ?? '';
        $this->actividad = $argc['estado'] ?? '';
        $this->indicador = $argc['avance'] ?? '';
        $this->inicio = $argc['idEntidad'] ?? '';
        $this->fin = $argc['idPlanAccion'] ?? '';
        $this->fin = $argc['idObjetMeta'] ?? '';
    }

    public function crearSeguimiento($id)
    {

        $estado = $_POST['estado'];
        $avance = $_POST['avance'];
        $id_plan_accion = $_POST['id_plan_accion'];
        $id_objet_meta = $_POST['id_objet_meta'];



        $consulta = " SELECT * FROM seguimiento WHERE idPlanAccion = '$id_plan_accion' ";

        $inserta = self::$db->query($consulta);

        if ($inserta->num_rows == 1) {

            $query = " UPDATE seguimiento SET estado = '$estado', avance = '$avance' WHERE idPlanAccion = '$id_plan_accion' ";

            $inserta = self::$db->query($query);

            header('Location: layer-seguim.php');
        } else {

            $query = " INSERT INTO seguimiento (estado, avance, idEntidad, idPlanAccion) VALUES ('$estado', '$avance', '$id', '$id_plan_accion') ";

            $inserta = self::$db->query($query);

            header('Location: layer-seguim.php');
        }
    }
}
