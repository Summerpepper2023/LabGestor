<?php
include '../conexionDB.php';

// Validar que `id_cliente` fue recibido correctamente por el formulario
if (!isset($_POST['id_cliente'])) {
    echo "<script>
        alert('No se recibió el ID del cliente.');
        location.href = 'ConsultarClientes.php';
    </script>";
    exit;
}

$id_cliente = $_POST['id_cliente'];

// Consultar la información del cliente
$sql = "SELECT * FROM clientes WHERE id_cliente = ?";
$cliente = $conexion->prepare($sql);
$cliente->bind_param("i", $id_cliente);
$cliente->execute();
$result = $cliente->get_result();
$datos_cliente = $result->fetch_assoc();

if (!$datos_cliente) {
    echo "<script>
        alert('No se encontró el cliente.');
        location.href = 'ConsultarClientes.php';
    </script>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Cliente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <main>
        <div class="container p-5 w-50 border rounded-5 mt-5">
            <h1 class="text-center mb-4">Actualizar Cliente</h1>
            <form action="../programas/ActualizarClientes.php" method="post" class="form">

                <!-- Campo oculto para pasar el ID del cliente -->
                <input type="hidden" name="id_cliente" value="<?php echo htmlspecialchars($id_cliente); ?>">

                <!-- Campo de Nombre -->
                <div class="mb-3">
                    <label for="nombre_cliente" class="form-label">Nombre del Cliente</label>
                    <input type="text" name="nombre_cliente" class="form-control" value="<?php echo htmlspecialchars($datos_cliente['nombre_cliente']); ?>" required>
                </div>

                <!-- Campo de Dirección -->
                <div class="mb-3">
                    <label for="direccion_cliente" class="form-label">Dirección del Cliente</label>
                    <input type="text" name="direccion_cliente" class="form-control" value="<?php echo htmlspecialchars($datos_cliente['direccion_cliente']); ?>" required>
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

<?php
// Cerrar la conexión y la declaración
$cliente->close();
$conexion->close();
?>





