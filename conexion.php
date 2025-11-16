
<?php
     //para conectar la base de datos

     $server = "localhost";  
     $user = "root";
     $password = "toor";
     $database = "cooperativa_v1";

     $conexion = mysqli_connect($server, $user, $password, $database) or die ("Error al conectar con el servidor ");

?>