<?php
session_start();

$usuarioValido = "admin";
$passwordValido = "1234";
$mensaje = "";

if (isset($_SESSION["user_id"])) {
    $mensaje = "<p style='color:green;'>Bienvenido, $usuarioValido.</p>";
} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["usuario"];
    $password = $_POST["password"];

    if ($usuario === $usuarioValido && $password === $passwordValido) {
        $_SESSION["user_id"] = 1; // ID fijo
        $mensaje = "<p style='color:green;'>Bienvenido, $usuario.</p>";
    } else {
        $mensaje = "<p style='color:red;'>Usuario o contraseña incorrectos. Inténtalo de nuevo.</p>";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inicio de Sesión</title>
</head>
<body>
    <h2>Inicio de Sesión</h2>

    <?php
    if ($mensaje) {
        echo $mensaje;
    }
    ?>

    <?php if (!isset($_SESSION["user_id"])) : ?>
        <form method="post">
            Usuario: <input type="text" name="usuario" required><br><br>
            Contraseña: <input type="password" name="password" required><br><br>
            <input type="submit" value="Entrar">
        </form>
    <?php endif; ?>
</body>
</html>
