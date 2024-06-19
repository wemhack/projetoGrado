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
$DOFA_insti = new DOFA();

// Consultar datos de las instancias
$entidad = $datosBasicos->consultarDatosBasicos($id);
$DOFA = $DOFA_insti::consultarTodos($id);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if ($_POST['cerrarSesion'] == 'Cerrar Sesión') {

        header('Location: cerrar-sesion.php');
    } elseif ($_POST['factor_DOFA']) {

        $DOFA_insti->crearFactorDOFA($id);

    } elseif ($_POST['borrar_factor']) {

        $borrar = $_POST['borrar_factor'];
        $DOFA_insti->borrarFactorDOFA($borrar);
    }
}

include 'includes/templates/nbar.php';
include 'includes/templates/form_DOFA.php';

?>

<div class="layer-sActual contenedor">
    <span class="boton-azul" id="boton-dofa">Agregar</span>
    <h2 class="sActual-text">Matriz Dofa</h2>
    <div class="matriz-dofa">
        <div class="factores-internos">Factores Internos</div>
        <div class="factores-externos">Factores Externos</div>
        <div class="planeacion-estrategica">Planeación Estratégica</div>
        <div class="fortalezas">Fortalezas</div>

        <div class="fortalezas-card box-card">

            <?php foreach ($DOFA as $factor) {
                if ($factor->tipo_factor == 'Fortaleza') {
            ?>
                    <div class="card">
                        <p><?php echo $factor->descripcion; ?></p>
                        <form method="POST">
                            <input type="hidden" name="borrar_factor" value="<?php echo $factor->id; ?>">
                            <input title="Borrar" type="image" src="build/img/delete.svg" alt="Botón Borrar">
                            
                            <script>
                                history.replaceState(null, null, location.pathname)
                            </script>

                        </form>
                    </div>
            <?php }
            } ?>

        </div>

        <div class="debilidades">Debilidades</div>
        <div class="debilidades-card box-card">

            <?php foreach ($DOFA as $factor) {
                if ($factor->tipo_factor == 'Debilidad') {
            ?>
                    <div class="card">
                        <p><?php echo $factor->descripcion; ?></p>
                        <form method="POST">
                            <input type="hidden" name="borrar_factor" value="<?php echo $factor->id; ?>">
                            <input title="Borrar" type="image" src="build/img/delete.svg" alt="Botón Borrar">
                            <script>
                                history.replaceState(null, null, location.pathname)
                            </script>
                        </form>

                    </div>
            <?php }
            } ?>

        </div>
        <div class="oportunidades">Oportunidades</div>
        <div class="oportunidades-card box-card">

            <?php foreach ($DOFA as $factor) {
                if ($factor->tipo_factor == 'Oportunidad') {
            ?>
                    <div class="card">
                        <p><?php echo $factor->descripcion; ?></p>
                        <form method="POST">
                            <input type="hidden" name="borrar_factor" value="<?php echo $factor->id; ?>">
                            <input title="Borrar" type="image" src="build/img/delete.svg" alt="Botón Borrar">
                            <script>
                                history.replaceState(null, null, location.pathname)
                            </script>
                        </form>

                    </div>
            <?php }
            } ?>

        </div>
        <div class="amenazas">Amenazas</div>
        <div class="amenazas-card box-card">

            <?php foreach ($DOFA as $factor) {
                if ($factor->tipo_factor == 'Amenaza') {
            ?>
                    <div class="card">
                        <p><?php echo $factor->descripcion; ?></p>
                        <form method="POST">
                            <input type="hidden" name="borrar_factor" value="<?php echo $factor->id; ?>">
                            <input title="Borrar" type="image" src="build/img/delete.svg" alt="Botón Borrar">
                            <script>
                                history.replaceState(null, null, location.pathname)
                            </script>
                        </form>

                    </div>
            <?php }
            } ?>

        </div>
        <div class="enfoque-exito">Estrategias de Exito</div>
        <div class="enfoque-exito-card box-card">

            <?php foreach ($DOFA as $factor) {
                if ($factor->tipo_factor == 'EstrategiaExito') {
            ?>
                    <div class="card">
                        <p><?php echo $factor->descripcion; ?></p>
                        <form method="POST">
                            <input type="hidden" name="borrar_factor" value="<?php echo $factor->id; ?>">
                            <input title="Borrar" type="image" src="build/img/delete.svg" alt="Botón Borrar">
                            <script>
                                history.replaceState(null, null, location.pathname)
                            </script>
                        </form>

                    </div>
            <?php }
            } ?>

        </div>
        <div class="enfoque-adaptacion">Estrategias de Adaptación</div>
        <div class="enfoque-adaptacion-card box-card">

            <?php foreach ($DOFA as $factor) {
                if ($factor->tipo_factor == 'EstrategiaAdap') {
            ?>
                    <div class="card">
                        <p><?php echo $factor->descripcion; ?></p>
                        <form method="POST">
                            <input type="hidden" name="borrar_factor" value="<?php echo $factor->id; ?>">
                            <input title="Borrar" type="image" src="build/img/delete.svg" alt="Botón Borrar">
                            <script>
                                history.replaceState(null, null, location.pathname)
                            </script>
                        </form>

                    </div>
            <?php }
            } ?>

        </div>
        <div class="enfoque-reaccion">Estrategias de Reacción</div>
        <div class="enfoque-reaccion-card box-card">

            <?php foreach ($DOFA as $factor) {
                if ($factor->tipo_factor == 'EstrategiaReac') {
            ?>
                    <div class="card">
                        <p><?php echo $factor->descripcion; ?></p>
                        <form method="POST">
                            <input type="hidden" name="borrar_factor" value="<?php echo $factor->id; ?>">
                            <input title="Borrar" type="image" src="build/img/delete.svg" alt="Botón Borrar">
                            <script>
                                history.replaceState(null, null, location.pathname)
                            </script>
                        </form>

                    </div>
            <?php }
            } ?>

        </div>
        <div class="enfoque-supervivencia">Estrategias de Supervivencia</div>
        <div class="enfoque-supervivencia-card box-card">

            <?php foreach ($DOFA as $factor) {
                if ($factor->tipo_factor == 'EstrategiaSup') {
            ?>
                    <div class="card">
                        <p><?php echo $factor->descripcion; ?></p>
                        <form method="POST">
                            <input type="hidden" name="borrar_factor" value="<?php echo $factor->id; ?>">
                            <input title="Borrar" type="image" src="build/img/delete.svg" alt="Botón Borrar">
                            <script>
                                history.replaceState(null, null, location.pathname)
                            </script>
                        </form>

                    </div>
            <?php }
            } ?>

        </div>
    </div>
</div>


<script>
    // Matriz DOFA

    const botonCerrar = document.querySelectorAll(".boton-cerrar");
    const botonDofa = document.querySelector("#boton-dofa");
    const formDOFA = document.querySelector("#form_DOFA");

    botonDofa.addEventListener("click", () => {
        formDOFA.showModal();
    });

    botonCerrar.forEach((cerrar) => {
        cerrar.addEventListener("click", () => {
            formDOFA.classList.add("cerrar");
            setTimeout(() => {
                formDOFA.close();
                formDOFA.classList.remove("cerrar");
            }, 600);
        });
    });

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