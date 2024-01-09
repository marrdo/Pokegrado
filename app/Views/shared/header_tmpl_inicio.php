<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script defer src="asset/js/home.js"></script>
    <link rel="stylesheet" href="asset/css/header.css">
    <link rel="stylesheet" href="asset/css/inicio.css">
    <link rel="stylesheet" href="asset/css/footer.css">
    <link rel="shortcut icon" href="asset/icon/favicon/favicon.ico" type="image/x-icon">
    <title>Pokegrado</title>
</head>
<header class="headerTop">
    <a href="./index.php?path=home/inicio/1">
        <figure class="fig_nav"><img src="asset/img/header/logoPokemon.png" alt="Logo de pokemon"></figure>
    </a>
    <div class="carril-bola"><img class="imagenAnimacionDos" title="<?= $nombreimagen2;?>" src="<?= $imagenAnimacion2;?>" alt="<?= $nombreimagen2;?>"><img class="imagenBola" src="asset/img/pokebola.png" alt="Imagen pokeball"><img class="imagenAnimacion" title="<?= $nombreimagen;?>" src="<?= $imagenAnimacion;?>" alt="<?= $nombreimagen;?>"></div>
    <nav>
        <ul class="nav_bar">
            <a href="./index.php?path=home/inicio/1">
                <li>
                    <figure class="texto-navs"><img src="asset/img/header/Inicio.png" alt="Texto Inicio"></figure>
                </li>
            </a>
            <a href="./index.php?path=home/inicio/2">
                <li>
                    <figure class="texto-navs"><img src="asset/img/header/Login.png" alt="Texto Login"></figure>
                </li>
            </a>
            <a href="./index.php?path=home/inicio/3">
                <li>
                    <figure class="texto-navs"><img src="asset/img/header/Registro.png" alt="Texto Registro"></figure>
                </li>
            </a>
            <a href="./index.php?path=home/pokedex">
                <li>
                    <figure class="texto-navs"><img src="asset/img/header/POKEDEX.png" alt="Texto Pokedex"></figure>
                </li>
            </a>
        </ul>
    </nav>

</header>
<main>