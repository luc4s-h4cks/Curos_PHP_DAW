<?php
$nombre = false;
$dni = false;
$fecha = false;
$email = false;
$edad = false;

if (isset($_POST['aceptar'])) {

    if (preg_match('/[a-z]{1,30}/i', $_POST['nombre'])) {
        $nombre = true;
    }

    if (preg_match('/^\d{8}[A-Z]$/', $_POST['dni'])) {
        $dni = true;
    }

    if (preg_match('/^\d\d-\d\d-\d\d\d\d/', $_POST['fecha'])) {
        $dia= (int)($_POST['fecha'][0] + $_POST['fecha'][1]);
        $mes= (int)($_POST['fecha'][3] + $_POST['fecha'][4]);
        $anio= (int)($_POST['fecha'][6] + $_POST['fecha'][7] + $_POST['fecha'][8] + $_POST['fecha'][9]);
        if(checkdate($mes, $dia, $anio)){
            $fecha=true;
        }
    }

    if (preg_match('/^[\w.]+@?[a-z\d]+\.(com|es|org)$/i', $_POST['email'])) {
        $email = true;
    }

    if (preg_match('/\d/', $_POST['edad']) && $_POST['edad']>18) {
        $edad = true;
    }
}
?>

<form action="" method="post">
    Nombre <input type="text" name="nombre">
    DNI <input type="text" name="dni">
    Fecha de nacimiento<input type="text" name="fecha">
    Email <input type="text" name="email">
    Edad <input type="text" name="edad">
    <input type="submit" name="aceptar" value="Aceptar">

</form>

<?php 
echo "nombre: ".$nombre."<br>";
echo "dni: ".$dni."<br>";
echo "fecha: ".$fecha."<br>";
echo "email: ".$email."<br>";
echo "edad: ".$edad."<br>";

?>
