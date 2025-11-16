  
<section class="">
    <section class="row g-2 mb-2 p-2 ">
        <div class="col p-3 text-primary-emphasis  border border-success-subtle rounded-4">
            <div class="row">
                <h4 class="h5 col text-center"><i class="bi bi-database-fill"></i>DATOS DEL CLIENTE</h4>
                <a href="#" class="btn_new_cliente col-auto btn btn-success btn-bg"><i class="bi bi-person-add "></i> Nuevo Cliente</a>
            </div>
            <br>
            <form name="form_new_cliente_venta" id="form_new_cliente_venta" class="">
                    <input type="hidden" name="action" value="addCliente" class="form-control">
                    <input type="hidden" name="idcliente" id="idcliente" value="" class="form-control " required>
                <div class="col g-3 mt-1">
                    <label class="col-auto " ><i class="bi bi-person-bounding-box"></i> Identificacion (DNI,CUIL,CUIT)</label>
                    <input class="col form-control form-control-sm" type="text" name="nit_cliente" id="nit_cliente">
                </div> 
                <div class="row g-3 mt-1">
                    <label class="col-auto"><i class="bi bi-person-fill"></i> Apellido</label>
                    <input class="col form-control form-control-sm" type="text" name="apell_cliente" id="apell_cliente" disabled required>
                </div>  
                <div class="row g-3 mt-1">
                    <label class="m-t1 col-auto"><i class="bi bi-person-fill"></i> Nombre</label>
                    <input class="col form-control form-control-sm" type="text" name="nom_cliente" id="nom_cliente" disabled required>
                </div>       
                <div  class="row g-3 mt-1">
                    <label class="m-t1 col-auto"><i class="bi bi-telephone"></i> Telefono</label>
                     <input class="col form-control form-control-sm" type="number" name="tel_cliente" id="tel_cliente" disabled required>
                </div>
                <div  class="row g-3 mt-1">
                    <label class="m-t1 col-auto"><i class="bi bi-house"></i> Direccion</label>
                    <input class="col form-control form-control-sm" type="text" name="dir_cliente" id="dir_cliente" disabled required>
                </div>
                <div class="row g-3 mt-1">
                    <label class="m-t1 col-auto"><i class="bi bi-envelope-at-fill"></i> Email</label>
                    <input class="col form-control form-control-sm" type="email" name="email_cliente" id="email_cliente" disabled required>
                </div>
                <div  class="row g-3 mt-1" id="div_registro_cliente">
                    <button type="submit" class="btn_save col btn btn-success btn-bg "><i class="bi bi-check-square-fill"></i> Guardar<t-1tton>
                    
                </div>
            </form>
        
        </div>
        <div class="col p-3 table">
            <h4 class="h5 col text-center"><i class="bi bi-box-seam fs-3"></i></i >  DATOS DEL PRODUCTO</h4>
            <table class="table align-middle">
                <thead class="">
                    <tr class="">
                        <th >Codigo</th>
                        <th >Descripcion</th>
                        <th >Stock </th>
                        <th >Cantidad</th>
                        <th >Precio</th>
                        <th >PrecioTotal</th>
                        <th >Accion</th>
                                    
                    </tr>
                    <tr>
                        <td><input type="text" name="txt_cod_producto" id="txt_cod_producto"></td>
                        <td id="txt_descripcion">-</td>
                        <td id="txt_existencia">-</td>
                        <td><input type="number" name="txt_cant_producto" id="txt_cant_producto" val="0" min="1" disabled></td>
                        <td id="txt_precio" class="textright">0.00</td>
                        <td id="txt_precio_total" class="textright">0.00</td>
                        <td><a href="#" id="add_product_venta" class="link_add"><i class="bi bi-cart-plus"></i> Agregar</a></td>
                    </tr>
                    <tr>
                        <th>Código</th>
                        <th colspan="2">Descripción</th>
                        <th>Cantidad</th>
                        <th class="">Precio </th>
                        <th class="col-auto">Precio Total</th>
                        <th>Accion</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    <tr>
                        <td  scope="row">1</td>
                        <td colspan="2">Cafe molido</td>
                        <td class="texcenter">1</td>
                        <td class="textright">50.00</td>
                        <td class="textright">50.00</td>
                        <td class="">
                            <a  class="link_delete" href="#" onclick="event=preventDefault(); del_product_detalle(1);"><i class="far fa"></i></a>
                        </td>
                    </tr>
                    <tr>
                        <td  scope="row">1</td>
                        <td colspan="2">Cafe molido</td>
                        <td class="texcenter">1</td>
                        <td class="textright">50.00</td>
                        <td class="textright">50.00</td>
                        <td class="">
                            <a href="#" class="link_delete" onclick=" event.preventDefault(); del_product_detalle(1);"><i class="bi bi-trash fs-4 text-dark"></i></a>
                    </tr>
                </tbody>
                <tfoot class="table-group-divider" >
                    <tr>
                        <td colspan ="5" class="textright">Subtotal</td>
                        <td class="textright">100.00</td>
                    </tr>
                    <tr>
                        <td colspan ="5" class="textright">IVA(12%)</td>
                        <td class="textright">500</td>
                    </tr>
                    <tr>
                        <td colspan ="5" class="textright">Total</td>
                        <td class="textright">112.00</td>
                </tfoot>
                
            </table>
        </div>
    </section>
  
  <section class="container3">
      
  </section>
  
 </section>