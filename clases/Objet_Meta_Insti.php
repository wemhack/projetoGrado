<?php

class Objet_Meta_Insti extends Entidad
{
    protected static $tabla = 'objet_metas_estreteg';
    protected static $columnasDB = ['id', 'objetivo', 'meta', 'idEntidad', 'idDofa'];

    public $id;
    public $objetivo;
    public $meta;
    public $idEntidad;
    public $idDofa;

    public function __construct($argc = [])
    {

        $this->id = $argc['id'] ?? '';
        $this->objetivo = $argc['objetivo'] ?? '';
        $this->meta = $argc['meta'] ?? '';
        $this->idEntidad = $argc['idEntidad'] ?? '';
        $this->idDofa = $argc['idDofa'] ?? '';
    }

    public function crearFactorDOFA($id)
    {

        $objetivo = $_POST['objetivo'];
        $meta = $_POST['meta'];
        $id_dofa = $_POST['id_dofa'];

        $consulta = " SELECT * FROM objet_metas_estreteg WHERE idDofa = '$id_dofa' ";

        $inserta = self::$db->query($consulta);

        if ($inserta->num_rows == 1) {

            $query = " UPDATE objet_metas_estreteg SET objetivo = '$objetivo', meta = '$meta' WHERE idDofa = '$id_dofa' ";

            $inserta = self::$db->query($query);

            header('Location: layer-objetivos.php');

        } else {

            $query = " INSERT INTO objet_metas_estreteg (objetivo, meta, idEntidad, idDofa) VALUES ('$objetivo', '$meta', '$id', '$id_dofa') ";

            $inserta = self::$db->query($query);

            header('Location: layer-objetivos.php');
        }
    }

    public function borrarFactorDOFA ($borrar)
    {
        $query = " DELETE FROM objet_metas_estreteg ";
        $objetivo = self::$db->query($query);
        header('Location: layer-objetivos.php');
    }

}
