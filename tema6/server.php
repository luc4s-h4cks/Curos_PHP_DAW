<?php

try {
    $conex = new mysqli("localhost", "dwes", "abc123.", "productos");
    if (isset($_GET['precio'])) {
        $resul = $conex->query("select * from productos where precio > $_GET[precio]");
    } else {
        $resul = $conex->query("select * from productos");
    }
    $i = 0;
    while ($p = $resul->fetch_object()) {
        $datos[$i]['codigo'] = $p->id;
        $datos[$i]['nombre'] = $p->nombre;
        $datos[$i]['desc'] = $p->descripcion;
        $datos[$i]['precio'] = $p->precio;
        $i++;
    }
} catch (Exception $ex) {
    $datos = "Error al consultar los datos";
}

echo json_encode($datos);
