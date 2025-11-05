<section id="cuerpo">
    <?php
    include("conexion.php");
    $sql = "SELECT * FROM productosventas";
    $resultado = mysqli_query($conexion, $sql);
    ?>
    <table border ="1">
      <tr>
        <th>Producto</th>
        <th>Categoria</th>
        <th>cantidad</th>
        <th>Precio</th>
      </tr>
    <?php
    while ($fila = mysqli_fetch_array($resultado)) {
    ?>
       <tr> 
      <td> <?php  echo  $fila['prd_nombre'];?></td>
      <td> <?php   echo  $fila['prd_categoria'];?></td>
      <td> <?php   echo  $fila['prd_cantidad'];?></td>
      <td> <?php echo  $fila['prd_precio'];?></td>
        
      </tr>
    <?php
  
    }          
    ?>
    </table>
</section>