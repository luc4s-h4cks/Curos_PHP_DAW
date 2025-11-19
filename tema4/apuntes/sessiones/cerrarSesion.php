<?php
session_name("admin");
session_start();
session_unset();
session_destroy();
setcookie("admin", $_COOKIE['admin'],time()-1, "/");

