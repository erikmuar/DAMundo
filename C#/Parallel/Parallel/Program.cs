using System;
using System.Diagnostics;
using System.Threading;
using System.Threading.Tasks;

class Program
{
    static void forManual()
    {
        Stopwatch sw = new Stopwatch();

        sw = Stopwatch.StartNew();

        int[] arraynumerico = new int[1000];
        Random rnd = new Random();

        for (int i = 0; i < arraynumerico.Length; i++)
        {
            arraynumerico[i] = rnd.Next(0, 1000);
        }

        sw.Stop();
        Console.WriteLine($"forManual tardó: {sw.Elapsed.TotalMilliseconds:F3} ms");
    }

    static void forParallel()
    {
        Stopwatch sw = new Stopwatch();

        sw = Stopwatch.StartNew();

        int[] arraynumerico = new int[1000];
        Random rnd = new Random();

        Parallel.For(0, arraynumerico.Length, i =>
        {
            
                arraynumerico[i] = rnd.Next(0, 1000);
            
        });

        sw.Stop();
        Console.WriteLine($"forParallel tardó: {sw.Elapsed.TotalMilliseconds} ms");
    }

    static void Main(string[] args)
    {
        Thread t1 = new Thread(forManual);
        Thread t2 = new Thread(forParallel);

        t1.Start();
        t2.Start();

        t1.Join();
        t2.Join();

        
    }
}
