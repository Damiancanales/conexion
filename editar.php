<?php

$cedula = $_POST["cedula"];
$nombre = $_POST["nombre"];
$edad = $_POST["edad"];
$correo = $_POST["correo"];


include "conexion.php";

$sql = "UPDATE persona SET nombre='$nombre',
edad='$edad',
correo='$correo'
where cedula='$cedula'";

$con->query(query: $sql);

header(header: 'Location: ./ ');
?>