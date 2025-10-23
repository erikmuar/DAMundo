using System;
using System.Collections.Generic;
using System.Threading;

// Xavier Farrus Erik Muñoz


    class Program
    {
        static Random rnd1 = new Random();
        static List<Corredor> corredores = new List<Corredor>();
        class Corredor
        {
            public string Nombre { get; }
            public int Numero { get; }
            public double Tiempo { get; set; }

            public Corredor(string nombre, int numero)
            {
                Nombre = nombre;
                Numero = numero;
            }
        }

        static void Main(string[] args)
        {
            Corredor corredor1 = new Corredor("Usain Bolt", 3);
            Corredor corredor2 = new Corredor("Florence Griffith", 1);
            Corredor corredor3 = new Corredor("Carl Lewis", 22);
            Corredor corredor4 = new Corredor("Elaine Thomson", 12);

            Thread c1 = new Thread(() => corredor(corredor1));
            Thread c2 = new Thread(() => corredor(corredor2));
            Thread c3 = new Thread(() => corredor(corredor3));
            Thread c4 = new Thread(() => corredor(corredor4));

            c1.Start();
            c2.Start();
            c3.Start();
            c4.Start();
            c1.Join();
            c2.Join();
            c3.Join();
            c4.Join();

            Console.WriteLine($"\nGanador: {corredores[0].Nombre} ({corredores[0].Numero}), Tiempo: {corredores[0].Tiempo} segundos");
        }

        static void corredor(Corredor corredor)
        {
            Console.WriteLine($"Corriendo: {corredor.Nombre} ({corredor.Numero})");

            int tiempo = rnd1.Next(10000, 15000);

            Thread.Sleep(tiempo);

            corredor.Tiempo = tiempo / 1000.0;

            corredores.Add(corredor);

            Console.WriteLine($"Acabado: {corredor.Nombre} ({corredor.Numero}). Tiempo: {corredor.Tiempo} segundos");
        }
    }