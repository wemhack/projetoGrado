<?php

class Entidad
{

    // Atributos para la Base de Datos
    protected static $db;
    protected static $columnasDB = [];
    protected static $tabla = '';

    // Función para definir la Base de Datos
    public static function setDB($dataBase)
    {
        self::$db = $dataBase;
    }

    public function actualizarDatosBasicos($id)
    {
        $nombre = $_POST['nombre'];
        $nit = $_POST['nit'];
        $municipio = $_POST['municipio'];
        $direccion = $_POST['direccion_entidad'];
        $telefono = $_POST['telefono_entidad'];
        $correo = $_POST['correo_entidad'];

        $query = " UPDATE datosBasicos SET nombre = '$nombre', nit = '$nit', municipio = '$municipio', direccion = '$direccion', telefono = '$telefono', correo = '$correo' WHERE id = $id ";

        $inserta = self::$db->query($query);

        header('Location: index.php');
    }

    // Busca un registro por su id
    public function consultarId($id)
    {
        $query = " SELECT * FROM objetivosInstitucionales WHERE IdEntidad = $id ";

        $resultado = self::consultarSQL($query);

        return array_shift($resultado);
    }

    // Lista todas los registros
    public static function consultarTodos()
    {
        $query = "SELECT * FROM " . static::$tabla;

        $resultado = self::consultarSQL($query);

        return $resultado;
    }

    public static function consultarSQL($query)
    {
        // Consultar la base de datos
        $resultado = self::$db->query($query);

        // Iterar los resultados 
        $array = [];

        while ($registro = $resultado->fetch_assoc()) {
            $array[] = static::crearObjeto($registro);
        }

        // Liberar la memoria
        $resultado->free();

        // Retornas los resultados
        return $array;
    }

    protected static function crearObjeto($registro)
    {
        $objeto = new static;

        foreach ($registro as $key => $value) {
            if (property_exists($objeto, $key)) {
                $objeto->$key = $value;
            }
        }

        return $objeto;
    }
}
