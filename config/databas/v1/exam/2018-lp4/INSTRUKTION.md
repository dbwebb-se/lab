---
author:
    - mos
category:
    - kurs databas
    - examination
revision:
    "2018-05-30": "(A, mos) Examinationen 31 maj 2018."
...
Examination 31 maj 2018
=======================================

Detta är den individuella examinationen som är en del av kmom07-10.

<!--
Du kan läsa detta dokumentet i webbläsaren via länken "[Det stora slaget om tårtan](https://dbwebb.se/kurser/databas/examination/det-stora-slaget-om-tartan)"
-->

Uppgifterna skall lösas individuellt och du får inte prata, diskutera eller chatta med någon för att ta hjälp. Fråga läraren om något är oklart med uppgifterna. Om du är distansstudent så kan du använda kursens Gitter-kanal för att ställa frågor till läraren.

Övriga hjälpmedel är tillåtna, inklusive egen dator, access till Internet och tillgång till tidigare kursmoment och ditt kursrepo.

Examinationen är begränsad till 5 timmar. 

Du behöver samla ihop **minst 10 poäng för att få godkänt** på detta examinationsmomentet. Samla fler poäng för att nå ett högre slutbetyg på kursen.

<!--more-->


Spara all kod i `me/kmom10/exam` och inled med en `dbwebb exam checkout exam` (om du inte redan gjort det).

Missa inte att läsa sista stycket om hur du skall lämna in din examination, glöm inte att avsluta med en `dbwebb exam seal exam`.



Inledning {#inledning}
---------------------------------------

Du har fått i uppdrag av det stora TV-bolaget "SeeMer" att utveckla en online-tjänst till den populära TV-serien "Det stora slaget om tårtan". Tjänsten skall visa upp tårtorna och man kan genomföra tävlingar och rösta på vilken tårta som är bäst.

Gör en godtycklig sökning på "tårtor" så kan du finna inspiration till innehåll i databasen, eller kika på webbplatsen för TV-programmet "Det Stora Tårtslaget".



Uppgift 1 10p (obligatorisk) {#u1}
---------------------------------------

Bygg en databas med en webbklient och en terminalklient.



### Filheader med ditt namn och akronym {#filheader}

I varje fil du skapar (`*.sql` och `*.js`) så lägger du en kommentar överst, som en header i filen. I kommentaren skriver du ditt namn, akronym och datum så det är tydligt att det är din fil.



### Filer för npm {#npmfiler}

Om du använder moduler som installeras med npm så skall de finnas i en `package.json`.

Den som rättar skall endast behöva göra `npm install`.



### Filer för databasen {#databasfiler}

I filen `sql/setup.sql` lägger du kod för att skapa databasen `exam` och för att ge tillgång till användaren `user` med lösenordet `pass`.

I filen `sql/ddl.sql` lägger du alla SQL DDL som skapar databasens schema.

I filen `sql/insert.sql` lägger du SQL INSERT för att fylla upp databasen.

Skriver du mer SQL-kod så lägger du den i `sql/dml.sql`. Det är bra att spara på kod, man vet aldrig när man vill titta tillbaka på den.

Samtliga filer skall gå att köra i en sekvens, för att återskapa databasen.

Använd kommentarer för att göra koden snygg och ordningsam.

GLÖM INTE att små och stora bokstäver spelar roll i din SQL-kod. Se till att du namnger tabeller och kolumner på samma sätt överallt i din kod.



### Tårtor {#tabell1}

Kunden vill visa upp alla tårtor som skapats i programmet. Skapa en tabell för tårtorna och lägg in 5 tårtor. 

**Tabellen** bör innehålla detaljer om tårtan såsom namn, beskrivning, datum (då den bakades i TV-programmet) samt en bild.

Gör en **lagrad procedur** som visar innehållet från tabellen (`SELECT *`).

När tabellen är klar så bygger du en **terminalklient** som visar upp tabellens innehåll och skriver ut dess innehåll i en fint formatterad textbaserad tabell.

Terminalklienten bygger du med ett menysystem och kommandot för att skriva ut innehållet från tårt-tabellen är `tarta`. Din terminalklient innehåller även kommandon för att visa menyn `menu` och för att avsluta `exit`.

Man startar terminalklienten via `cli.js`.

Kunden gillar vad de ser och ber dig bygga en **webbklient** som listar samma innehåll i en webbsida, fint uppstyrt i en HTML tabell.

I webbklienten gör du även en framsida som representerar TV-serien "Det stora slaget om tårtan". Alla sidorna på webbplatsen har en gemensam header, footer och navbar.

Man startar webbklienten via `index.js`.

Terminalklienten och webbklienten använder samma gränssnitt (samma kodbas) mot databasen och det är den lagrade proceduren som används.



### Tårttävling {#tabell2}

Kunden gillar vad de ser och ber om ytterligare en webbsida i **webbklienten** som kan hantera tårttävlingar.

Du skapar en **tabell** för tävlingar och skapar kolumner för namnet på tävlingen, en beskrivning av tävlingen och datum då tävlingen kommer att ske.

Du fyller tabellen med två tävlingar. En som har varit och en som är på dagens datum.

Du skapar en **lagrad procedur** som skriver ut informationen om alla tävlingar.

Du lägger till kommandot `tavling` i **terminalklienten** som skriver ut alla tävlingar i tabellform.



### Länka mellan tårta och tävling {#lanka}

Kunden gillar återigen vad de ser, men undrar om man inte kan koppla samman informationen från de båda tabellerna och visa i en gemensam rapport.

Kunden vill se ytterligare en sida där man först visar informationen om tävlingen och sedan listar de tårtor som ingår i tävlingen.

Du ser att här behövs en **kopplingstabell**, en tabell som kan länka mellan en tävling och de tårtor som ingår i en tävling. Du skapar en sådan tabell och för varje tävling lägger du in minst två tårtor.

Du uppdaterar din **webbsida** som visar tävlingarna och gör varje tävling klickbar. Klicket leder till en ny sida som visar information om tävlingen samt information om de tårtor som deltar i tävlingen.

Du använder (minst) en **lagrad procedur** för att generera rapporten från databasen.

Du uppdaterar din **terminalklient** och gör så den kan skriva ut de tårtor som deltar i en viss tävling. Kommandot för detta blir `tavling <id>` där man kan ange ett id för en tävling och på så sätt se de tårtor som finns i just den tävlingen.



Uppgift 2 10p (optionell) {#u2}
---------------------------------------

Kunden börjar bli riktigt nöjd och vill nu att man skall kunna rösta (+1) på en tårta som deltar i en tävling.

Du uppdaterar **terminalklienten** med en +1 funktion via `rosta <tavlingsid> <tartid>`.

Du lägger till en sida i **webbklienten** som på motsvarande sätt erbjuder en möjlighet att rösta på en tårta i en tävling, genom att "klicka på +1-knappen".

Du uppdaterar din listning av tårtorna i tävlingen så att de sorteras i ordning så att den som har flest röster hamnar först (både terminalklient och i webbklienten).



Uppgift 3 20p (optionell) {#u3}
---------------------------------------

Kunden vill kunna uppdatera informationen på sin webbplats. Du bygger **CRUD** till dem så de kan lägga till tårtor och tävlingar via **webbklienten**.

Kunden blir extra glad om de även kan koppla tårtor till tävlingarna.



Inlämning {#inlamning}
---------------------------------------

Innan du lämnar in så skall du se till att din kod validerar via `dbwebb validate`.

Lämna slutligen in genom att göra `dbwebb exam seal exam`.

Vid problem, maila mos@bth.se och gör en `dbwebb upload` och maila sedan mos@bth.se och berätta vad som hänt och ange ditt namn och studentakronym.
