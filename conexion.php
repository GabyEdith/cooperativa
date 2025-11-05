
<?php
     //para conectar la base de datos

     $server = "localhost";  
     $user = "root";
     $password = "toor";
     $database = "cooperativa";

     $conexion = mysqli_connect($server, $user, $password, $database) or die ("Error al conectar con el servidor ");

?>