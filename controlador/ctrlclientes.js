    getData();
    
    document.getElementById("campo").addEventListener("keyup", getData);
    function getData(){
    let input = document.getElementById("campo").value;
    let content = document.getElementById("content");
    let url = "modelo/listarClientes.php";

    let formData = new FormData();
    formData.append('campo', input);
    
    fetch(url, {
        method: "POST",
        body: formData,
     })
    .then(response => response.json())
    .then(data => {
     content.innerHTML = data;
    }).catch(err => console.log(err)); 
    }
$(document).ready(function(){
    // eliminar cliente
   $(document).on("click", ".btn-eliminar", function () {
        let cl = $(this).data("id");
        var action = 'eliminarCliente';
        $.ajax({
            url: 'modelo/crudCliente.php',
            type: "POST",
            async: true,
            data: {action:action, cliente:cl},
            success: function(response){

                response = response.trim();

                if (response === "ok") {
                    alert("Cliente eliminado correctamente");
                    getData();  // refresca la tabla
                }
                else if (response === "tiene_ventas") {
                    alert("No se puede eliminar el cliente porque tiene ventas registradas");
                }
                else {
                    alert("Error al eliminar el cliente");
                }
            }

        });
       
    });
    // Actualizar cliente
$(document).on("click", ".btn-editar", function () {

    let cl = $(this).data("id");

    $.ajax({
        url: "modelo/crudCliente.php",
        type: "POST",
        data: { action: "editarCliente", cliente: cl },
        success: function (response) {

            let data = JSON.parse(response);

            if (data != "false") {

                $("#edit_id").val(data.cli_id);
                $("#edit_identificacion").val(data.cli_identificacion);
                $("#edit_apellido").val(data.cli_apellido);
                $("#edit_nombre").val(data.cli_nombre);
                $("#edit_correo").val(data.cli_email);
                $("#edit_telefono").val(data.cli_telefono);
                $("#edit_direccion").val(data.cli_direccion);

                $("#modalEditarCliente").modal("show");
            } 
            else {
                alert("Error: Cliente no encontrado");
            }
        }
    });
});
// BOTÓN GUARDAR CAMBIOS
$(document).on("click", "#btnActualizarCliente", function () {

    let datos = $("#form_edit_cliente").serialize();

    $.ajax({
        url: "modelo/crudCliente.php",
        type: "POST",
        data: datos,
        success: function (response) {

            if (response.trim() === "ok") {
                alert("Cliente actualizado correctamente");
                $("#modalEditarCliente").modal("hide");
                getData(); // refresca tabla
            } 
            else {
                alert("Error al actualizar el cliente");
            }
        }
    });

});


    //crear cliente nuevo
$('#btnAgregarCliente').click(function(e) {
    e.preventDefault(); 
    $.ajax({
        url: 'modelo/crudCliente.php',
        type: "POST",
        data: $('#form_new_cliente_venta').serialize(),
        success: function(response){

            response = response.trim();
          

            if (response !== 'error') {
                 console.log(response);
                alert("Cliente agregado correctamente");
                $('#form_new_cliente_venta')[0].reset();
                $("#modalAgregarCliente").modal("hide");
                getData();
            } else {
                alert("Error al agregar el cliente");
            }
        }
    });

});




});



