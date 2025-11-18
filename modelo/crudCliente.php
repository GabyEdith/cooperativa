<?php
include('../conexion.php');

if ($_POST['action'] == 'eliminarCliente') {

    if (!empty($_POST['cliente'])) {

        $cli_id = intval($_POST['cliente']);

        $check = mysqli_query($conexion, "SELECT * FROM ventas WHERE cli_id = $cli_id");

        if (mysqli_num_rows($check) > 0) {
            echo "tiene_ventas";
            exit;
        }

        $sql = "DELETE FROM clientes WHERE cli_id = $cli_id";
        $resultado = mysqli_query($conexion, $sql);

        echo $resultado ? "ok" : "error";
        exit;
    }
}
if ($_POST['action'] == 'editarCliente') {

    $id = intval($_POST['cliente']);

    $sql = "SELECT * FROM clientes WHERE cli_id = $id";
    $query = mysqli_query($conexion, $sql);

    if (mysqli_num_rows($query) > 0) {
        $data = mysqli_fetch_assoc($query);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
    } else {
        echo "false";
    }

    exit;
}
if ($_POST['action'] == 'updateCliente') {

    $id = intval($_POST['cli_id']);
    $identificacion = $_POST['identificacion'];
    $apellido = $_POST['apellido'];
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];
    $direccion = $_POST['direccion'];

    $sql = "UPDATE clientes SET 
            cli_identificacion = '$identificacion',
            cli_apellido = '$apellido',
            cli_nombre = '$nombre',
            cli_email = '$correo',
            cli_telefono = '$telefono',
            cli_direccion = '$direccion'
            WHERE cli_id = $id";

    $query = mysqli_query($conexion, $sql);

    echo $query ? "ok" : "error";
    exit;
}

if ($_POST['action'] == 'addCliente') {

    if (
        !empty($_POST['identificacion']) && !empty($_POST['nombre']) && !empty($_POST['apellido']) && !empty($_POST['telefono']) && !empty($_POST['direccion']) && !empty($_POST['correo'])
    ) {

        $identificacion = $_POST['identificacion'];
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $telefono = $_POST['telefono'];
        $direccion = $_POST['direccion'];
        $correo = $_POST['correo'];

        $sql = "INSERT INTO clientes(cli_identificacion, cli_nombre, cli_apellido, cli_direccion, cli_email, cli_telefono)
                VALUES('$identificacion','$nombre','$apellido','$direccion','$correo','$telefono')";

        $query = mysqli_query($conexion, $sql);

        echo $query ? mysqli_insert_id($conexion) : "error";
        exit;
    }
    echo "error";
    exit;
}



?>
