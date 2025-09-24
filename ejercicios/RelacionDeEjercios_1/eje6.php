<?php


$a = 1;
$b = 1;

$res1= 0;
$res2=0;
$res3=0;

do{
    $res1+=$a;
    $a++;
}while($a <= 100);

echo "Repetir: ".$res1;
echo "<br>";


while($b <= 100){
    $res2+=$b;
    $b++;
}

echo "Mientras: ".$res2;
echo "<br>";

for($i=1;$i<=100;$i++){
    $res3+=$i;
}

echo "Para: ".$res3;
echo "<br>";