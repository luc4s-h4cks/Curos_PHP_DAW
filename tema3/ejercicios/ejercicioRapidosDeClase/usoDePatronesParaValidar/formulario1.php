<?php
$nombre = false;
$dni = false;
$fecha = false;
$email = false;
$edad = false;
$msg="";

if (isset($_POST['aceptar'])) {

    if (preg_match('/[a-z]{1,30}/i', $_POST['nombre'])) {
        $nombre = true;
    }

    if (preg_match('/^\d{8}[A-Z]$/', $_POST['dni'])) {
        $dni = true;
    }

    if (preg_match('/^\d\d-\d\d-\d\d\d\d/', $_POST['fecha'])) {
        $dia = (int) ($_POST['fecha'][0] + $_POST['fecha'][1]);
        $mes = (int) ($_POST['fecha'][3] + $_POST['fecha'][4]);
        $anio = (int) ($_POST['fecha'][6] + $_POST['fecha'][7] + $_POST['fecha'][8] + $_POST['fecha'][9]);
        if (checkdate($mes, $dia, $anio)) {
            $fecha = true;
        }
    }

    if (preg_match('/^[\w.]+@?[a-z\d]+\.(com|es|org)$/i', $_POST['email'])) {
        $email = true;
    }

    if (preg_match('/\d/', $_POST['edad']) && $_POST['edad'] > 18) {
        $edad = true;
    }

    if ($nombre && $dni && $fecha && $email && $edad) {
        $msg = "Autenticado";
    }
}
?>

<form action="" method="post">
    Nombre <input type="text" name="nombre" <?php if (isset($_POST['aceptar']) && $nombre) echo"value='$_POST[nombre]'" ?>> 
    <?php if (isset($_POST['aceptar']) && !$nombre) echo"<span style='color: red;'>EL nombre esta mal debe de conteneer letras o digitos y maximo 30</span>" ?> <br>

    DNI <input type="text" name="dni" <?php if (isset($_POST['aceptar']) && $dni) echo"value='$_POST[dni]'" ?>> 
    <?php if (isset($_POST['aceptar']) && !$dni) echo"<span style='color: red;'>El DNI esta mal debe de tener 8 digitos y una letra mayuscula al final</span>" ?> <br> 

    Fecha de nacimiento <input type="text" name="fecha" <?php if (isset($_POST['aceptar']) && $fecha) echo"value='$_POST[fecha]'" ?>> 
    <?php if (isset($_POST['aceptar']) && !$fecha) echo"<span style='color: red;'>La fecha esta mas tiene el formato incorrecto o no existe</span>" ?> <br>

    Email <input type="text" name="email" <?php if (isset($_POST['aceptar']) && $email) echo"value='$_POST[email]'" ?>> 
    <?php if (isset($_POST['aceptar']) && !$email) echo"<span style='color: red;'>El email esta mal debe tener el @</span>" ?> <br>

    Edad <input type="text" name="edad" <?php if (isset($_POST['aceptar']) && $edad) echo"value='$_POST[edad]'" ?>> 
    <?php if (isset($_POST['aceptar']) && !$edad) echo"<span style='color: red;'>La edad esta mal solo se pueden poner digitos y ser mayor de edad</span>" ?> <br>
    <input type="submit" name="aceptar" value="Aceptar"> 

</form>
<?php
echo $msg;
?>

