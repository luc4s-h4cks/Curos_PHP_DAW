<table border='1'>
<?php 

    $matriz = array(
        ""array("", "Nombre", "Apellidos", "Salario", "Edad"),
        array("Marketing", "Pepe", "Lopez", "1500", "35"),
        array("Contabilidad", "Juan", "Sanchez", "1750", "28"),
        array("Ventas", "Maria", "Carpio", "1675", "33"),
        array("Informatica", "Pedro", "Luna", "2100", "48"),
        array("Direccion", "Rosa", "Catala", "5100", "53"),
    );
    
    foreach ($matriz as $ind => $depa){
        echo"<tr>";
        foreach ($depa as $ind2 => $datos){
            echo "<td>".$datos."<td>";
        }
        echo"</tr>";
    }

?>

</table>


