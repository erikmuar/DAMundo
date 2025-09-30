<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <h1>Ejercicio 1 </h1>
  <?php
/*
  Crea una variable llamada “texto” con el valor “Hello world!”

Imprímela por pantalla
Imprímela pasando todas las letras a mayúsculas y luego minúsculas
Cuenta el número de dígitos de la variable “texto”

*/


    $texto = "Hello World! \n";

    echo "$texto <br>";

    $mayusculas = strtoupper($texto);

    echo  "$mayusculas <br>";

    $minusculas = strtolower($texto);

    echo "$minusculas <br>";

    echo strlen($texto);

    ?>

<?php

/*
Ejercicio 02
Dada la dirección web https://gracia.sallenet.org/login/index.php, devuelve el nombre del archivo php (index) de dos formas:

Usando substrings.
Usando la función “explode”.

*/


$url = "https://gracia.sallenet.org/login/index.php";

/* 1) Usando substrings  */
// Busco la última aparición de "/"
$pos = strrpos($url, "/");

print("$pos");

// Extraigo desde esa posición + 1
$archivo = substr($url, $pos + 1);

print("$archivo");


// Quito la extensión .php
$nombreArchivo1 = substr($archivo, 0, -4); // -4 = ".php"

echo "Usando substrings: $nombreArchivo1\n";

/* --- 2) Usando explode --- */
// Divido la URL por "/"
$partes = explode("/", $url);
// Me quedo con el último elemento
$archivo2 = end($partes);
// Quito la extensión .php
$nombreArchivo2 = explode(".", $archivo2)[0];

echo "Usando explode: $nombreArchivo2\n";

?>

<?php
$ciudades = [
    ["Tokyo", "Japan", "Asia"],
    ["Mexico City", "Mexico", "North America"],
    ["New York City", "USA", "North America"],
    ["Mumbai", "India", "Asia"],
    ["Seoul", "Korea", "Asia"],
    ["Shanghai", "China", "Asia"],
    ["Chicago", "USA", "North America"],
    ["Buenos Aires", "Argentina", "South America"],
    ["Cairo", "Egypt", "Africa"],
    ["London", "UK", "Europe"]
];

$contUSA = 0;
$contNA = 0;

foreach ($ciudades as $c) {
    if ($c[1] === "USA") $contUSA++;
    if ($c[2] === "North America") $contNA++;
}

echo "USA aparece: $contUSA veces\n";
echo "North America aparece: $contNA veces\n";
?>

<?php

// Ejercicio 4 Ejercicio 04
// Escribe un script que calcule y devuelva por pantalla las 10 primeras potencias de 2 (2^2, 2^3, …) utilizando bucles.
function eliminarValor($array, $valor) {
    return array_values(array_filter($array, fn($v) => $v !== $valor));
}

// Ejemplo
$arr = [1, 2, 3, 2, 4];
print_r(eliminarValor($arr, 2));
?>

<?php

// Ejercicio 5
function quitarDuplicados($array) {
    return array_values(array_unique($array));
}

$arr = [1, 2, 2, 3, 4, 4, 5];
print_r(quitarDuplicados($arr));
?>

<?php
function analizarNumero($valor) {
    if (!is_numeric($valor)) {
        return "El valor no es un número";
    }
    $valor = abs((int)$valor);
    $digitos = strlen((string)$valor);
    $suma = array_sum(str_split($valor));
    return [
        "digitos" => $digitos,
        "suma" => $suma
    ];
}

// Ejemplo
print_r(analizarNumero(12345));
?>


<?php
class Vehiculo {
    public $matricula;
    public $potencia;
    public $velocidadMedia;

    public function __construct($matricula, $potencia, $velocidadMedia) {
        $this->matricula = $matricula;
        $this->potencia = $potencia;
        $this->velocidadMedia = $velocidadMedia;
    }

    public function calcularTiempo($distancia) {
        return $distancia / $this->velocidadMedia;
    }
}

class Terrestre extends Vehiculo {
    public $numRuedas;
    public $capacidadMaletero;
    public $railesCarretera;

    public function __construct($matricula, $potencia, $velocidadMedia, $numRuedas, $capacidadMaletero, $railesCarretera) {
        parent::__construct($matricula, $potencia, $velocidadMedia);
        $this->numRuedas = $numRuedas;
        $this->capacidadMaletero = $capacidadMaletero;
        $this->railesCarretera = $railesCarretera;
    }
}

class Maritimo extends Vehiculo {
    public $esloraTotal;
    public $esloraFlotacion;
    public $numHelices;

    public function __construct($matricula, $potencia, $velocidadMedia, $esloraTotal, $esloraFlotacion, $numHelices) {
        parent::__construct($matricula, $potencia, $velocidadMedia);
        $this->esloraTotal = $esloraTotal;
        $this->esloraFlotacion = $esloraFlotacion;
        $this->numHelices = $numHelices;
    }

    public function calcularPrecio($esloraTotal, $potencia)
    {
        return 2500 * $esloraTotal * $potencia;
    }
}
?>

<?php
$auto = new Terrestre("1234ABC", 150, 100, 4, 450, false);
echo "Tiempo en recorrer 200 km: " . $auto->calcularTiempo(200) . " horas\n";

$barco = new Maritimo("M456XYZ", 300, 40, 30, 28, 2);
echo "Precio del barco: " . $barco->calcularPrecio($barco->esloraTotal, $barco->potencia) . "\n";
?>



</body>
</html>
