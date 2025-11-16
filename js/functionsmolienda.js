

$(document).ready(function(){
    $('.btn_new_cliente').click(function(e){
        e.preventDefault();
        $('#apell_cliente').removeAttr('disabled');
        $('#nom_cliente').removeAttr('disabled');
        $('#tel_cliente').removeAttr('disabled');
        $('#dir_cliente').removeAttr('disabled');
        $('#email_cliente').removeAttr('disabled');
        $('#div_registro_cliente').slideDown();

        });

        // Buscar cliente
        $('#nit_cliente').keyup(function(e){
            e.preventDefault();
         var cl = $(this).val();
         var action = 'searchCliente';

         $.ajax({
            url: 'ajaxmolienda.php',
            type: "POST",
            async: true,
            data: {action:action, cliente:cl},
            success: function(response){
                if(response == 0){
                    $('#idcliente').val('');
                    $('#apell_cliente').val('');
                    $('#nom_cliente').val('');
                    $('#tel_cliente').val('');
                    $('#dir_cliente').val('');
                    $('#email_cliente').val('');
                    //mostrar el boton de agregar
                    $('.btn_new_cliente').slideDown();
                }else{
                   
                    var data = $.parseJSON(response);//convertir la respuesta a json
                    $('#idcliente').val(data.cli_id);
                    $('#apell_cliente').val(data.cli_apellido);
                    $('#nom_cliente').val(data.cli_nombre);
                    $('#tel_cliente').val(data.cli_telefono);
                    $('#dir_cliente').val(data.cli_direccion);
                    $('#email_cliente').val(data.cli_email);
                    $('.btn_new_cliente').slideUp();
                    $('#apell_cliente').attr('disabled','disabled');
                    $('#nom_cliente').attr('disabled','disabled');
                    $('#tel_cliente').attr('disabled','disabled');
                    $('#dir_cliente').attr('disabled','disabled');
                    $('#div_registro_cliente').slideUp();

                }
            },function(error){
                console.log(error);
            }
        
        });
        // crear cliente venta
        // $('#form_new_cliente_venta')(function(e){
        //     e.preventDefault();
        //     $.ajax({
        //         url: 'ajaxmolienda.php',
        //         type: "POST",
        //         async: true,
        //         data: $('#form_new_cliente_venta').serialize(),
        //         success: function(response){
        //             if(response == 0){
                        
        //             }else{

        //             }
        //         }
        //     });
        // });
        
    });

    // //buscar producto 
    // $('#txt_cod_producto').keyup(function(e){
    //     e.preventDefault();
    //     var producto = $(this).val();//this captura el valor del input
    //     var action = 'infoProducto';//action es el nombre del metodo en ajax.php
    //     if(producto != ''){
    //          $.ajax({
    //             url: 'ajax.php',
    //             type: "POST",
    //             async: true,
    //             data:{action:action,producto:producto},
    //             success: function(response){
                  
    //                 if($.trim(response) != 'false'){
    //                     var info = JSON.parse(response);
    //                     $('#txt_descripcion').html(info.pro_nombre); 
    //                     $('#txt_existencia').html(info.pro_stock);
    //                     $('#txt_cant_producto').val('1');
    //                     $('#txt_precio').html(info.pro_precio);
    //                     $('#txt_precio_total').html(info.pro_precio);
    //                     $('#txt_cant_producto').removeAttr('disabled');
    //                     //activar el campo cantidad
    //                     $('#add_product_venta').slideDown();
    //                 }else{
    //                     $('#txt_descripcion').html('-');
    //                     $('#txt_existencia').html('-');
    //                     $('#txt_cant_producto').val('0');
    //                     $('#txt_precio').html('0.00');
    //                     $('#txt_precio_total').html('0.00');
    //                     $('#txt_cant_producto').attr('disabled','disabled');
    //                     $('#add_product_venta').slideUp();

                        
    //                 }
    //             }
    //     });
    //     }
       
    // ;   
    // });

    //validar la cantidad del producto antes de agregar
    // $('#txt_cant_producto').keyup(function(e){
    //     e.preventDefault();
    //     var precio_total = $(this).val() * $('#txt_precio').html();
    //     var existencia = parseInt($('#txt_existencia').html());

    //     if(($(this).val() > existencia)){
    //         $('#txt_cant_producto').val(existencia);
    //         precio_total = existencia * parseFloat($('#txt_precio').html());
    //     }
    //     $('#txt_precio_total').html(precio_total);
         
    //     if(($(this).val() < 1) || (isNaN($(this).val()))){ //isNaN = no es un numero
    //         $('#add_product_venta').slideUp();
    //     }else{
    //         $('#add_product_venta').slideDown();
    //     }
    
    // });      
});
