<?php
include "conexion.php";
session_start();

if(!empty($_POST))//empty verifica si esta vacio
{
    //buscar cliente
    if($_POST['action'] == 'searchCliente')
    {
        if(!empty($_POST['cliente'])){
            $nit = $_POST['cliente'];
            $query = mysqli_query($conexion,"SELECT * FROM clientes WHERE cli_identificacion like '$nit%'");
            mysqli_close($conexion);
            $result = mysqli_num_rows($query);
            $data = '';
            if($result > 0){
                $data = mysqli_fetch_assoc($query);
            }else{
                $data = 0;
            }
            echo json_encode($data,JSON_UNESCAPED_UNICODE);
        }
        exit;
    }    
    //Registrar cliente-ventas
    if($_POST['action'] == 'addCliente')
    {
        $identificacion = $_POST['identificacion'];
        $nombre = $_POST['nombre'];
        $telefono = $_POST['telefono'];
        $direccion = $_POST['direccion'];
        $usuario = $_SESSION['id'];

        $query_insert = mysqli_query($conexion,"INSERT INTO clientes(cli_identificacion,cli_nombre,cli_telefono,cli_direccion) VALUES('$identificacion','$nombre','$telefono','$direccion')");
        if($query_insert){
            $codCliente = mysqli_insert_id($conexion);
            $msg = $codCliente;
        }else{
            $msg = 'error';
        }
        mysqli_close($conexion);
        echo $msg;
    }
// info producto
    if($_POST['action'] == 'infoProducto')
    {
        $producto_id = $_POST['producto'];

        $query = mysqli_query($conexion,"SELECT pro_id,pro_nombre,pro_precio,pro_stock FROM productos WHERE pro_id = '$producto_id'");
        mysqli_close($conexion);
        $resultado = mysqli_num_rows($query);
        $data = '';
        if($resultado > 0){
            $data = mysqli_fetch_assoc($query);
            echo json_encode($data,JSON_UNESCAPED_UNICODE);
            exit;
        }
            echo "false";
            exit;
        
    }
}
exit;
?>