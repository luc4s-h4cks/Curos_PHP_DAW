<h2>Lista jugadores</h2>
<br>
<?php
include 'funsiones.php';
try {
    $conex = getConex();
    $resul = $conex ->query("select * from jugador");
    if($resul->num_rows){
        while ($jugador = $resul->fetch_object()){
            echo "Nombre: ". $jugador->Nombre."<br>";
            echo "DNI: ". $jugador->DNI."<br>";
            echo "Dorsal: ". $jugador->Dorsal."<br>";
            echo "Posicion: ". $jugador->Posicion."<br>";
            echo "Equipo: ". $jugador->Equipo."<br>";
            echo "==========================<br>";
        }
    }else{
        echo "No hay jugadores en la base de datos";
    }
    
} catch (mysqli_sql_exception $ex) {
    echo "Error con la cnoexion del servidor";
}
?>
<form action="index.php" method="post">
    <input type="submit" name="menu" value="Menu">
</form>