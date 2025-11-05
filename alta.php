<?php
include('conexion.php');
$prd_nombre = $_POST['nombre'];
$prd_categoria = $_POST['categoria'];
$prd_cantidad = $_POST['cantidad'];
$prd_precio = $_POST['precio'];

$prd_alta = date('Y-m-d');
echo $prd_alta;
echo $prd_nombre;
echo $prd_categoria;
echo $prd_cantidad;
echo $prd_precio;

$sql = "INSERT INTO productosventas (prd_nombre, prd_categoria, prd_cantidad, prd_precio, prd_alta) VALUES ('$prd_nombre', '$prd_categoria', '$prd_cantidad', '$prd_precio', '$prd_alta')";
$resultado = mysqli_query($conexion, $sql);

header('Location: productosAdministrar.php');


// Cerrar la conexión a la base de datos
//mysqli_close($conexion);
?>


