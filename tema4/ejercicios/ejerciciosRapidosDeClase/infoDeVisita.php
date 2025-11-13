<?php

if(isset($_COOKIE['fecha'])){
    
    echo "Tu ultimo accesso fue ". date("Y:m:d H:i:s", $_COOKIE['fecha']);
    setcookie("fecha",time() , time()+3600*24*365);
    
}else{
    
    echo "Bienvenido es la primera vez que accedes";
    setcookie("fecha",time() , time()+3600*24*365);
    
}
