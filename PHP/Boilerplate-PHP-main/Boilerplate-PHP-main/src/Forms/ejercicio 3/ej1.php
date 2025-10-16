<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro Básico</title>
</head>
<body>
    <h2>Formulario de Registro</h2>

    <form method="post">
        Nombre: <input type="text" name="nombre"><br><br>
        Apellido: <input type="text" name="apellido"><br><br>
        Correo: <input type="text" name="email"><br><br>
        Fecha de nacimiento: <input type="date" name="fecha"><br><br>
        <input type="submit" value="Registrarse">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $email = $_POST["email"];
        $fecha = $_POST["fecha"];

        if (empty($nombre) || empty($apellido) || empty($email) || empty($fecha)) {
            echo "<p style='color:red;'>Por favor completa todos los campos.</p>";
        }
        elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "<p style='color:red;'>El correo no es válido. Usa el formato nombre@dominio.com</p>";
        }
        else {
            $nacimiento = new DateTime($fecha);
            $hoy = new DateTime();
            $edad = $hoy->diff($nacimiento)->y;

            if ($edad < 18) {
                echo "<p style='color:red;'>Debes tener al menos 18 años para registrarte.</p>";
            } else {
                echo "<h3>Registro exitoso</h3>";
                echo "Nombre: $nombre<br>";
                echo "Apellido: $apellido<br>";
                echo "Correo: $email<br>";
                echo "Fecha de nacimiento: $fecha<br>";
                echo "Edad: $edad años<br>";
            }
        }
    }
    ?>
</body>
</html>
