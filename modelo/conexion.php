<?php

$conexion = new mysqli("localhost", "warg", "123456", "crud"); //si mi base de datos o mi servidor web esta en la nube colocamos la direccion ip de nusetro servidor.

$conexion -> set_charset("utf-8");

date_default_timezone_set('America/Bogota');