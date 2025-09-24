<?php

$i = 0;
$num = 1;

echo "<table border='1'>";

while ($i < 5){
    $j = 0;
    echo "<tr>";
    
    do{
        echo "<td>";
        
        echo $num;
        
        echo "</td>";
        $num++;
        $j++;
    }while ($j < 7);
    
    echo "</tr>";  
    $i++;
}


echo "</table>";


