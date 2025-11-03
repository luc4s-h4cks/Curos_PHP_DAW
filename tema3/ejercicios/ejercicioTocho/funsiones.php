<?php

function validarNombre($nombre) {
    if (preg_match('/[a-z]+/i', $nombre)) {
        return true;
    } else {
        return false;
    }
}

function validarDni($dni) {
    if (preg_match('/\d{8}[a-z]$/i', $dni)) {
        return true;
    } else {
        return false;
    }
}

function validarEquipo($equipo) {
    if (preg_match('/\w+/', $equipo)) {
        return true;
    } else {
        return false;
    }
}

function validarGoles($goles) {
    if (preg_match('/\d+/i', $goles)) {
        return true;
    } else {
        return false;
    }
}

function validarPosicion($pos) {
    if (!empty($pos)) {
        return true;
    } else {
        return false;
    }
}

function getConex() {
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $conex = new mysqli("localhost", "dwes", "abc123.", "jugadores");
    return $conex;
}
