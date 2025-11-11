<?php
     session_start();
    $usuario = $_POST['user'];
    $pass = $_POST['password'];

    include('conexion.php');
    $sql = " SELECT * FROM usuarios where usu_login = '$usuario' and usu_password = '$pass' ";
    $resultado = mysqli_query($conexion, $sql);
    $filas = mysqli_num_rows($resultado);
    $filas = mysqli_fetch_assoc($resultado);
    if ($filas > 0) {
        $_SESSION['apellido'] = $filas ['usu_apellido'];
        $_SESSION['nombre'] = $filas ['usu_nombre'];
        $_SESSION['rol'] = $filas ['usu_rol_id'];
        header('location:inicio.php');
    } else {
        header('location:index.php');
    }
    ?>
    
