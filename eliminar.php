<?php
 $prd_id = $_GET['prd_id'];
 include("conexion.php");
 $sql = "DELETE FROM productosventas WHERE prd_id = $prd_id";
 $resultado = mysqli_query($conexion, $sql);

 mysqli_close($conexion);//cerrar conexion 
header("Location: productosAdministrar.php");
?>