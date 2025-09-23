<?php

echo time();
echo "<br>";
echo mktime(0, 0, 0, 9, 26, 2025);
echo "<br>";
echo date_default_timezone_get();
echo "<br>";
date_default_timezone_set("Europe/Madrid");
echo "<br>";
echo date_default_timezone_get();
echo "<br>";
echo date('H:i:s - l \d\e\l d/m/Y');
echo "<br>";
echo date('H:i:s - l \d\e\l d/m/Y', mktime(0, 0, 0, 9, 26, 2025));
echo "<br>";
if (checkdate(9, 22, 2025)){
    echo "Fecha correcta";
}else{
    echo "Fecha incorrecta";
}
echo "<br>";

echo $_SERVER['PHP_SELF'];
