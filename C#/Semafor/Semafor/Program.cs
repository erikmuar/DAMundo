/*

Fer servir el codi base ubicat al foro d'anuncis del curs (Codi Porter)

Test del codi (jugar per veure com funciona)
Modificar el semàfor 3 o 4
Quan un usuari entra o surt cal indicar quanta gent hi ha dins en temps real
Amb un 20% de probabilitats, els clients poden saltar per la finestra sense pagar (el porter no els veu sortir). Programa-ho

*/

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
        
        static int GentDins = 0;
        static object locker = new object();

        static void Main(string[] args)
        {
            Random rnd = new Random();

            for (int i=0; i<=20;i++)
            {
                DataClient dataClient = new DataClient(rnd.Next(1000,10000),"Client"+i.ToString());

                Thread TClient = new Thread(Client);
                TClient.Start(dataClient);
            }
            Console.ReadLine();
        }

        static void Client (object dataClient)
        {
            DataClient myDataClient = (DataClient)dataClient;
            Random rnd = new Random();

            Console.WriteLine("El client {0} vol entrar", myDataClient.NomClient);
            
            if (rnd.Next(1, 101) <= 20)
            {
                Console.WriteLine("El client {0} ha saltat per la finestra sense pagar! (El porter no l'ha vist)", myDataClient.NomClient);
                return; 
            }

            Porter.Wait();

            lock (locker)
            {
                GentDins++;
                Console.WriteLine("El client {0} està dins. Gent dins: {1}", myDataClient.NomClient, GentDins);
            }
            
            Thread.Sleep(myDataClient.TempsDins);
            
            lock (locker)
            {
                GentDins--;
                Console.WriteLine("El client {0} surt. Gent dins: {1}", myDataClient.NomClient, GentDins);
            }

            Porter.Release();
    
        }
    }
}