<?php
include '../conexionDB.php';

$tabla = 'registro_entrada_productos';

$query = "SELECT *  FROM $tabla";
$result = mysqli_query($conexion, $query);
$productos = mysqli_fetch_all($result);
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vista productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <h1></h1>
    <div class="container">

        <table class='table table-striped table bordered'>
            <thead>
                <tr class="text-center align-middle">
                    <th>Numero de Registro</th>
                    <th>Nombre</th>
                    <th>Proposito Analisis</th>
                    <th>Condiciones Ambientales</th>
                    <th>Fecha de Recepcion</th>
                    <th>Fecha de Inicio de Analisis</th>
                    <th>Fecha de Finalizacion de Analisis</th>
                    <th>Responsable del Ingreso</th>
                    <th>Detalles</th>
                </tr>
            </thead>
            <tbody>

                <?php foreach ($productos as $producto): ?>
                    <tr>
                        <td><?php echo $producto[0] ?></td>
                        <td><?php echo $producto[1] ?></td>
                        <td><?php echo $producto[2] ?></td>
                        <td><?php echo $producto[3] ?></td>
                        <td><?php echo $producto[4] ?></td>
                        <td><?php echo $producto[5] ?></td>
                        <td><?php echo $producto[6] ?></td>
                        <td><?php echo $producto[8] ?></td>
                        <!-- PENDIENTE: Definir la accion del form -->
                        <td class="text-center">
                            <form action="" method="post">
                                <input type="hidden" name="numero_registro_producto" value=<?php echo $producto[0]?>>
                                <button type="submit" class="btn btn-primary"></button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>