<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Subir Imagen</title>
</head>
<body>
    <h2>Subir Imagen</h2>

    <form action="" method="post" enctype="multipart/form-data">
        <p>Elige una imagen (JPG, PNG o GIF, máx. 2MB):</p>
        <input type="file" name="imagen">
        <br><br>
        <input type="submit" name="subir" value="Subir">
    </form>

    <?php
    if (isset($_POST['subir'])) {

        if (isset($_FILES['imagen'])) {
            $imagen = $_FILES['imagen'];
            $nombre = $imagen['name'];
            $tipo = $imagen['type'];
            $tamano = $imagen['size'];
            $tmp = $imagen['tmp_name'];

            if ($tamano > 2000000) {
                echo "<p style='color:red;'>El archivo es demasiado grande (máx. 2MB).</p>";
            } elseif ($tipo != "image/jpeg" && $tipo != "image/png" && $tipo != "image/gif") {
                echo "<p style='color:red;'>Solo se permiten imágenes JPG, PNG o GIF.</p>";
            } else {
                if (!file_exists("uploads")) {
                    mkdir("uploads");
                }

                $destino = "uploads/" . $nombre;
                if (move_uploaded_file($tmp, $destino)) {
                    echo "<p style='color:green;'>Imagen subida con éxito.</p>";
                } else {
                    echo "<p style='color:red;'>Error al subir la imagen.</p>";
                }
            }
        } else {
            echo "<p style='color:red;'>No se seleccionó ninguna imagen.</p>";
        }
    }
    ?>
</body>
</html>
