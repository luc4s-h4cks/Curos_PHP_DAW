<?php

function getConex(){
    try {
        $conex = new PDO("mysql:host=localhost;dbname=autobuses", "dwes", "abc123.");
        return $conex;
    } catch (PDOException $ex) {
        return $ex->getMessage();;
    }
}

function backToMenu(){
    header("Location: menu.php");
}

function closeConex($conex){
    $conex=null;
}

