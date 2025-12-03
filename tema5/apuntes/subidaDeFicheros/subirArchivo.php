<?php
if(isset($_POST['enviar'])){
    /*
    echo "Nombre original: ".$_FILES['foto']['name']."<br>";
    echo "Nombre temporal: ".$_FILES['foto']['tmp_name']."<br>";
    echo "Tamaño: ".$_FILES['foto']['size']."<br>";
    echo "Tipo: ".$_FILES['foto']['type']."<br>";
    echo "Error: ".$_FILES['foto']['error']."<br>";
      */
    if(is_uploaded_file($_FILES['foto']['tmp_name'])){
        $fichero = time()."-".$_FILES['foto']['name'];
        $ruta = "fotos/".$fichero;
        move_uploaded_file($_FILES['foto']['tmp_name'], $ruta);
        
        try {
            $conex = new mysqli("localhost", "dwes", "abc123.", "ficheros");
            $conex->query("insert into fotos (nombre, ruta) values('$_POST[nombre]', '$ruta')");
            $conex->close();
        } catch (Exception $ex) {
            unlink($ruta);
            echo $ex->getMessage();
        }
        
    }else{
        echo "ERROR";
        if($_FILES['foto']['error'] == 1){
            echo "El fichero supera elñ limite permitido";
        }
    }
    
   
    
}


if(isset($_POST['mostrar'])){
    try {
        $conex = new mysqli("localhost", "dwes", "abc123.", "ficheros");
        $resul = $conex->query("select * from fotos");
        
        if($resul->num_rows){
            
            while ($dato = $resul->fetch_object()){
                echo "<img src='$dato->ruta' width=50 height=50>";
                echo "<br>Nombre: ".$dato->nombre;
                echo "<br>============<br>";
                
            }
            
        }else{
            echo "no hay datos";
        }
        
    } catch (Exception $ex) {
        
    }
}

//lo de enctype es muy importante si lo que quieres es subir ficheros tiene que estar si o si
?>

<form action="" method="post" enctype="multipart/form-data">
     
    Nombre <input type="text" name="nombre"><br>
    Imagen <input type="file" name="foto"><br>
    <input type="submit" name="enviar" value="Enviar">
    <input type="submit" name="mostrar" value="Mostrar">
</form>
