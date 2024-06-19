<?php

// Incluir archivo maestro app.php
require 'includes/app.php';
incluirTemplate('header');
incluirTemplate('sbar');

// Verificar si el usuario esta autenticado
estadoAutenticado();

// Id de la entidad asociada a la sesión
$id = $_SESSION['entidad'];

// Crear instancias de objetos
$datosBasicos = new Datos_Basicos();
$objetMetaInsti = new Objet_Meta_Insti();
$planAccion = new Plan_Accion();

// Consultar datos de las instancias
$entidad = $datosBasicos->consultarDatosBasicos($id);
$objetMeta = $objetMetaInsti::consultarTodos($id);
$planAccionInsti = $planAccion::consultarTodos($id);

// debuguear($planAccion->diasRestantes()['Días_Restantes']);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if ($_POST['cerrarSesion'] == 'Cerrar Sesión') {

        header('Location: cerrar-sesion.php');

    }
}

include 'includes/templates/nbar.php';

?>

<div class="layer-cronog contenedor">

    <table>

        <caption>Cronograma</caption>

        <thead>
            <th>Objetivos</th>
            <th>Metas</th>
            <th>Actividades</th>
            <th>Inicio</th>
            <th>Fin</th>
            <th>Responsable</th>
            <th colspan="2">Tiempo</th>
        </thead>

        <tbody>
            <?php foreach ($planAccionInsti as $plan) { ?>
                <tr>
                    <td>
                        <?php foreach ($objetMeta as $objet) {
                            if ($plan->idObje_estrateg == $objet->id) {
                                echo $objet->objetivo;
                            }
                        } ?>
                    </td>
                    <td>
                        <?php foreach ($objetMeta as $objet) {
                            if ($plan->idObje_estrateg == $objet->id) {
                                echo $objet->meta;
                            }
                        } ?>
                    </td>
                    <td><?php echo $plan->actividad; ?></td>
                    <td><?php echo $plan->inicio; ?></td>
                    <td><?php echo $plan->fin; ?></td>
                    <td><?php echo $plan->responsable; ?></td>
                    <td><?php echo $planAccion->diasRestantes($plan->id)['Días_Restantes']; ?></td>
                </tr>
            <?php } ?>
        </tbody>

    </table>

</div>

<?php

incluirTemplate('footer');

?>