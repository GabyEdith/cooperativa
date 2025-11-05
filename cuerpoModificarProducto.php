<?php
include("conexion.php");
$prd_id = $_GET['prd_id'];
$sql = "SELECT * FROM productosventas WHERE prd_id = $prd_id";
$resultado = mysqli_query($conexion, $sql);
$fila = mysqli_fetch_assoc($resultado);
?>
<section id="cuerpo">
  <div id="formulario">
    <form action="editar.php" method="post">
      <input type="text" name="prd_nombre" value="<?php echo $fila["prd_nombre"]; ?>">
      <br>
      <input type="text" name="prd_categoria" value="<?php echo $fila["prd_categoria"]; ?>">
      <br>
      <input type="text" name="prd_cantidad" value="<?php echo $fila["prd_cantidad"]; ?>">
      <br>
      <input type="text" name="prd_precio" value="<?php echo $fila["prd_precio"]; ?>">
      <br>
      <input type="submit" id="boton" value="Modificar">
      <input type="hidden" name="prd_id" value="<?php echo $prd_id; ?>">
      <br>
      
    </form>
    </div>
</section>