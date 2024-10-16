<?php
include 'db.php';

$sql = "SELECT * FROM productos";
$stmt = $conn->prepare($sql);
$stmt->execute();
$productos = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Productos</title>
</head>
<body>
    <h2>Lista de Productos</h2>
    <a href="agregar_producto.php">Agregar Nuevo Producto</a>
    <table>
        <tr>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Descripción</th>
            <th>Imagen</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($productos as $producto): ?>
            <tr>
                <td><?php echo $producto['nombre']; ?></td>
                <td><?php echo $producto['precio']; ?></td>
                <td><?php echo $producto['descripcion']; ?></td>
                <td><img src="<?php echo $producto['imagen']; ?>" alt="Imagen del producto" width="100"></td>
                <td>
                    <a href="editar_producto.php?id=<?php echo $producto['id']; ?>">Editar</a>
                    <a href="eliminar_producto.php?id=<?php echo $producto['id']; ?>">Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
