

<form action="" method="post">
    DNI <input type="text" name="dni"> <br>
    Nombre <input type="text" name="nombre"> <br>
    Apellido <input type="text" name="apellido"> <br>
    Salario <input type="number" name="salario"> <br>

    Idiomas:<br>
    <input type="checkbox" name="idiomas[]" value="ingles"> Ingles <br>
    <input type="checkbox" name="idiomas[]" value="frances"> Frances <br>
    <input type="checkbox" name="idiomas[]" value="aleman"> Aleman <br>
    <input type="checkbox" name="idiomas[]" value="chino"> Chino <br>
    <input type="checkbox" name="idiomas[]" value="protugues"> Portugues <br>

    <input type="submit" name="agregar" value="añadir">
    <input type="submit" name="buscar" value="Buscar">
</form>

<?php
if (isset($_POST['agregar'])) {
    try {
        $conex = new mysqli("localhost", "dwes", "abc123.", "empleados");
        $conex->autocommit(false);
        $stmt = $conex->prepare("Insert into datos (DNI, Nombre, Apellidos, Salario) values(?,?,?,?)");
        $stmt->execute([$_POST['dni'], $_POST['nombre'], $_POST['apellido'], $_POST['salario']]);
        $stmt->close();

        $stmt = $conex->prepare("insert into idiomas (DNI, idioma) values(?,?)");
        foreach ($_POST['idiomas'] as $key => $value) {
            //$idioma = $value;
            //$stmt->bind_param("ss", $_POST['dni'],$idioma);
            $stmt->execute([$_POST['dni'], $value]);
        }
        $conex->commit();
        echo '<h3>Empleado introducido<h3>';
    } catch (Exception $ex) {
        
    }
}

if (isset($_POST['buscar'])) {
    try {
        $conex = new mysqli("localhost", "dwes", "abc123.", "empleados");
        $stmt = $conex->prepare("select Nombre, Apellidos from datos join idiomas where idiomas.DNI = datos.DNI and idioma = ?");
        foreach ($_POST['idiomas'] as $key => $valor) {
            $stmt->bind_param("s", $valor);
            $stmt->execute();
            $result = $stmt->get_result();
            echo"Idioma: " . $valor . "<br>";
            while ($fila = $result->fetch_object()) {
                echo $fila->Nombre . " " . $fila->Apellidos . "<br>";
            }
            echo "<br><br>";
        }
    } catch (Exception $ex) {
        
    }
}
?>