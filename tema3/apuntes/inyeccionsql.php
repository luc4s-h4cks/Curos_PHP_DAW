<form action="" method="post">
    Usuario: <input type="text" name="usu"><br>
    Contraseña: <input type="text" name="pass"><br>
    <input type="submit" name="entrar" value="Entrar">
</form>
<?php
if(isset($_POST['entrar'])){
    /*try {
        $conex = new mysqli('localhost','dwes','abc123.','empleados');
        $result = $conex->query("select * from datos where usuario=BINARY'$_POST[usu]' and password=BINARY'$_POST[pass]'");
        
        
    } catch (Exception $ex) {
        echo $ex->getMessage();
    }
    if($result->num_rows){
        echo "has entrado";
    }
     */
    
    try {
        $conex = new mysqli('localhost','dwes','abc123.','empleados');
        $stmt = $conex->prepare("select * from datos where usuario=BINARY? and password=BINARY?");
        
    } catch (Exception $ex) {
        echo $ex->getMessage();
    }
    $stmt->bind_param("ss", $_POST['usu'], $_POST['pass']);
    $stmt->execute();
    $resul=$stmt->get_result();
    if($resul->num_rows){
        echo "has entrado";
    }else{
        echo "Crendeciales incorrectas";
    }
    
}



