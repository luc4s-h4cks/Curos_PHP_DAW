<?php
include 'funciones.php';
$msg="";

if(isset($_POST['menu'])){
    backToMenu();
}

if(isset($_POST['agregar'])){
    try {
        $conex = getConex();
        
        try {
            $resul = $conex->prepare("insert into autos values(?,?,?)");
            $resul->bindParam(1, $_POST['matricula']);
            $resul->bindParam(2, $_POST['marca']);
            $resul->bindParam(3, $_POST['nplazas']);
            $resul->execute();
            if($resul->rowCount()){
                $msg="Autobus insertado correctamente";
            }
            
        } catch (Exception $ex) {
            $msg="Esa matricula ya exites";
        }
        
    } catch (PDOException $ex) {
        
    }
}

?>

<h1>Nuevo autobus</h1>
<form action="" method="post">
    Matricula: <input type="text" name="matricula"><br>
    Marca: <input type="text" name="marca"><br>
    Nº plazas: <input type="number" name="nplazas"><br>
    
    <input type="submit" name="menu" value="Menu">
    <input type="submit" name="agregar" value="Añadir">
    
</form><br>

<?php echo $msg ?>