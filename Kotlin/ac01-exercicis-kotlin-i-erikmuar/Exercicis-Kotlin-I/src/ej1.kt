/*1. Dissenya un programa que demani a l’usuari un valor no negatiu per teclat. Si
l’usuari insereix un valor negatiu, el programa li haurà de demanar de nou el
valor fins que sigui positiu.
Extra: Modifica el teu algoritme per a què només accepti valors entre 0 i 10.
*/

fun pedirNumero() {

    var numero: Int = 0;

    do{

        print("Escribe un numero positivo del 0 al 10: ")

         numero = readLine()!!.toInt();

        if(numero in 0..10){

            println("El número $numero es correcto!.")

        }else{

            println("El número es incorrecto, introduce un numero entre el 0 y el 10")

        }

    }while (numero !in 0..10 )



}

fun main(){

    pedirNumero()
}

