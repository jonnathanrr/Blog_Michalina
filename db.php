<?php
$host = 'localhost'; // Cambia si es necesario
$db = 'blog_michalina';
$user = 'root'; // Cambia si tienes otro usuario
$pass = ''; // Cambia si tienes otra contraseña

try {
    $conn = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}
?>
