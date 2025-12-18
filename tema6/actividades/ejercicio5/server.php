<?php

$palos = ["bastos", "oros", "espadas", "copas"];
$baraja = [];

for ($i = 0; $i < 40; $i++) {
    if ($i < 10) {
        array_push($baraja, [$palos[0], $i + 1]);
    } else if ($i < 20) {
        array_push($baraja, [$palos[1], ($i + 1) - 10]);
    } else if ($i < 30) {
        array_push($baraja, [$palos[2], ($i + 1) - 20]);
    } else if ($i < 40) {
        array_push($baraja, [$palos[3], ($i + 1) - 30]);
    }
}


if ($_GET['cantidad'] > 0 && $_GET['cantidad'] <= 40) {
    $res = [];

    for ($i = 0; $i < $_GET['cantidad']; $i++) {

        $indice = random_int(0, count($baraja) - 1);

        $res[] = $baraja[$indice];

        unset($baraja[$indice]);

        $baraja = array_values($baraja);
    }

    echo json_encode($res);
} else {
    echo json_encode("Error cantidad no valida");
}
