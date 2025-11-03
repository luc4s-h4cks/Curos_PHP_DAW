<h2>Lista jugadores</h2>
<br>
<?php
try {
    $conex = new mysqli("localhost", "dwes", "abc123.", "jugadores");
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
    
} catch (Exception $ex) {
    
}
?>
<form action="index.php" method="post">
    <input type="submit" name="menu" value="Menu">
</form>