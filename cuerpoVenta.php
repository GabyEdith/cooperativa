 <div class="container1">
    <?php
    include("conexion.php");
   $sql1 = "SELECT * FROM ventadetalles";
   $rVentadetalles = mysqli_query($conexion, $sql1);
    ?>  
        <p class="data">VENTA N°: </p>
        <P class="data">---------------------</P>
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
                     while ($fila = mysqli_fetch_array($rVentadetalles)) {
                    ?>
                     <tr>      
                        <td> <?php  echo $fila['detvent_orden'];?></td>
                        <td> <?php   echo $fila['detvent_cantidad'];?></td>
                        <!-- <?php
                        // include("conexion.php");
                        //      $sql2 = "SELECT pro_nom FROM productos p INNER JOIN ventadetalles v ON p.pro_id= v.pro_id WHERE v.detvent_id=".$fila['detvent_id'];
                        //     $rNomprod = mysqli_query($conexion, $sql2);
                        //      ?>  
                         <td> <?php echo $rNomprod ?></td>
                       
                    </tr>        
                    <?php       
                     }
                    ?> -->
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
    