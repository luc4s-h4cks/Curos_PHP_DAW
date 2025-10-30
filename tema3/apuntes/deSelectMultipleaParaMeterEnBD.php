<form action="" method="post">
    DNI<input type="text" name="dni"><br>
    Nombre<input type="text" name="nombre"><br>
    Apellidos<input type="text" name="apellido"><br>
    Salario<input type="text" name="salario"><br>

    idiomas:<br>
    <input type="checkbox" name="idiomas[]" value="1">Español<br>
    <input type="checkbox" name="idiomas[]" value="2">Ingles<br>
    <input type="checkbox" name="idiomas[]" value="4">Aleman<br>
    <input type="checkbox" name="idiomas[]" value="8">Chino<br>

    <select multiple="" name="estudios[]">
        <option value="ESO">ESO</option>
        <option value="Bachillerato">Bachillerato</option>
        <option value="CFGM">Grado medio</option>
        <option value="CFGS">Grado superior</option>
    </select>
    <br>

    Usuario<input type="text" name="usuario"><br>
    Clave<input type="text" name="clave"><br>
    <input type="submit" name="insertar" value="Insertar">
    <input type="submit" name="recuperar" value="Recuperar">
</form>
<?php
if (isset($_POST['insertar'])) {
    try {
        $conex = new mysqli("localhost", "dwes", "abc123.", "empleados");
        $conex->set_charset("utf8mb4");
        $idio = 0;
        foreach ($_POST['idiomas'] as $value) {
            $idio += $value;
        }

        $estud = implode(",", $_POST['estudios']);

        $conex->query("insert into datos values('$_POST[dni]', '$_POST[nombre]', '$_POST[apellido]', $_POST[salario], $idio, '$estud', '$_POST[usuario]', '$_POST[clave]')");
    } catch (mysqli_sql_exception $ex) {
        echo $ex->getMessage();
    }
}

if (isset($_POST['recuperar'])) {
    try {
        $conex = new mysqli("localhost", "dwes", "abc123.", "empleados");
        $conex->set_charset("utf8mb4");
        $result = $conex->query("select * from datos");
        if($result->num_rows){
            while ($fila = $result->fetch_object()){
                echo "DNI: ".$fila->DNI."<br>";
                echo "Nombre: ".$fila->Nombre."<br>";
                echo "Apellidos: ".$fila->Apellidos."<br>";
                echo "Salario: ".$fila->salario."<br>";
                echo "Idiomas: ".$fila->idiomas."<br>";
                echo "Estudios: ".$fila->estudios."<br>";
                echo"=================<br><br>";
            }
        }else{
            echo "No hay datos";
        }
    } catch (Exception $ex) {
        
    }
}
?>


