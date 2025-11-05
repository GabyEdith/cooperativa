<section id="cuerpo">
    <?php
    include("conexion.php");
    $sql = "SELECT * FROM productosventas";
    $resultado = mysqli_query($conexion, $sql);
    ?>
    <table border ="1">
      <tr>
        <th>Producto</th>
        <th>Categoria</td>
        <th>Cantidad</th> 
        <th>Precio</th>
  
        <th colspan="2"><a href="agregarProducto.php"><img src="iconos/agregar.png" alt= ""></a></th> 
        
        
      </tr>
    <?php
    while ($fila = mysqli_fetch_array($resultado)) {
    ?>
       <tr> 
      <td> <?php  echo  $fila['prd_nombre'];?></td>
      <td> <?php   echo  $fila['prd_categoria'];?></td>
      <td> <?php echo  $fila['prd_cantidad'];?></td>
      <td> <?php echo  $fila['prd_precio'];?></td>
      <th><a href="modificarProducto.php?prd_id=<?php echo $fila['prd_id']; ?>"><img src="iconos/editar.png" alt= ""></a></th> 
      <th><a onclick ='return confirm ("¿Estas seguro que quieres eliminar este producto?")' href="eliminar.php?prd_id=<?php echo $fila['prd_id']; ?>"><img src="iconos/borrar.png" alt= ""></a></th> 
         
      </tr>
    <?php
  
    }          
    ?>
    </table>
</section>