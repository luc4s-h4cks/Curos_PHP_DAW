<?php

try {
    $bd = 'mysql:host=localhost;dbname=dwes;charset=utf8mb4';
    $opciones = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, PDO::ATTR_CASE => PDO::CASE_LOWER);
    $conex = new PDO($bd, 'dwes', 'abc123.', $opciones);
    $conex->beginTransaction();
    $reg1 = $conex->exec("update stock set unidades=800 where producto='3DSNG'");
    $reg2 = $conex->exec("update stock set unidades=800 where producto='ACERAX3950'");
    if ($reg1 === 0)
        echo "No se a actualizado el producto 1";
    if ($reg2 === 0)
        echo "No se a actualizado el producto 2";
    $conex->commit();
} catch (PDOException $ex) {
    $conex->rollBack();
    echo $ex->getMessage();
}
/*
  echo "<br><br>CONSULTA<br><br>";
  try {
  $resul = $conex->query("select * from producto");
  echo "Numero de registros devuelto: ".$resul->rowCount();
  while($fila=$resul->fetchObject()){

  }
  } catch (Exception $ex) {

  }
 */
echo "<br><br>CONSULTAS PREPARADAS<br><br>";
//Lo que esta comentado son alternativas para hacer consultas preparadas
try {
    $menor = 100;
    $mayor = 200;
    $resul = $conex->prepare("select * from producto where pvp > ? and pvp < ?");
    //$resul = $conex->prepare("select * from producto where pvp > :pvp1 and pvp < :pvp2");
    for ($i = 0; $i < 1000; $i += 100) {
        $resul->bindParam(1, $menor);
        $resul->bindParam(2, $mayor);
       // $resul->bindParam(:pvp1, $menor);
       // $resul->bindParam(:pvp2, $mayor);
        $resul->execute();
        //$resul->execute(array(":pvp1"=>$menor, ":pvp2"=>$mayor));
        $menor += $i;
        $mayor += $i;
        echo "Prodcutos entre " . $menor . " y " . $mayor . "<br>";
        while ($fila = $resul->fetchObject()) {
            echo $fila->nombre_corto . "<br>";
        }
        echo"===============<br>";
    }
} catch (PDOException $ex) {
    
}