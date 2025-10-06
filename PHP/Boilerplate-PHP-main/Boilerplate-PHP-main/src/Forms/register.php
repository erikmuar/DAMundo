
<?php
// register.php
session_start();

$errors = [];
$data = ['nombre'=>'','apellido'=>'','email'=>'','nacimiento'=>''];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // 1) Todos completos
    foreach ($data as $k => $_) {
        $data[$k] = trim($_POST[$k] ?? '');
        if ($data[$k] === '') { $errors[$k] = 'Campo obligatorio.'; }
    }

    // 2) Email válido
    if ($data['email'] !== '' && !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Correo no válido (formato nombre@dominio.com).';
    }

    // 3) Fecha válida y ≥ 18
    if ($data['nacimiento'] !== '') {
        try {
            $dob = new DateTime($data['nacimiento']);
            $today = new DateTime('today');
            $age = $dob->diff($today)->y;
            if ($age < 18) { $errors['nacimiento'] = 'Debes tener al menos 18 años.'; }
        } catch (Exception $e) {
            $errors['nacimiento'] = 'Fecha no válida.';
        }
    }

    if (empty($errors)) {
        // Mostramos info proporcionada (sin BBDD)
        $_SESSION['registro_ok'] = $data;
        // PRG
        header('Location: register.php');
        exit;
    }
}
$ok = $_SESSION['registro_ok'] ?? null;
unset($_SESSION['registro_ok']);
?>
<!doctype html>
<html lang="es">
<head><meta charset="utf-8"><title>Registro</title></head>
<body>
<h1>Formulario de Registro Básico</h1>

<?php if ($ok): ?>
  <h2>Registro correcto</h2>
  <ul>
    <li><strong>Nombre:</strong> <?= htmlspecialchars($ok['nombre']) ?></li>
    <li><strong>Apellido:</strong> <?= htmlspecialchars($ok['apellido']) ?></li>
    <li><strong>Email:</strong> <?= htmlspecialchars($ok['email']) ?></li>
    <li><strong>Fecha de nacimiento:</strong> <?= htmlspecialchars($ok['nacimiento']) ?></li>
  </ul>
<?php endif; ?>

<form method="post" novalidate>
  <label>Nombre:
    <input name="nombre" value="<?= htmlspecialchars($data['nombre']) ?>">
    <small style="color:red"><?= $errors['nombre'] ?? '' ?></small>
  </label><br><br>

  <label>Apellido:
    <input name="apellido" value="<?= htmlspecialchars($data['apellido']) ?>">
    <small style="color:red"><?= $errors['apellido'] ?? '' ?></small>
  </label><br><br>

  <label>Email:
    <input type="email" name="email" value="<?= htmlspecialchars($data['email']) ?>">
    <small style="color:red"><?= $errors['email'] ?? '' ?></small>
  </label><br><br>

  <label>Fecha de nacimiento:
    <input type="date" name="nacimiento" value="<?= htmlspecialchars($data['nacimiento']) ?>">
    <small style="color:red"><?= $errors['nacimiento'] ?? '' ?></small>
  </label><br><br>

  <button type="submit">Registrarme</button>
</form>

<p><a href="login.php">Ir a Inicio de Sesión</a> · <a href="books.php">Gestión de Libros</a> · <a href="upload.php">Subida de Archivos</a></p>
</body>
</html>

