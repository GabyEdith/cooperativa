 <div class="container1">
    <?php
    include("conexion.php");
    $clientes = $conexion->query("SELECT cli_id, CONCAT(cli_nombre,' ',cli_apellido) AS nombre FROM clientes");
    $usuarios = $conexion->query("SELECT usu_id, CONCAT(usu_nombre,' ',usu_apellido) AS nombre FROM usuarios");
    $cajas = $conexion->query("SELECT caja_id, nombre FROM cajas");
    $productos = $conexion->query("SELECT pro_id, pro_nombre, pro_precio, pro_stock FROM productos");
    $sql="SELECT max(id_ventas) FROM ventas"  ;
    $resultado = $conexion->query($sql);
    $row = $resultado->fetch_array(MYSQLI_ASSOC);
    

    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["registrar_venta"])) {
    $cli_id = $_POST["cliente"];
    $usu_id = $_POST["usuario"];
    $caja_id = $_POST["caja"];
    $productos_sel = $_POST["producto"];
    $cantidades = $_POST["cantidad"];

    // Crear venta
    $conexion->query("INSERT INTO ventas (cli_id, usu_id, caja_id, total_venta) VALUES ($cli_id, $usu_id, $caja_id, 0)");
    $venta_id = $conexion->insert_id;

    $total = 0;
    foreach ($productos_sel as $i => $pro_id) {
        $cantidad = floatval($cantidades[$i]);
        if ($cantidad <= 0) continue;

        // Obtener precio actual
        $res = $conexion->query("SELECT pro_precio, pro_stock FROM productos WHERE pro_id=$pro_id");
        $row = $res->fetch_assoc();
        $precio = floatval($row["pro_precio"]);
        $subtotal = $precio * $cantidad;
        $total += $subtotal;

        // Insertar detalle
        $conexion->query("INSERT INTO detalle_ventas (id_ventas, pro_id, cantidad_producto, precio_unitario) 
                        VALUES ($venta_id, $pro_id, $cantidad, $precio)");

        // Descontar stock
        $conexion->query("UPDATE productos SET pro_stock = pro_stock - $cantidad WHERE pro_id=$pro_id");
    }

    // Actualizar total venta
    $conexion->query("UPDATE ventas SET total_venta=$total WHERE id_ventas=$venta_id");

    // Insertar movimiento de caja
    $concepto = "Venta manual registrada";
    $ref = "Venta-" . $venta_id;
    $conexion->query("INSERT INTO movimientos_caja (caja_id, usu_id, tipo_movimiento, origen, concepto, monto, referencia)
                    VALUES ($caja_id, $usu_id, 'Ingreso', 'Venta', '$concepto', $total, '$ref')");

    // Actualizar saldo de caja
    $conexion->query("UPDATE cajas SET saldo_actual = saldo_actual + $total WHERE caja_id=$caja_id");

    echo "<div class='alert alert-success text-center m-3'>
            ✅ Venta registrada con éxito. Total: $" . number_format($total, 2) . "
          </div>";
}
    ?>  
         <p class="data">VENTA N°: ---<?php echo $row['max(id_ventas)'] + 1;?>--- </P>
        <div class="container2">
            <div class="caja1">
                <div>  
                    <div class="articulo">INGRESE UN ARTÍCULO</div>
                     <input type="text" name="articulo" class="articulo1">
                    <button type="button" class="btnagregar">AGREGAR</button>
                </div>
                <div class="cantidad">
                    <div class="articulo">INGRESE CANTIDAD</div>
                    <input type="text" name="articulo" class="articulo1">
                     <button type="button" class="btnagregar">AGREGAR</button>
                </div>

            </div>
            <div class="caja2" >
                <p class="detventa">DETALLE</p>
                <table border="1">
                        <tr>
                        <th>Producto</th>
                        <th>Cantidad</th>
                        <th id="Descripcion">Descripcion</th>
                        <th>Precio Unitario</th>
                        <th>Precio Total</th>
                    </tr>
                    <?php    
                     //while ($fila = mysqli_fetch_array($rVentadetalles)) {
                    ?>
                     <tr>      
                        <td> <?php  //echo $fila['detvent_orden'];?></td>
                        <td> <?php   //echo $fila['detvent_cantidad'];?></td>
                         <?php
                        // include("conexion.php");
                        //      $sql2 = "SELECT pro_nom FROM productos p INNER JOIN ventadetalles v ON p.pro_id= v.pro_id WHERE v.detvent_id=".$fila['detvent_id'];
                        //     $rNomprod = mysqli_query($conexion, $sql2);
                        //      ?>  
                         <td> <?php //echo $rNomprod ?></td>
                       
                    </tr>        
                    <?php       
                    // }
                    ?> 
                </table>
            </div>
           
        </div>
        <div class="container3">
            <div class="caja3">
                <div class="cajatitcli">
                    <p class="datcli">DATOS DEl CLIENTE</p>
                </div>
                <div class="cajacliente">
                    <input type="text" name="dni" class="dni" placeholder="INGRESE DNI"ñ>
                    <button type="button" class="btnbuscar">BUSCAR</button>
                </div>                
            </div>
            <div class="caja4">
                <button type="button" class="btnpagar">PAGAR</button>
            </div>
            <div class="caja5">
                <div class="c1">
                    <p>SUBTOTAL:</p>
                    <p>DESCUENTO:</p>
                    <p>IVA:</p>
                    <p>TOTAL:</p>
                   
                </div>
                <div class="c2">
                    <p>$ 1000</p>
                    <p>$ 0</p>
                    <p>$0</p>
                    <p>$ 1000</p>  
                </div>
               
            </div>
        </div>
    
    </div>
     
        
    