<?php

$conex = new mysqli("localhost", "dwes", "abc123.", "empleados");
echo $conex->server_info;