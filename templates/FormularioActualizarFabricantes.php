<?php
include '../conexionDB.php';

// Validar que `id_fabricante` fue recibido correctamente por el formulario
if (!isset($_POST['id_fabricante'])) {
    echo "<script>
        alert('No se recibió el ID del fabricante.');
        location.href = 'ConsultarFabricantes.php';
    </script>";
    exit;
}

$id_fabricante = $_POST['id_fabricante'];

// Consultar la información del fabricante
$sql = "SELECT * FROM fabricantes WHERE id_fabricante = ?";
$fabricante = $conexion->prepare($sql);
$fabricante->bind_param("i", $id_fabricante);
$fabricante->execute();
$result = $fabricante->get_result();
$datos_fabricante = $result->fetch_assoc();

if (!$datos_fabricante) {
    echo "<script>
        alert('No se encontró el fabricante.');
        location.href = 'ConsultarFabricantes.php';
    </script>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Fabricante</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <main>
        <div class="container p-5 w-50 border rounded-5 mt-5">
            <h1 class="text-center mb-4">Actualizar Fabricante</h1>
            <form action="../programas/ActualizarFabricantes.php" method="post" class="form">

                <!-- Campo oculto para pasar el ID del fabricante -->
                <input type="hidden" name="id_fabricante" value="<?php echo htmlspecialchars($id_fabricante); ?>">

                <!-- Campo de Nombre -->
                <div class="mb-3">
                    <label for="nombre_fabricante" class="form-label">Nombre del Fabricante</label>
                    <input type="text" name="nombre_fabricante" class="form-control" value="<?php echo htmlspecialchars($datos_fabricante['nombre_fabricante']); ?>" required>
                </div>

                <!-- Campo de Dirección -->
                <div class="mb-3">
                    <label for="direccion_fabricante" class="form-label">Dirección del Fabricante</label>
                    <input type="text" name="direccion_fabricante" class="form-control" value="<?php echo htmlspecialchars($datos_fabricante['direccion_fabricante']); ?>" required>
                </div>

                <div class="mb-3 text-center">
                    <button type="submit" class="btn btn-success">Actualizar</button>
                    <a href="ConsultarFabricantes.php" class="btn btn-danger">Cancelar</a>
                </div>
            </form>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
// Cerrar la conexión y la declaración
$fabricante->close();
$conexion->close();
?>





