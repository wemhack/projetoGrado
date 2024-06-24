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
$objetMetaInsti = new Objet_Meta_Insti();
$planAccion = new Plan_Accion();
$seguimiento = new Seguimiento();

// Consultar datos de las instancias
$entidad = $datosBasicos->consultarDatosBasicos($id);
$objetMeta = $objetMetaInsti::consultarTodos($id);
$planAccionInsti = $planAccion::consultarTodos($id);
$seguimiento_Inst = $seguimiento::consultarTodos($id);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if ($_POST['cerrarSesion'] == 'Cerrar Sesión') {

        header('Location: cerrar-sesion.php');
        
    } elseif ($_POST['estado']) {

        $seguimiento->crearSeguimiento($id);
    }
}

include 'includes/templates/nbar.php';

?>

<div class="layer-seguim contenedor">

    <table>
        <caption>Seguimiento</caption>
        <thead>
            <th>Objetivos</th>
            <th>Metas</th>
            <th>Actividades</th>
            <th>Indicador</th>
            <th>Estado</th>
            <th colspan="2">Avance</th>
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
                    <td><?php echo $plan->indicador; ?></td>
                    <td>
                        <?php foreach ($seguimiento_Inst as $seguim) {
                            if ($plan->id == $seguim->idPlanAccion) {
                                echo $seguim->estado;
                            }
                        } ?>
                    </td>
                    <td>
                        <?php foreach ($seguimiento_Inst as $seguim) {
                            if ($plan->id == $seguim->idPlanAccion) {
                                echo $seguim->avance;
                            }
                        } ?>
                    </td>
                    <td>

                        <div class="caja-boton-blanco">

                            <img class="boton-blanco boton-seguimiento" src="build/img/add.svg" alt="Agregar Objetivo-Meta">

                            <dialog class="dialog_form" id="form-seguimiento">

                                <p>Seguimiento</p>

                                <form method="POST">

                                    <div class="boton-cerrar">X</div>

                                    <div class="dialog_form_input">
                                        <select name="estado" id="estado" required>
                                            <option value=""> - - </option>
                                            <option value="Sin Iniciar">Sin Iniciar</option>
                                            <option value="En Desarrollo">En Desarrollo</option>
                                            <option value="Estancada">Estancada</option>
                                            <option value="Finalizada">Finalizada</option>
                                            <option value="Estancada">Estancada</option>
                                        </select>
                                    </div>

                                    <div class="dialog_form_input">
                                        <input type="text" name="avance" id="avance" value="" required>
                                        <label>Avance %</label>
                                    </div>

                                    <input type="hidden" name="id_plan_accion" value="<?php echo $plan->id; ?>">

                                    <input type="submit" value="Guardar">

                                    <script>
                                        history.replaceState(null, null, location.pathname)
                                    </script>

                                </form>
                            </dialog>

                        </div>

                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<script>
    const formSeguimiento = document.querySelectorAll('#form-seguimiento');
    const botonSeguimiento = document.querySelectorAll('.boton-seguimiento');
    const botonCerrar = document.querySelectorAll('.boton-cerrar');

    for (let i = 0; i < botonSeguimiento.length; i++) {
        botonSeguimiento[i].addEventListener('click', () => {
            formSeguimiento[i].showModal();
        })
    }

    for (let i = 0; i < botonCerrar.length; i++) {
        botonCerrar[i].addEventListener('click', () => {
            formSeguimiento[i].classList.add("cerrar");
            setTimeout(() => {
                formSeguimiento[i].close();
                formSeguimiento[i].classList.remove("cerrar");
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
