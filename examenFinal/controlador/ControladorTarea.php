<?php

include_once '../modelo/Tarea.php';
include_once '../controlador/ConexionTaller.php';

class ControladorTarea {

    public static function getTareas($tipo) {
        try {
            $conex = new ConexionTaller();
            $resul = $conex->query("select * from tarea where tipo='$tipo'");
            $tareas = array();
            while ($t = $resul->fetchObject()) {
                array_push($tareas, new Tarea($t->id, $t->descripcion, $t->precio, $t->tipo));
            }
            return $tareas;
        } catch (Exception $ex) {
            
        }
    }

    public static function getTarea($id) {
        try {
            $conex = new ConexionTaller();
            $resul = $conex->query("select * from tarea where id='$id'");
            $t = $resul->fetchObject();
            return new Tarea($t->id, $t->descripcion, $t->precio, $t->tipo);
        } catch (Exception $ex) {
            
        }
    }
}
