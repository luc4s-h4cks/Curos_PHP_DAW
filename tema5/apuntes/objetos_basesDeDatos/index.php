<?php
require_once './Producto.php';
    if(isset($_POST['insertar'])){
        $p = new Producto($_POST['cod'], $_POST['nom'], $_POST['pre']);
        if($p->insertar()){
            echo "Producto insertado correctamente";
        }else{
            echo "El producto no se a podido insertar";
        }
    }
    
    if(isset($_POST['buscar'])){
        $p = Producto::buscar($_POST['cod']);
        if($p){
            echo $p;
        }else{
            echo "No se a encontrado el producto";
        }
    }

    if(isset($_POST['mostrar'])){
        $ps = Producto::mostrarTodos();
        if($ps){
            foreach ($ps as $pro){
                echo "Codigo: ".$pro->codigo."<br>";
                echo "Nombre: ".$pro->nombre."<br>";
                echo "Precio: ".$pro->precio."<br>";
                echo "======================<br>";
            }
        }else{
            echo "No hay productos";
        }
    }

?>

<form action="" method="post">
    Codigo: <input type="tetx" name="cod"><br>
    Nombre: <input type="tetx" name="nom"><br>
    Precio: <input type="tetx" name="pre"><br>
    <input type="submit" name="insertar" value="Insertar">
    <input type="submit" name="buscar" value="Buscar">
    <input type="submit" name="mostrar" value="Mostrar">
</form>

