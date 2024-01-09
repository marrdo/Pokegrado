<?php
include(ROOT_PATH . '/app/Views/shared/header_tmpl_inicio.php');
?>
<section class="registro">
    <article class="fondoUno"></article>
    <form class="form-register" action="./index.php?path=home/guardarEntrenador" method="POST" enctype="multipart/form-data">
        <label for="nombre">Nombre:</label>
        <input class="inputs" type="text" id="nombre" name="nombre" required min="1">
    
        <label for="alias">Alias:</label>
        <input class="inputs" type="text" id="alias" name="alias" required min="1">
    
        <button class="boton-form" type="submit" name="registrarse">Registrarse</button>
    </form>
    <article class="fondoDos"></article>
</section>
<?php
include(ROOT_PATH . '/app/Views/shared/footer_tmpl_inicio.php');
?>