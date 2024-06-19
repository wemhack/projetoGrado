<dialog class="dialog_form" id="form_info_negocio">
    <p>Información del Negocio</p>

    <form method="POST">

        <div class="boton-cerrar">X</div>

        <div class="dialog_form_input">
            <input type="text" name="desc_insti" id="desc_insti" value="<?php echo $infoNegocio['descripcion_insti']; ?>" required>
            <label>Descripción Institucional</label>
        </div>
        <div class="dialog_form_input">
            <input type="text" name="pobl_objet" id="pobl_objet" value="<?php echo $infoNegocio['poblacion_obj']; ?>" required>
            <label>Población Objetivo</label>
        </div>
        <div class="dialog_form_input">
            <input type="text" name="produts" id="produts" value="<?php echo $infoNegocio['productos_servicios']; ?>" required>
            <label>Productos o Servicios Ofrecidos</label>
        </div>
        <input type="submit" value="Guardar">

        <script>
            history.replaceState(null, null, location.pathname)
        </script>

    </form>
</dialog>