<?php
include 'funciones.php';

if(isset($_POST['reservar'])){
    
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
                echo "<input type='hidden' name='' value=''>";
                
                echo 'Origen: '.$viaje->Origen.'<br>';
                echo "<input type='hidden' name='' value=''>";
                
                echo 'Destino: '.$viaje->Destino.'<br>';
                echo "<input type='hidden' name='' value=''>";
                
                echo 'Nº plazas: '.$viaje->Plazas_libres.'<br>';
                echo "<input type='hidden' name='' value=''>";
                
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
?>