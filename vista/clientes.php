  <?php 
    include("../conexion.php");
    ?>
    

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style >
        table,th,td{
            border: 1px solid black;
            border-collapse: collapse;
        }
        table{
            width: 80%;
            border-collapse: collapse;
        }
    </style>
</head>
<body>
    <div>
        <form action="" method="post">
        <label for="campo">buscar </label>
        <input type="text" name="campo" id="campo">

        </form>
        <table>
            <thead>
            <th>num.usuario</th>
            <th>num.nombre</th>
            <th>num.apellido</th>
             </thead>
        <tbody id="content">


        </tbody>
         </table>
    </div>  
    <script src="../controlador/clientes.js"></script>
</body>
</html>