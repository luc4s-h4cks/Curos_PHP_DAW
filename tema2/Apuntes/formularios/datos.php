
<html>
    <head>
        <title>title</title>
    </head>
    <body>
        <form action="procesa.php" method="POST">
            
            Nombre:<input type="text" name="nombre"><br>
            Apellidos:<input type="text" name="apellidos"><br>
            <input type="submit" name="enviar" value="Enviar">
            Modulos: <br>
            <input type="checkbox" name="modulos[]" value="DWES">Desarrollo wen entorno servidor<br>
            <input type="checkbox" name="modulos[]" value="DWEC">Desarrollo wen entorno Cliente<br>
            <input type="checkbox" name="modulos[]" value="DIW">Diseño de interfaces web<br>

        </form>
        
        <a href="opciones.php?n=1">Opcion 1</a><br>
        <a href="opciones.php?n=2">Opcion 2</a><br>
        <a href="opciones.php?n=3">Opcion 3</a><br>
        
        <?php 
            var_dump($_GET);
        ?>
        
    </body>
</html>






