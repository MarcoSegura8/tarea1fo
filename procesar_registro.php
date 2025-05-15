<?php
require 'conexion_db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $conn->real_escape_string($_POST['nombre']);
    $apellido = $conn->real_escape_string($_POST['apellido']);
    $fecha = $conn->real_escape_string($_POST['fecha']);
    $genero = $conn->real_escape_string($_POST['genero']);
    $username = $conn->real_escape_string($_POST['username']);
    $password = $_POST['password'];
    $confirmar = $_POST['confirmar'];

    if ($password !== $confirmar) {
        die(" Las contraseñas no coinciden.");
    }

    // Verifica si el usuario ya existe
    $check = $conn->query("SELECT id FROM users WHERE username = '$username'");
    if ($check->num_rows > 0) {
        die(" El nombre de usuario ya está en uso.");
    }

    $clave_segura = hash('sha256', $password);

    $sql = "INSERT INTO users (nombre, apellido, fecha_registro, genero, username, password)
            VALUES ('$nombre', '$apellido', '$fecha', '$genero', '$username', '$clave_segura')";

    if ($conn->query($sql) === TRUE) {
        echo " Usuario registrado exitosamente. <a href='formulario_login.html'>Iniciar sesión</a>";
    } else {
        echo " Error al registrar: " . $conn->error;
    }
}
?>
