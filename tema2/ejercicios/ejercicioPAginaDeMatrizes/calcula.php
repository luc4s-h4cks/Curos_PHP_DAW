<?php

include 'funsiones.php';

if(!isset($_POST['calcular'])){
?>

<form action="" method="POST">
    
    <input type="hidden" name="accion" value="<?= $_GET['accion'] ?>">
    Introduce el numero de columnas<input type="number" name="col"><br>
    Introduce el numero de filas<input type="number" name="fil"><br>
    <input type="submit" name="calcular" value="Calcular">
    
</form>
<?php
}
if(isset($_POST['calcular'])){
    switch ($_POST['accion']) {
        case "filas":?>
        
        <h1>Calcular Filas</h1>

        <?php  
        $matriz = crearMatrizRandom($_POST['col'], $_POST['fil']);
        mostrarMatriz($matriz);
        
        $filas = sumarFilas($matriz);
        
        foreach ($filas as $key => $value) {
            echo "fila ".($key+1).": ".$value."<br>";
        }
        break;

        case "columnas":?>
             <h1>Calcular columnas</h1>
        <?php 
        $matriz = crearMatrizRandom($_POST['col'], $_POST['fil']);
        mostrarMatriz($matriz);
        
        $colums = sumarColumnas($matriz);
        
        foreach ($colums as $key => $value) {
            echo "Columna ".($key+1).": ".$value."<br>";
        }
        
        break;
    
        case "filas_columnas":?>
        <h1>Calcular filas y columnas</h1>
        <?php
        $matriz = crearMatrizRandom($_POST['col'], $_POST['fil']);
        mostrarMatriz($matriz);
        
        $filas = sumarFilas($matriz);
        $colums = sumarColumnas($matriz);
        
        foreach ($filas as $key => $value) {
            echo "fila ".($key+1).": ".$value."<br>";
        }
            
        foreach ($colums as $key => $value) {
            echo "Columna ".($key+1).": ".$value."<br>";
        }
        break;
    
        case "diagonal":?>
        <h1>Calcular Diagonal principal</h1>
        <?php
            
        break;
    
        case "traspuesta":?>
        <h1>Calcular matriz traspuesta</h1>
        <?php
            
        break;
    
    }
}
