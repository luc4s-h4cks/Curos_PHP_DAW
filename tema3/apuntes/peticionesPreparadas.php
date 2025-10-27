<?php

try {
    $conex = new mysqli("localhost", "dwes", "abc123.", "dwes");
    //$stmt=$conex->stmt_init();
    //$stmt->prepare($query);

    $stmt = $conex->prepare("insert into tienda (nombre, tlf) values(?,?)");

    /*$tiendas=array('sucursal4'=>'444444444','sucursal5'=>'555555555','sucursal6'=>'666666666');
        
    foreach ($tiendas as $key=>$valor){
        $nombre=$key;
        $tlf=$valor;
        $stmt->bind_param("ss", $nombre, $tlf);
        $stmt->execute();
        echo "tienda incertada";
    }
     
    
    $nombre="Sucursal10";
    $tlf="101010101";
    $stmt->execute([$nombre, $text]);
     */
     
    $stmt->close();
    
    $stmt=$conex->prepare("select * from tienda where cod>?");
    $cod=3;
    $nombre="";
    $tlf="";
    $stmt->bind_param("i", $cod);
    $stmt->execute();
    $stmt->bind_result($cod,$nombre,$tlf);
    $stmt->store_result();
    if($stmt->num_rows){
        while($stmt->fetch()){
            echo "Codigo: ".$cod."<br>";
            echo "Nommbre: ".$nombre."<br>";
            echo "Telefono: ".$tlf."<br>";
            echo "=================<br>";
        }
    }
    
    //Otra forma de de coger los datos
    $stmt->close();
    $stmt=$conex->prepare("select * from tienda where cod>?");
    $cod=3;
    $stmt->bind_param("i", $cod);
    
    $stmt->execute();
    $resul = $stmt->get_result();
    while ($fila = $resul->fetch_object()){
            echo "Codigo: ".$fila->cod."<br>";
            echo "Nommbre: ".$fila->nombre."<br>";
            echo "Telefono: ".$fila->tlf."<br>";
            echo "=================<br>";
    }
    
    
} catch (Exception $ex) {
    die($ex->getMessage());
}
