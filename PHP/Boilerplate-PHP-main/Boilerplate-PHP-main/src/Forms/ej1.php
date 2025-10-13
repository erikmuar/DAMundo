<?php
$mensaje = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = trim($_POST["nombre"]);
    $apellido = trim($_POST["apellido"]);
    $email = trim($_POST["email"]);
    $fecha = $_POST["fecha"];

    $errores = [];

    if (empty($nombre) || empty($apellido) || empty($email) || empty($fecha)) {
        $errores[] = "Todos los campos son obligatorios.";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errores[] = "El correo no es válido.";
    }

    $fechaNacimiento = DateTime::createFromFormat('Y-m-d', $fecha);
    $hoy = new DateTime();
    if ($fechaNacimiento === false) {
        $errores[] = "Fecha inválida.";
    } else {
        $edad = $hoy->diff($fechaNacimiento)->y;
        if ($edad < 18) {
            $errores[] = "Debes tener al menos 18 años.";
        }
    }

    if ($errores) {
        $mensaje = "<ul><li>" . implode("</li><li>", $errores) . "</li></ul>";
    } else {
        $mensaje = "Registro exitoso:<br>Nombre: $nombre<br>Apellido: $apellido<br>Correo: $email<br>Fecha: $fecha";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro</title>
</head>
<body>
    <h2>Registro de Usuario</h2>
    <?php if ($mensaje) echo "<div>$mensaje</div>"; ?>
    <form method="post">
        Nombre: <input type="text" name="nombre" required><br><br>
        Apellido: <input type="text" name="apellido" required><br><br>
        Correo: <input type="email" name="email" required><br><br>
        Fecha de nacimiento: <input type="date" name="fecha" required><br><br>
        <input type="submit" value="Registrarse">
    </form>
</body>
</html>
