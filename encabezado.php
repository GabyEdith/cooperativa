<?php
session_start();
if(isset($_SESSION['nombre'])){
$nombre = $_SESSION['nombre'] ;
$apellido = $_SESSION['apellido'] ;
$rol = $_SESSION['rol'];
}
?>
<header>
    <div class="caja1encabezado">
        <a href="index.php"><img src="img/logo.png" alt="logo" width="110" height="110" class="imgEncabezado"></a>
    </div>
    <div class="caja2encabezado">
        
    </div>
    <div class="caja3encabezado">
        <div class="caja3encabezado1">
            <img src="img/pimiento000.png" alt="" width="110" height="110" class="imgEncabezado1">
        </div>
        <div class="caja3encabezado2">
        <h2 class="textcaja31">BIENVENIDO</h2>
        <h3 class="textcaja3" >Usuario:</h3>
        <h3 class="textcaja3" ><?php echo $nombre.' '.$apellido; ?></h3>
        <h3 class="textcaja3">Rol: <?php echo $rol; ?></h3>
        </div>

      
    </div>

</header>