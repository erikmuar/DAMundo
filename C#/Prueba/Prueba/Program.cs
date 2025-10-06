
/*
class Program
{
    static void (string[] args)
    {
        Console.WriteLine("Inicio del programa");

        Thread T1 = new Thread(EscriureA);
        Thread T2 = new Thread(EscriureB);


        T1.Start();
        T2.Start();
       
        T1.Join(); // Espera a que el hilo T1 termine antes de continuar

        Console.WriteLine("Fin del programa");


    }


    public static void EscriureA()
    {
        for (int i = 0; i < 10; i++)
        {
            Console.WriteLine(i);
            Thread.Sleep(100);
        }
    }

    public static void EscriureB()
    {
        for (int i = 0; i < 10; i++)
        {
            Console.WriteLine("B");
            Thread.Sleep(100);
        }
    }


    
}

*/


class Program
{

    static void Main(string[] args)
    {

        Thread Tdutxa = new Thread(Dutxa);
        Thread Tvestir = new Thread(Vestir);
        Thread Tesmorzar = new Thread(Esmorzar);
        Thread Tmusica = new Thread(EscoltarMusica);
        Thread Ttiktok = new Thread(Tiktok);

        Tdutxa.Start();
        Tmusica.Start();
        Tdutxa.Join();
        Tvestir.Start();
        Tvestir.Join();
        Tmusica.Join();
        Tesmorzar.Start();
        Ttiktok.Start();
        Tesmorzar.Join();
        Ttiktok.Join();

        Console.WriteLine("Fin del programa");
    }

    public static void Dutxa()
    {
        Console.WriteLine("Dutxa: Començant a dutxar-me");
        Thread.Sleep(1000);
        Console.WriteLine("Dutxa: He acabat de dutxar-me");
    }

    public static void Vestir()
    {
        Console.WriteLine("Vestir: Començant a vestir-me");
        Thread.Sleep(1000);
        Console.WriteLine("Vestir: He acabat de vestir-me");
    }

    public static void Esmorzar()
    {
        Console.WriteLine("Esmorzar: Començant a esmorzar");
        Thread.Sleep(1500);
        Console.WriteLine("Esmorzar: He acabat d'esmorzar");
    }

    public static void EscoltarMusica()
    {
        Console.WriteLine("Escoltar Música: Començant a escoltar música");
        Thread.Sleep(1000);
        Console.WriteLine("Escoltar Música: He acabat d'escoltar música");
    }
    public static void Tiktok()
    {
        Console.WriteLine("TikTok: Començant a veure TikToks");
        Thread.Sleep(1000);
        Console.WriteLine("TikTok: He acabat de veure TikToks");
    }
}