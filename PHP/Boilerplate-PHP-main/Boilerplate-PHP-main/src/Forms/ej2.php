<?php
session_start();
$mensaje = "";
$usuarioValido = "admin";
$passwordValido = "1234";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["usuario"];
    $password = $_POST["password"];

    if ($usuario === $usuarioValido && $password === $passwordValido) {
        $_SESSION["user_id"] = 1;
        $mensaje = "Bienvenido, $usuario";
    } else {
        $mensaje = "Usuario o contraseña incorrectos";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <h2>Inicio de Sesión</h2>
    <?php if ($mensaje) echo "<div>$mensaje</div>"; ?>
    <?php if (!isset($_SESSION["user_id"])): ?>
    <form method="post">
        Usuario: <input type="text" name="usuario" required><br><br>
        Contraseña: <input type="password" name="password" required><br><br>
        <input type="submit" value="Entrar">
    </form>
    <?php endif; ?>
</body>
</html>
