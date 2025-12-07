<?php

include_once '../controlador/ControladorJuego.php';
include_once '../modelo/Juego.php';

$juego = ControladorJuego::getJuego($_GET['cod']);

echo "<img src='$juego->imagen' alt='alt'/><br>";
echo "<h4>$juego->nombre_juego</h4>";
echo "<p>Consola: $juego->nombre_consola</p>";
echo "<p>Año: $juego->anio</p>";
echo "<p>Precio: $juego->precio</p>";
echo "<p>Descripcion: $juego->desc</p>";

if($juego->alquilado =="NO"){
    echo "<p>Disponible para alquilar</p>";
}

?>

<a href="index.php"><button>Volver</button></a>
