<?php 
    $cedula = $_get["cedula"];

    $sql = "DELETE FROM persona WHERE cedula='$cedula'";
    $conn->query(query: $sql);

    header(header: 'Location: ./ ');
?>