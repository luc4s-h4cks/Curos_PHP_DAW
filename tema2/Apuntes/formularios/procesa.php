<?php
if(isset($_POST['enviar'])) {
    echo "datos resibidos<br>";

    echo "Nombre: " . $_POST['nombre'] . "<br>Apellidos: " . $_POST['apellidos'];

    $nom = $_POST['nombre'];
    $ape = $_POST['apellidos'];
    
    echo"<br>Modulos:";
    foreach ($_POST["modulos"] as $indi => $mod){
        echo "<br>".$mod;
    }
    echo "<br>";
    var_dump($_POST);
    
}else{
    echo "No has enviado el fomulario. Envialo:<br>";
    echo "<a href=datos.php>Datos</a>";
}

?>

<a href="datos.php?n=<?= $nom ?>&a=<?= $ape ?>">Ir a datos</a>