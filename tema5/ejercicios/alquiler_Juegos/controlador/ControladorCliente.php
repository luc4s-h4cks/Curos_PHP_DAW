<?php

include_once 'ConexionJuegos.php';
include_once '../modelo/Cliente.php';

class ControladorCliente {

    public static function verificarUsuario($dni, $pass) {
        try {
            $conex = new ConexionJuegos();
            $resul = $conex->execute_query("select * from cliente where DNI='$dni' and Clave='".md5($pass)."'");
            if($resul->num_rows){
                return true;
            }else{
                return false;
            }
        } catch (Exception $ex) {
            
        }
    }
    
    public static function insertCliente($cliente) {
        try {
            $conex = new ConexionJuegos();
            $stmt = $conex->prepare("insert into cliente values(?,?,?,?,?,?,?)");
            $dni = $cliente->dni;
            $nom = $cliente->nombre;
            $ape = $cliente->apellidos;
            $dir = $cliente->direccion;
            $loc = $cliente->localidad;
            $pass = $cliente->clave;
            $tipo = $cliente->tipo;
            $stmt ->bind_param("sssssss", $dni, $nom, $ape, $dir, $loc, $pass, $tipo);
            $stmt->execute();
            if($stmt->affected_rows){
                return true;
            }else{
                return false;
            }
        } catch (Exception $ex) {
            
        }
    }
    
    public static function getCliente($dni) {
        try {
            $conex = new ConexionJuegos();
            $res = $conex->execute_query("select * from cliente where DNI='".$dni."'");
            $cli = $res->fetch_object();
            
            return $cliente = new Cliente($cli->DNI, $cli->Nombre, $cli->Apellidos, $cli->Direccion, $cli->Localidad, $cli->Clave, $cli->Tipo);
        } catch (Exception $ex) {
            
        }
    }
    
}
