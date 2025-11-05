<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Catálogo de Productos</title>
    <link rel="stylesheet" href="css/estilos3.css">
</head>
<body>
    <h1> Productos</h1>

    <?php
    
    $categorias = [
        "Especies Cooperativa" => [
            [
                "nombre" => "Pimenton en Vaina",
                "descripcion" => "Pimenton de maxima pureza.",
                "precio" => "$14000",
                "imagen" => "img/fotopimiento.jpg"
            ],
            [
                "nombre" => "Pimenton en grano",
                "descripcion" => "Pimenton disecado en en secadero natural.",
                "precio" => "$9000",
                "imagen" => "img/fotopimiento2.jpg"
            ],
            [
                "nombre" => "Pimenton Molido",
                "descripcion" => "Pimenton molido de primera calidad.",
                "precio" => "$19050",
                "imagen" => "img/pimenton.jpeg"
            ]
        ],
        "Otras Especies" => [
            [
                "nombre" => "Comino",
                "descripcion" => "Comino de Palermo .",
                "precio" => "$12000",
                "imagen" => "img/cominomolido.jpg"
            ],
            [
                "nombre" => "Porotos",
                "descripcion" => "Grano pequeño.",
                "precio" => "$15000",
                "imagen" => "img/poroto.jpeg"
            ],
            [
                "nombre" => "Oregano",
                "descripcion" => "Oregano seco",
                "precio" => "$10000",
                "imagen" => "img/oregano.jpg"
            ]
        ]
    ];

    
    foreach ($categorias as $categoria => $productos) {
        echo "<h2>$categoria</h2>";
        echo "<table>";
        echo "<thead><tr>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Precio</th>
                <th>Imagen</th>
              </tr></thead>";
        echo "<tbody>";
        foreach ($productos as $producto) {
            echo "<tr class='fila-hover'>";
            echo "<td>{$producto['nombre']}</td>";
            echo "<td>{$producto['descripcion']}</td>";
            echo "<td>{$producto['precio']}</td>";
            echo "<td><img src='{$producto['imagen']}' alt='{$producto['nombre']}' class='imagen-hover'></td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
    }
    ?>
</body>
</html>
