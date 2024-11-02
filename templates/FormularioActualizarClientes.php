<?php
include '../conexionDB.php';
    // Se trae el id del cliente que se quiere actualizar
    $id_cliente= $_POST['id_cliente'];
    // Se trae la informacion del cliente
    $sql = "select * from clientes where id_cliente = '$id_cliente'";
    $result = mysqli_query($conexion, $sql);
    // Se abstrae la informacion del cliente en un array asociativo
    $cliente = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Clientes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <main>
        <div class="container p-5 w-50 border rounded-5 mt-5">
            <h1 class="text-center mb-4">Actualizar Cliente</h1>
            <form action="../programas/ActualizarClientes.php" method="post" class="form">


                <input type="text" name="id_cliente" value=<?php echo $id_cliente?>>
                <!-- Se hace un input que tenga como valor predeterminado la informacion del cliente -->
                <div class="mb-3">
                    <label for="nombre_cliente" class="form-label">Nombre del Cliente</label>
                    <input type="text" name="nombre_cliente" class="form-control" value="<?php echo htmlspecialchars($cliente['nombre_cliente']); ?>" required>
                </div>

                <div class="mb-3">
                    <label for="nombre_cliente" class="form-label">Direccion del Cliente</label>
                    <input type="text" name="direccion_cliente" class="form-control" value="<?php echo htmlspecialchars($cliente['direccion_cliente']); ?>" required>
                </div>
                <div class="mb-3 text-center">
                    <button type="submit" class="btn btn-success">Actualizar</button>
                    <a href="ConsultarClientes.php" class="btn btn-danger">Cancelar</a>
                </div>
            </form>
        </div>
    </main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>





