<?php
include_once '../controlador/ControladorJuego.php';
include_once '../modelo/Juego.php';

if (isset($_POST['insert'])) {
    
    if(is_uploaded_file($_FILES['img']['tmp_name'])){
        $ficehro = time()."-".$_FILES['img']['name'];
        $ruta = "imagenes/".$ficehro;
        move_uploaded_file($_FILES['img']['tmp_name'], $ruta);
    }
    
    $cod = ControladorJuego::crearCodigo($_POST['nombre'], $_POST['consola']);
    $juego = new Juego($cod, $_POST['nombre'], $_POST['consola'], $_POST['anio'], $_POST['precio'], "NO", $ruta, $_POST['desc']);
    
    if(ControladorJuego::insertJuego($juego)){
        echo "juego añadido correctamente";
    }else{
        echo "Algo salio mal";
    }
    
    
}
?>

<form action="" method="post" enctype="multipart/form-data">
    Nombre <input type="text" name="nombre"><br>
    Consola <input type="text" name="consola"><br>
    Año <input type="text" name="anio"><br>
    Precio <input type="number" name="precio"><br> 
    Descripcion <textarea name="desc" rows="5" cols="10"></textarea><br>
    Caratula <input type="file" name="img"><br>
    <input type="submit" name="insert" value="Añadir">
</form>
<a href="index.php"><button>Inicio</button></a><br>

