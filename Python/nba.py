"""
1- ETL from csv
Com ja sabeu, una de les maneres més esteses de fer intercanvi de dades, és fent ús de fi txers de text pla. Els formats de text pla sense format més extesos són per exemple: xml, csv, json, txt...
En aquesta primera part de l’exercici, llegirem les dades d’un fi txer pla en format .csv i les guardarem en una estructura de dades de python. Un cop tinguem les dades carregades en una estructura de dades, les modifi carem i fi nalment les exportarem modifi cades en un nou fi txer de dades .csv.
Extract:
El fi txer de dades d’origen té les següents característiques:
● Nom de fi txer: basket_players.csv
● Fitxer de dades pla sense format
● Codifi cació fi txer: ASCII
● Extensió de fi txer: .csv
● Caràcter separador de camps: ‘;’
● Header: Name;Team;Position;Heigth;Weigth;Age
● Files: 1035
Extracte de dades: Name;Team;Position;Heigth;Weigth;Age Adam Donachie;BAL;Point Guard;78.27;171.00;22.99 Paul Bako;BAL;Point Guard;78.27;204.25;34.69 Ramon Hernandez;BAL;Point Guard;76.15;199.50;30.78 Kevin Millar;BAL;Center;76.15;199.50;35.43 Chris Gomez;BAL;Center;77.21;178.60;35.71 ...
1
Welcome to the NBA
Llibreria de python a importar: csv
Mètode de la llibreria csv per a llegir dades d’un csv 􀀀 csv.reader(<paràmetres>). Creeu una variable a la qual li assignareu les dades resultants d’executar csv.reader de l’estil: dades = csv.reader(...)
Dipositar el fi txer csv a la mateixa ubicació on esteu fent el projecte py, us pot ajudar a evitar problemes de rutes.
Info sobre com usar la llibreria csv: https://docs.python.org/2.7/library/csv.html
Un cop tingueu les dades del fi txer d’origen carregades en una variable python, proveu d’accedir-hi amb un for-loop usant la python way! “Simple is better than complex.”
Si hem guardat les dades del fi txer en una variable dades, per iterar sobre elles, simplement farem ús d’un for loop enumerate de la següent manera: >>> for i, fi la in enumerate(dades):
D’aquesta manera, a cada iteració tenim dues variables que podem fer servir. Per una banda la i per a saber en quin número d’iteració ens trobem (comença per 0) i per l’altre, fi la[] serà un vector-fi la que tindrà tants elements com columnes separades per “;” hi havia en el fi txer original csv original. A cada iteració, anirà agafant la següent fi la de dades.
Per exemple, en la primera iteració:
Mostra les dades del fi txer per pantalla usant aquesta tècnica i mostreu també el recompte de número de fi les total que hi ha.
Podeu trobar més info i exemples sobre enumerate aqui: https://docs.python.org/2/tutorial/datastructures.html#looping-techniques
2
Welcome to the NBA
Transform:
Si observeu el fragment de dades del fi txer d’origen vs el fragment de dades del fi txer de destí que podeu veure en el següent apartat (Load), veureu que les dades han patit certes transformacions.
En concret, en són cinc:
1. A la capçalera del fi txer, els noms de les columnes del fi txer s’han vist modifi cades de l’anglès al català. Observeu l’extracte del fi txer original i l’extracte del fi txer tal i com ha de quedar (que podeu veure en el proper apartat).
Per a transformar-ho teniu diferents opcions:
o Descartar la primera fi la del fi txer de dades d’origen i en el fi txer de sortida, escriure la capçalera en català en text literal hardcoded.
o Pels qui vulgueu un repte major, us recomano fer ús de diccionaris.
En programació, els diccionaris són una estructura de dades pensades per a tractament de dades i indexació. Conceptualment, un diccionari està format per un binomi concepte-valor. En python (i en molts altres llenguatges) es representa típicament com a name:value.
Si ens hi fi xem, molts estàndards de fi txer que hem estat fent servir fi ns ara, ja estan dissenyats sota aquest concepte. Per exemple xml està format de <tag>valor</tag>. Un del exemples més emblemàtics d’aquest concepte portat a l’extrem, és el format de dades dels fi txers json.
En python disposeu d’una estructura de dades pensada per a tal efecte que es diu dict.
Si observeu el link que us he proposat anteriorment: https://docs.python.org/2/tutorial/datastructures.html#dictionaries veureu a l’apartat 5.5. Dictionaries teniu una explicació més extensa.
Per exemple, a continuació declaro un diccionari on uso com a name el nom dels alumnes i, com a valor, un enter: >>> alumnes = dict(ferran=47188398, pau=41234567, pere=41235512, jesus=41251224, judith=41234543)
Seguidament faig un echo del diccionari alumnes per veure com han quedat defi nides les parelles de name:value. >>> alumnes {'ferran': 47188398, 'pau': 41234567, 'pere': 41235512, 'jesus': 41251224, 'judith': 41234543}
3
Welcome to the NBA
Si ara volem accedir al segon número, és a dir al número corresponent a l’alumne ‘pau’, el primer que ens vindria al cap seria executar el següent: >>> alumnes[1] Traceback (most recent call last): File "<stdin>", line 1, in <module> KeyError: 1
Fixeu-vos que ens ha donat un error! Perquè? Doncs perquè hem intentat obtenir el value del name corresponent al valor enter 1 i aquest no existeix. No existeix el punter enter per a poder recórrer els valors del diccionari. Per tant, tampoc podem accedir als seus valors tal com faríem habitualment amb un loop for i.
Fixeu-vos ara amb la màgia que aporten els diccionaris. Accediré al número del Pau sense fer ús d’un índex numèric tal com faríem normalment per accedir a una posició d’un vector clàssic alumnes[1]; si no que usaré el name com a punter: >>> alumnes['pau'] 41234567
Quan fem ús d’arrays en mode diccionari, no ens importa l’ordre dels elements dins del vector. Però el que sí que és determinant és que NO hi poden haver names repetits.
Si intentem fer-ho, rebem un error: >>> alumnes = dict(ferran=47188398, pau=41234567, pere=41235512, jesus=41251224, judith=41234543, judith=44444444) File "<stdin>", line 1 SyntaxError: keyword argument repeated
D’altra banda, els values sí que es poden repetir. És a dir, dos name diferents poden ser traduïts amb el mateix valor: >>> alumnes = dict(ferran=47188398, pau=41234567, pere=41235512, jesus=41251224, judith=41234543, mario=41234543) >>> alumnes {'ferran': 47188398, 'pau': 41234567, 'pere': 41235512, 'jesus': 41251224, 'judith': 41234543, 'mario': 41234543}
4
Welcome to the NBA
Aleshores ara, si tenim un array clàssic que conté noms d’alumnes tal com el següent: >>> noms = ['pau', 'ferran', 'mario', 'judith', 'jesus', 'pere'] >>> noms ['pau', 'ferran', 'mario', 'judith', 'jesus', 'pere']
Si volem veure el valor del primer element, ho farem de manera natural: >>> noms[0] 'pau'
I ara ve la màgia! Fent servir el diccionari alumnes, podem mostrar el número de l’alumne ‘pau’ de la següent manera: >>> alumnes[noms[0]] 41234567
Volià!
Sabent això, intenta canviar els noms de les columnes de la capçalera usant un diccionari.
2. Els noms de les demarcacions on juga cada jugador dins del camp s’han vist traduïdes de l’anglès al català. Per a tal efecte, ara sí que us encomano fer ús d’un diccionari name:value per tal de poder-ho traduir de forma automàtica sense haver de fer cap replace ni cap for loop.
Les parelles de name:value del diccionari que necessiteu, són les següents:
● "Point Guard":"Base"
● "Shooting Guard":"Escorta"
● "Small Forward":"Aler"
● "Power Forward":"Ala-pivot"
● "Center":"Pivot"
3. Les dades d’alçada i pes venen originalment en format mètric americà. Això vol dir polzades i lliures. Ho hem de transformar a cms i kilograms. Per a fer-ho assumirem les següents equivalències: 1 polzada = 2.54 cms i 1 pound = 0.45 kgs.
Creeu dues variables constants que us serveixin de multiplicador per a convertir els valors fi la a fi la dins del for-loop enumerate.
5
Welcome to the NBA
Nota: Us sorgiràn problemes de tipus de dades ja que les dades han estat carregades totes com a str que vol dir que són strings. Per a solucionar-ho, converteix els valors a fl oat usant fl oat(<valor>).
Finalment, arrodoniu aquests valors a la precisió de dos decimals. Això ho podeu fer usant la funció round(<valor>,<decimals>).
4. Les dades relatives a l’edat, ens han estat donades amb decimals, cosa que no té gaire sentit. Necessitarem arrodonir aquests valors a enters. Ho pots fer també usant la funció round().
5. Canvia el separador de columnes. En el fi txer de sortida, el separador demanar és “^” enlloc de “;”. Això ho podeu defi nir en el moment d’obertura/creació del fi txer d’output amb el paràmetre delimiter de la funció csv.writer().
Load:
El fi txer de destí ha de tenir les següents característiques:
● Nom de fi txer: jugadors_basket.csv
● Fitxer de dades pla sense format
● Codifi cació fi txer: ASCII
● Extensió de fi txer: .csv
● Caràcter separador de camps: ‘^’
● Header: Nom^Equip^Posicio^Altura^Pes^Edat
● Files: 1035
El mètode de la llibreria csv a usar per a exportar les dades a un fi txer csv 􀀀 csv.writer
Dins del for loop enumerate, per a escriure cada fi la dins del fi txer de sortida, feu ús del mètode writerow(<columna1>, <columna2>,...)
Extracte de dades tal i com ha de quedar en el fi txer de sortida .csv: Nom^Equip^Posicio^Altura^Pes^Edat Adam Donachie^BAL^Base^198.81^76.95^23 Paul Bako^BAL^Base^198.81^91.91^35 Ramon Hernandez^BAL^Base^193.42^89.78^31 ... 6
Welcome to the NBA
2- Estadístiques
Usant les dades anteriors i la llibreria Matplotlib, calcula i mostra ara les següents estadístiques:
a) La dada del nom del jugador amb el pes més alt.
b) La dada del nom del jugador amb l’alçada més petita.
c) Dades de les alçades dels jugadors en un diagrama de barres.
d) Mitjana de pes i alçada de jugador per equip en un diagrama de barres.
e) Recompte de jugadors per posició (Base, Escorta, Aler, Ala-pívot i Pívot) en un gràfi c de diagrama de sectors (pie chart) usant diferents colors.
f) Distribució de jugadors per edat en el format de gràfi ca que creguis més apropiat.
g) Una altra gràfi ca del teu gust que ajudi a entendre les dades usant subplots.
7
Welcome to the NBA
3- Canvia el format de dades
Agafa el fi txer .csv d’output que has aconseguit en l'exercici 1 i converteix-lo a l’estàndard de dades .json.
En aquest apartat, t’has d’espavilar. Aquí tens uns recursos que et poden ajudar:
https://www.w3schools.com/js/js_json_syntax.asp
https://json.org/example.html
8
"""


import pandas as pd
import csv
import matplotlib.pyplot as plt
import json

url = "https://raw.githubusercontent.com/XavierFarrus/CSV-NBA/main/basket_players.csv"

df = pd.read_csv(url, sep=';')

dades = df.values.tolist()

print(f"Encabezado: {df.columns.tolist()}")

for i, fila in enumerate(dades):
    print(f"Fila {i}: {fila}")

print(f"\nNombre total de filas: {len(dades)}")

# Punto 1
columnas = {'Name':'Nom', 'Team':'Equip', 'Position':'Posicio', 'Heigth':'Altura', 'Weigth':'Pes', 'Age':'Edat'}

ingles = ['Name','Team','Position','Heigth','Weigth','Age']

cabecera_catalan = []

for i in range(len(ingles)):
    cabecera_catalan.append(columnas[ingles[i]])

# Punto 2
posiciones = {
    "Point Guard": "Base",
    "Shooting Guard": "Escorta",
    "Small Forward": "Aler",
    "Power Forward": "Ala-pivot",
    "Center": "Pivot"
}

# Constantes para conversión de unidades (punto 3)
PULGADAS_A_CM = 2.54
LIBRAS_A_KG = 0.45

# Lista para guardar las filas transformadas
dades_transformades = []

# Transformar cada fila
for i, fila in enumerate(dades):
    # Crear nueva fila transformada
    nueva_fila = []
    
    # Nombre (índice 0) - sin cambios
    nueva_fila.append(fila[0])
    
    # Equipo (índice 1) - sin cambios
    nueva_fila.append(fila[1])
    
    # Posición (índice 2) - traducir usando diccionario
    nueva_fila.append(posiciones[fila[2]])
    
    # Altura (índice 3) - convertir de pulgadas a cm y redondear a 2 decimales
    altura_cm = round(float(fila[3]) * PULGADAS_A_CM, 2)
    nueva_fila.append(altura_cm)
    
    # Peso (índice 4) - convertir de libras a kg y redondear a 2 decimales
    peso_kg = round(float(fila[4]) * LIBRAS_A_KG, 2)
    nueva_fila.append(peso_kg)
    
    # Edad (índice 5) - redondear a entero
    edad_entero = round(float(fila[5]))
    nueva_fila.append(edad_entero)
    
    dades_transformades.append(nueva_fila)

# Escribir el archivo CSV de salida con separador '^'
with open('jugadors_basket.csv', 'w', newline='', encoding='ascii') as archivo_salida:
    escritor = csv.writer(archivo_salida, delimiter='^')
    
    # Escribir la cabecera
    escritor.writerow(cabecera_catalan)
    
    # Escribir cada fila transformada
    for fila in dades_transformades:
        escritor.writerow(fila)

print(f"\nArchivo 'jugadors_basket.csv' creado exitosamente con {len(dades_transformades)} filas")

# ========== 2- ESTADÍSTICAS ==========

# a) Jugador con el peso más alto
peso_maximo = 0
jugador_peso_max = ""
for fila in dades_transformades:
    if fila[4] > peso_maximo:
        peso_maximo = fila[4]
        jugador_peso_max = fila[0]

print(f"\na) Jugador con peso más alto: {jugador_peso_max} ({peso_maximo} kg)")

# b) Jugador con la altura más pequeña
altura_minima = float('inf')
jugador_altura_min = ""
for fila in dades_transformades:
    if fila[3] < altura_minima:
        altura_minima = fila[3]
        jugador_altura_min = fila[0]

print(f"b) Jugador con altura más pequeña: {jugador_altura_min} ({altura_minima} cm)")

# c) Diagrama de barras de alturas de jugadores, como no puedo poner los nombres de los jugadores, pongo el numero de fila
alturas = [fila[3] for fila in dades_transformades]
plt.figure(figsize=(12, 6))
plt.bar(range(len(alturas)), alturas)
plt.title('Alturas de los jugadores')
plt.xlabel('Jugador')
plt.ylabel('Altura (cm)')
plt.tight_layout()
plt.show()

# d) Media de peso y altura por equipo
equipos = {}
for fila in dades_transformades:
    equipo = fila[1]
    if equipo not in equipos:
        equipos[equipo] = {'alturas': [], 'pesos': []}
    equipos[equipo]['alturas'].append(fila[3])
    equipos[equipo]['pesos'].append(fila[4])

equipos_nombres = list(equipos.keys())
medias_altura = [sum(equipos[eq]['alturas']) / len(equipos[eq]['alturas']) for eq in equipos_nombres]
medias_peso = [sum(equipos[eq]['pesos']) / len(equipos[eq]['pesos']) for eq in equipos_nombres]

x = range(len(equipos_nombres))
ancho = 0.35
plt.figure(figsize=(14, 6))
plt.bar([i - ancho/2 for i in x], medias_altura, ancho, label='Altura media (cm)')
plt.bar([i + ancho/2 for i in x], medias_peso, ancho, label='Peso medio (kg)')
plt.xlabel('Equipo')
plt.ylabel('Valor')
plt.title('Media de peso y altura por equipo')
plt.xticks(x, equipos_nombres, rotation=45)
plt.legend()
plt.tight_layout()
plt.show()

# e) Pie chart de jugadores por posición
posiciones_count = {}
for fila in dades_transformades:
    pos = fila[2]
    if pos not in posiciones_count:
        posiciones_count[pos] = 0
    posiciones_count[pos] += 1

posiciones_nombres = list(posiciones_count.keys())
posiciones_valores = list(posiciones_count.values())
colores = ['#FF6B6B', '#4ECDC4', '#45B7D1', '#FFA07A', '#98D8C8']

plt.figure(figsize=(8, 8))
plt.pie(posiciones_valores, labels=posiciones_nombres, autopct='%1.1f%%', colors=colores)
plt.title('Distribución de jugadores por posición')
plt.show()

# f) Distribución de jugadores por edad
edades = [fila[5] for fila in dades_transformades]
plt.figure(figsize=(10, 6))
plt.hist(edades, bins=20, edgecolor='black')
plt.xlabel('Edad')
plt.ylabel('Número de jugadores')
plt.title('Distribución de jugadores por edad')
plt.tight_layout()
plt.show()

# g) Subplots con diferentes gráficas
fig, axes = plt.subplots(2, 1, figsize=(12, 10))

# Gráfica 1: Top 10 jugadores por altura
alturas_con_nombres = [(fila[0], fila[3]) for fila in dades_transformades]
alturas_con_nombres.sort(key=lambda x: x[1], reverse=True)
top10_alturas = alturas_con_nombres[:10]
nombres_top10 = [x[0] for x in top10_alturas]
alturas_top10 = [x[1] for x in top10_alturas]
axes[0].barh(nombres_top10, alturas_top10)
axes[0].set_title('Top 10 jugadores por altura')
axes[0].set_xlabel('Altura (cm)')

# Gráfica 2: Relación peso-altura
pesos = [fila[4] for fila in dades_transformades]
axes[1].scatter(alturas, pesos, alpha=0.5)
axes[1].set_title('Relación entre altura y peso')
axes[1].set_xlabel('Altura (cm)')
axes[1].set_ylabel('Peso (kg)')


plt.tight_layout()
plt.show()

# ========== 3- CAMBIAR FORMATO DE DATOS (CSV a JSON) ==========

# Leer el archivo CSV que creamos
jugadores_json = []

with open('jugadors_basket.csv', 'r', encoding='ascii') as archivo_csv:
    lector = csv.reader(archivo_csv, delimiter='^')
    
    # Leer la cabecera
    cabecera = next(lector)
    
    # Leer cada fila y crear un diccionario
    for fila in lector:
        jugador = {}
        for i in range(len(cabecera)):
            # Convertir números si es posible
            if cabecera[i] == 'Altura' or cabecera[i] == 'Pes':
                jugador[cabecera[i]] = float(fila[i])
            elif cabecera[i] == 'Edat':
                jugador[cabecera[i]] = int(fila[i])
            else:
                jugador[cabecera[i]] = fila[i]
        jugadores_json.append(jugador)

# Escribir el archivo JSON
with open('jugadors_basket.json', 'w', encoding='utf-8') as archivo_json:
    json.dump(jugadores_json, archivo_json, ensure_ascii=False, indent=2)

print(f"\nArchivo 'jugadors_basket.json' creado exitosamente con {len(jugadores_json)} jugadores")