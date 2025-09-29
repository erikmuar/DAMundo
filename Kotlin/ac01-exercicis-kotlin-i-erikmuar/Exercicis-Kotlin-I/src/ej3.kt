/*Et dediques a vendre figures Otaku comprades a Tokio per wallapop. Si estan en
bon estat les pots revendre per un +25%, si no, per +10%. Implementa
l’algoritme.

 */

fun main(){

    otaku()

}

fun otaku(){

    var precio:Int;

    var opcion: Int;

    do {
        print("Introduce el precio de la figura: ")
        precio = readLine()!!.toInt()

        if (precio <= 0) {
            println("El precio debe ser un número positivo. Inténtalo de nuevo.")
        }
    } while (precio <= 0)



    do {

        println("La figura está en buen estado?")
        println("1.Si")
        println("2.No")

        var opcion: Int = readLine()!!.toInt();

        if (opcion == 1) {

            var resultado: Double = precio * 1.25;

            println("La cantidad a pagar es $resultado")


        } else if (opcion == 2) {

                var resultado: Double = precio * 1.1;

                println("La cantidad a pagar es $resultado")

        }
    } while (opcion != 1 && opcion != 2)


}