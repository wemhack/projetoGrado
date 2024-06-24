<?php

// Incluir archivo maestro app.php
require 'includes/app.php';
incluirTemplate('header');
incluirTemplate('sbar');

error_reporting(0);

// Verificar si el usuario esta autenticado
estadoAutenticado();

// Id de la entidad asociada a la sesión
$id = $_SESSION['entidad'];

// Crear instancias de objetos
$datosBasicos = new Datos_Basicos();
$infoNegocio_insti = new Info_Negocio();
$contexto_insti = new Contexto_Insti();
$objetInst = new Objet_insti();
$static_ObjetInst = Objet_insti::consultarTodos();
$metaInst = new Meta_insti();
$static_MetaInst = Meta_insti::consultarTodos();
$mivi_insti = new Mivi_insti();
$valorInst = new Valor_Insti();
$static_ValorInst = Valor_Insti::consultarTodos();

// Consultar datos de las instancias
$entidad = $datosBasicos->consultarDatosBasicos($id);
$mivi = $mivi_insti->consultarMivi($id);
$infoNegocio = $infoNegocio_insti->consultarInfoNegocio($id);
$contexto = $contexto_insti->consultarContextoInsti($id);

// Condicional para hacer uso de los datos que provienen de los formularios
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if ($_POST['cerrarSesion'] == 'Cerrar Sesión') {

        header('Location: cerrar-sesion.php');

    } elseif ($_POST['objet_inst']) {

        $nombre = $_POST['objet_inst'];
        $objetInst->crearObjetivoInstitucional($nombre, $id);

    } elseif ($_POST['borrar_objet_inst']) {

        $borrar = $_POST['borrar_objet_inst'];
        $objetInst->borrarObjetivoInstitucional($borrar);

    } elseif ($_POST['meta_inst']) {

        $nombre = $_POST['meta_inst'];
        $metaInst->crearMetaInstitucional($nombre, $id);

    } elseif ($_POST['borrar_meta_inst']) {

        $borrar = $_POST['borrar_meta_inst'];
        $metaInst->borrarMetaInstitucional($borrar);

    } elseif ($_POST['mision_inst']){

        $mivi_insti->actualizarMivi($id);
    
    } elseif ($_POST['borrar_valor_inst']) {

        $borrar = $_POST['borrar_valor_inst'];
        $valorInst->borrarValorInstitucional($borrar);

    } elseif ($_POST['valor_inst']){

        $nombre = $_POST['valor_inst'];
        $valorInst->crearValorInstitucional($nombre, $id);
    
    } elseif ($_POST['desc_insti']){

        $infoNegocio_insti->actualizarInfoNegocio($id);
    
    } elseif ($_POST['asp_econo']){

        $contexto_insti->actualizarContextoInsti($id);
    
    } else {

        $datosBasicos->actualizarDatosBasicos($id);
    }
}

include 'includes/templates/nbar.php';
include 'includes/templates/form_datos_basicos.php';
include 'includes/templates/form_objet_inst.php';
include 'includes/templates/form_meta_insti.php';
include 'includes/templates/form_Mivi.php';
include 'includes/templates/form_valor_insti.php';
include 'includes/templates/form_info_negocio.php';
include 'includes/templates/form_contexto_insti.php';

?>

<div class="layer-entity contenedor">
    <div class="title">
        <div class="title_info">
            Información Institucional
        </div>
        <div class="title_context">
            Contexto Institucional
        </div>
    </div><!-- .title -->
    <div class="entity-info">
        <div class="conten-boton">
            <span class="boton-azul" id="boton-datos-basicos">Modificar Datos</span>
            <div class="datos-basicos">
                <table>
                    <caption>Datos Básicos</caption>
                    <tr>
                        <th>Nombre</th>
                        <td><?php echo $entidad['nombre']; ?></td>
                    </tr>
                    <tr>
                        <th>NIT</th>
                        <td><?php echo $entidad['nit']; ?></td>
                    </tr>
                    <tr>
                        <th>Municipio</th>
                        <td><?php echo $entidad['municipio']; ?></td>
                    </tr>
                    <tr>
                        <th>Dirección</th>
                        <td><?php echo $entidad['direccion']; ?></td>
                    </tr>
                    <tr>
                        <th>Teléfono</th>
                        <td><?php echo $entidad['telefono']; ?></td>
                    </tr>
                    <tr>
                        <th>Correo</th>
                        <td><?php echo $entidad['correo']; ?></td>
                    </tr>
                </table>
            </div><!-- .datos-basicos -->
        </div>
        <div class="horizonte-institucional">
            <table>
                <caption>Horizonte Institucional</caption>
                <tr>
                    <th>Objetivos Institucionales</th>
                    <th style="width: 11rem;">
                        <div class="caja-boton-blanco">
                            <span class="boton-blanco" id="boton-objet-inst">Agregar</span>
                        </div>
                    </th>
                </tr>
                <?php foreach ($static_ObjetInst as $objetivo) { ?>
                    <tr>
                        <td>
                            <?php echo $objetivo->nombre; ?>
                        </td>
                        <td>
                            <div class="caja-boton-blanco">
                                <form method="POST" class="caja-boton-blanco">
                                    <input type="hidden" name="borrar_objet_inst" value="<?php echo $objetivo->id; ?>">
                                    <input type="submit" value="BORRAR" class="boton-blanco">
                                    <script>
                                        history.replaceState(null, null, location.pathname)
                                    </script>
                                </form>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
            </table>

            <br>

            <table>
                <tr>
                    <th>Metas Institucionales</th>
                    <th style="width: 11rem;">
                        <div class="caja-boton-blanco">
                            <span class="boton-blanco" id="boton-meta-inst">Agregar</span>
                        </div>
                    </th>
                </tr>
                <?php foreach ($static_MetaInst as $meta) { ?>
                    <tr>
                        <td>
                            <?php echo $meta->nombre; ?>
                        </td>
                        <td>
                            <div class="caja-boton-blanco" id="boton-editar-objet-inst">
                                <form method="POST" class="caja-boton-blanco">
                                    <input type="hidden" name="borrar_meta_inst" value="<?php echo $meta->id; ?>">
                                    <input type="submit" value="BORRAR" class="boton-blanco">
                                    <script>
                                        history.replaceState(null, null, location.pathname)
                                    </script>
                                </form>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
            </table>

            <br>

            <table>
                <tr>
                    <th>Misión</th>
                    <th style="width: 11rem;">
                        <div class="caja-boton-blanco">
                            <span class="boton-blanco" id="boton-mivi-inst">Gestionar</span>
                        </div>
                    </th>
                </tr>
                <tr>
                    <td colspan="2">
                        <?php echo $mivi['mision']; ?>
                    </td>
                </tr>
                <tr>
                    <th colspan="2">Misión</th>
                </tr>
                <tr>
                    <td colspan="2">
                        <?php echo $mivi['vision']; ?>
                    </td>
                </tr>
            </table>

            <br>

            <table>
                <tr>
                    <th>Valores Institucionales</th>
                    <th style="width: 11rem;">
                        <div class="caja-boton-blanco">
                            <span class="boton-blanco" id="boton-valor-inst">Agregar</span>
                        </div>
                    </th>
                </tr>
                <?php foreach ($static_ValorInst as $valor) { ?>
                    <tr>
                        <td>
                            <?php echo $valor->nombre; ?>
                        </td>
                        <td>
                            <div class="caja-boton-blanco">
                                <form method="POST" class="caja-boton-blanco">
                                    <input type="hidden" name="borrar_valor_inst" value="<?php echo $valor->id; ?>">
                                    <input type="submit" value="BORRAR" class="boton-blanco">
                                    <script>
                                        history.replaceState(null, null, location.pathname)
                                    </script>
                                </form>
                            </div>
                        </td>
                    </tr>
                <?php } ?>
            </table>

        </div><!-- .horizonte-institucional -->
        <div class="info-negocio">
            <span class="boton-azul" id="boton-info-negocio">Agregar Datos</span>

            <table>
                <caption>Información del Negocio</caption>
                <tr>
                    <th>Descripción Institucional</th>
                </tr>
                <tr>
                    <td> <?php echo $infoNegocio['descripcion_insti']; ?> </td>
                </tr>
                <tr>
                    <th>Población Objetivo.</th>
                </tr>
                <tr>
                    <td> <?php echo $infoNegocio['poblacion_obj']; ?> </td>
                </tr>
                <tr>
                    <th>Productos o Servicios Ofrecidos</th>
                </tr>
                <tr>
                    <td> <?php echo $infoNegocio['productos_servicios']; ?> </td>
                </tr>
            </table>

        </div><!-- .info-negocio -->
    </div>

    <div class="contexto-institucional">
        <span class="boton-azul" id="boton-contexto-insti">Agregar Datos</span>

        <table>
            <caption>Contexto Institucional</caption>
            <tr>
                <th>Aspectos Económicos</th>
            </tr>
            <tr>
                <td> <?php echo $contexto['aspecto_economico']; ?> </td>
            </tr>
            <tr>
                <th>Aspectos Sociales</th>
            </tr>
            <tr>
                <td> <?php echo $contexto['aspecto_social']; ?> </td>
            </tr>
            <tr>
                <th>Aspectos Políticos</th>
            </tr>
            <tr>
                <td> <?php echo $contexto['aspecto_politico']; ?> </td>
            </tr>
            <tr>
                <th>Aspectos Culturales</th>
            </tr>
            <tr>
                <td> <?php echo $contexto['aspecto_cultural']; ?> </td>
            </tr>
        </table>
    </div><!-- .contexto-institucional -->
</div><!-- .layer-entity -->


<?php

incluirTemplate('footer');
