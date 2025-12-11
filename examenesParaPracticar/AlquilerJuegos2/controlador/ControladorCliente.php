<?php

include_once '../controlador/ConexionAlquileres.php';
include_once '../modelo/Cliente.php';

class ControladorCliente {

    public static function login($dni,$pass) {
        try {
            $conex = new ConexionAlquileres();
            $stmt = $conex->prepare("select * from cliente where DNI=? and Clave=?");
            $stmt->bind_param("ss", $dni, $pass);
            $stmt->execute();
            $resul = $stmt->get_result();
            if($resul->num_rows){
                $cl = $resul->fetch_object();
                return new Cliente($cl->DNI, $cl->Nombre, $cl->Apellidos, $cl->Direccion, $cl->Localidad, $cl->Clave, $cl->Tipo);
            }else{
                return null;
            }
        } catch (Exception $ex) {
            
        }
    }
    
    public static function insertCliente($cliente) {
        try {
            $conex = new ConexionAlquileres();
            $stmt = $conex->prepare("insert into cliente (DNI, Nombre, Apellidos, Direccion, Localidad, Clave) values(?,?,?,?,?,?)");
            $dni = $cliente->dni;
            $nom = $cliente->nombre;
            $ape = $cliente->apellidos;
            $dic = $cliente->direccion;
            $loc = $cliente->localidad;
            $pass = $cliente->clave;
            $stmt->bind_param("ssssss", $dni, $nom, $ape, $dic, $loc, $pass);
            $stmt->execute();
            if($stmt->affected_rows){
                return true;
            }else{
                return false;
            }

        } catch (Exception $ex) {
            
        }
    }
    

   
}

