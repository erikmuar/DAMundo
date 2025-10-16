<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pruebas</title>
</head>
<body>


<?php

    $nombre = "Juan";

    $edad = 24;


    // include("dameDatos.php"); // include nos sirve para tener funciones en otro archivo y poder importarlo cuando queramos usarlo, si ponemos include a un archivo que no existe, no pasa nada, aparece error pero se ejecuta igual

        // include("dameDatossss.php");

    require("dameDatos.php"); // require es lo mismo pero si está mal puesto el nombre del archivo peta todo y no imprime nada, no como en include que si hace el resto de cosas

            //require("dameDatossss.php)



echo "El nombre del usuario es " . $nombre . " y su edad es " . $edad . " años <br>" ;

dameDatos();

// Las variables que hay fuera de una funcion no pueden ser accedidas dentro de otra funcion, si digo de hacer print a nombre que tengo declarado arriba, no puedo porque esta fuera de la función

function imprimirNombre()
{
    global $nombre; // global hace que los cambios que hagas dentro de la funcion afecten a todo el archivo, como el cambio de una variable creada fuera 

    $nombre = "Carlos";
}

imprimirNombre();

echo $nombre;

?>
</body>
</html>
