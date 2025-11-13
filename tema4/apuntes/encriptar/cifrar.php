<?php

$pass = "1234";

echo "--------MD5----------<br>";
$passMd5= md5($pass);
echo $passMd5;

if($passMd5 == md5($pass)){
    echo "contraseña correcta";
}else{
    echo "Contraseña in correcta";
}

echo "<br>-------BCRYPT-------<br>";

$passbcrypt = password_hash($pass, PASSWORD_DEFAULT);

echo $passbcrypt;


if(password_verify($pass, $passbcrypt)){
    echo "contraseña correcta";
}else{
    echo "contraseña incorrecta";
}
