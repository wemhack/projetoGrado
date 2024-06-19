<dialog class="dialog_form" id="form_contexto_insti">
    <p>Información del Negocio</p>

    <form method="POST">

        <div class="boton-cerrar">X</div>

        <div class="dialog_form_input">
            <input type="text" name="asp_econo" id="asp_econo" value="<?php echo $contexto['aspecto_economico']; ?>" required>
            <label>Aspectos Económicos</label>
        </div>
        <div class="dialog_form_input">
            <input type="text" name="asp_socia" id="asp_socia" value="<?php echo $contexto['aspecto_social']; ?>" required>
            <label>Aspectos Sociales</label>
        </div>
        <div class="dialog_form_input">
            <input type="text" name="asp_polit" id="asp_polit" value="<?php echo $contexto['aspecto_politico']; ?>" required>
            <label>Aspectos Políticos</label>
        </div>
        <div class="dialog_form_input">
            <input type="text" name="asp_cultu" id="asp_cultu" value="<?php echo $contexto['aspecto_cultural']; ?>" required>
            <label>Aspectos Culturales</label>
        </div>

        <input type="submit" value="Guardar">

        <script>
            history.replaceState(null, null, location.pathname)
        </script>

    </form>
</dialog>