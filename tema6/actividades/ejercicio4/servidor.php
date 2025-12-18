<?php

if (isset($_GET['des'])) {
    if ($_GET['des'] == "libras") {
        if ($_GET['org'] == "euros") {
            $resultado = $_GET['cantidad'] * 0.88;
        } else if ($_GET['org'] == "dolares") {
            $resultado = $_GET['cantidad'] * 0.75;
        } else if ($_GET['org'] == "libras") {
            $resultado = $_GET['cantidad'];
        }
    }

    if ($_GET['des'] == "euros") {
        if ($_GET['org'] == "euros") {
            $resultado = $_GET['cantidad'];
        } else if ($_GET['org'] == "dolares") {
            $resultado = $_GET['cantidad'] * 0.85;
        } else if ($_GET['org'] == "libras") {
            $resultado = $_GET['cantidad'] * 1.14;
        }
    }

    if ($_GET['des'] == "dolares") {
        if ($_GET['org'] == "euros") {
            $resultado = $_GET['cantidad'] * 1.09;
        } else if ($_GET['org'] == "dolares") {
            $resultado = $_GET['cantidad'];
        } else if ($_GET['org'] == "libras") {
            $resultado = $_GET['cantidad'] * 1.27;
        }
    }
} else {
    if ($_GET['org'] == "euros") {
        $resultado['dolares'] = $_GET['cantidad'] * 1.09;
        $resultado['libras'] = $_GET['cantidad'] * 0.88;
    } else if ($_GET['org'] == "libras") {
        $resultado['dolares'] = $_GET['cantidad'] * 1.27;
        $resultado['euros'] = $_GET['cantidad'] * 1.14;
    } else if ($_GET['org'] == "dolares") {
        $resultado['libras'] = $_GET['cantidad'] * 0.75;
        $resultado['euros'] = $_GET['cantidad'] * 0.85;
    }
}

echo json_encode($resultado);
