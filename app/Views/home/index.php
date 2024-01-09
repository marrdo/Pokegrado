<?php
include(ROOT_PATH . '/app/Views/shared/header_tmpl_inicio.php');
?>
<section class="inicio-index">
    <h1 class="titulo_inicio">Bienvenido entrenador</h1>

    <article class="presentacion">
        <h2>¿Eres nuevo o tienes cuenta?</h2>

        <article class="botones-inicio">
            <a href="./index.php?path=home/inicio/3">
                <button class="boton" type="button">Soy nuevo</button>
            </a>
            <a href="./index.php?path=home/inicio/2">
                <button class="boton" type="button">Comenzar combates</button>
            </a>
        </article>
    </article>

</section>

<?php
include(ROOT_PATH . '/app/Views/shared/footer_tmpl_inicio.php');
?>