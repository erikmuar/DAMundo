using System;
using System.Threading;
using System.Diagnostics;


// Xavier Farrus Erik Muñoz


namespace Atletisme
{
    class Program
    {
        static Random rnd1 = new Random();


        // TAREA #1
        static void Tarea1()
        {
            Thread c1 = new Thread(CorredorBase);
            Thread c2 = new Thread(CorredorBase);
            Thread c3 = new Thread(CorredorBase);
            Thread c4 = new Thread(CorredorBase);

            c1.Start();
            c2.Start();
            c3.Start();
            c4.Start();

            c1.Join();
            c2.Join();
            c3.Join();
            c4.Join();

        }

        static void CorredorBase()
        {
            Console.WriteLine("Corriendo...");

            int tiempo = rnd1.Next(10000, 15000);
            
            Thread.Sleep(tiempo);

            Console.WriteLine("Acabado");
        }


        // TAREA #2

        class Corredor
        {
            public string Nombre { get; set; }
            public int Numero { get; set; }
        }
        static void Tarea2()
        {
            Corredor c1 = new Corredor { Nombre = "Usain Bolt", Numero = 3 };
            Corredor c2 = new Corredor { Nombre = "Florence Griffith", Numero = 1 };
            Corredor c3 = new Corredor { Nombre = "Carl Lewis", Numero = 22 };
            Corredor c4 = new Corredor { Nombre = "Elaine Thomson", Numero = 12 };

            Thread t1 = new Thread(Correr);
            Thread t2 = new Thread(Correr);
            Thread t3 = new Thread(Correr);
            Thread t4 = new Thread(Correr);

            t1.Start(c1);
            t2.Start(c2);
            t3.Start(c3);
            t4.Start(c4);

            t1.Join();
            t2.Join();
            t3.Join();
            t4.Join();

            Console.WriteLine("\n¡Todos los corredores han terminado!");
        }


        
            static void Correr(object datos)
            {
                Corredor corredor = (Corredor)datos;

                Console.WriteLine($"Corriendo: {corredor.Nombre} ({corredor.Numero})");

                int tiempo = rnd1.Next(10000, 11000); 

                Stopwatch cronometro = Stopwatch.StartNew();
                Thread.Sleep(tiempo);
                cronometro.Stop();

                double segundos = cronometro.Elapsed.TotalSeconds;

                Console.WriteLine($"Acabado: {corredor.Nombre} ({corredor.Numero}) - Tiempo: {segundos} seg.");
            }
        


        // TAREA #3
        static void Tarea3()
        {
            Thread t1 = new Thread(() => CorredorLambda("Usain Bolt", 3));
            Thread t2 = new Thread(() => CorredorLambda("Florence Griffith", 1));
            Thread t3 = new Thread(() => CorredorLambda("Carl Lewis", 22));
            Thread t4 = new Thread(() => CorredorLambda("Elaine Thompson", 12));

            t1.Start();
            t2.Start();
            t3.Start();
            t4.Start();

            t1.Join();
            t2.Join();
            t3.Join();
            t4.Join();

            Console.WriteLine("¡Todos los corredores han terminado!");
        }

        static void CorredorLambda(string nombre, int numero)
        {
            Console.WriteLine($"Corriendo: {nombre} ({numero})");

            int tiempo = rnd1.Next(10000, 12000);
            Stopwatch cronometro = Stopwatch.StartNew();

            Thread.Sleep(tiempo);

            cronometro.Stop();
            double segundos = cronometro.Elapsed.TotalSeconds;

            Console.WriteLine($"Acabado: {nombre} ({numero}) - Tiempo: {segundos} seg");
        }


        // EJERCICIO 2 – TAREA #4
        static void Tarea4()
        {
            

            Thread t1 = new Thread(() => CorredorRelevo("Usain Bolt", 3));
            Thread t2 = new Thread(() => CorredorRelevo("Florence Griffith", 1));
            Thread t3 = new Thread(() => CorredorRelevo("Carl Lewis", 22));
            Thread t4 = new Thread(() => CorredorRelevo("Elaine Thompson", 12));

            t1.Start();
            t1.Join();
            t2.Start();
            t2.Join();
            t3.Start();
            t3.Join();
            t4.Start();
            t4.Join();

            Console.WriteLine("¡Carrera de relevos completada!");
        }

        static void CorredorRelevo(string nombre, int numero)
        {

            Console.WriteLine($"Corriendo: {nombre} ({numero})");

            int tiempo = rnd1.Next(10000, 15000);
            Stopwatch cronometro = Stopwatch.StartNew();

            Thread.Sleep(tiempo);

            cronometro.Stop();
            double segundos = cronometro.Elapsed.TotalSeconds;

            Console.WriteLine($"Acabado: {nombre} ({numero}) - Tiempo: {segundos:F1} seg");

        }


   


        static void Main(string[] args)
        {
            

            //Tarea1(); 
            //Tarea2(); 
            //Tarea3(); 
            //Tarea4(); 
        }
    }
}
