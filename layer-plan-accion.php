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

// Consultar datos de las instancias
$entidad = $datosBasicos->consultarDatosBasicos($id);
$objetMeta = $objetMetaInsti::consultarTodos($id);
$planAccionInsti = $planAccion::consultarTodos($id);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if ($_POST['cerrarSesion'] == 'Cerrar Sesión') {

        header('Location: cerrar-sesion.php');
    } elseif ($_POST['actividad']) {

        $planAccion->crearPlanAccion($id);
    }
}

include 'includes/templates/nbar.php';

?>

<div class="layer-plan-accion contenedor">

    <h2 class="plan_titulo">Plan de Acción</h2>

    <div class="plan_matriz">

        <div class="plan_matriz_objetivos">

            <h3>Objetivos</h3>

            <?php foreach ($objetMeta as $objetivo) { ?>
                <a href="#" class="objet-plan"><?php echo $objetivo->objetivo; ?></a>
            <?php } ?>

        </div>

        <div class="plan_matriz_metas">

            <?php foreach ($objetMeta as $meta) {
                $idMeta = $meta->id;
            ?>

                <div class="plan-matriz-metas-content">

                    <div>
                        <h3>Meta</h3>
                        <p>
                            <?php echo $meta->meta; ?>
                        </p>
                    </div>

                    <table>
                        <thead>
                            <tr>
                                <th>Actividades</th>
                                <th>Indicador</th>
                                <th>Inicio</th>
                                <th>Fin</th>
                                <th>Responsable</th>
                                <th>Recursos</th>
                                <th>
                                    <div class="caja-boton-blanco">

                                        <img class="boton-blanco boton-plan-accion" src="build/img/add.svg" alt="Agregar Objetivo-Meta">

                                        <dialog class="dialog_form" id="form-plan-accion">

                                            <p>Plan de Acción</p>

                                            <form method="POST">

                                                <div class="boton-cerrar">X</div>

                                                <div class="dialog_form_input">
                                                    <input type="text" name="actividad" id="actividad" value="" required>
                                                    <label>Actividad</label>
                                                </div>
                                                <div class="dialog_form_input">
                                                    <input type="text" name="indicador" id="indicador" value="" required>
                                                    <label>Indicador</label>
                                                </div>
                                                <div class="dialog_form_input">
                                                    <input type="date" name="inicio" id="inicio" value="" required>
                                                </div>
                                                <div class="dialog_form_input">
                                                    <input type="date" name="fin" id="fin" value="" required>
                                                </div>
                                                <div class="dialog_form_input">
                                                    <input type="text" name="responsable" id="responsable" value="" required>
                                                    <label>Responsable</label>
                                                </div>
                                                <div class="dialog_form_input">
                                                    <input type="number" name="recursos" id="recursos" value="" required>
                                                    <label>Recursos</label>
                                                </div>

                                                <input type="hidden" name="id_objet_meta" value="<?php echo $idMeta; ?>">

                                                <input type="submit" value="Guardar">

                                                <script>
                                                    history.replaceState(null, null, location.pathname)
                                                </script>
                                            </form>
                                        </dialog>

                                    </div>
                                </th>
                            </tr>
                        </thead>
                        <tr>
                            <td>
                                <?php foreach ($planAccionInsti as $plan) {
                                    if ($idMeta == $plan->idObje_estrateg) {
                                        echo $plan->actividad;
                                    }
                                } ?>
                            </td>
                            <td>
                                <?php foreach ($planAccionInsti as $plan) {
                                    if ($idMeta == $plan->idObje_estrateg) {
                                        echo $plan->indicador;
                                    }
                                } ?>
                            </td>
                            <td>
                                <?php foreach ($planAccionInsti as $plan) {
                                    if ($idMeta == $plan->idObje_estrateg) {
                                        echo $plan->inicio;
                                    }
                                } ?>
                            </td>
                            <td>
                                <?php foreach ($planAccionInsti as $plan) {
                                    if ($idMeta == $plan->idObje_estrateg) {
                                        echo $plan->fin;
                                    }
                                } ?>
                            </td>
                            <td>
                                <?php foreach ($planAccionInsti as $plan) {
                                    if ($idMeta == $plan->idObje_estrateg) {
                                        echo $plan->responsable;
                                    }
                                } ?>
                            </td>
                            <td colspan="2">
                                <?php foreach ($planAccionInsti as $plan) {
                                    if ($idMeta == $plan->idObje_estrateg) {
                                        echo $plan->recursos;
                                    }
                                } ?>
                            </td>
                        </tr>
                    </table>

                    <br>

                </div>

            <?php } ?>

        </div>

    </div>

</div>

<script>
    const formPlanAccion = document.querySelectorAll('#form-plan-accion');
    const botonPlanAccion = document.querySelectorAll('.boton-plan-accion');
    const botonCerrar = document.querySelectorAll('.boton-cerrar');
    const planMatrizMetasContent = document.querySelectorAll('.plan-matriz-metas-content');
    const objetPlan = document.querySelectorAll('.objet-plan');

    for (let i = 0; i < objetPlan.length; i++) {

        objetPlan[i].addEventListener('click', () => {

            planMatrizMetasContent.forEach(element => {
                element.classList.remove('mostrar');
            });

            planMatrizMetasContent[i].classList.toggle('mostrar');

        })
    }

    for (let i = 0; i < botonPlanAccion.length; i++) {
        botonPlanAccion[i].addEventListener('click', () => {
            formPlanAccion[i].showModal();
        })
    }

    for (let i = 0; i < botonCerrar.length; i++) {
        botonCerrar[i].addEventListener('click', () => {
            formPlanAccion[i].classList.add("cerrar");
            setTimeout(() => {
                formPlanAccion[i].close();
                formPlanAccion[i].classList.remove("cerrar");
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
