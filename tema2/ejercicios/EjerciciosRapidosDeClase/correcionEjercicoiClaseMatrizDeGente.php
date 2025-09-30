<table border='1'>
    <?php

        $matriz = array(
            "Ventas" => array(
                "Nombre" => "Maria", 
                "Apellido" => "Carpio", 
                "Salario" => 1675, 
                "Edad" => 33),
            
            "Marketing" => array(
                "Nombre" => "Pepe", 
                "Apellido" => "Lopez", 
                "Salario" => 1500, 
                "Edad" => 35),
            
            "Direccion" => array(
                "Nombre" => "Rosa", 
                "Apellido" => "Catala", 
                "Salario" => 5100, 
                "Edad" => 51),
            
            "Contabilidad" => array(
                "Nombre" => "Juan", 
                "Apellido" => "Sanchez", 
                "Salario" => 1750, 
                "Edad" => 28),
            
            "Informatica" => array(
                "Nombre" => "Pedro", 
                "Apellido" => "Luna", 
                "Salario" => 2100, 
                "Edad" => 48)
        );
        
        echo"<tr><td></td>";
        
        foreach ($matriz["Ventas"] as $indi => $datos){
            echo "<th>".$indi."</th>";
        }
        echo "</tr>";
        
        foreach ($matriz as $indi2 => $arra){
            echo "<tr><th>".$indi2."</th>";
            foreach ($arra as $titu => $valor){
                echo "<td>".$valor."</td>";
            }
            echo "</tr>";
        }
    
    ?>

</table>
