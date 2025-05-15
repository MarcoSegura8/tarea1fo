<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    header("Location: formulario_login.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Bienvenido</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <div class="bienvenida-container">
        <h2>¡Bienvenido, <?php echo htmlspecialchars($_SESSION['usuario']); ?>!</h2>
        <p>Has iniciado sesión correctamente.</p>
        <a class="boton-cerrar" href="cerrar_sesion.php">Cerrar sesión</a>
    </div>
</body>
</html>
