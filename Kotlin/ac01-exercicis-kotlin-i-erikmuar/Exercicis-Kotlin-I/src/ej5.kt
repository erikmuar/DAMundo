/*
5. El preu d’una Volkswagen Grand California és de 73490€, com que és una gran
inversió, en volem calcular el valor de mercat per si un dia la volem vendre de
segona mà. Sabem que perd un 0.00001% de valor pera cada quilòmetre que
recorre.
Extra: Si la Volkswagen és la versió Camper Full Equip val 20000€ més. Modifica
el teu algoritme per tal de que permeti fer el càlcul amb les dues opcions.

 */

fun main() {

    calculadora()

}


fun calculadora(){


    println("Que tipo de Volkswagen Grand California tienes ? ")
    println("1. Normal")
    println("2. Camper Full Equip")


    var opcion: Int = readLine()!!.toInt();


    var precio: Int;

    if(opcion == 2){

        precio = 93490;
    }else{

        precio = 73490;
    }

    print("Introduce cuantos km has hecho: ");

    var km: Double = readLine()!!.toDouble();

    var valor: Double = precio * (1-(0.0000001 * km));


    print("El valor de la furgoneta es $valor")
}
