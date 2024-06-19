<dialog class="dialog_form" id="form_valor_inst">
    <p>Valores Institucionales</p>

    <form method="POST">
    
        <div class="boton-cerrar">X</div>

        <div class="dialog_form_input">
            <textarea name="valor_inst" cols="45" rows="6" placeholder="Ingrese un Valor Institucional" value="" required></textarea>
        </div>

        <input type="submit" value="Guardar">

        <script>
            history.replaceState(null, null, location.pathname)
        </script>

    </form>
</dialog>