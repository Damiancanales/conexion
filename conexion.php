<?php
// Datos de conexión
$servername = "localhost"; // Servidor
$username = "root"; // Usuario
$password = ""; // Contraseña
$dbname = "bs1"; // Nombre de la base de datos

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Comprobar la conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Conexión exitosa"; // Mensaje de éxito opcional
?>

