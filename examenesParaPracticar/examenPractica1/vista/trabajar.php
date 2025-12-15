<?php

include_once '../modelo/EmpleadoTaller.php';
include_once '../controlador/ControladorCoches.php';
include_once '../modelo/Coche.php';
include_once '../modelo/ClienteTaller.php';
include_once '../controlador/controladorCliente.php';
include_once '../controlador/ControladorTarea.php';
include_once '../modelo/Tarea.php';
include_once '../controlador/ControladorEmpleado.php';
include_once '../modelo/EmpleadoTaller.php';
session_start();

if (!isset($_SESSION['empleado'])) {
    header("Location: login.php");
}
$emp = $_SESSION['empleado'];
echo "Hola $emp->nombre <br>";
echo"$emp->rol <br>";
