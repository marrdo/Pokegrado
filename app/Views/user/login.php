<?php
include(ROOT_PATH . '/app/Views/shared/header_tmpl_inicio.php');
?>
<?php
if (isset($_GET['success']) && $_GET['success'] == 1) {
    $mensajeRegistro = 'Registro completado: Los datos se guardaron correctamente.';
}
?>

<section class="inicio-login">
<?php if (!empty($mensajeRegistro)) echo '<h3>' . htmlspecialchars($mensajeRegistro, ENT_QUOTES, 'UTF-8') . '</h3>'; ?>
    <article class="fondoUno img-log-uno"></article>
    <form class="form-register" action="./index.php?path=home/inicio/2" method="POST" enctype="multipart/form-data">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" minlength="1" required>
    
        <label for="alias">Alias:</label>
        <input type="text" id="alias" name="alias" minlength="1" required>
    
        <button class="boton-form" type="submit" name="logear">Logear</button>
    </form>
    <article class="fondoDos img-log-dos"></article>
</section>



<?php
include(ROOT_PATH . '/app/Views/shared/footer_tmpl_inicio.php');
?>