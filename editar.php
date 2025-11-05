<?php
include('conexion.php');
$prd_nombre = $_POST['prd_nombre'];
$prd_categoria = $_POST['prd_categoria'];
$prd_cantidad = $_POST['prd_cantidad'];
$prd_precio = $_POST['prd_precio'];

$prd_id = $_POST['prd_id'];

$sql = "UPDATE productosventas SET prd_nombre='$prd_nombre', prd_categoria='$prd_categoria', prd_cantidad='$prd_cantidad', prd_precio='$prd_precio' WHERE prd_id='$prd_id'";    
if (mysqli_query($conexion, $sql)) {
    //echo "Registro actualizado correctamente";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conexion);   
}
 
mysqli_close($conexion);
header('Location: productosadministrar.php');


?>





