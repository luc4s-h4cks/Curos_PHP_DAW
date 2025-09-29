<table border='1'>
    <?php
    $datos = array(
        "" => array("Nombre", "Apellidos", "Salario", "Edad"),
        "Marketing" => array("Pepe", "Lopez", "1500", "35"),
        "Contabilidad" => array("Juan", "Sanchez", "1750", "28"),
        "Ventas" => array("Maria", "Carpio", "1675", "33"),
        "Informatica" => array("Pedro", "Luna", "2100", "48"),
        "Direccion" => array("Rosa", "Catala", "5100", "53"),
    );

    echo "<tr>";
    echo "<th></th>";
    foreach ($datos[""] as $indi => $filas) {
        echo"<th>" . $filas . "</th>";
    }
    echo "</tr>";

    foreach ($datos as $depa => $valor) {
        if ($depa == "") {
            
        } else {
            echo "<tr><th>" . $depa . "</th>";
            foreach ($valor as $dato) {
                echo"<td>" . $dato . "</td>";
            }
            echo "</tr>";
        }
    }
    ?>

</table>


