<?php
$msg ="";

    if(isset($_POST['acceder'])){
        try {
            $conex = new mysqli("localhost", "dwes", "abc123.", "personas");
            $stmt = $conex->prepare("select * from persona where Email = ? and Pass=?");
            $stmt->execute([$_POST['email'], $_POST['pass']]);
            $resul = $stmt->get_result();
            if($resul->num_rows){
                $persona = $resul->fetch_object();
                
                setcookie("nombre", $persona->Nombre);
                setcookie("apellido", $persona->Apellido);
                setcookie("email", $persona->Email);
                setcookie("pass", $persona->Pass);
                
                if(isset($_COOKIE['recordar'])){
                    setcookie("recordar", "", 0);
                }
                
                if(isset($_POST['recordar'])){
                    setcookie("recordar", 1);
                }
                
                header("Location: index.php");
            }else{
                $msg = "Usuario y/o contraseña incorrectos";
            }
            
        } catch (Exception $ex) {
            
        }
    }

?>

<form action="" method="post">
    Email: <input type="text" name="email" <?php if(isset($_COOKIE['recordar'])) echo "value='$_COOKIE[email]'" ?> ><br>
    Contraseña: <input type="text" name="pass" <?php if(isset($_COOKIE['recordar'])) echo "value='$_COOKIE[pass]'" ?>><br>
    Recordarme <input type="checkbox" name="recordar" <?php if(isset($_COOKIE['recordar'])) echo "checked" ?>><br>
    
    <input type="submit" name="acceder" value="Acceder">
    <input type="submit" name="regitrar" value="Registrase">
</form>

<?= $msg ?>