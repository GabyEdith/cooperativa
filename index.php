<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Formulario Login</title>
        <link rel="stylesheet" href="css/estiloIndex.css">
    </head>
    <body>
        <nav class="login">
            <div class="cajaIndex1">
            <img src="img/logo.png" heightalign="left" width="300" alt="">
            </div>
         <form action="procesa.php" method="post">   

            <div class="cajaIndex2">
            <input type="text" name="user" id="user" required placeholder="usuario" >
            <br>
            <input type="password" name="password" id="password"  placeholder="contraseña" required>
            <br>
            <input type="checkbox" name="recordar" id="recordar" value="recordar">Recordar contraseña
            <br>
            <input type="submit" value="Acceder">

            </div>
            
            
                 
            </form>
          </nav>
    </body>
</html>