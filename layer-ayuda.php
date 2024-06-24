<?php

require 'includes/app.php';
incluirTemplate('header');
incluirTemplate('sbar');

error_reporting(0);

include 'includes/templates/nbar.php';

?>

<div class="layer-ayuda contenedor">
    <h2 class="layer-ayuda_title">Ayuda</h2>
    <div class="layer-ayuda_content">
        <a href="https://blog.hubspot.es/sales/plan-de-accion-empresa">Qué es un plan de acción, cómo se elabora y ejemplos</a>
        <p>
            Para evitar silos de información a la hora de gestionar tu negocio, conocer cómo elaborar un plan de acción te ayudará a crear una estrategia empresarial eficaz, sin importar el tipo de cargo que desempeñes" https://blog.hubspot.es/sales/plan-de-accion-empresa
        </p>
        <a href="#">Ayuda 2</a>
        <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam dolores maiores esse impedit amet quo fugiat non ex illo, delectus nemo.
        </p>
        <a href="#">Ayuda 3</a>
        <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam dolores maiores esse impedit amet quo fugiat non ex illo, delectus nemo.
        </p>
    </div>
</div>

<?php

incluirTemplate('footer');

?>
