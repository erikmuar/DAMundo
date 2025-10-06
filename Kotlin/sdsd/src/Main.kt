/*

12. Escriu un algoritme que calculi el cost de la factura de l’aigua en funció dels litres
consumits. El cost es calcularà de la següent manera:
a. La quota fixa mensual és de 6€ de manteniment.
b. Si el consum de l’aigua és menor de 50 litres al mes, no es paga quota
variable.
c. Si el consum d’aigua es troba entre 50 i 200 litres, es paga 0.15 € al litre.
d. Si el consum és major de 200 litres, es paga el litre a 0.30 €.


*/


fun main(){

    algoritmo()
}


fun algoritmo(){

    var cuota: Double


    var cuotaFija=6


    println("Introduce cuantos litros de agua has gastado este mes?")

    var litros= readLine()!!.toInt()

    if (litros<50){
        cuota= cuotaFija.toDouble()

    }else if (litros in 50..199){
        cuota= (litros * 0.15) + cuotaFija

    }else{
        cuota = (litros * 0.3) + cuotaFija
    }

    println("La cuota mensual es de: $cuota €")
}