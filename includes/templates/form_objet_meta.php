<dialog class="dialog_form" id="form_objet_meta">

    <form method="POST">

        <p>Misión</p>

        <div class="boton-cerrar">X</div>

        <div class="dialog_form_input">
            <textarea name="mision_inst" cols="45" rows="6" placeholder="Ingrese la Misión Institucional" value="" required><?php echo $mivi['mision']; ?></textarea>
        </div>
        
        <p>Visión</p>
        
        <div class="dialog_form_input">
            <textarea name="vision_inst" cols="45" rows="6" placeholder="Ingrese la Visión Institucional" value="" required><?php echo $mivi['vision']; ?></textarea>
        </div>

        <input type="submit" value="Guardar">

        <script>
            history.replaceState(null, null, location.pathname)
        </script>

    </form>
</dialog>