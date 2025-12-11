<?php
include_once '../modelo/Juego.php';
include_once '../controlador/ControladorJuegos.php';

if (isset($_POST['update'])) {
    $codigo = ControladorJuegos::crearCodigo($_POST['nombre'], $_POST['consola']);

    var_dump($_POST);

    if (is_uploaded_file($_FILES['img']['tmp_name'])) {
        $fichero = time() . "-" . $_FILES['img']['name'];
        $ruta = "imagenes/" . $fichero;
        move_uploaded_file($_FILES['img']['tmp_name'], $ruta);
    } else {
        $ruta = $_POST['oldImg'];
    }

    $codOld = $_POST['oldCod'];

    $newJuego = new Juego($codigo, $_POST['nombre'], $_POST['consola'], $_POST['anio'], $_POST['precio'], $_POST['alq'], $ruta, $_POST['desc']);

    if (ControladorJuegos::updatetJuego($newJuego, $codOld)) {
        header("Location: index.php?status=ok");
    } else {
        header("Location: index.php?status=err");
    }
}

if (isset($_POST['delete'])) {
    if (ControladorJuegos::deleteJuego($_POST['cod'])) {
        header("Location: index.php?status=ok");
    } else {
        header("Location: index.php?status=err");
    }
}

if (isset($_POST['modificar']) && $_POST['modificar'] != null) {
    $juego = ControladorJuegos::getJuego($_POST['cod']);
    ?>

    <form action="" method="post" enctype="multipart/form-data">
        Nombre: <input type="text" name="nombre" <?= "value='$juego->nombreJ'" ?>><br>
        Consola: <input type="text" name="consola" <?= "value='$juego->nombreC'" ?>><br>
        Año: <input type="text" name="anio" <?= "value='$juego->anio'" ?>><br>
        Precio: <input type="text" name="precio" <?= "value='$juego->precio'" ?>><br>
        Caratula:<br> 
        <img <?= "src='$juego->imagen'" ?> width="100px" height="100px" alt="alt"/><br>
        <input type="file" name="img"><br>
        Descripcion: <br><textarea name="desc" rows="5" cols="20"><?= "$juego->descripcion" ?></textarea><br>
        <input type="hidden" name="oldCod" value="<?= $juego->codigo ?>">
        <input type="hidden" name="alq" value="<?= $juego->alquilado ?>">
        <input type="hidden" name="oldImg" value="<?= $juego->imagen ?>">
        <input type="submit" name="update" value="Actualizar">
    </form>
    <a href="index.php"><button>Volver</button></a>
    <?php
} else if ($_POST['borrar'] != null) {
    $juego = ControladorJuegos::getJuego($_POST['cod']);
    ?>

    <img src="<?= $juego->imagen ?>" alt="alt"/>
    <h3><?= $juego->nombreJ ?></h3>
    <p>Consola: <?= $juego->nombreC ?></p>
    <p>Consola: <?= $juego->anio ?></p>
    <p>Consola: <?= $juego->precio ?></p>
    <p>Consola: <?= $juego->descripcion ?></p>

    <form action="" method="post">
        <input type="hidden" name="cod" value="<?= $juego->codigo ?>">
        <input type="submit" name="delete" value="Borrar">
    </form>
    <a href="index.php"><button>Volver</button></a>
    <?php
}
