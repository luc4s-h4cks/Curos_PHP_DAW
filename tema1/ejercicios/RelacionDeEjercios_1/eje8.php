<?php

$res= 0;
for($i=1;$i<=100;$i++){
    
    if($i % 2 == 0){
        $res+=$i;
    }
    
}

echo $res;