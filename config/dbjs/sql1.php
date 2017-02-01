<?php

/**
 * Generate random values to use in lab.
 */
include __DIR__ . "/../random.php";

$owner = rand_array(["Adam", "Berit", "Ceasar"]);
$ownerChar = rand_array(["a", "e"]);

$sortOrder = [
    [
        "text" => "sjunkande",
        "sql" => "DESC"
    ],
    [
        "text" => "stigande",
        "sql" => "ASC"
    ]
];
$sortWhich = rand_int(0, 1);
$sortOrder1 = $sortOrder[$sortWhich];
$sortOrder2 = $sortOrder[!$sortWhich];



// Settings
$base = tempDir();
$dbname = "db.sqlite";
$db = "$base/$dbname";
$sqlite = "sqlite3 -header -column $db";

$sqlFile = "games.sql";
$tableA = "Games";

$sqlCreate = <<<EOD
DROP TABLE IF EXISTS "Jetty";
CREATE TABLE IF NOT EXISTS "Jetty" (
    "jettyPosition" INTEGER PRIMARY KEY  NOT NULL  UNIQUE,
    "boatType" VARCHAR(20) NOT NULL,
    "boatEngine" VARCHAR(20) NOT NULL,
    "boatLength" INTEGER,
    "boatWidth" INTEGER,
    "ownerName" VARCHAR(20)
);
EOD;

$sqlInsert = <<<EOD
INSERT INTO "Jetty" VALUES(1,"Buster XXL","Yamaha 115hk",635,240,"Adam");
INSERT INTO "Jetty" VALUES(2,"Buster M","Yamaha 40hk",460,186,"Berit");
INSERT INTO "Jetty" VALUES(3,"Linder 440","Tohatsu 4hk",431,164,"Ceasar");
EOD;



return [



/**
 * Titel and introduction to the lab.
 */
"answerFormat" => "text",

"title" => "Lab 1 SQL introduktion",

"intro" => <<<EOD
Lek runt med inledande SQL-satser i SQLite. Det är bra om du har manualen för SQLite uppe, där kan du se [syntaxen för SQL-satserna](https://www.sqlite.org/lang.html) och du kan se vilka [extra funktioner som stöds](https://www.sqlite.org/lang_corefunc.html).

Du får grunden till en databas, i form av SQL-kommandon. Du skall sedan använda SQL för att hämta ut och presentera information från databasen. Databasen är den som du jobbat med i övningen "[Kom igång med databasen SQLite](https://dbwebb.se/kunskap/kom-igang-med-databasen-sqlite)".

Efterhand så bygger vi ut databasen till fler tabeller och avslutar med att använda joins för att joina innehållet från olika tabeller.

**Tips.**

I labben skapas en databas `$dbname` och du kan använda följande kommando för att jobba direkt mot den databasen i en separat terminal.

> `sqlite3 -header -column $dbname`

Det kan vara bra för att testa, men kom ihåg att databasen byggs om varje gång du exekverar labben.

EOD
,

"header" => null,

"passPercentage" => 100/100,
//"passDistinctPercentage" => 100/100,
/*
*/

/*
"grades" => [
    "pass" => 60/100,
    "pass-distinct" => 100/100,
]
*/

"sections" => [



/** ===========================================================================
 * New section of exercises.
 */
[
"title" => "CREATE TABLE Jetty",

"intro" => <<<EOD
Vi börjar med ingenting och skall nu återskapa databasen med innehåll från övningen med `boats.sqlite` och tabellen Jetty.

Till att börja med skapar vi tabellen Jetty.

Glöm inte att avsluta varje SQL-sats med ett semikolon.

EOD
,

"shuffle" => false,

"questions" => [



/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Titta i filen `Mos_Jetty.sql` och kopiera SQL-satserna för `DROP TABLE` och `CREATE TABLE`. Byt tabellens namn till `Jetty`. Exekvera dem i varsin SQL sats.

Svara sedan med resultatet från:

> `SELECT * FROM Jetty;`

Det är den sista SQL-satsen som innehåller själva svaret på varje uppgift, det är så labbverktyget fungerar. I detta fallet blir resultatet helt tomt, men vi har ännu inte lagt in några värden i tabellen så det är helt i sin ordning.

EOD
,

"points" => 1,

"answer" => function () use ($sqlite, $sqlCreate) {
    execute("$sqlite '$sqlCreate'");
    return execute("$sqlite \"select * from Jetty\"");
},

],



/** ---------------------------------------------------------------------------
 * A question.
 */
/*
[

"text" => <<<EOD
Börja med att inspektera strukturen av tabellen. Olika databasmotorer har olika sätt att inspektera hur tabeller är skapade. I SQLite skriver du så här.

> `.schema Jetty`

I labben gör du en rad som ser ut så här:

> `SQL '.schema Jetty' false`

Du kan alltså exekvera hjälp- och admin-kommandon, precis som om du jobbar i sqlite3-klienten.

Notera att du _inte avslutar_ med semikolon nu. Det gör du endast när du skriver ren SQL.

Värdet i slutet kan du ändra till `true` för att få utskrift av resultatet, som en _hint_ om hur det skall se ut. Det är bra för debugging. Pröva hur det ser ut. Ändra sedan tillbaka till `false` för att få mindre utskrifter.

EOD
,

"points" => 1,

"answer" => function () use ($sqlite) {
    return execute("$sqlite \".schema Jetty\"");
},

],*/



/** ---------------------------------------------------------------------------
 * Closing up this section.
 */
], // EOF questions
], // EOF section



/** ===========================================================================
 * New section of exercises.
 */
[
"title" => "INSERT INTO",

"intro" => <<<EOD
Nu använder vi `INSERT INTO` för att lägga till rader i tabellen.

EOD
,

"shuffle" => false,

"questions" => [



/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Titta i filen `Mos_Jetty.sql` och kopiera de SQL-satser som börjar med `INSERT INTO`. Exekvera dem en och en. 

Glöm inte byta namn på tabellen till `Jetty`.

Svara sedan med resultatet från:

> `SELECT * FROM Jetty;`

EOD
,

"points" => 1,

"answer" => function () use ($sqlite, $sqlInsert) {
    execute("$sqlite '$sqlInsert'");
    return execute("$sqlite \"select * from Jetty\"");
},

],



/** ---------------------------------------------------------------------------
 * Closing up this section.
 */
], // EOF questions
], // EOF section



/** ===========================================================================
 * New section of exercises.
 */
[
"title" => "SELECT FROM",

"intro" => <<<EOD
Låt oss söka ut och visa information från tabellen med hjälp av `SELECT FROM`.

EOD
,

"shuffle" => false,

"questions" => [



/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Visa namnet på båtens typ (`boatType`) på de båtar som ligger i tabellen. Rubriken för kolumnen skall vara "Type". Sortera resultatet i ${sortOrder1["text"]} ordning baserat på båtens typ.

EOD
,

"points" => 1,

"answer" => function () use ($sqlite, $sortOrder1) {
    $sql = <<<EOD
SELECT
    boatType AS "Type"
FROM  Jetty
ORDER BY boatType ${sortOrder1["sql"]}
;
EOD;
    return execute("$sqlite '$sql'");
},

],



/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Visa namnet på samtliga ägare och vilken båttyp som de har. Rubriken för ägaren skall vara "Owner" och för båtens typ "Type". Sortera resultatet i ${sortOrder2["text"]} ordning baserat på ägarens namn.

EOD
,

"points" => 1,

"answer" => function () use ($sqlite, $sortOrder2) {
    $sql = <<<EOD
SELECT
    ownerName AS Owner,
    boatType AS Type
FROM Jetty
ORDER BY ownerName ${sortOrder2["sql"]}
;
EOD;
    return execute("$sqlite '$sql'");
},

],



/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Visa all information om de båtar som ägs av $owner.

EOD
,

"points" => 1,

"answer" => function () use ($sqlite, $owner) {
    $sql = <<<EOD
SELECT
    *
FROM Jetty
WHERE
    ownerName = "$owner"
;
EOD;
    return execute("$sqlite '$sql'");
},

],



/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Visa båttyp ("Type"), båtens motor ("Engine") och ägarens namn ("Owner") för alla ägarens namn som innehåller ett `$ownerChar`. Sortera per ägarens namn, i ${sortOrder1["text"]} ordning.

EOD
,

"points" => 1,

"answer" => function () use ($sqlite, $ownerChar, $sortOrder1) {
    $sql = <<<EOD
SELECT
    boatType AS Type,
    boatEngine AS Engine,
    ownerName AS Owner
FROM Jetty
WHERE
    ownerName LIKE "%$ownerChar%"
ORDER BY ownerName ${sortOrder1["sql"]}
;
EOD;
    return execute("$sqlite '$sql'");
},

],



/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Visa de båtar som är längre än 4.5 meter. Visa båtens typ ("Type") och båtens längd ("Length").

EOD
,

"points" => 1,

"answer" => function () use ($sqlite) {
    $sql = <<<EOD
SELECT
    boatType AS Type,
    boatLength AS Length
FROM Jetty
WHERE
    boatLength > 450
;
EOD;
    return execute("$sqlite '$sql'");
},

],



/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Visa de båtar som är längre än 4.5 meter och kortare än 6 meter. Visa båtens typ ("Type") och båtens längd ("Length").

EOD
,

"points" => 1,

"answer" => function () use ($sqlite) {
    $sql = <<<EOD
SELECT
    boatType AS Type,
    boatLength AS Length
FROM Jetty
WHERE
    boatLength > 450 AND
    boatLength < 600
;
EOD;
    return execute("$sqlite '$sql'");
},

],




/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Skriv ett `WHERE`-villkor som uppfyller regeln att visa de båtar som är längre än 4.5 meter och kortare än 7 meter och har en båtmotor från Yamaha, eller båtar som har en motor från Tohatsu. Visa båtens typ ("Type") och båtens motor ("Engine").

EOD
,

"points" => 1,

"answer" => function () use ($sqlite) {
    $sql = <<<EOD
SELECT
    boatType AS Type,
    boatEngine AS Engine
FROM Jetty
WHERE
    (boatLength > 450 AND
    boatLength < 600 AND
    boatEngine LIKE "Yamaha%") OR
    boatEngine LIKE "Tohatsu%"
;
EOD;
    return execute("$sqlite '$sql'");
},

],




/** ---------------------------------------------------------------------------
 * Closing up this section.
 */
], // EOF questions
], // EOF section



/** ===========================================================================
 * New section of exercises.
 */
[
"title" => "Lägg till och uppdatera",

"intro" => <<<EOD
Använd `INSERT INTO` för att lägga till fler rader och `UPDATE` för att uppdatera informationen i databasen.

EOD
,

"shuffle" => false,

"questions" => [



/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Det har tillkommit ytterligare båtar som skall läggas in i tabellen. Lägg till följande.

| Typ | Motor | Längd | Bredd | Ägare |
|-----|-------|-------|-------|-------|
| Seadoo Spark | Rotax 90hk | 305 | 118 | Debbie |
| Plastic skiff | Oar | 220 | 99 | Debbie |
| Seadoo Spark | Rotax 90hk | 305 | 118 | Berit |

Svara sedan med `SELECT *` och sortera på båtens ägare i ${sortOrder2["text"]} ordning.

EOD
,

"points" => 1,

"answer" => function () use ($sqlite, $sortOrder2) {
    $sql = <<<EOD
INSERT INTO Jetty (boatType, boatEngine, boatLength, boatWidth, ownerName) VALUES ("Seadoo Spark", "Rotax 90hk", 305, 118, "Debbie"), ("Plastic skiff", "Oar", 220, 99, "Debbie"), ("Seadoo Spark", "Rotax 90hk", 305, 118, "Berit")
;
EOD;
    execute("$sqlite '$sql'");

    $sql = <<<EOD
SELECT
    *
FROM Jetty
ORDER BY ownerName ${sortOrder2["sql"]};
;
EOD;
    return execute("$sqlite '$sql'");
},

],



/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Adam köper vattenskootern SeaDoo Spark av Berit. Uppdatera i databasen.

Svara sedan med `SELECT *` och sortera på båtens ägare i ${sortOrder1["text"]} ordning.

EOD
,

"points" => 1,

"answer" => function () use ($sqlite, $sortOrder1) {
    $sql = <<<EOD
UPDATE Jetty
SET 
    ownerName = "Adam"
WHERE
    boatType = "Seadoo Spark" AND
    ownerName = "Berit"
;
EOD;
    execute("$sqlite '$sql'");

    $sql = <<<EOD
SELECT
    *
FROM Jetty
ORDER BY ownerName ${sortOrder1["sql"]};
;
EOD;
    return execute("$sqlite '$sql'");
},

],



/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Debbie byter ut sin plasteka mot en ny Buster M (längd 4,75m och bredd 1,86m) som har en motor Yamaha 50hk. Uppdatera i databasen.

Svara sedan med `SELECT *` och sortera på båtens ägare i ${sortOrder2["text"]} ordning.

EOD
,

"points" => 1,

"answer" => function () use ($sqlite, $sortOrder2) {
    $sql = <<<EOD
UPDATE Jetty
SET 
    boatType   = "Buster M",
    boatEngine = "Yamaha 50hk",
    boatLength = 475,
    boatWidth  = 186
WHERE
    boatType = "Plastic skiff"
;
EOD;
    execute("$sqlite '$sql'");

    $sql = <<<EOD
SELECT
    *
FROM Jetty
ORDER BY ownerName ${sortOrder2["sql"]};
;
EOD;
    return execute("$sqlite '$sql'");
},

],



/** ---------------------------------------------------------------------------
 * Closing up this section.
 */
], // EOF questions
], // EOF section



/** ===========================================================================
 * New section of exercises.
 */
[
"title" => "Modfiera tabellstruktur",

"intro" => <<<EOD
Se hur du kan modifiera en befintlig tabellstruktur via `ALTER TABLE`.

Båtklubben expanderar och har fått två nya fina bryggor och väljer att placera båtarna vid namngivna båtplatser.


```text
--------------------------------
|                              |
| Brygga A (A1 - A6)           |
|                              |
--------------------------------

--------------------------------
|                              |
| Brygga B (B1 - B6)           |
|                              |
--------------------------------
```

Varje brygga har 6 båtplatser vardera, namngivna enligt A1-A6 och B1-B6.

EOD
,

"shuffle" => false,

"questions" => [



/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Uppdatera tabellen så att du lägger till en kolumn `berth` som kan innehålla båtens plats vid en brygga.

Utför ändringen i databasen med hjälp av `ALTER TABLE`.

Placera sedan ut båtarna på platserna enligt följande.

| Owner  | Type          | Berth      |
|--------|---------------|------------|
| Adam   | Buster XXL    | A1         |
| Adam   | Seadoo Spark  | A2         |
| Berit  | Buster M      | A3         |
| Ceasar | Linder 440    | B4         |
| Debbie | Seadoo Spark  | B5         |
| Debbie | Buster M      | B6         |

Svara sedan med SQL-satsen som visar ovanstående tabell.


EOD
,

"points" => 1,

"answer" => function () use ($sqlite) {
    $sql = <<<EOD
ALTER TABLE Jetty ADD COLUMN berth TEXT NOT NULL DEFAULT "";

UPDATE Jetty SET berth = "A1" WHERE jettyposition = 1;
UPDATE Jetty SET berth = "A2" WHERE jettyposition = 6;
UPDATE Jetty SET berth = "A3" WHERE jettyposition = 2;
UPDATE Jetty SET berth = "B4" WHERE jettyposition = 3;
UPDATE Jetty SET berth = "B5" WHERE jettyposition = 4;
UPDATE Jetty SET berth = "B6" WHERE jettyposition = 5;
 
EOD;
    execute("$sqlite '$sql'");

    $sql = <<<EOD
SELECT
    ownerName AS "Owner",
    boatType AS "Type",
    berth AS "Berth"
FROM Jetty
ORDER BY berth ASC
;
EOD;
    return execute("$sqlite '$sql'");
},

],



/** ---------------------------------------------------------------------------
 * Closing up this section.
 */
], // EOF questions
], // EOF section



/** ===========================================================================
 * New section of exercises.
 */
[
"title" => "Aggregerande funktioner",

"intro" => <<<EOD
Använd `SELECT` och aggregerande funktioner för att svara på följande frågor.

EOD
,

"shuffle" => false,

"questions" => [



/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Räkna antalet båtar i tabellen med `COUNT()` och ge rubriken "Total".

EOD
,

"points" => 1,

"answer" => function () use ($sqlite) {
    $sql = <<<EOD
SELECT
    Count(berth) AS "Total"
FROM Jetty
;
EOD;
    return execute("$sqlite '$sql'");
},

],



/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Räkna hur många båtar som har en längd större än 4m. Ge rubriken "Total".

EOD
,

"points" => 1,

"answer" => function () use ($sqlite) {
    $sql = <<<EOD
SELECT
    Count(berth) AS "Total"
FROM Jetty
WHERE
    boatLength > 400
;
EOD;
    return execute("$sqlite '$sql'");
},

],




/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Använd `MAX()` för att visa den bredaste båten. Svara med båtens typ ("Type") och bredd ("Width").

EOD
,

"points" => 1,

"answer" => function () use ($sqlite) {
    $sql = <<<EOD
SELECT
    boatType AS Type,
    MAX(boatWidth) AS "Width"
FROM Jetty
;
EOD;
    return execute("$sqlite '$sql'");
},

],



/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Använd `MIN()` för att visa den kortaste båten. Svara med båtens typ ("Type") och längd ("Length").

EOD
,

"points" => 1,

"answer" => function () use ($sqlite) {
    $sql = <<<EOD
SELECT
    boatType AS Type,
    MIN(boatLength) AS "Length"
FROM Jetty
;
EOD;
    return execute("$sqlite '$sql'");
},

],



/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Använd `SUM()` för att summera längden på alla båtar som har en större längd än den kortaste båten. Svara med summan ("Total length").

Det är okey att hårdkoda värdet för den kortaste båten. Som överkurs kan du försöka att skriva SQL-satsen så att du dynamiskt tar reda på kortaste båten (men det är inget vi lärt oss så här långt).

EOD
,

"points" => 1,

"answer" => function () use ($sqlite) {
    $sql = <<<EOD
SELECT
    SUM(boatLength) AS "Total length"
FROM Jetty
WHERE
    boatLength > 305
;
EOD;
    return execute("$sqlite '$sql'");
},

],



/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Hur många båtar är längre än den kortaste båten? Svara med antalet båtar ("Total").

EOD
,

"points" => 1,

"answer" => function () use ($sqlite) {
    $sql = <<<EOD
SELECT
    COUNT(boatLength) AS "Total"
FROM Jetty
WHERE
    boatLength > 305
;
EOD;
    return execute("$sqlite '$sql'");
},

],



/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Visa båtägare ("Owner") och den sammalagda längden ("Total") för deras båt/båtar. Dvs, summera båtarnas längd, och visa svaret för respektive ägare. Tips `GROUP BY`.

Sortera på totalen i ${sortOrder1["text"]} ordning.

EOD
,

"points" => 1,

"answer" => function () use ($sqlite, $sortOrder1) {
    $sql = <<<EOD
SELECT
    ownerName AS "Owner",
    SUM(boatLength) AS "Total"
FROM Jetty
GROUP BY
    ownerName
ORDER BY
    Total ${sortOrder1["sql"]};
;
EOD;
    return execute("$sqlite '$sql'");
},

],



/** ---------------------------------------------------------------------------
 * Closing up this section.
 */
], // EOF questions
], // EOF section



/** ===========================================================================
 * New section of exercises.
 */
[
"title" => "Inbyggda funktioner",

"intro" => <<<EOD
En databasmotor innehåller en uppsättning av inbyggda funktioner som kan användas för att till exempel formattera och förbereda resultatet.

EOD
,

"shuffle" => false,

"questions" => [



/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Vilken är medellängden på samtliga båtar ("Length")? Avrunda svaret till en decimal.

EOD
,

"points" => 1,

"answer" => function () use ($sqlite) {
    $sql = <<<EOD
SELECT
    Round(AVG(boatLength), 1) AS "Length"
FROM Jetty
;
EOD;
    return execute("$sqlite '$sql'");
},

],



/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Ta båtägarens namn och båtens typ, slå samman de båda strängarna, separera dem med ett mellanslag och visa dem ("Boat"). Ta dessutom den strängen och visa den som ett hexadecimalt värde ("Hex").

Visa resultatet och sortera per hex-värdet i ${sortOrder1["text"]} ordning.
EOD
,

"points" => 1,

"answer" => function () use ($sqlite, $sortOrder1) {
    $sql = <<<EOD
SELECT
    ownerName || " " || boatType AS "Boat",
    hex(ownerName || " " || boatType) AS "Hex"
FROM Jetty
ORDER BY
    Hex ${sortOrder1["sql"]}
;
EOD;
    return execute("$sqlite '$sql'");
},

],



/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Visa bryggans namn, följt av ett minustecken omgivet av mellanslag, följt av båtens typ, mellanslag och ägarens namn inom parantes. Lägg allt i en sträng ("Boats") och sortera i ${sortOrder2["text"]} ordning.

EOD
,

"points" => 1,

"answer" => function () use ($sqlite, $sortOrder2) {
    $sql = <<<EOD
    SELECT
         substr(berth, 1, 1) || " - " || boatType || " (" || ownerName || ")" AS "Boats"
    FROM Jetty
    ORDER BY
        Boats ${sortOrder2["sql"]}
;
EOD;
    return execute("$sqlite '$sql'");
},

],



/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Du tänker börja använda datum i din databas, men först måste du träna dig.

Den första måndagen i september 1990 startade programmet Programvaruteknik för första gången. I Svängsta, utanför Karlshamn, av alla platser.

Använd SQL för att klura ut vilken datum det var.

Använd sedan det datumet och svara med en SQL-sats som räknar ut Julian day för den dagen ("Julian day").

EOD
,

"points" => 1,

"answer" => function () use ($sqlite) {
    $sql = <<<EOD
    SELECT
         strftime("%J", "1990-09-03") AS "Julian day"
;
EOD;
    return execute("$sqlite '$sql'");
},

],



/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
De första studenterna från programmet Programvaruteknik, examinerades två år senare, den första veckan i juni. Låt säga att det var på fredagen. Det var nog omtentavecka så ingen har nog egentligen koll. Platsen var iallafall Ronneby, Soft Center.

Använd SQL för att räkna ut vilket datum det var. Använd sedan det datumet och via SQL plussa på 25 år för att svara med när det borde vara/varit 25 års jubileum för de första utexaminerade programvaruteknikerna ("Party").

EOD
,

"points" => 1,

"answer" => function () use ($sqlite) {
    $sql = <<<EOD
    SELECT
         date("1992-06-05", "25 years") AS "Party"
;
EOD;
    return execute("$sqlite '$sql'");
},

],



/** ---------------------------------------------------------------------------
 * Closing up this section.
 */
], // EOF questions
], // EOF section



/** ===========================================================================
 * New section of exercises.
 */
[
"title" => "Strukturera i fler tabeller och joina",

"intro" => <<<EOD
Styrelsen i marinan har beslutat att börja ta betalt för båtplatserna. De vill lägga till en årskostnad för de olika båtplatserna som de kan fakturera varje år.

Du behöver börja spara adressen till båtägarna och priserna på respektive båtplats.

Dessutom bygger de olika bryggplatser med olika storlek, för att maximera hur många båtar de kan ta in på bryggorna.

Du behöver spara storleken på varje båtplats.

Dags att börja bygga fler tabeller.

EOD
,

"shuffle" => false,

"questions" => [



/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Skapa en ny tabell "Berth" som innehåller samtliga båtplatser, deras storlek och dess årskostnad, enligt följande. Låt båtplatsens id vara den primära nyckeln. Kolumnnamnen skall ha små bokstäver.

| Id  | Width   | Length  |  Price  |
|-----|---------|---------|---------|
| A1  | 350     | 600     |  800    |
| A2  | 350     | 600     |  800    |
| A3  | 350     | 600     |  800    |
| A4  | 250     | 500     |  500    |
| A5  | 250     | 500     |  500    |
| A6  | 250     | 500     |  500    |
| B1  | 300     | 600     |  600    |
| B2  | 300     | 600     |  600    |
| B3  | 300     | 600     |  600    |
| B4  | 150     | 450     |  450    |
| B5  | 150     | 450     |  450    |
| B6  | 150     | 450     |  450    |

Svara med tabellen enligt ovan och sortera på priset i ${sortOrder2["text"]} ordning.

EOD
,

"points" => 1,

"answer" => function () use ($sqlite, $sortOrder2) {
    $sql = <<<EOD
CREATE TABLE Berth
(
    id TEXT PRIMARY KEY NOT NULL,
    width INTEGER NOT NULL,
    length INTEGER NOT NULL,
    price INTEGER NOT NULL
);

INSERT INTO Berth VALUES 
    ("A1", 350, 600, 800),
    ("A2", 350, 600, 800),
    ("A3", 350, 600, 800),
    ("A4", 250, 500, 500),
    ("A5", 250, 500, 500),
    ("A6", 250, 500, 500),
    ("B1", 300, 600, 600),
    ("B2", 300, 600, 600),
    ("B3", 300, 600, 600),
    ("B4", 150, 450, 450),
    ("B5", 150, 450, 450),
    ("B6", 150, 450, 450)
;

EOD;
    execute("$sqlite '$sql'");

    $sql = <<<EOD
SELECT
    id AS "Id",
    width as "Width",
    length AS "Length",
    price AS "price"
FROM Berth
ORDER BY
    price ${sortOrder2["sql"]};
;
EOD;
    return execute("$sqlite '$sql'");
},

],



/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Joina tabellerna och visa hur mycket varje person ("Owner") skall faktureras ("Cost") per båtplats ("Position").

Sortera per båtplatsen i ${sortOrder1["text"]} ordning.

EOD
,

"points" => 1,

"answer" => function () use ($sqlite, $sortOrder1) {
    $sql = <<<EOD
SELECT
    J.ownerName AS "Owner",
    B.price AS "Cost",
    B.id AS "Position"
FROM Jetty AS J
INNER JOIN Berth AS B
    ON J.berth = B.id
ORDER BY
    B.id ${sortOrder1["sql"]};
;
EOD;
    return execute("$sqlite '$sql'");
},

],



/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Joina tabellerna och visa hur mycket varje person ("Owner") skall faktureras totalt ("Total").

Du skall alltså summera hur mycket varje person skall betala. Tips `GROUP BY`.

Sortera per totalen i ${sortOrder2["text"]} ordning.

EOD
,

"points" => 1,

"answer" => function () use ($sqlite, $sortOrder2) {
    $sql = <<<EOD
SELECT
    J.ownerName AS "Owner",
    SUM(B.price) AS "Total"
FROM Jetty AS J
INNER JOIN Berth AS B
    ON J.berth = B.id
GROUP BY J.ownerName
ORDER BY
    Total ${sortOrder2["sql"]};
;
EOD;
    return execute("$sqlite '$sql'");
},

],



/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Skriv en SQL-sats som visar om respektive båt passar in i båtplatsen. Visa båtplatsen ("Position"), båtens typ ("Type"), båtens längd ("Length") och bredd ("Width") samt båtplatsens maxlängd ("MaxLength") och maxbredd ("MaxWidth").

Lägg dessutom till en extra kolumn ("OK") som säger "OK" om båten passar in på platsen, annars visa den "NOK". Tips `CASE`.

Sortera på båtplatsen i ${sortOrder1["text"]} ordning.

EOD
,

"points" => 1,

"answer" => function () use ($sqlite, $sortOrder1) {
    $sql = <<<EOD
SELECT
    B.id AS "Position",
    J.boatType AS "Type",
    J.boatLength AS "Length",
    J.boatWidth AS "Width",
    B.length AS "MaxLength",
    B.width AS "MaxWidth",
    CASE WHEN J.boatLength <= B.length AND J.boatWidth <= B.width 
        THEN "OK"
        ELSE "NOK"
    END AS "OK"
FROM Jetty AS J
INNER JOIN Berth AS B
    ON J.berth = B.id
ORDER BY
    B.id ${sortOrder1["sql"]};
;
EOD;
    return execute("$sqlite '$sql'");
},

],



/** ---------------------------------------------------------------------------
 * Closing up this section.
 */
], // EOF questions
], // EOF section



/** ===========================================================================
 * Closing up all sections.
 */
] // EOF sections



/**
 * Closing up this lab.
 */
]; // EOF the entire lab
