<?php

echo "<table border='1'>";

$num = 1;

for($i = 1; $i <= 5; $i++){
    
    echo "<tr>";

    for($j = 1; $j <= 7; $j++){
        
        echo "<td>".$num."<td>";
        
        $num++;
    }
    
    echo "<tr>";
}

echo "</table>";