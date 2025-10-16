<?php
include 'funsiones.php';

$col = false;

$fil = false;

$es_Cuadrada = false;

if (isset($_POST['calcular'])) {

    if (!empty($_POST['col']) && is_numeric($_POST['col']) && $_POST['col'] > 0) {
        $col = true;
    }

    if (!empty($_POST['fil']) && is_numeric($_POST['fil']) && $_POST['fil'] > 0) {
        $fil = true;
    }

    if ($_POST['accion'] == "diagonal" && $_POST['col'] == $_POST['fil']) {
        $es_Cuadrada = true;
    } else if ($_POST['accion'] != "diagonal") {
        $es_Cuadrada = true;
    }
}
if (isset($_POST['calcular']) && $col && $fil && $es_Cuadrada) {



    if (isset($_POST['calcular'])) {

        $matriz = crearMatrizRandom($_POST['col'], $_POST['fil']);
        mostrarMatriz($matriz);

        switch ($_POST['accion']) {
            case "filas":

                echo "<h1>Calcular Filas</h1>";

                $filas = sumarFilas($matriz);

                foreach ($filas as $key => $value) {
                    echo "fila " . ($key + 1) . ": " . $value . "<br>";
                }
                break;

            case "columnas":

                echo "<h1>Calcular columnas</h1>";

                $colums = sumarColumnas($matriz);

                foreach ($colums as $key => $value) {
                    echo "Columna " . ($key + 1) . ": " . $value . "<br>";
                }

                break;

            case "filas_columnas":

                echo "<h1>Calcular filas y columnas</h1>";

                $filas = sumarFilas($matriz);
                $colums = sumarColumnas($matriz);

                foreach ($filas as $key => $value) {
                    echo "fila " . ($key + 1) . ": " . $value . "<br>";
                }

                foreach ($colums as $key => $value) {
                    echo "Columna " . ($key + 1) . ": " . $value . "<br>";
                }
                break;

            case "diagonal":

                echo "<h1>Calcular Diagonal principal</h1>";
                
                echo "Total de la diagonal principal: ". caulcularDiagonal($matriz);
                
                break;

            case "traspuesta":

                echo "<h1>Calcular matriz traspuesta</h1>";
                $traspuesta = calcularTraspuesta($matriz);
                mostrarMatriz($traspuesta);
                break;
        }
    }
} else {
    ?>




    <form action="" method="POST">

        <input type="hidden" name="accion" value="<?= $_GET['accion'] ?>">
        Introduce el numero de columnas<input type="number" name="col">
    <?php
    if (isset($_POST['calcular']) && !$col) {
        echo "<span style= color:red> tiene que haber columnas o ser un numero positivo</span>";
    }
    ?>
        <br>
        Introduce el numero de filas<input type="number" name="fil">
        <?php
        if (isset($_POST['calcular']) && !$fil) {
            echo "<span style= color:red> tiene que haber filas o ser un numero positivo</span>";
        }
        ?>
        <br>
        <?php
        if (isset($_POST['calcular']) && $_POST['accion'] == "diagonal" && !$es_Cuadrada) {
            echo "<span style= color:red> Para calcular la diagonal la matriz tiene que ser cuadrada</span>";
        }
        ?>
        <br>
        <input type="submit" name="calcular" value="Calcular">

    </form>

    <?php
}?>