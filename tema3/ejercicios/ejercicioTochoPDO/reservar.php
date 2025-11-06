<?php
include 'funciones.php';
$msg="";

if(isset($_POST['reservar'])){
    $hayPlazas=false;
    try {
        $conex = new PDO("mysql:host=localhost;dbname=autobuses", "dwes", "abc123.");
    } catch (Exception $ex) {
        
    }
    
    try {
        $conex = getConex();
        $resul = $conex->prepare("update viajes set Plazas_libres = Plazas_libres-? where Fecha=? and Matricula=? and Origen = ? and Destino = ? and Plazas_libres >= ?");
        $resul->bindparam(1, $_POST['plazasR']);
        $resul->bindparam(2, $_POST['fecha']);
        $resul->bindparam(3, $_POST['matricula']);
        $resul->bindparam(4, $_POST['org']);
        $resul->bindparam(5, $_POST['des']);
        $resul->bindparam(6, $_POST['plazasR']);
        $resul->execute();
        if($resul->rowCount()){
            $msg = "Reseva realizada correctamente";
        }else{
            $msg = "Numero de plazas superior a las disponibles";
        }
        
    } catch (PDOException $ex) {
        echo $ex->getMessage();
    }
}

?>

<h1>Reservar</h1>
<form action="" method="post">
    Fecha: <input type="date" name="fecha"><br>
    Origen: <input type="text" name="org"><br>
    Destino: <input type="text" name="des"><br>

    <input type="submit" name="menu" value="Menu">
    <input type="submit" name="consultar" value="Consultar">

</form>

<?php

if (isset($_POST['consultar'])) {
    if ($_POST['org'] != $_POST['des']) {
        
        try {
            $conex = getConex();
            $resul = $conex->prepare("select * from viajes where Fecha=? and Origen=? and Destino=?");
            $resul->bindParam(1, $_POST['fecha']);
            $resul->bindParam(2, $_POST['org']);
            $resul->bindParam(3, $_POST['des']);
            $resul->execute();
            if($resul->rowCount()){
                $viaje = $resul->fetchObject();
                echo "<form action='' method='post'>";
                echo 'Fecha: '.$viaje->Fecha.'<br>';
                echo "<input type='hidden' name='fecha' value='$_POST[fecha]'>";
                
                echo 'Origen: '.$viaje->Origen.'<br>';
                echo "<input type='hidden' name='org' value='$_POST[org]'>";
                
                echo 'Destino: '.$viaje->Destino.'<br>';
                echo "<input type='hidden' name='des' value='$_POST[des]'>";
                
                echo 'Nº plazas: '.$viaje->Plazas_libres.'<br>';
                echo "<input type='hidden' name='matricula' value='$viaje->Matricula'>";
                
                echo "Nº plazas a reservar: <input type='number' name='plazasR'>";
                echo "<input type='submit' name='reservar' value='Reservar'>";
                echo "</form>";
            }else{
                Echo "No hay viajes desde $_POST[org] a $_POST[des] el dia $_POST[fecha]";
            }
            closeConex($conex);
        } catch (PDOException $ex) {
            echo $ex->getMessage();
        }
        
    } else {
        Echo "Los Destinos deben de ser diferentes";
    }
}

echo $msg;
?>