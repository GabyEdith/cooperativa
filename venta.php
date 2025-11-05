<?php
   $usuario ='administrador';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <title>Mi Negocio</title>
        <link rel="stylesheet" href="css/estMenu.css">
        <link rel="stylesheet" href="css/estCuerpoVenta.css">
        <link rel="stylesheet" href="css/estFooter.css">
    </head>
    <body>
        <section id= "contenedor">
         <?php
         include 'encabezado.php';
         include 'menu.php';
         include 'cuerpoventa.php';
         include 'pie.php';
        ?>
        </section>
        
    </body>
</html>