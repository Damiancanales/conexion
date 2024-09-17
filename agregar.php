<!-- Parte HTML -->
Bienvenido: <?php echo htmlspecialchars($_POST["nombre"]); ?><br>
Su Id es: <?php echo htmlspecialchars($_POST["cedula"]); ?><br>
Su Edad es: <?php echo htmlspecialchars($_POST["edad"]); ?><br>
Su correo es: <?php echo htmlspecialchars($_POST["correo"]); ?><br>

<?php
    // Variables obtenidas del formulario mediante POST
    $cedula = $_POST["cedula"];
    $nombre = $_POST["nombre"];
    $edad = $_POST["edad"];
    $correo = $_POST["correo"];

    // Incluimos el archivo de conexión
    include "conexion.php";

    // SQL para insertar los valores en la base de datos
    $sql = "INSERT INTO persona (cedula, nombre, edad, correo) VALUES ('$cedula', '$nombre', '$edad', '$correo')";

    // Comprobar si la consulta fue exitosa
    if ($conn->query($sql) === TRUE) {
        echo "Nuevo registro creado exitosamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Cerrar la conexión
    $conn->close();
?>
