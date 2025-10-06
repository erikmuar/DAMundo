import Foundation

/*A01 Escribe el código SWIFT equivalente al siguiente código Java
 int matematicas = 10;
 int lenguaCastellana = 8;
 int ingles = 10;
 int ccnn = 10;
 int ccss = 5;
 double media = ((double)(matematicas + lenguaCastellana + ingles + ccnn + ccss))/5;
System.out.println("La nota media es: "+media); //8.6
 
Comprueba que la nota media es un número decimal
 */

var matematicas: Double = 10.0
var lenguaCastellana: Double = 8.0
var ingles: Double = 10.0
var ccnn: Double = 10.0
var ccss: Double = 5.0

var media: Double = (matematicas + lenguaCastellana + ingles + ccnn + ccss)/5

print("La nota media es: \(media)")


/*A02 Escribe el código SWIFT que declare e inicialice una variable que contenga el valor de la longitud del lado de un cuadrado y otra variable con el radio de un círculo. Calcula el área del cuadrado y del círculo y muéstralo por consola.
 
 HINT: El número PI es 3.1416….. El tipo de dato Double dispone de la constante Double.pi que permite representar el número PI con todos sus decimales
 */


var longitudLado: Int = 4

var radio: Double = 5.5

var areaCuadrado = longitudLado * longitudLado

var areaCirculo = Double.pi * radio * radio 

print("El area del cuadrado es \(areaCuadrado) y la del círculo es \(areaCirculo)")




/*A03 Escribe el código SWIFT que dado un número entero, muestre por consola "es par" si es par y "es impar" si es impar. Usa el operador ternario a ? b : c
 
 HINT: un número es par si el resto de dividir por 2 es 0.
 */



let numero = 7  

let resultado = (numero % 2 == 0) ? "Es un número par" : "Es un número impar"

print(resultado)


/*
 A04
 Declare una tuple que contenga 3 valores Int que usaras para representar una fecha (mes, dia, año).
 Recuerda indicar los nombres de los componentes (month, day, year) para evitar confusiones.
 En una línea lee el día y el mes en dos variables y muestralas por consola
*/




var fecha = (month: 5, day: 2, year: 2025)

let (mes, dia, _) = fecha  

print("Mes: \(mes), Día: \(dia)")

print(fecha)


/*A05 La compañía de vuelo LaSalleAir establece que cada pasajero puede subir a bordo una maleta de mano cuyo peso no sobrepase los 10 kg, y tenga unas dimensiones máximas de 55 cm x 40 cm x 20 cm (altura x anchura x profundidad), debido al espacio limitado en cabina. Los pasajeros que superen alguna de estas restricciones tendrán que facturar su equipaje. Escribe el código SWIFT que dado el peso y las dimensiones de una maleta, muestre por consola true si tiene que facturar su maleta de mano o false en caso contrario.
 */

let peso = 15
let alto = 50 
let ancho = 39
let profundidad = 18
let facturar =  (peso > 10 || alto > 55 || ancho > 40 || profundidad > 20)





/*A06
 Crea una constante llamada parsedInt y asignale el valor Int("10"), que intenta parsear la string 10 y convertirla a Int. Usa Option-Click sobre parsedInt ¿Cual es tipo de tu variable parsedInt?, ¿por qué es optional?
 Cambia el valor de parsedInt a un valor no entero por ejemplo "dog". ¿Cual es el tipo de tu variable parsedInt ahora?
 */

let parsedInt = Int("10")

// Es opcional porque estas convirtiendo un dato a otro tipo de dato por lo que no sabes si se podrá hacer o no 



/*A07
 Declara una variable del tipo optional String llamada myFavoriteSong. Si tienes una canción favorita, asignale valor a tu variable. Si  tienes más de una canción favorita o no tienes ninguna asignale el valor nil.
 
 Usa optional binding para verificar si tu variable myFavoriteSong contiene valor. Si lo tiene, muestralo por consola. Si no lo tiene muestra un mensaje tipo "I don’t have a favorite song"
 
 Cambia el valor de myFavoriteSong al opuesto del valor que tenga asignado ahora. Si es nil, asignale una string. Si es una string asignale nil. Observa como cambia la salida por consola.

 */

    let myFavoriteSong: String? = nil 

    print(myFavoriteSong)




/*A08
 Swift permite calcular valores aleatorios Int, Float, Double, incluso Bool de forma muy sencilla usando Range Operators.
 Asi por  ejemplo let number = Int.random(in: 0...10), permite calcular un valor entero  aleatorio entre 0 y 10 ambos incluidos.
 a. Calcula un número entero aleatorio entre 1 y 100, sin incluir el 100
 b. Calcula un número double aleatorio entre 0 y 1, incluidos ambos
 c. Calcula un valor Bool aleatorio

 */

    let aleatorio1: Int = Int.random(in: 1 ...99)
    let aleatorio2: Double = Double.random(in: 0...1)
    let aleatorio3: Bool = Bool.random()

    print(aleatorio1) 
    print(aleatorio2) 
    print(aleatorio3) 


/*A09
 Dada una string con el nombre de un usuario y una string con los apellidos de un usuario. Crea una string que contenga el nombre completo. Crea otra string que contenga el nombre y apellidos de otro usuario. Compara los nombres de ambos usuarios (ignore case) mostrando por consola si son iguales o no
 */

let nombre = "Carlos "
let apellidos= "Jofre Himenez"

let completo = nombre + apellidos

print(completo)

let persona = "Juna Fernandez Lugo"


let comprobacion = (completo.caseInsensitiveCompare(persona) == .orderedSame) ? "Es el mismo nombre" : "No es el mismo nombre"

print (comprobacion)


/*A10
 Declara 3 strings, siendo uno de ellos un emoticono. Usa Swift String interpolation para construir otra string con las strings dadas
 */

let string1 = "Hola"
let string2 = " que tal"
let string3 = "🫠"

let mensaje = "\(string1) \(string2)? pues un poco \(string3) "

print(mensaje)

/*
 A11
 Dada la variable distance:

 let distance: UInt = 10
 
 Escribe una sentencia switch usando intervalos que permita lo siguiente:

 Imprima "Here" si distance es 0.
 Imprima "Immediate vicinity" si distance es menor que 5 y mayor que 0.
 Imprima "Near" si distance está entre 5 y 15, incluyendo 15.
 Imprima "Kind of far" si distance es mayor que 15 y menor o igual a 40.
 Imprima "Far" si distance supera 40.
 
 */

 let distance: UInt = 10

switch distance{
    case 0:
    print("Here")

    case 1..<5:
    print("Immediate vicinity")

    case 5...15:
    print("Near")

    case 16...40:
    print("Kind of far")
    
    default:
    print("Far")

}

/*A12
 Crea un array con 3 strings: “C”, “C++”, “Objective-C”. Añade dos nuevos elementos al array (“Swift”, “Other”) en una única sentencia. Añade un nuevo elemento en la posición 2. Muestra por consola el número de elementos del array. Muestra por consola el índice y el valor de cada item del array. Elimina el elemento “Objective-C” del array
 */

var lista: [String] = ["C", "C++", "Objective-C"]

lista += ["Swift", "Other"]

lista.insert("Python",at:2)

print(lista)

print("En la lista hay \(lista.count) items")


for (indice, item) in lista.enumerated(){

    print("Posicion \(indice): \(item)")
}


lista.remove(at:3)
print(lista)

/*A13
 Añade los valores 1138, 1337, y 4711 al final del siguiente array:
 var stuff = [4, 8, 15, 16, 23, 42]
 Usa sólamente una línea de código.
 */

var stuff = [4, 8, 15, 16, 23, 42]

stuff += [1138, 1337, 4711]

print(stuff)

/*A14 Crea un array de números y calcula la suma de todos los elementos.*/

var list = [1,2,3,4,5,6,7,8,9]

var acumulado = 0 

for numero in list{


    acumulado += numero
}

    print(acumulado)


/*A15 Crea un diccionario que posteriormente se pueda modificar llamado secretIdentities donde las parejas de clave valor sean "Hulk" -> "Bruce Banner", "Batman" -> "Bruce Wayne", and "Superman" -> "Clark Kent". Muestra por consola la identidad secreta de Batman. Reemplaza la identidad secreta de Hulk con "David Banner".
 */




/*A16 Crea un diccionario que mapee nombres de países a capitales y muestra todas las capitales.*/



/*A17 Crea dos conjuntos de número. Encuentra la intersección de ambos conjuntos. Encuentra la unión de ambos conjuntos*/


/*A18 Crea un diccionario que contenga nombres de personas y un conjunto de sus intereses. Luego, muestra los intereses de una persona específica. Por ejemplo los intereses de Juan son Musica, Deporte, ... Los de María: Arte, Viajes, ...*/


/*Ahora actualiza los intereses de una de las personas*/


/* A19  Dada la variable animal:

 let animal = "tiger"
 
 Escribe por consola:
     "Animal is a tiger" y también "Animal is a cat" si animal es "tiger".
     "Animal is a cat" si animal es "cat".
     "Animal is some other type of animal" si animal no es ni cat ni tiger.
 */


/* A20  Dada la variable edad:

 let age = 25
 
 Escribe por consola:
     "Eres menor de edad" si age es menor que 18
     "Eres adulto joven y tienes una edad par" si age es 18 o superior pero menor que 30 y tu age es par
     "Eres adulto joven y tienes una edad impar" si age es 18 o superior pero menor que 30 y tu age es impar
     "Eres adulto" si age es 30 o superior pero menor que 65
     "Eres un adulto mayor" si age es mayor que 65
 */

