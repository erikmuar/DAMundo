/*
A la botiga The bike house es fa un descompte del 20% als clients que son VIP i
també als clients que facin una compra de més de 200 €. Pensa un algoritme
que implementi aquesta lògica.
 */

fun main(){
    botiga()
}

fun botiga() {

    println("Bienvenindo a la tienda")

    print("Introduce el valor de la compra: ")

    var compra: Int = readLine()!!.toInt();



    do {
        println("Eres un cliente vip? ")
        println("1.Si")
        println("2.No")

        var opcion: Int = readLine()!!.toInt();

        if (opcion == 1) {

            var resultado: Double = compra * 0.8;

            println("La cantidad a pagar es $resultado")


        } else if (opcion == 2) {

            if (compra > 200) {

                var resultado: Double = compra * 0.8;

                println("La cantidad a pagar es $resultado")


            }else{

                println("La cantidad a pagar es $compra")
            }

        }
    } while (opcion != 1 && opcion != 2)


}