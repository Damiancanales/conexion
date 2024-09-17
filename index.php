<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Registro</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h2 class="mb-4">Formulario de Registro</h2>
        <form action="" method="POST"> <!-- Elimina redirección a welcome.php -->
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
            </div>
            <div class="form-group">
                <label for="cedula">Cédula:</label>
                <input type="text" class="form-control" id="cedula" name="cedula" required>
            </div>
            <div class="form-group">
                <label for="edad">Edad:</label>
                <input type="number" class="form-control" id="edad" name="edad" required>
            </div>
            <div class="form-group">
                <label for="correo">Correo:</label>
                <input type="email" class="form-control" id="correo" name="correo" required>
            </div>
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>

    <!-- Tabla de resultados -->
    <div class="container mt-5">
        <h3>Lista de Personas</h3>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Cédula</th>
                    <th>Nombre</th>
                    <th>Edad</th>
                    <th>Correo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include "conexion.php";

                // Procesar datos del formulario si se han enviado
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $cedula = $_POST["cedula"];
                    $nombre = $_POST["nombre"];
                    $edad = $_POST["edad"];
                    $correo = $_POST["correo"];

                    $sql = "INSERT INTO persona (cedula, nombre, edad, correo) VALUES ('$cedula', '$nombre', '$edad', '$correo')";
                    
                    if ($conn->query($sql) === TRUE) {
                        echo "<div class='alert alert-success'>Nuevo registro creado exitosamente</div>";
                    } else {
                        echo "<div class='alert alert-danger'>Error: " . $sql . "<br>" . $conn->error . "</div>";
                    }
                }

                // Mostrar los datos de la tabla
                $sql = "SELECT * FROM persona";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Output data of each row
                    while ($row = $result->fetch_assoc()) {
                        echo '<tr>
                                <td>' . $row['cedula'] . '</td>
                                <td>' . $row['nombre'] . '</td>
                                <td>' . $row['edad'] . '</td>
                                <td>' . $row['correo'] . '</td>
                                <td>
                                    <a class="btn btn-primary btn-sm" href="./editar_vista.php?cedula=' . $row['cedula'] . '&correo=' . $row['correo'] . '">
                                        <i class="bi bi-pencil-square"></i> Editar
                                    </a>
                                    <a class="btn btn-danger btn-sm" href="./eliminar.php?cedula=' . $row['cedula'] . '">
                                        <i class="bi bi-x-circle-fill"></i> Eliminar
                                    </a>
                                </td>
                            </tr>';
                    }
                } else {
                    echo '<tr><td colspan="5" class="text-center">No hay datos disponibles</td></tr>';
                }

                // Cerrar la conexión
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
