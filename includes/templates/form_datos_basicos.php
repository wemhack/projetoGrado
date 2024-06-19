<dialog class="dialog_form" id="form_datos_basicos">
    <p>Datos Básicos</p>

    <form method="POST">

        <div class="boton-cerrar">X</div>

        <div class="dialog_form_input">
            <input type="text" name="nombre" id="nombre" value="<?php echo $entidad['nombre']; ?>" required>
            <label>Nombre de la Entidad</label>
        </div>
        <div class="dialog_form_input">
            <input type="text" name="nit" id="nit" value="<?php echo $entidad['nit']; ?>" required>
            <label>NIT</label>
        </div>
        <div class="dialog_form_input">
            <input type="text" name="municipio" id="municipio" value="<?php echo $entidad['municipio']; ?>" required>
            <label>Municipio</label>
        </div>
        <div class="dialog_form_input">
            <input type="text" name="direccion_entidad" id="direccion_entidad" value="<?php echo $entidad['direccion']; ?>" required>
            <label>Dirección</label>
        </div>
        <div class="dialog_form_input">
            <input type="text" name="telefono_entidad" id="telefono_entidad" value="<?php echo $entidad['telefono']; ?>" required>
            <label>Teléfono</label>
        </div>
        <div class="dialog_form_input">
            <input type="email" name="correo_entidad" id="correo_entidad" value="<?php echo $entidad['correo']; ?>" required>
            <label>Correo</label>
        </div>
        <input type="submit" value="Guardar">

        <script>
            history.replaceState(null, null, location.pathname)
        </script>

    </form>
</dialog>