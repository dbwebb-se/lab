---
author:
    - aar
    - efo
revision:
    "2018-06-28": (A, efo) individuella examinationen 2018-lp1.
...
Individuell examination
==================================

Denna individuella examination består av fem uppgifter. De olika uppgifterna förklaras nedanför och varje uppgift ska lösas i filen "exam.py" i en specifik fördefinierad funktion.  För alla uppgifter du löser, uppdatera docstring (kommentaren längst upp i funktionen) för den funktionen till en relevant kommentar om vad funktionen gör.

För att få betyget E, godkänt, behöver du klara  uppgift 1. För varje uppgift du klarar utöver uppgift 1 är betygsstegen D, C, B, A. Dvs. klarar du 3 uppgifter får du C och klarar du alla 5 får du A.
När du vill under hela examination kan du köra kommandot "dbwebb correct exam" för att rätta dina lösningar och se vilket betyg du har uppnått.

Utöver att lösa uppgifterna behöver du se till att alla filer validera med "dbwebb validate exam".

Du har X antal timmer på dig att lösa uppgifterna, publicera dina lösningar med kommandot "dbwebb publish exam" inom tidsramen. Den sista publish som görs inom tidsramen är den som kommer användas som betygsunderlag.



Uppgifter
---------------------------------

1. Analysera text. Den här uppgiften går ut på att du ska analysera textfilen "manifesto.txt" på 3 olika sätt. "analyze_text" ska innehålla en while-loop som tar emot input från användaren. Loopen ska avslutas om användaren skriver "q" eller "quit", när programmet avslutas returneras True.
De tre olika sätten texten ska analyseras på är:
    A. Om användaren skriver "v" som input ska antalet vokaler skrivas ut med print(). Skriv enbart ut siffran, ingen extra text.
    B. Om användaren skriver "p" som input ska antalet punkter (".") skrivas ut med print(). Skriv enbart ut siffran, ingen extra text.
    C. Om användaren skriver "u" som input ska antalet stora bokstäver skrivas ut med print(). Skriv enbart ut siffran, ingen extra text.
Funktionen analyze_text ska enbart innehålla while-loopen som tar inputs och if-satsen för valen. Övriga funktioner ska ligga i en ny modul som du även ska skapa. Modulen ska heta "analyze_functions.py", det ska finns minst en funktion för varje menyval, utom valet "q". Om användaren skriver ett ej giltigt argument ska "Not an option!" skrivas ut.



2. Hitta medianen. Fyll i funktionen "list_median", den ska hitta medianen över värdena som finns i listan. Medianen är det värde för en ordnad lista som delar listan i två lika stora delar. Om listan innehåller ett jämnt antal element är medianen medelvärdet av de två tal som ligger i mitten av listan, sorterad. Du kan anta att värdena som skickas som argument endast innehåller heltal. Din funktion ska returnera medianen av listan och retur värdet ska max ha en decimal. Ni får inte importera moduler från Pythons standard bibliotek för att lösa uppgiften.



3. Hitta dubbletter. Fyll i funktionen "find_duplicates", den ska ta en lista som argument och listan innehåller strängar. Hitta alla dubbletter och returnera en lista med värdet som är en dubblett. I den returnerade listan ska varje dubblett endast vara med en gång. Din lösning ska vara case-insensitive, dvs. a == A. Listan som returneras ska vara sorterad i bokstavsordning.



4. Kolla datatyper. Fyll i funktionen "types", den ska ta emot en lista som argument. Den listan kan innehålla ett godtyckligt antal element av tre olika datatyper. De möjliga data typerna är heltal, strängar och listor. Funktionen ska returnera en sträng som byggs upp av de olika elementen som finns i argumentet. Beroende på datatypen gör följande:
    A. Heltal, lägg till strängen "The square of i is i^2.", där "i" är heltalet.
    B. Sträng, lägg till strängen "The secret word is s.", där "s" är strängen.
    C. Lista, lägg till strängen "The list contains x, y, z.", där "xyz" är värden från listan. Listan kan innehålla en odefinierad mängd värden. Du kan anta att elementen är av datatypen sträng.
    D. Annan typ, om värdet är av annan typ än de ovanför, gör inget.
Den returnerande strängen ska innehålla mellanrum mellan de olika strängar som har byggts ihop. Om argumentet är en tom lista ska funktionen returnera en tom sträng. Exempel på argument och resultat är följande, [1, "hej", ["3","4","5"]] --> "The square of 1 is 1. The secret word is hej. The list contains 3, 4, 5.".



5. Validera email adresser. Fyll i funktionen "validate_email", den ska validera en email adress. Funktionen ska returnera True om adressen är giltig, annars False. Följande regler gäller:
    A. innehåller ett "@".
    B. efter @, minst en punkt, "." och karaktärer framför punkten.
    C. efter den sista punkten 2 eller 3 karaktärer.
    D. innehåller endast karaktärerna a-z och 0-9 samt ".", "_", "-", "@".
    E. endast små bokstäver.
    F. det ska finnas karaktärer framför "@".
