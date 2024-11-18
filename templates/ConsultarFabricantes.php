<?php
    include '../conexionDB.php';

    $sql = "SELECT * FROM fabricantes";
    $result = mysqli_query($conexion, $sql);
    $fabricantes = mysqli_fetch_all($result);
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Fabricantes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container my-5">
    <div class="w-100 d-flex alig-items-center justify-content-between mb-4 ">
        <h2 class="text-center">Lista de Fabricantes</h2>
        <a href="../templates/IngresarFabricantes.php" class="btn btn-success">Registrar Fabricantes</a>
    </div>


<!-- Se crea la tabla para reenderizar fabricantes -->
<table class="table table-striped table-bordered">
    <!-- Se crea el encabezado de la tabla -->
    <thead>
        <!-- Se crea la fila para los encabezados de la tabla -->
        <tr>
            <!-- Se definen los encabezados -->
             <th>Nombre del Fabricante</th>
             <th>Direccion del Fabricante</th>
             <th>Eliminar Fabricante</th>
             <th>Editar Fabricante</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($fabricantes as $fabricante): ?>
            <tr>
                <td><?php echo $fabricante[1]?></td>
                <td><?php echo $fabricante[2]?></td>
                <!-- Boton para eliminar el fabricante -->
                <td class="text-center">
                    <form action="../programas/EliminarFabricantes.php" method="post">
                        <input type="hidden" name="id_fabricante" value=<?php echo $fabricante[0]?>>
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>

                <!-- Boton para actualizar el fabricante -->
                <td class="text-center">
                    <form action="FormularioActualizarFabricantes.php" method="post" >
                        <input type="hidden" name="id_fabricante" value=<?php echo $fabricante[0]?>>
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






