<?php 
include('../conexion.php');

$columns =["cli_id", "cli_identificacion","cli_nombre", "cli_apellido", "cli_direccion", "cli_email",  "cli_telefono", "fecha_actualizacion"];
$table="clientes";
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
        $html .= "<td>".$row['cli_id']."</td>";
        $html .= "<td>".$row['cli_identificacion']."</td>";
        $html .= "<td>".$row['cli_apellido']."</td>";
        $html .= "<td>".$row['cli_nombre']."</td>";
        $html .= "<td>".$row['cli_direccion']."</td>";
        $html .= "<td>".$row['cli_email']."</td>";
        $html .= "<td>".$row['cli_telefono']."</td>";    
        $html .= "<td>".$row['fecha_actualizacion']."</td>";
        $html .= " <td><button class='btn btn-danger btn-eliminar p-0' data-id='".$row['cli_id']."'><i class='bi bi-trash3 fs-5 p-3'></i></button></td>";
        $html .= "<td><button class='btn btn-success btn-editar p-0'  data-id='".$row['cli_id']."'><i class='bi bi-pencil-square fs-5 p-3'></i></button></td>";
        $html .= "</tr>";
    
    }
}else {
    $html .= "<tr>";
    $html .="<td colspan='10'>No se encontraron resultados</td>";
    $html .="</tr>";
}

echo json_encode($html, JSON_UNESCAPED_UNICODE);

?>