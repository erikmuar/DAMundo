// 1. Test 
// 2. Modificar a semaforo de 3  
// 3. Cuando el usuario entra o sale, mostrar cuanta gente hay en tiempo real 

// 1 de cada 5 personas salen por la ventana para no pagar. 


using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Threading;

namespace Porter
{
    public class DataClient
    {
        public int TempsDins { get; set; }
        public string NomClient { get; set; }

        public DataClient(int tempsDins, string nomClient)
        {
            TempsDins = tempsDins;
            NomClient = nomClient;
        }
    }

    class Program
    {
        static SemaphoreSlim Porter = new SemaphoreSlim(3);

       static int contador = 0;
    
        static object locker = new object();

        static void Main(string[] args)
        {
            Random rnd = new Random();

            for (int i = 0; i <= 20; i++)
            {
                DataClient dataClient = new DataClient(rnd.Next(1000, 10000), "Client" + i.ToString());

                Thread TClient = new Thread(Client);
                TClient.Start(dataClient);
                //Console.WriteLine(dataClient.NomClient + " " + dataClient.TempsDins);
            }
            Console.ReadLine();
        }

        static void Client(object dataClient)
        {
            DataClient myDataClient = (DataClient)dataClient;

            Console.WriteLine("El client {0} vol entrar", myDataClient.NomClient);
            //Demanem permís al semàfor per entrar
            Porter.Wait();


            Console.WriteLine("El client {0} està dins", myDataClient.NomClient);

            lock (locker){
                contador++;
                Console.WriteLine("Gent dins del garito: " + contador);
            }

            Thread.Sleep(myDataClient.TempsDins);
            Console.WriteLine("El client {0} surt", myDataClient.NomClient);

            lock (locker){
                contador--;
                Console.WriteLine("Gent dins del garito: " + contador);
            }

            //Alliberem un espai dins del garito
            Porter.Release();

        }
    }
}