<?php

$diaSemana = date('N', time());
$diaMes = date('d', time());
$mes = date('n', time());
$anio = date('Y', time());

switch ($diaSemana) {
    case 1:
        $diaSemana="Lunes";
        break;
    case 2:
        $diaSemana="Martes";
        break;
    case 3:
        $diaSemana="Miercoles";
        break;
    case 4:
        $diaSemana="Jueves";
        break;
    case 5:
        $diaSemana="Viernes";
        break;
    case 6:
        $diaSemana="Sabado";
        break;
    case 7:
        $diaSemana="Domingo";
        break;
    default:
        break;
}

switch ($diaSemana) {
    case 1:
        $mes="Enero";
        break;
    case 2:
        $mes="Febrero";
        break;
    case 3:
        $mes="Marzo";
        break;
    case 4:
        $mes="Abril";
        break;
    case 5:
        $mes="Mayo";
        break;
    case 6:
        $mes="Junio";
        break;
    case 7:
        $mes="Julio";
        break;
    case 8:
        $mes="Agosto";
        break;
    case 9:
        $mes="Septiembre";
        break;
    case 10:
        $mes="Octubre";
        break;
    case 11:
        $mes="Noviembre";
        break;
    case 12:
        $mes="Diciembre";
        break;
    default:
        break;
}


echo $diaSemana . ", ". $diaMes . " de " . $mes . " de " . $anio;




