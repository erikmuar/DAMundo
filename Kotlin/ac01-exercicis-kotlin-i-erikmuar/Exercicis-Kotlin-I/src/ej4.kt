/*
El Departament d’Ensenyament de la Generalitat vol saber el percentatge nois i
noies que hi ha a les aules. Dissenya un algoritme que pregunti quantes noies i
nois hi ha a l’aula i aleshores en mostri els percentatges.

 */


fun main(){

porcentaje()

}

fun porcentaje(){


    var nois: Int;
    var noies: Int;

    println("Cuantos chicos hay en la clase?")

    nois = readLine()!!.toInt();

    println("Cuantas chicas hay en la clase?")

    noies= readLine()!!.toInt();

    var total: Int = nois + noies;

    println("El porcentaje de chicos es ${(nois * 100) / total}% y el de chicas es ${(noies * 100) / total}%")


}