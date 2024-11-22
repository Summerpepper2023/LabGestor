<?php
    include '../conexionDB.php';

    $sql = "SELECT * FROM registro_entrada_productos";
    $result = mysqli_query($conexion, $sql);
    $productos = mysqli_fetch_all($result);
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta los Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container-fluid my-5">
    <div class="w-100 d-flex alig-items-center justify-content-between mb-4 ">
        <h2 class="text-center">Consulta los Productos</h2>
        <a href="RegistroProductos.php" class="btn btn-success">Registrar Productos</a>
    </div>


<!-- Se crea la tabla para reenderizar productos -->
<table class="table table-striped table-bordered">
    <!-- Se crea el encabezado de la tabla -->
    <thead>
        <!-- Se crea la fila para los encabezados de la tabla -->
        <tr>
            <!-- Se definen los encabezados -->
            <th>Numero de Registro</th>
            <th>Nombre del Producto</th>
            <th>Proposito del Analisis</th>
            <th>Condiciones Ambientales</th>
            <th>Fecha de Recepcion </th>
            <th>Fecha Incial del Analisis</th>
            <th>Fecha Final del Analisis</th> 
            <th>Usuario Responsable</th>
            <th>Eliminar Producto</th>
            <th>Actualizar Producto</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($productos as $producto): ?>
            <tr>
                <td><?php echo $producto[0]?></td>
                <td><?php echo $producto[1]?></td>
                <td><?php echo $producto[2]?></td>
                <td><?php echo $producto[3]?></td>
                <td><?php echo $producto[4]?></td>
                <td><?php echo $producto[5]?></td>
                <td><?php echo $producto[6]?></td>
                <td><?php echo $producto[7]?></td>
                

                <!-- Boton para eliminar el producto -->
                <td class="text-center">
                    <form action="../programas/EliminarProductos.php" method="post">
                        <input type="hidden" name="numero_registro_producto" value=<?php echo $producto[0]?>>
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>

                <!-- Boton para actualizar el producto -->
                <td class="text-center">
                    <form action="FormularioActualizarProductos.php" method="post" >
                        <input type="hidden" name="numero_registro_producto" value=<?php echo $producto[0]?>>
                        <button type="submit" class="btn btn-primary">Actualizar </button>
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