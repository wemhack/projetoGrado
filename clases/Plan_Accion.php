<?php

class Plan_Accion extends Entidad
{
    protected static $tabla = 'plan_accion';
    protected static $columnasDB = ['id', 'actividad', 'indicador', 'inicio', 'fin', 'responsable', 'recursos', 'idEntidad', 'idObje_estrateg', 'idMetas_estrateg'];

    public $id;
    public $actividad;
    public $indicador;
    public $inicio;
    public $fin;
    public $responsable;
    public $recursos;
    public $idEntidad;
    public $idObje_estrateg;
    public $idMetas_estrateg;

    public function __construct($argc = [])
    {

        $this->id = $argc['id'] ?? '';
        $this->actividad = $argc['actividad'] ?? '';
        $this->indicador = $argc['indicador'] ?? '';
        $this->inicio = $argc['inicio'] ?? '';
        $this->fin = $argc['fin'] ?? '';
        $this->responsable = $argc['responsable'] ?? '';
        $this->recursos = $argc['recursos'] ?? '';
        $this->idEntidad = $argc['idEntidad'] ?? '';
        $this->idObje_estrateg = $argc['idObje_estrateg'] ?? '';
        $this->idMetas_estrateg = $argc['idMetas_estrateg'] ?? '';
    }

    public function crearPlanAccion($id)
    {

        $actividad = $_POST['actividad'];
        $indicador = $_POST['indicador'];
        $inicio = $_POST['inicio'];
        $fin = $_POST['fin'];
        $responsable = $_POST['responsable'];
        $recursos = $_POST['recursos'];
        $id_objet_meta = $_POST['id_objet_meta'];


        $query = " INSERT INTO plan_accion (actividad, indicador, inicio, fin, responsable, recursos, idEntidad, idObje_estrateg, idMetas_estrateg) VALUES ('$actividad', '$indicador', '$inicio', '$fin', '$responsable', '$recursos', '$id', '$id_objet_meta', '$id_objet_meta') ";
        
        $inserta = self::$db->query($query);

        header('Location: layer-plan-accion.php');
    }

    function diasRestantes ($row) {
        
        $query = " SELECT timestampdiff(DAY, inicio, fin) as Días_Restantes FROM plan_accion WHERE id = '$row' ";
    
        $resultado = mysqli_query(self::$db, $query);

        return $usuario = mysqli_fetch_assoc($resultado);
    
    }

    // public function borrarFactorDOFA($borrar)
    // {
    //     $query = " DELETE FROM objet_metas_estreteg ";
    //     $objetivo = self::$db->query($query);
    //     header('Location: layer-objetivos.php');
    // }
}
