<?php include '../conexionDB.php'; 
    
    $consutaClientes = "select * from clientes";
    $resultClientes = mysqli_query($conexion, $consutaClientes);
    $clientes = mysqli_fetch_all($resultClientes);
    $consultaFabricantes= "select *from fabricantes";
    $resultFabricantes = mysqli_query($conexion, $consultaFabricantes);
    $fabricantes = mysqli_fetch_all($resultFabricantes);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Productos</title>
</head>
<body>
<h2>Registrar Productos</h2>
    <form method="POST">
        <label>Numero de Registro:</label>
        <input type="text" name="numero_registro_producto" required><br>
        <label>Nombre del Producto:</label>
        <input type="text" name="nombre_producto" required><br>
        <label>Fecha de Fabricación:</label>
        <input type="date" name="fecha_fabricacion" required><br>
        <label>Fecha de Vencimiento:</label>
        <input type="date" name="fecha_vencimiento" required><br>
        <label>Descripción del Producto:</label>
        <input type="text" name="descripcion_producto" required><br>
        <label>Producto Activo:</label>
        <input type="text" name="activo_producto" required><br>
        <label>Presentación del Producto:</label> 
        <input type="text" name="presentacion_producto" required><br>
        <label>Cantidad del Producto:</label>
        <input type="text" name="cantidad_producto" required><br>
        <label>N. Lote del Producto:</label>
        <input type="text" name="numero_lote_producto" required><br>
        <label>T. Lote del Producto:</label>
        <input type="text" name="tamano_lote_producto" required><br>
        <label>Id del Cliente:</label>
        <select name="id_cliente" id="id-cliente">
            <option disabled selected>Seleccione un Cliente</option>
            <?php
                foreach($clientes as $cliente){
                    echo "<option value=" . $cliente[0] . ">" . $cliente[1] . "</option>";
                }
            ?>
        </select><br>
        
        <label>Id del Fabricante:</label>
        <select name="id_fabricante" id="id-fabricante">
            <option disabled selected>Seleccione un Fabricante</option>
            <?php
                foreach($fabricantes as $fabricante){
                    echo "<option value=" . $fabricante[0] . ">" . $fabricante[1] . "</option>";
                }
            ?>
        </select><br>
        <label>Proposito de analisis:</label>
        <input type="text" name="proposito_analisis" required><br>
        <label>Condiciones Ambientales:</label>
        <input type="text" name="condiciones_ambientales" required><br>
        <label>Fecha de Recepcion:</label>
        <input type="date" name="fecha_recepcion" required><br>
        <label>Fecha Incio del analisis:</label>
        <input type="date" name="fecha_inicio_analisis" required><br>
        <label>Id_usuario:</label>
        <input type="text" name="id_usuario" required><br>
        <button type="submit" name="submit">Registrar Producto</button>
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $Numero_registro = $_POST['numero_registro_producto'];
        $Nombre_producto = $_POST['nombre_producto'];
        $Fecha_fabricacion = $_POST['fecha_fabricacion'];
        $Fecha_vencimiento = $_POST['fecha_vencimiento'];
        $Descripcion_producto = $_POST['descripcion_producto'];
        $Producto_activo= $_POST['activo_producto'];
        $Presentacion = $_POST['presentacion_producto'];
        $Cantidad = $_POST['cantidad_producto'];
        $Numero_lote = $_POST['numero_lote_producto'];
        $Tamaño_lote = $_POST['tamano_lote_producto'];
        $Id_cliente = $_POST['id_cliente'];
        $Id_fabricante = $_POST['id_fabricante'];
        $Proposito_analisis = $_POST['proposito_analisis'];
        $Condiciones = $_POST['condiciones_ambientales'];
        $Recepcion = $_POST['fecha_recepcion']; 
        $Inicio_analisis = $_POST['fecha_inicio_analisis'];
        $Id_usuario = 4;
        
        
        $consultaProductos = "CALL registro_producto ('$Numero_registro', '$Nombre_producto' , '$Fecha_fabricacion' , '$Fecha_vencimiento' , '$Descripcion_producto' , '$Producto_activo' , '$Presentacion' , '$Cantidad' , '$Numero_lote' , '$Tamaño_lote' , '$Id_cliente' , '$Id_fabricante' , '$Proposito_analisis', '$Condiciones', '$Recepcion', '$Inicio_analisis', '$Id_usuario')";
        mysqli_query($conexion, $consultaProductos);
        // if ($conexion->query($consultaProductos) === TRUE) {
        //     echo "<script>
        //         alert('Se registro el producto de manera exitosa.');
        //         location.href = 'ConsultarProductos.php';
        //         </script>";
        // } else {
        //     echo "Error: " . $conexion->error;
        // }
    }
    ?>
</body>
</html>