<h1>Traspaso de stock</h1>

<form action="" method="POST">

    Teinda de origen
    <br>
    <select name="tiendaOg">
        <option value="1">Central</option>
        <option value="2">Sucursal1</option>
        <option value="3">Sucrusal2</option>
    </select>
    <br><br>

    Tienda de destino
    <br>
    <select name="tiendaDes">
        <option value="1">Central</option>
        <option value="2">Sucursal1</option>
        <option value="3">Sucrusal2</option>
    </select><br>
    Codigo de procduto 
    <br>
    <input type="text" name="codigoPro"><br> 
    Unidades 
    <br>
    <input type="number" name="unidades"><br> 

    <input type="submit" name="traspasar" value="Traspasar"><br>

</form>

<?php
if (isset($_POST['traspasar'])) {

    mysqli_report(MYSQLI_REPORT_ERROR);

    try {
        $conex = new mysqli("localhost", "dwes", "abc123.", "dwes");

        $tiendaDes = (int) $_POST['tiendaDes'];
        $tiendaOg = (int) $_POST['tiendaOg'];
        $producto = $_POST['codigoPro'];
        $unidades = (int) $_POST['unidades'];

        $conex->autocommit(false);
        $conex->query("Update stock set unidades = unidades + $unidades where tienda = $tiendaDes and producto= '$producto'");
        $filasDestino = $conex->affected_rows;

        $conex->query("Update stock set unidades = unidades - $unidades where tienda = $tiendaOg and producto= '$producto' and unidades >= $unidades");
        $filasOrigen = $conex->affected_rows;

        if ($filasDestino === 0 && $filasOrigen === 0) {
            $conex->rollback();
            echo "El producto no existe";
            
        } else if ($filasDestino > 0 && $filasOrigen === 0) {
            $conex ->rollback();
            echo "No hay suficiente stock";
            
        } else {
            $conex->commit();
            echo "Traspaso completado";
        }
    } catch (mysqli_sql_exception $ex) {
        echo "Erro con la conexion del servidor";
    }
}
?>