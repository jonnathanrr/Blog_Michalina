<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $descripcion = $_POST['descripcion'];
    $imagen = $_POST['imagen'];

    $sql = "UPDATE productos SET nombre=?, precio=?, descripcion=?, imagen=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$nombre, $precio, $descripcion, $imagen, $id]);

    header("Location: ver_productos.php");
    exit();
}

$id = $_GET['id'];
$sql = "SELECT * FROM productos WHERE id=?";
$stmt = $conn->prepare($sql);
$stmt->execute([$id]);
$producto = $stmt->fetch();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Producto</title>
</head>
<body>
    <h2>Editar Producto</h2>
    <form method="POST">
        <input type="hidden" name="id" value="<?php echo $producto['id']; ?>">
        <label>Nombre:</label>
        <input type="text" name="nombre" value="<?php echo $producto['nombre']; ?>" required>
        <br>
        <label>Precio:</label>
        <input type="text" name="precio" value="<?php echo $producto['precio']; ?>" required>
        <br>
        <label>Descripción:</label>
        <textarea name="descripcion" required><?php echo $producto['descripcion']; ?></textarea>
        <br>
        <label>Imagen:</label>
        <input type="text" name="imagen" value="<?php echo $producto['imagen']; ?>" required>
        <br>
        <input type="submit" value="Actualizar Producto">
    </form>
</body>
</html>
