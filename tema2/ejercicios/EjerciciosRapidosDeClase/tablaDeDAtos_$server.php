<?php
echo "<table border='1'>";
echo "<tr><td>indice</td></tr>";
foreach($_SERVER as $ind => $valor){
    
    echo "<tr><td>".$ind."</td>"."<td>".$valor."</td></tr>";
       
}
echo "<table>";