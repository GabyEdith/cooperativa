<nav>
      <?php
      $rol = $_SESSION['rol'];
      ?>
      <a href="inicio.php">Inicio</a>
      <a href="clientes.php">Clientes</a>

      <a href="productos.php">Productos</a>
      <a href="venta.php">Ventas</a>
      <a href="molienda.php">Molienda</a>
      <?php    
      if ($rol== "1") {
            ?>
            <a href="">Balances</a>
            <a href="">Administracion</a>
                
            <?php      
      }      
                
     ?>
                
    <a href="index.php">Cerrar sesion</a>

  </nav> 