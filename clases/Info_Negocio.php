<?php

class Info_Negocio extends Entidad {
    protected static $tabla = 'info_negocio';
    protected static $columnasDB = ['id', 'descripcion_insti', 'poblacion_obj', 'productos_servicios', 'idEntidad'];

    public $id;
    public $descripcion_insti;
    public $poblacion_obj;
    public $productos_servicios;
    public $idEntidad;
   
    public function __construct($argc = [])
    {

        $this->id = $argc['id'] ?? '';
        $this->nombre = $argc['descripcion_insti'] ?? '';
        $this->nit = $argc['poblacion_obj'] ?? '';
        $this->municipio = $argc['productos_servicios'] ?? '';
        $this->direccion = $argc['idEntidad'] ?? '';
        
    }

    public function consultarInfoNegocio($id)
    {
        $query = " SELECT * FROM info_negocio WHERE idEntidad = $id ";
        $resultado = self::$db->query($query);
        $entidad = $resultado->fetch_assoc();
        return $entidad;
    }

    public function actualizarInfoNegocio($id)
    {
        $desc_insti = $_POST['desc_insti'];
        $pobl_objet = $_POST['pobl_objet'];
        $produts = $_POST['produts'];

        $query = " UPDATE info_negocio SET descripcion_insti = '$desc_insti', poblacion_obj = '$pobl_objet', productos_servicios = '$produts' WHERE idEntidad = '$id' ";

        $inserta = self::$db->query($query);

        header('Location: index.php');
    }

}