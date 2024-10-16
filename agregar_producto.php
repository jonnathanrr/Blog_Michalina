<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $descripcion = $_POST['descripcion'];
    $imagen = $_POST['imagen'];

    $sql = "INSERT INTO productos (nombre, precio, descripcion, imagen) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$nombre, $precio, $descripcion, $imagen]);

    header("Location: ver_productos.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Producto</title>
</head>
<body>
    <h2>Agregar Producto</h2>
    <form method="POST">
        <label>Nombre:</label>
        <input type="text" name="nombre" required>
        <br>
        <label>Precio:</label>
        <input type="text" name="precio" required>
        <br>
        <label>Descripción:</label>
        <textarea name="descripcion" required></textarea>
        <br>
        <label>Imagen:</label>
        <input type="text" name="imagen" required>
        <br>
        <input type="submit" value="Agregar Producto">
    </form>
</body>
</html>
