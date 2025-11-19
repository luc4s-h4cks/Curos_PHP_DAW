<?php 
setcookie("intentos", 3, time()+3600);

if(isset($_POST['login'])){
    try {
        
        $conex = new mysqli("localhost", "dwes", "abc123.", "gestionsesiones");
        $stmt = $conex->prepare("select * from usuario where Usuario=? and Clave=?");
        $stmt->bind_param("ss", $_POST['user'], $_POST['pass']);
        $stmt->execute();
        if($stmt->affected_rows){
            header("Location: inicio");
        }else{
            
        }
    } catch (Exception $ex) {
        
    }
}

?>

<form action="" method="post">
    Usuario: <input type="text" name="user"><br>
    Usuario: <input type="text" name="pass"><br>
    
    
    <input type="submit" name="login" value="Login">
</form>
<a href="registrar.php"><button>Registrarse</button></a>

