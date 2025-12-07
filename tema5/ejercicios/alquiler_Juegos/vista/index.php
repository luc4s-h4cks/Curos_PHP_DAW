<?php
include_once '../modelo/Cliente.php';
include_once '../controlador/ControladorJuego.php';
include_once '../modelo/Juego.php';

session_start();

if (isset($_SESSION['cliente'])) {
    echo "<h4>Hola " . $_SESSION['cliente']->nombre . "</h4>";
}
?>

<a href="login.php"><button>Login</button></a>
<a href="registro.php"><button>Registro</button></a><br>

<?php
if(isset($_SESSION['cliente'])){
    echo "<a href='#'>Todas</a> <a href='#'>Alquilados</a> <a href='#'>No Alquilados</a> <a href='#'>Mis juegos</a>";
}

if(isset($_SESSION['cliente']) && $_SESSION['cliente']->tipo === "admin"){
    echo "<a href='nuevoJuego.php'>Nuevo juego</a><br>";
}

$juegos = ControladorJuego::getAll();

if(count($juegos) > 0){
    foreach ($juegos as $j){
        echo "<form action='mod_borrar.php' method='post'>";
        echo "<h3>". $j->nombre_juego ."</h3>";
        echo "<a href='detalles.php?cod=$j->codigo'><img src='$j->imagen' alt='alt'/></a><br>";
        echo "<input type='hidden' name='cod' value='$j->codigo'>";
        if(isset($_SESSION['cliente']) && $_SESSION['cliente']->tipo === "admin"){
            echo "<input type='submit' name='borrar' value='Borrar'>";
            echo "<input type='submit' name='modificar' value='Modificar'>";
        }
        echo "</form>";
    }
}

?>

