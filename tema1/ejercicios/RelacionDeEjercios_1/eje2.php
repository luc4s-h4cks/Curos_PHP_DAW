<?php

$num = rand(1, 100);

echo "<table border='1'>";

for($j = 0; $j < 10; $j++){
    echo "<tr>";
    for($i = 0; $i < 10; $i++){
        if($num % 2 != 0){
            echo "<td>".$num."</td>";
            $num++;
        }else{
          $num++;
          $i--;
        }
    
    }
    echo "</tr>";
}



echo "</table>";
