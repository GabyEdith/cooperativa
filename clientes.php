  <?php 
    include("conexion.php");
    ?>
    

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="js/jquery-3.6.0.min.js"></script>
    <title>Clientes</title>
    <link rel="stylesheet" href="css/estMenu.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/estFooter.css">
    <link rel="stylesheet" href="icons/bootstrap-icons.min.css">

   
</head>
<body>
    <?php 
    include 'encabezado.php';
    include("menu.php");
     ?>      
    <div class="m-3">
        <form action="" method="post" class="row w-25" >
         <label for="campo" class="col-auto input-group-text" id="basic-addon1"><i class="bi bi-search fs-5"></i></label>
        <input type="text" name="campo" id="campo" class="col form-control fs-6" placeholder="Buscar" aria-label="Buscar" aria-describedby="visible-addon">
        </form>
        <table class="table table-striped table-hover">
            <thead>
            <th> id</th>
            <th><i class="bi bi-person-bounding-box"></i> Identificacion</th>
            <th><i class="bi bi-person-fill"></i> Apellido</t>
            <th><i class="bi bi-person-fill"></i> Nombre</th>
            <th><i class="bi bi-house-fill"></i> Direccion</th>            
            <th><i class="bi bi-envelope-at-fill"></i> Correo</th>
            <th><i class="bi bi-telephone"></i> Telefono</th>            
            <th><i class="bi bi-pencil-square"></i> Fecha_actualizacion</th>  
            <th colspan="2"> <button type="button" class="btn btn-primary p-0 px-2" data-bs-toggle="modal" data-bs-target="#modalAgregarCliente">
    <i class="bi bi-person-add fs-5"></i> Agregar Nuevo
</button>
</th>
            </thead>
        <tbody id="content">
        </tbody>
        </table>
    </div>  
<!-- MODAL AGREGAR CLIENTE NUEVO -->
  <div class="modal fade" id="modalAgregarCliente" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel"><i class="bi bi-person-plus-fill text-center"></i> Nuevo Cliente</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="form_new_cliente_venta">
            <div class="row">
              <div class="col mb-3">
                <label><i class="bi bi-person-vcard"></i> N° de Identificacion</label>
                <input type="text" name="identificacion" class="form-control" id="identificacion" required>
              </div>

              <div class="col mb-3">
                <label><i class="bi bi-person-fill"></i> Apellido</label>
                <input type="text" name="apellido" class="form-control" id="apellido" required>
              </div>
            </div>

            <div class="row">
              <div class="col mb-3">
                <label><i class="bi bi-person-gear"></i> Nombre</label>
                <input type="text" name="nombre" class="form-control" id="nombre" required>
              </div>

              <div class="col mb-3">
                <label><i class="bi bi-telephone"></i> Teléfono</label>
                <input type="text" name="telefono" class="form-control" id="telefono" required>
              </div>
            </div>

            <label><i class="bi bi-envelope-at-fill"></i> Correo</label>
            <input type="email" name="correo" class="form-control" id="correo" required>

            <label><i class="bi bi-house-fill"></i> Dirección</label>
            <input type="text" name="direccion" class="form-control" id="direccion" required>

            <input type="hidden" name="action" value="addCliente">

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
              <button type="button" class="btn btn-primary" id="btnAgregarCliente">Agregar Cliente</button>
            </div>
          </form>

        </div>
        
      </div>
    </div>
  </div>
  <!-- MODAL EDITAR CLIENTE -->
<div class="modal fade" id="modalEditarCliente" tabindex="-1" aria-labelledby="editarLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title"><i class="bi bi-pencil-square"></i> Editar Cliente</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <div class="modal-body">
        <form id="form_edit_cliente">

          <input type="hidden" name="action" value="updateCliente">
          <input type="hidden" name="cli_id" id="edit_id">

          <label class="mt-2"><i class="bi bi-person-vcard"></i> N° de Identificacion</label>
          <input type="text" name="identificacion" id="edit_identificacion" class="form-control">

          <label class="mt-2"><i class="bi bi-person-fill"></i> Apellido</label>
          <input type="text" name="apellido" id="edit_apellido" class="form-control">

          <label class="mt-2"><i class="bi bi-person-gear"></i>Nombre</label>
          <input type="text" name="nombre" id="edit_nombre" class="form-control">

          <label class="mt-2"><i class="bi bi-envelope-at-fill"></i> Correo</label>
          <input type="text" name="correo" id="edit_correo" class="form-control">

          <label class="mt-2"><i class="bi bi-telephone"></i> Teléfono</label>
          <input type="text" name="telefono" id="edit_telefono" class="form-control">

          <label class="mt-2"><i class="bi bi-house-fill"></i> Dirección</label>
          <input type="text" name="direccion" id="edit_direccion" class="form-control">

        </form>
      </div>

      <div class="modal-footer">
        <button class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button class="btn btn-primary" id="btnActualizarCliente">Guardar Cambios</button>
      </div>

    </div>
  </div>
</div>

    <?php include("pie.php"); ?>
    <script src="controlador/ctrlclientes.js"></script>
     <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>