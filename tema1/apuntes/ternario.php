<?php

//como mostrar con ternario
//Si queremos mostrar un mesaje con el ternario tendremos que poner echo al principio de todo el ternario
$edad = 20;
echo ($edad >= 18)? "Eres mayor de edad" : "Eres menor de edad";

//Podemos meter en una variable el ternario para luego mostrar el mensaje
$mensaje = ($edad >= 18)? "Eres mayor de edad" : "Eres menor de edad";
echo $mensaje;

//Tambien exite la posibilidad de poner print en cada mensaje
($edad >= 18)? print "Eres mayor de edad" : print"Eres menor de edad";


