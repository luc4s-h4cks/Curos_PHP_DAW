<?php

if(!isset($_COOKIE['user'])){
    header("Location: index.php");
}else{
    ?>

    <h1>Logeado</h1>

<?php
}
