<?php

require './Conexion.php';

class Producto {

    public $codigo;
    public $nombre;
    public $precio;

    public function __construct($cod = 0, $nom = "", $precio = 0) {
        $this->codigo = $cod;
        $this->nombre = $nom;
        $this->precio = $precio;
    }

    public function nuevoProduto($cod, $nom, $precio) {
        $this->codigo = $cod;
        $this->nombre = $nom;
        $this->precio = $precio;
    }
    
    public function __toString(): string {
        return "<br>Producto[codigo=" . $this->codigo
                . ", nombre=" . $this->nombre
                . ", precio=" . $this->precio
                . "]";
    }
    
    public function insertar() {
        try {
            $conex = new Conexion();
            $conex->query("insert into productos values ($this->codigo, '$this->nombre', $this->precio)");
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
    
    public  static function mostrarTodos() {
        try {
            $conex = new Conexion();
            $resul = $conex->query("select * from productos");
            if($resul->num_rows){
                $p = new self();
                while ($fila = $resul->fetch_object()){
                    $p->nuevoProduto($fila->codigo, $fila->nombre, $fila->precio);
                    $productos[]= clone($p);
                }
            }else{
                $productos=false;
            }
            $conex->close();
            return $productos;
            
        } catch (Exception $ex) {
            
        }
    }
    
}
