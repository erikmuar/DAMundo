using System;
using System.Threading;
using System.Diagnostics;

namespace Atletisme
{
    class Program
    {
        static Random rnd1 = new Random();


        // Clase

        Thread suma1 = new Thread(Suma);
        suma1.Start();
        Thread suma2 = new Thread(Suma);
        suma2.Start();

            suma1.Join();
            suma2.Join();
            console.WriteLine("Suma total: " + total);


            public static void Suma()
        {
            for (int i = 0; i < 1000000; i++)
            {
                lock (lockObject)
                {
                    total += 1;
                }
            }
        }

        // EJERCICIO 2 – TAREA #1
        // Crear 4 corredores que corran a la vez
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

            Console.WriteLine("¡Todos los corredores han terminado!");
        }

        static void CorredorBase()
        {
            Console.WriteLine("Corriendo...");
            int tiempo = rnd1.Next(10000, 15000); // 10 a 15 segundos
            Thread.Sleep(tiempo);
            Console.WriteLine("Acabado");
        }


        // EJERCICIO 2 – TAREA #2
        // Pasar parámetros (nombre + número) y mostrar tiempo con Stopwatch
        static void Tarea2()
        {
            Thread t1 = new Thread(CorredorConParametro);
            Thread t2 = new Thread(CorredorConParametro);
            Thread t3 = new Thread(CorredorConParametro);
            Thread t4 = new Thread(CorredorConParametro);

            t1.Start(new object[] { "Usain Bolt", 3 });
            t2.Start(new object[] { "Florence Griffith", 1 });
            t3.Start(new object[] { "Carl Lewis", 22 });
            t4.Start(new object[] { "Elaine Thompson", 12 });

            t1.Join();
            t2.Join();
            t3.Join();
            t4.Join();

            Console.WriteLine("¡Todos los corredores han terminado!");
        }

        static void CorredorConParametro(object datos)
        {
            object[] info = (object[])datos;
            string nombre = (string)info[0];
            int numero = (int)info[1];

            Console.WriteLine($"Corriendo: {nombre} ({numero})");

            int tiempo = rnd1.Next(10000, 15000);
            Stopwatch cronometro = Stopwatch.StartNew();

            Thread.Sleep(tiempo);

            cronometro.Stop();
            double segundos = cronometro.Elapsed.TotalSeconds;

            Console.WriteLine($"Acabado: {nombre} ({numero}) - Tiempo: {segundos:F1} seg");
        }


        // EJERCICIO 2 – TAREA #3
        // Pasar la información con expresiones lambda
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

            int tiempo = rnd1.Next(10000, 15000);
            Stopwatch cronometro = Stopwatch.StartNew();

            Thread.Sleep(tiempo);

            cronometro.Stop();
            double segundos = cronometro.Elapsed.TotalSeconds;

            Console.WriteLine($"Acabado: {nombre} ({numero}) - Tiempo: {segundos:F1} seg");
        }


        // EJERCICIO 2 – TAREA #4
        // Carrera de relevos: cada corredor espera a que termine el anterior
        static void Tarea4()
        {
            AutoResetEvent relevo1 = new AutoResetEvent(false);
            AutoResetEvent relevo2 = new AutoResetEvent(false);
            AutoResetEvent relevo3 = new AutoResetEvent(false);
            AutoResetEvent relevo4 = new AutoResetEvent(false);

            Thread t1 = new Thread(() => CorredorRelevo("Usain Bolt", 3, relevo1, relevo2));
            Thread t2 = new Thread(() => CorredorRelevo("Florence Griffith", 1, relevo2, relevo3));
            Thread t3 = new Thread(() => CorredorRelevo("Carl Lewis", 22, relevo3, relevo4));
            Thread t4 = new Thread(() => CorredorRelevo("Elaine Thompson", 12, relevo4, null));

            t1.Start();
            t2.Start();
            t3.Start();
            t4.Start();

            relevo1.Set();

            t1.Join();
            t2.Join();
            t3.Join();
            t4.Join();

            Console.WriteLine("¡Carrera de relevos completada!");
        }

        static void CorredorRelevo(string nombre, int numero, AutoResetEvent esperar, AutoResetEvent siguiente)
        {
            esperar.WaitOne();

            Console.WriteLine($"Corriendo: {nombre} ({numero})");

            int tiempo = rnd1.Next(10000, 15000);
            Stopwatch cronometro = Stopwatch.StartNew();

            Thread.Sleep(tiempo);

            cronometro.Stop();
            double segundos = cronometro.Elapsed.TotalSeconds;

            Console.WriteLine($"Acabado: {nombre} ({numero}) - Tiempo: {segundos:F1} seg");

            if (siguiente != null)
                siguiente.Set();
        }


        static void Main(string[] args)
        {
            // 🔹 Descomenta el ejercicio que quieras probar 🔹

            //Tarea1(); // EJERCICIO 2 – TAREA #1
            //Tarea2(); // EJERCICIO 2 – TAREA #2
            //Tarea3(); // EJERCICIO 2 – TAREA #3
            Tarea4();   // EJERCICIO 2 – TAREA #4
        }
    }
}
