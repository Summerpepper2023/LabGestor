<?php
    include '../conexionDB.php';

    $sql = "SELECT * FROM clientes";
    $result = mysqli_query($conexion, $sql);
    $clientes = mysqli_fetch_all($result);
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Clientes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container my-5">
    <div class="w-100 d-flex alig-items-center justify-content-between mb-4 ">
        <h2 class="text-center">Lista de Clientes</h2>
        <a href="../templates/IngresarCliente.php" class="btn btn-success">Registrar Clientes</a>
    </div>


<!-- Se crea la tabla para reenderizar clientes -->
<table class="table table-striped table-bordered">
    <!-- Se crea el encabezado de la tabla -->
    <thead>
        <!-- Se crea la fila para los encabezados de la tabla -->
        <tr>
            <!-- Se definen los encabezados -->
             <th>Nombre del Cliente</th>
             <th>Direccion del Cliente</th>
             <th>Eliminar Cliente</th>
             <th>Editar Cliente</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($clientes as $cliente): ?>
            <tr>
                <td><?php echo $cliente[1]?></td>
                <td><?php echo $cliente[2]?></td>
                <!-- Boton para eliminar el cliente -->
                <td class="text-center">
                    <form action="../programas/EliminarClientes.php" method="post">
                        <input type="hidden" name="id_cliente" value=<?php echo $cliente[0]?>>
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>

                <!-- Boton para actualizar el cliente -->
                <td class="text-center">
                    <form action="FormularioActualizarClientes.php" method="post" >
                        <input type="hidden" name="id_cliente" value=<?php echo $cliente[0]?>>
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                    </form>
                </td>
            </tr>
        <?php endforeach?>
    </tbody>
</table>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<!-- Se cierra la conexion con la base de datos -->
<?mysqli_close($conexion)?>






