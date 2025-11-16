<?php 
include('../conexion.php');

$columns =["usu_id", "usu_rol_id","usu_apellido", "usu_nombre", "usu_dni", "usu_telefono",  "usu_login", "usu_password", "fecha_actualizacion"];
$table="usuarios";
$campo = isset($_POST['campo']) ? $conexion->real_escape_string($_POST['campo']) : null;

$where = "";
if($campo != null){
    $where = " WHERE (";
    $cont = count($columns);
    for($i=0; $i<$cont; $i++){
        $where .= $columns[$i] . " LIKE '%" . $campo . "%' OR ";
    }
    $where = substr_replace($where, "", -3);
    $where .= ")";
}
$sql="SELECT ".implode(", ",$columns)."
 FROM $table
 $where
 ";

$resultado = $conexion->query($sql);
$num_rows = $resultado->num_rows;// esto nos da la cantidad de filas que tiene la consulta para realizar una validacion
$html="";

if($num_rows > 0){
    
    while($row = $resultado->fetch_assoc()){
        
        $html .= "<tr>";
        $html .= "<td>".$row['usu_id']."</td>";
        $html .= "<td>".$row['usu_rol_id']."</td>";
        $html .= "<td>".$row['usu_apellido']."</td>";
        $html .= "<td>".$row['usu_nombre']."</td>";
        $html .= "<td>".$row['usu_dni']."</td>";
        $html .= "<td>".$row['usu_telefono']."</td>";
        $html .= "<td>".$row['usu_login']."</td>";
        $html .= "<td>".$row['usu_password']."</td>";
        $html .= "<td>".$row['fecha_actualizacion']."</td>";
        //$html .= "<td><button class='btn btn-danger' onclick='eliminarUsuario(".$row['usu_id'].")'>Eliminar</button></td>";
        //$html .= "<td><button class='btn btn-info' onclick='editarUsuario(".$row['usu_id'].")'>Editar</button></td>";
        $html .= "</tr>";
    }
}else {
    $html .= "<tr>";
    $html .="<td colspan='10'>No se encontraron resultados</td>";
    $html .="</tr>";
}

echo json_encode($html, JSON_UNESCAPED_UNICODE);
?>