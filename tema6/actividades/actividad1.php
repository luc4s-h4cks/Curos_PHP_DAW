<?php
if (isset($_POST['buscar'])) {
    $datos = file_get_contents("https://api.openweathermap.org/data/2.5/weather?q=$_POST[ciudad]&lang=sp&units=metric&appid=25079712842d1a0670419810c1c8d228");
    $tiempo = json_decode($datos);
    echo "Ciudad: ".$tiempo->name."<br>";
    echo "Temperatura: ".$tiempo->main->temp."<br>";
    echo "Temperatura Maxima: ".$tiempo->main->temp_max."<br>";
    echo "Temperatura Minima: ".$tiempo->main->temp_min."<br>";
    echo "Velocidad del viento: ".$tiempo->wind->speed."<br>";
    echo "Nubes: ".$tiempo->clouds->all."%<br>";
    
}
?>

<form action="" method="post">
    Introduce la ciudad: <input type="text" name="ciudad"> <input type="submit" name="buscar" value="Buscar">
</form>
