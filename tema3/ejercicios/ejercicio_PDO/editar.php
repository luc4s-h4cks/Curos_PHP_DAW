<?php 

if(isset($_POST['cancelar'])){
    header("Location: formulario.php");
    exit;
}

if(isset($_POST['actualizar'])){
    try {
        $conex = new PDO("mysql:host=localhost;dbname=dwes;charset=utf8mb4", 'dwes', 'abc123.');
        $resul = $conex->prepare("update producto set nombre_corto=?, descripcion=?, PVP=? where cod = ?");
        $resul->bindParam(1, $_POST['nombre']);
        $resul->bindParam(2, $_POST['desc']);
        $resul->bindParam(3, $_POST['precio']);
        $resul->bindParam(4, $_POST['cod']);
        $resul->execute();
        if($resul->rowCount()){
            header("Location: formulario.php?estado=ok");
        }else{
            echo "error con la actualizacion";
        }
        
    } catch (Exception $ex) {
        
    }
}

?>
<head>
    <link rel="stylesheet" href="dwes.css">

</head>
<div id="encabezado">
<h1>Editar un prudocto</h1>
</div>

<h2>Producto:</h2>
<form action="" method="post">
    
    
    
    Nombre corto: <input type="text" name="nombre" <?php echo "value='$_POST[nombre]'" ?> ><br>
    
    Descripcion:<br>
    <textarea name="desc" rows="5" cols="100" ><?php echo $_POST['desc'] ?></textarea><br>
    
    PVP: <input type="number" name="precio" <?php echo "value='$_POST[precio]'" ?>><br>
    
    <input type="hidden" name="cod" <?php echo "value='$_POST[cod]'" ?>>
    
    <input type="submit" name="actualizar" value="Actualizar">
    <input type="submit" name="cancelar" value="Cancelar">
    
    
</form>


