<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<h1>Ejercicio 1</h1>

<?php
 phpinfo();
?>

<h1>Ejercicio 2</h1>

 
<?php
    echo $_SERVER['HTTP_USER_AGENT'];
?>

<h1>Ejercicio 3</h1>

<?php
    echo "<h3>Ejercicio 03</h3>";
    $arr = ['PHP', 3, true, null, 3.14];
    echo "<pre>";
    var_dump($arr);
    echo "</pre>";
?>

<h1>Ejercicio 4</h1>

<?php
    $num1 = 2;
    $num2 = 0;
    do {
        $result = $num1**$num2;
        echo "$num1 ^ $num2 = $result <br>";
        $num2++;
    } while ($num2 <= 10);
?>

<h1>Ejercicio 5</h1>

<?php
    echo "<h3>Ejercicio 05</h3>";
    $numero = -5;

    // If-Else
    if ($numero > 0) {
        echo "$numero es positivo<br>";
    } elseif ($numero < 0) {
        echo "$numero es negativo<br>";
    } else {
        echo "$numero es cero<br>";
    }

    // Switch-Case
    switch (true) {
        case ($numero > 0):
            echo "$numero es positivo (switch)<br>";
            break;
        case ($numero < 0):
            echo "$numero es negativo (switch)<br>";
            break;
        default:
            echo "$numero es cero (switch)<br>";
    }
?>

<h1>Ejercicio 6</h1>


<?php
    echo "<h3>Ejercicio 06</h3>";
    $suma = 0;
    for ($i = 1; $i <= 100; $i++) {
        $suma += $i;
    }
    echo "La suma del 1 al 100 es: $suma<br>";
?>

<h1>Ejercicio 7</h1>

<?php
    echo "<h3>Ejercicio 07</h3>";
    $num = 1;
    while ($num <= 10) {
        echo $num . "<br>";
        $num++;
    }
?>

<h1>Ejercicio 8</h1>


<?php
    echo "<h3>Ejercicio 08</h3>";
    $dia = 3;
    switch ($dia) {
        case 1: echo "Lunes<br>"; break;
        case 2: echo "Martes<br>"; break;
        case 3: echo "Miércoles<br>"; break;
        case 4: echo "Jueves<br>"; break;
        case 5: echo "Viernes<br>"; break;
        case 6: echo "Sábado<br>"; break;
        case 7: echo "Domingo<br>"; break;
        default: echo "Número inválido<br>";
    }
?>


<h1>Ejercicio 9</h1>

<?php
    echo "<h3>Ejercicio 09</h3>";
    $n = 7;
    if ($n % 2 == 0) {
        echo "$n es par<br>";
    } else {
        echo "$n es impar<br>";
    }
?>

<h1>Ejercicio 10 </h1>


<?php
    echo "<h3>Ejercicio 10</h3>";
    for ($i = 1; $i <= 10; $i++) {
        echo "<strong>Tabla del $i:</strong><br>";
        for ($j = 1; $j <= 10; $j++) {
            echo "$i x $j = " . ($i * $j) . "<br>";
        }
        echo "<br>";
    }
?>



</body>
</html>