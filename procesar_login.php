<?php
session_start();
require 'conexion_db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $conn->real_escape_string($_POST['username']);
    $clave = hash('sha256', $_POST['password']);

    $sql = "SELECT * FROM users WHERE username='$usuario' AND password='$clave'";
    $resultado = $conn->query($sql);

    if ($resultado->num_rows === 1) {
        $_SESSION['usuario'] = $usuario;
        header("Location: pagina_bienvenida.php");
        exit();
    } else {
        echo "Usuario o contraseña incorrectos.";
    }
}
?>
