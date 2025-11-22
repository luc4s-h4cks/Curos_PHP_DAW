<?php

require_once '../controlador/Conexion.php';

class productoControler {

    public static function insertar($pro) {
        try {
            $conex = new Conexion();
            $conex->query("insert into productos values ($pro->codigo, '$pro->nombre', $pro->precio)");
            $filas = $conex->affected_rows;
            $conex->close();
            return $filas;
        } catch (Exception $ex) {
            echo "<a href='index.php'>Ir al inicio</a><br>";
            die("Error con la bese de dartos " . $ex->getMessage());
        }
    }

    public static function buscar($cod) {
        try {
            $conex = new Conexion();
            $resul = $conex->query("select * from productos where codigo=" . $cod);
            if ($resul->num_rows) {
                $reg = $resul->fetch_object();
                $p = new Producto($reg->codigo, $reg->nombre, $reg->precio);
            } else {
                $p = false;
            }

            $conex->close();
            return $p;
        } catch (Exception $ex) {
            echo "<a href='index.php'>Ir al inicio</a><br>";
            die("Error con la bese de dartos " . $ex->getMessage());
        }
    }

    public static function mostrarTodos() {
        try {
            $conex = new Conexion();
            $resul = $conex->query("select * from productos");
            if ($resul->num_rows) {
                $p = new Producto();
                while ($fila = $resul->fetch_object()) {
                    $p->nuevoProduto($fila->codigo, $fila->nombre, $fila->precio);
                    $productos[] = clone($p);
                }
            } else {
                $productos = false;
            }
            $conex->close();
            return $productos;
        } catch (Exception $ex) {
            
        }
    }
}
