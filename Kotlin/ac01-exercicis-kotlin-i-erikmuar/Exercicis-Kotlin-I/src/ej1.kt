/*

. La ciutat de Girona està banyada pels rius Ter i Onyar. Quan plouen més de 90
litres per metre quadrat, el riu Onyar puja de nivell i posa en perill els fonaments
dels edificis de la vora del riu. Quan això passa, s’han d’obrir unes comportes per
tal de desviar l’aigua del riu Onyar cap al riu Ter. Crea un algoritme que gestioni
les comportes

*/



fun main(){

    compuertas()
}


fun compuertas (){

    var abrir: Boolean = false;

    var litros: Int;




    do{

        println("Introduce cuantos litros hay")

        litros = readLine()!!.toInt();

        if(litros>89){

            abrir  = true;
            println("Abriendo compuertas...");

        }else{

            print("Nivel del agua correcto.");
        }


    }while(litros < 90)


}

