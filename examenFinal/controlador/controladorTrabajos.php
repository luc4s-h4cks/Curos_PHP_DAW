<?php

include_once '../controlador/ConexionTaller.php';
include_once '../modelo/Trabajo.php';

class ControladorTrabajos {

    public static function getTrabajoMecanico($cod) {
        try {
            $conex = new ConexionTaller();
            $resul = $conex->query("select * from trabajo where cod_mecanico='$cod'");
            $tareas = array();
            while ($t = $resul->fetchObject()) {
                array_push($tareas, new Trabajo($t->matricula, $t->cod_mecanico, $t->id_tarea, $t->estado, $t->horas, $t->fecha));
            }
            return $tareas;
        } catch (Exception $ex) {
            
        }
    }

    public static function updateTrabajo($trabajo) {
        try {
            $conex = new ConexionTaller();
            $stmt = $conex->prepare("update trabajo set horas=?, estado=? where matricula=? and cod_mecanico=? and id_tarea=? and fecha=?");
            $matricula = $trabajo->matricula;
            $mecanico = $trabajo->mecanico;
            $tarea = $trabajo->tarea;
            $fecha = $trabajo->fecha;
            $estado = $trabajo->estado;
            $horas = $trabajo->horas;
            $stmt->bindParam(1, $horas);
            $stmt->bindParam(2, $estado);
            $stmt->bindParam(3, $matricula);
            $stmt->bindParam(4, $mecanico);
            $stmt->bindParam(5, $tarea);
            $stmt->bindParam(6, $fecha);
            $stmt->execute();
            if ($stmt->rowCount()) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }
}
