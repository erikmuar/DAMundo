using System;
using System.Threading;
using System.Diagnostics;

namespace ComparadorTiempos
{
    class Program
    {
        static void Main(string[] args)
        {
            Stopwatch cronometroSecuencial = new Stopwatch();
            cronometroSecuencial.Start();

            EscribirA();
            EscribirB();
            EscribirC();

            cronometroSecuencial.Stop();
            Console.WriteLine();
            Console.WriteLine($"Tiempo secuencial: {cronometroSecuencial.ElapsedMilliseconds} ms");

            Stopwatch cronometroConcurrente = new Stopwatch();
            cronometroConcurrente.Start();

            Thread hiloA = new Thread(EscribirA);
            Thread hiloB = new Thread(EscribirB);
            Thread hiloC = new Thread(EscribirC);

            hiloA.Start();
            hiloB.Start();
            hiloC.Start();

            hiloA.Join();
            hiloB.Join();
            hiloC.Join();

            cronometroConcurrente.Stop();
            Console.WriteLine();
            Console.WriteLine($"Tiempo concurrente: {cronometroConcurrente.ElapsedMilliseconds} ms");

            Console.WriteLine("\nPresiona cualquier tecla para salir...");
            Console.ReadKey();
        }

        private static void EscribirA()
        {
            for (int i = 0; i < 500; i++)
            {
                Console.Write("a");
                Thread.Sleep(10);
            }
        }

        private static void EscribirB()
        {
            for (int i = 0; i < 500; i++)
            {
                Console.Write("b");
                Thread.Sleep(10);
            }
        }

        private static void EscribirC()
        {
            for (int i = 0; i < 500; i++)
            {
                Console.Write("c");
                Thread.Sleep(10);
            }
        }
    }
}