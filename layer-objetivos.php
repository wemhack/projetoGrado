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
$DOFA_insti = new DOFA();
$objetMetaInsti = new Objet_Meta_Insti();

// Consultar datos de las instancias
$entidad = $datosBasicos->consultarDatosBasicos($id);
$DOFA = $DOFA_insti::consultarTodos($id);
$objetMeta = $objetMetaInsti::consultarTodos($id);

// debuguear($DOFA[0]->tipo_factor);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if ($_POST['cerrarSesion'] == 'Cerrar Sesión') {

        header('Location: cerrar-sesion.php');
    } elseif ($_POST['objetivo']) {

        $objetMetaInsti->crearFactorDOFA($id);
    }
}

include 'includes/templates/nbar.php';

?>

<div class="layer-objetivos contenedor">

    <span class="layer-objetivos_title">Identificación de Objetivos</span>

    <table>
        <caption>Estrategias con Enfoque de Exito</caption>
        <thead>
            <tr>
                <th>Estrategias</th>
                <th>Objetivos</th>
                <th colspan="2">Metas</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($DOFA as $factor) {
                $clave = $factor->id;
                if ($factor->tipo_factor == 'EstrategiaExito') {

            ?>
                    <tr>
                        <td><?php echo $factor->descripcion; ?></td>
                        <td>
                            <?php foreach ($objetMeta as $objet) {
                                if ($clave == $objet->idDofa) {
                                    echo $objet->objetivo;
                                }
                            } ?>
                        </td>
                        <td>
                            <?php foreach ($objetMeta as $objet) {
                                if ($clave == $objet->idDofa) {
                                    echo $objet->meta;
                                }
                            } ?>
                        </td>
                        <td>
                            <div class="caja-boton-blanco">
                                
                                <img class="boton-blanco boton-objet-meta" src="build/img/add.svg" alt="Agregar Objetivo-Meta">

                                <dialog class="dialog_form" id="form-objet-meta">

                                    <p>Estrategias con Enfoque de Exito</p>

                                    <form method="POST">

                                        <div class="boton-cerrar">X</div>

                                        <div class="dialog_form_input">
                                            <input type="text" name="objetivo" id="objetivo" value="" required>
                                            <label>Objetivo</label>
                                        </div>
                                        <div class="dialog_form_input">
                                            <input type="text" name="meta" id="meta" value="" required>
                                            <label>Meta</label>
                                        </div>

                                        <input type="hidden" name="id_dofa" value="<?php echo $clave; ?>">

                                        <input type="submit" value="Guardar">

                                        <script>
                                            history.replaceState(null, null, location.pathname)
                                        </script>
                                    </form>
                                </dialog>
                            </div>
                        </td>
                    </tr>
            <?php }
            } ?>
        </tbody>
    </table>

    <table>
        <caption>Estrategias con Enfoque de Adaptación</caption>
        <thead>
            <tr>
                <th>Estrategias</th>
                <th>Objetivos</th>
                <th colspan="2">Metas</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($DOFA as $factor) {
                $clave = $factor->id;
                if ($factor->tipo_factor == 'EstrategiaAdap') {

            ?>
                    <tr>
                        <td><?php echo $factor->descripcion; ?></td>
                        <td>
                            <?php foreach ($objetMeta as $objet) {
                                if ($clave == $objet->idDofa) {
                                    echo $objet->objetivo;
                                }
                            } ?>
                        </td>
                        <td>
                            <?php foreach ($objetMeta as $objet) {
                                if ($clave == $objet->idDofa) {
                                    echo $objet->meta;
                                }
                            } ?>
                        </td>
                        <td>
                            <div class="caja-boton-blanco">
                                <img class="boton-blanco boton-objet-meta" src="build/img/add.svg" alt="Agregar Objetivo-Meta">

                                <dialog class="dialog_form" id="form-objet-meta">

                                    <p>Estrategias con Enfoque de Exito</p>

                                    <form method="POST">

                                        <div class="boton-cerrar">X</div>

                                        <div class="dialog_form_input">
                                            <input type="text" name="objetivo" id="objetivo" value="" required>
                                            <label>Objetivo</label>
                                        </div>
                                        <div class="dialog_form_input">
                                            <input type="text" name="meta" id="meta" value="" required>
                                            <label>Meta</label>
                                        </div>

                                        <input type="hidden" name="id_dofa" value="<?php echo $clave; ?>">

                                        <input type="submit" value="Guardar">

                                        <script>
                                            history.replaceState(null, null, location.pathname)
                                        </script>
                                    </form>
                                </dialog>
                            </div>
                        </td>
                    </tr>
            <?php }
            } ?>
        </tbody>
    </table>

    <table>
        <caption>Estrategias con Enfoque de Reacción</caption>
        <thead>
            <tr>
                <th>Estrategias</th>
                <th>Objetivos</th>
                <th colspan="2">Metas</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($DOFA as $factor) {
                $clave = $factor->id;
                if ($factor->tipo_factor == 'EstrategiaReac') {

            ?>
                    <tr>
                        <td><?php echo $factor->descripcion; ?></td>
                        <td>
                            <?php foreach ($objetMeta as $objet) {
                                if ($clave == $objet->idDofa) {
                                    echo $objet->objetivo;
                                }
                            } ?>
                        </td>
                        <td>
                            <?php foreach ($objetMeta as $objet) {
                                if ($clave == $objet->idDofa) {
                                    echo $objet->meta;
                                }
                            } ?>
                        </td>
                        <td>
                            <div class="caja-boton-blanco">
                                <img class="boton-blanco boton-objet-meta" src="build/img/add.svg" alt="Agregar Objetivo-Meta">

                                <dialog class="dialog_form" id="form-objet-meta">

                                    <p>Estrategias con Enfoque de Exito</p>

                                    <form method="POST">

                                        <div class="boton-cerrar">X</div>

                                        <div class="dialog_form_input">
                                            <input type="text" name="objetivo" id="objetivo" value="" required>
                                            <label>Objetivo</label>
                                        </div>
                                        <div class="dialog_form_input">
                                            <input type="text" name="meta" id="meta" value="" required>
                                            <label>Meta</label>
                                        </div>

                                        <input type="hidden" name="id_dofa" value="<?php echo $clave; ?>">

                                        <input type="submit" value="Guardar">

                                        <script>
                                            history.replaceState(null, null, location.pathname)
                                        </script>
                                    </form>
                                </dialog>
                            </div>
                        </td>
                    </tr>
            <?php }
            } ?>
        </tbody>
    </table>

    <table>
        <caption>Estrategias con Enfoque de Supervivencia</caption>
        <thead>
            <tr>
                <th>Estrategias</th>
                <th>Objetivos</th>
                <th colspan="2">Metas</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($DOFA as $factor) {
                $clave = $factor->id;
                if ($factor->tipo_factor == 'EstrategiaSup') {

            ?>
                    <tr>
                        <td><?php echo $factor->descripcion; ?></td>
                        <td>
                            <?php foreach ($objetMeta as $objet) {
                                if ($clave == $objet->idDofa) {
                                    echo $objet->objetivo;
                                }
                            } ?>
                        </td>
                        <td>
                            <?php foreach ($objetMeta as $objet) {
                                if ($clave == $objet->idDofa) {
                                    echo $objet->meta;
                                }
                            } ?>
                        </td>
                        <td>
                            <div class="caja-boton-blanco">
                                <img class="boton-blanco boton-objet-meta" src="build/img/add.svg" alt="Agregar Objetivo-Meta">

                                <dialog class="dialog_form" id="form-objet-meta">

                                    <p>Estrategias con Enfoque de Exito</p>

                                    <form method="POST">

                                        <div class="boton-cerrar">X</div>

                                        <div class="dialog_form_input">
                                            <input type="text" name="objetivo" id="objetivo" value="" required>
                                            <label>Objetivo</label>
                                        </div>
                                        <div class="dialog_form_input">
                                            <input type="text" name="meta" id="meta" value="" required>
                                            <label>Meta</label>
                                        </div>

                                        <input type="hidden" name="id_dofa" value="<?php echo $clave; ?>">

                                        <input type="submit" value="Guardar">

                                        <script>
                                            history.replaceState(null, null, location.pathname)
                                        </script>
                                    </form>
                                </dialog>
                            </div>
                        </td>
                    </tr>
            <?php }
            } ?>
        </tbody>
    </table>

</div>

<script>
    const formObjetMeta = document.querySelectorAll('#form-objet-meta');
    const botonObjetMeta = document.querySelectorAll('.boton-objet-meta');
    const botonCerrar = document.querySelectorAll('.boton-cerrar');

    for (let i = 0; i < botonObjetMeta.length; i++) {
        botonObjetMeta[i].addEventListener('click', () => {
            formObjetMeta[i].showModal();
        })
    }

    for (let i = 0; i < botonCerrar.length; i++) {
        botonCerrar[i].addEventListener('click', () => {
            formObjetMeta[i].classList.add("cerrar");
            setTimeout(() => {
                formObjetMeta[i].close();
                formObjetMeta[i].classList.remove("cerrar");
            }, 600);
        })
    }

    const sbarHeadFlech = document.querySelector(".sbar_head_flech");
    const sbar = document.querySelector(".sbar");
    const nbar = document.querySelector(".nbar");
    const contenedor = document.querySelector(".contenedor");
    const titleInfo = document.querySelector(".title_info");
    const titleContext = document.querySelector(".title_context");
    const entityInfo = document.querySelector(".entity-info");
    const contextoInstitucional = document.querySelector(".contexto-institucional");
    const title = document.querySelector(".title");

    sbarHeadFlech.addEventListener("click", () => {
        sbar.classList.toggle("collapse");
        nbar.classList.toggle("collapse");
        contenedor.classList.toggle("collapse");
    });

    titleInfo.addEventListener("click", () => {
        if (entityInfo.classList.contains("move-entity")) {
            entityInfo.classList.remove("move-entity");
            contextoInstitucional.classList.remove("move-entity");
            title.classList.remove("move-title");
        }
    });

    titleContext.addEventListener("click", () => {
        if (!contextoInstitucional.classList.contains("move-entity")) {
            contextoInstitucional.classList.add("move-entity");
            entityInfo.classList.add("move-entity");
            title.classList.add("move-title");
        }
    });
</script>

<?php

incluirTemplate('footer');

?>
