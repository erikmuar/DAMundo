import Foundation


/*A01
 Define un struct Point2D que tenga:
 Dos variable stored properties x,y de tipo Double y cuyo valor por defecto sea 0.0
 Una read-only computed property description de tipo String cuyo valor sea "Point x:\(x) y:\(y)".
 Define el objeto aPoint del tipo struct Point2D con x=2.0,y =5.0
 Define el objeto anotherPoint del tipo Struct Point2D con x=0, y=0
 Muestra por consola el valor de la property description de ambos objetos
 */


struct Point2D{

    var x: Double = 0.0
    var y: Double = 0.0 
    var descripcion: String {
        return "Point x:\(x) y:\(y)"
    }

}

let aPoint = Point2D(x: 2.0, y:5.0)

let anotherPoint = Point2D(x: 0, y:0)

print(aPoint.descripcion)
print(anotherPoint.descripcion)


/*A02
 Modifica el struct Point2D de la actividad anterior, identificándolo como Point2DWithInitializers, de forma que no asigne el valor por defecto de 0.0 a sus stored properties x e y. Implementa los inicializadores con y sin parámetros de entrada que permitan crear los objetos aPoint y anotherPoint de la actividad anterior.
 */

struct Point2DWithInitializers {
    var x: Double
    var y: Double
    var descripcion: String {
        return "Point x:\(x) y:\(y)"
    }
    
    
    init() {
        self.x = 0.0
        self.y = 0.0
    }
    
    init(x: Double, y: Double) {
        self.x = x
        self.y = y
    }
}


let aPoint = Point2DWithInitializers(x: 2.0, y: 5.0)
let anotherPoint = Point2DWithInitializers()

print(aPoint.descripcion)
print(anotherPoint.descripcion)



/*A03
 Define un struct Circle2D que tenga:
 Una variable stored property center de tipo Point2D struct. Su valor por defecto será un Point2D con x=0.0 e y=0.0
 Una variable stored property radius de tipo Double.
 Una read-only computed property description de tipo String cuyo valor sea "Circle center:\(center.description) radio:\(radius)".
 Un método inicializador que tenga como parámetros el centro (Point2D struct) y el radio (Double)
 Un método inicializador que tenga como parámetro el radio (Double)
 Un método inicializador que tenga como parámetros x (Double), y (Double) y el radio (Double)
 Crea distintos objetos de tipo struct Circle2D usando los distintos inicializadores creados, de cada uno de ellos muestra por consola su descripción y su area
 */





/*A04
 Define e implementa la clase Calculadora con:
 Dos propiedades de tipo int
 Un método inicializador que permita asignar valor a sus dos propiedades
 Métodos de clase (Type Methods): sumarX:conY, restarX:conY, multiplicarX:conY, dividirX:conY, que recibirán como parámetros dos int y realizaran las operaciones entre los parámetros recibidos que sus nombres indican devolviendo el resultado.
 Métodos de instancia (Instance Methods): sumar, restar, multiplicar, dividir, que realizarán las operaciones que sus nombres indican con las propiedades de la clase, y devolverán el resultado.
 
 Testea que los métodos que has definido en la clase Calculadora realizan las operaciones correctamente. Fíjate en las diferencias entre las llamadas a los métodos de clase y a los métodos de instancia.
 */



/*
 A05
 Tenemos el siguiente struct Student
 
 struct Student {
     var identifier = 0
     var name: String
     
     init(name: String) {
         self.name = name
     }
 }
 
 Realiza los cambios necesarios para que cada vez que se cree un objeto del tipo Student, su propiedad identifier se incremente en una unidad
 
 let mateo = Student(name: "Mateo") //mateo.identifier = 1
 let ana = Student(name: "Ana") //ana.identifier = 2
 
 */



/*A06
 Define el tipo de dato Animal con las siguientes características:
 Stored Property name de tipo String, legs de tipo Int
 Computed Property description de tipo String y cuyo valor sea “\(name) has \(legs) legs”
 Instance method walk() que retornará una String con el texto "\(name) walks on \(legs) legs."
 
 */




/*A07
 Sistema de Alquiler de Libros en una Biblioteca
 Crea un programa en Swift que simule un sistema de alquiler de libros en una biblioteca. Utiliza structs para modelar las entidades clave: libros, usuarios y la biblioteca en sí. El programa debe permitir a los usuarios alquilar libros de la biblioteca y mostrar los libros alquilados por cada usuario.

 Instrucciones
 1-Define struct Book que tenga propiedades para el título, autor y disponibilidad del libro.
 2-Define struct User que tenga propiedades para el nombre del usuario y una lista de libros alquilados. Cuando se crea un usuario no tiene por qué tener libros alquilados.
 3-Define struct Library que contenga una lista de libros disponibles y una lista de usuarios registrados.
 4- Crea un método en struct Library que permita agregar un usuario a la biblioteca.
 5- Crea un método en struct Library que permita a un usuario (registrado) alquilar un libro. Este método debería actualizar la disponibilidad del libro y agregarlo a la lista de libros alquilados del usuario.
6- Desarrolla las sentencias de código donde se creen algunos libros y usuarios, se agreguen a la biblioteca y se realicen al menos tres alquileres de libros por parte de los usuarios.
 7- Muestra los libros alquilados por cada usuario.
 */




/*
 A08 Sistema de Gestión de Pedidos en una Cafetería
 Crea un programa en Swift que simule un sistema de gestión de pedidos en una cafetería. Utiliza structs para modelar las entidades clave: productos (cafés, postres, etc.) y pedidos de los clientes. El programa debe permitir a los clientes hacer pedidos y mostrar los detalles de los mismos (incluido el precio total del pedido según los productos).
 Instrucciones:
 1-Define struct Product que tenga propiedades para el nombre del producto y el precio.

 2-Define struct Order que tenga propiedades para el cliente que realizó el pedido (basta con su nombre), la lista de productos pedidos.

 3- Permite que struct Order calcule el importe total del pedido sumando los precios de los productos.

 4- Permite que el struct Order  muestre los detalles del pedido, incluyendo el cliente, la lista de productos y el importe total.

 5- Define las sentencias de código donde se creen algunos productos y se realicen al menos dos pedidos por parte de diferentes clientes.

 6- Muestra los detalles de cada pedido.
 */


