<dialog class="dialog_form" id="form_DOFA">

    <p>Matriz DOFA</p>

    <form method="POST">
        
        <div class="boton-cerrar">X</div>

        <select name="factor_DOFA" id="factor" required>
            <option value="" disabled></option>
            <option value="Fortaleza">Fortaleza</option>
            <option value="Debilidad">Debilidad</option>
            <option value="Oportunidad">Oportunidad</option>
            <option value="Amenaza">Amenaza</option>
            <option value="EstrategiaExito">Estrategia de Exito</option>
            <option value="EstrategiaAdap">Estrategia de Adaptación</option>
            <option value="EstrategiaReac">Estrategia de Reacción</option>
            <option value="EstrategiaSup">Estrategia de Supervivencia</option>
        </select>
        <div class="dialog_form_input">
            <textarea name="descrip_factor" cols="45" rows="6" placeholder="Ingrese un factor" value="" required></textarea>
        </div>

        <input type="submit" value="Guardar">

        <script>
            history.replaceState(null, null, location.pathname)
        </script>

    </form>
</dialog>