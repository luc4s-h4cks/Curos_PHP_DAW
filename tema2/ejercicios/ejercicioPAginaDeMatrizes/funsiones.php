<?php

function crearMatrizRandom($x, $y) {
    $matriz = array();
    for ($i = 0; $i < $y; $i++) {
        for ($j = 0; $j < $x; $j++) {
            $matriz[$i][$j] = rand(1, 100);
        }
    }
    return $matriz;
}

function mostrarMatriz($matriz) {
    echo "<table border=1>";
    for ($i = 0; $i < count($matriz); $i++) {
        echo"<tr>";
        for ($j = 0; $j < count($matriz[$i]); $j++) {
            echo "<td>" . $matriz[$i][$j] . "</td>";
        }
        echo"</tr>";
    }
    echo "</table>";
}

function sumarFilas($matriz) {
    $filas = array();
    for ($i = 0; $i < count($matriz); $i++) {
        $sum = 0;
        for ($j = 0; $j < count($matriz); $j++) {
            $sum += $matriz[$i][$j];
        }
        $filas[] = $sum;
    }
    return $filas;
}

function sumarColumnas($matriz) {

    $columnas = array();
    for ($i = 0; $i < count($matriz); $i++) {
        $sum = 0;
        for ($j = 0; $j < count($matriz); $j++) {
            $sum += $matriz[$j][$i];
        }
        $columnas[] = $sum;
    }
    return $columnas;
}

function caulcularDiagonal($matriz) {

    $columnas = array();
    for ($i = 0; $i < count($matriz); $i++) {
        $sum = 0;
        for ($j = 0; $j < count($matriz); $j++) {
            $sum += $matriz[$j][$i];
        }
        $columnas[] = $sum;
    }
    return $columnas;
}
