<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Subida de Archivos</title>
</head>
<body>
    <h2>Subir Imagen</h2>
    <form method="post" enctype="multipart/form-data" action="">
        Selecciona una imagen (JPG, PNG, GIF, máx. 2MB):<br><br>
        <input type="file" name="archivo"><br><br>
        <input type="submit" name="subir" value="Subir">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_FILES['archivo']) && $_FILES['archivo']['error'] == 0) {
            $archivo = $_FILES['archivo'];
            $tamanoMax = 2 * 1024 * 1024; 
            $permitidos = ['image/jpeg', 'image/png', 'image/gif'];

            if ($archivo['size'] > $tamanoMax) {
                echo "<p style='color:red;'>El archivo supera los 2MB permitidos.</p>";
            } elseif (!in_array($archivo['type'], $permitidos)) {
                echo "<p style='color:red;'>Solo se permiten imágenes JPG, PNG o GIF.</p>";
            } else {
                $directorio = "uploads/";
                if (!file_exists($directorio)) {
                    mkdir($directorio, 0777, true);
                }
                $rutaDestino = $directorio . basename($archivo['name']);
                if (move_uploaded_file($archivo['tmp_name'], $rutaDestino)) {
                    echo "<p style='color:green;'>Archivo subido correctamente.</p>";
                    echo "<img src='$rutaDestino' width='200'>";
                } else {
                    echo "<p style='color:red;'>Error al mover el archivo.</p>";
                }
            }
        } else {
            echo "<p style='color:red;'>No se seleccionó ningún archivo o hubo un error en la subida.</p>";
        }
    }
    ?>
</body>
</html>
