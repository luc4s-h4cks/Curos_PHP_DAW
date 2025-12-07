<?php
include_once '../controlador/ControladorJuego.php';
include_once '../modelo/Juego.php';

$juego = ControladorJuego::getJuego($_POST['cod']);

if (isset($_POST['delete'])) {
    if (ControladorJuego::deleteJuego($_POST['cod'])) {
        header("Location: index.php");
    } else {
        echo "Algo salio mal";
    }
}

if (isset($_POST['actualizar'])) {
    $ruta;
    if (is_uploaded_file($_FILES['img']['tmp_name'])) {
        $ficehro = time() . "-" . $_FILES['img']['name'];
        $ruta = "imagenes/" . $ficehro;
        move_uploaded_file($_FILES['img']['tmp_name'], $ruta);
    }else{
        $ruta=$_POST['imgold'];
    }

    $actualizado = new Juego($_POST['cod'], $_POST['nombre'], $_POST['consola'], $_POST['anio'], $_POST['precio'], $_POST['alq'], $ruta, $_POST['desc']);

    if(ControladorJuego::updateJuego($actualizado)){
        header("Location: index.php");
    }else{
        echo "Algo salio mal";
    }
    
    }

if (isset($_POST['borrar'])) {

    echo "<img src='$juego->imagen' alt='alt'/><br>";
    echo "<h4>$juego->nombre_juego</h4>";
    echo "<p>Consola: $juego->nombre_consola</p>";
    echo "<p>Año: $juego->anio</p>";
    echo "<p>Precio: $juego->precio</p>";
    echo "<p>Alquilado: $juego->alquilado</p>";
    echo "<p>Descripcion: $juego->desc</p>";
    ?>

    <form action="" method="post">
        <input type="hidden" name="cod" <?= "value='$_POST[cod]'" ?> >
        <input type="submit" name="delete" value="Borrar">
    </form>
    <a href="index.php"><button>Volver</button></a>

    <?php
}

if (isset($_POST['modificar'])) {
    echo "<form action='' method='post' enctype='multipart/form-data'>";
    echo "Nombre del juego <input type='text' name='nombre' value='$juego->nombre_juego'><br>";
    echo "Nombre de la consola <input type='text' name='consola' value='$juego->nombre_consola'><br>";
    echo "Fecha <input type='number' name='anio' value='$juego->anio'><br>";
    echo "Precio <input type='number' name='precio' value='$juego->precio'><br>";
    echo "Caratula <input type='file' name='img'><br>";
    echo "<input type='hidden' name='imgold' value='$juego->imagen'><br>";
    echo "Descripcion<textarea name='desc' rows='5' cols='10'>$juego->desc</textarea><br>";
    ?>
    <input type="hidden" name="alq" <?= "value='$juego->alquilado'" ?> >
    <input type="hidden" name="cod" <?= "value='$_POST[cod]'" ?> >
    <input type="submit" name="actualizar" value="Actualizar">
    </form>
    <a href="index.php"><button>Volver</button></a>

    <?php
}

