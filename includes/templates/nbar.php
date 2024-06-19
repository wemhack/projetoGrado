<div class="nbar">
    <div class="nbar_inst">
        <span><?php echo $entidad['nombre']; ?></span>
    </div>
    <div class="nbar_user">
        <span> <?php echo $_SESSION['usuario']; ?> </span>

        <form method="POST">
            <input type="submit" name="cerrarSesion" value="Cerrar Sesión" class="boton-amarillo">
            <script>
                history.replaceState(null, null, location.pathname)
            </script>
        </form>

    </div>
</div>