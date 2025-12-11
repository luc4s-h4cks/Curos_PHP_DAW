<?php
include_once '../modelo/Juego.php';
include_once '../controlador/ControladorJuegos.php';

if (isset($_SESSION['usuario'])) {
    $usu = $_SESSION['usuario'];
    Echo "<h4>Hola $usu->nombre</h4>";
}

if(isset($_POST['crear'])){
    $codigo = ControladorJuegos::crearCodigo($_POST['nombre'], $_POST['consola']);
    
    if(is_uploaded_file($_FILES['img']['tmp_name'])){
        $fichero = time()."-".$_FILES['img']['name'];
        $ruta = "imagenes/".$fichero;
        move_uploaded_file($_FILES['img']['tmp_name'], $ruta);
    }
    $newJuego = new Juego($codigo, $_POST['nombre'], $_POST['consola'], $_POST['anio'], $_POST['precio'], 'NO', $ruta, $_POST['desc']);
    var_dump($newJuego);
    if(ControladorJuegos::insertJuego($newJuego)){
        header("Location: index.php");
    }else{
        Echo "Algo paso al intentar añadir el juego";
    }
}

?>


<form action="" method="post" enctype="multipart/form-data">
    Nombre: <input type="text" name="nombre"><br>
    Consola: <input type="text" name="consola"><br>
    Año: <input type="text" name="anio"><br>
    Precio: <input type="text" name="precio"><br>
    Caratula: <input type="file" name="img"><br>
    Descripcion: <input type="text" name="desc"><br>
    <input type="submit" name="crear" value="Añadir">
</form>
<a href="index.php"><button>Incio</button></a>
