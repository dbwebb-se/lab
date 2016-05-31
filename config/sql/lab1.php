<?php

/**
 * Generate random values to use in lab.
 */
include __DIR__ . "/../random.php";


// Settings
$base = tempDir();
$db = "$base/db.sqlite";
$sqlite = "sqlite3 -header -column $db";

$sqlFile = "games.sql";
$tableA = "Games";

$sqlCreate = <<<EOD
DROP TABLE IF EXISTS Games;
CREATE TABLE Games
(
    id INTEGER PRIMARY KEY,
    name TEXT,
    start DATETIME,
    teamA TEXT,
    teamB TEXT,
    scoreA INTEGER,
    scoreB INTEGER,
    score TEXT
);
EOD;

$sqlInsert = <<<EOD
INSERT INTO Games
    (name, start, teamA, teamB, scoreA, scoreB, score)
    VALUES
    -- http://bits.swebowl.se/Matches/Standings.aspx?DivisionId=300&SeasonId=2015&LeagueId=1&LevelId=1&CupGroup=301
    ("Semifinal A", "2016-04-08 20:20", "Team Pergamon BC", "BK Jösse", 9, 11, "http://bits.swebowl.se/Matches/MatchFact.aspx?MatchId=3114786"),
    ("Semifinal A", "2016-04-09 12:20", "BK Jösse", "Team Pergamon BC", 2, 18, "http://bits.swebowl.se/Matches/MatchFact.aspx?MatchId=3114787"),
    ("Semifinal A", "2016-04-09 19:00", "Team Pergamon BC", "BK Jösse", 9, 11, "http://bits.swebowl.se/Matches/MatchFact.aspx?MatchId=3114788"),

    -- http://bits.swebowl.se/Matches/Standings.aspx?DivisionId=300&SeasonId=2015&LeagueId=1&LevelId=1&CupGroup=302
    ("Semifinal B", "2016-04-08 17:00", "Team Clan BK", "Team Alingsas BC", 9, 11, "http://bits.swebowl.se/Matches/MatchFact.aspx?MatchId=3114790"),
    ("Semifinal B", "2016-04-09 09:00", "Team Alingsas BC", "Team Clan BK", 9, 11, "http://bits.swebowl.se/Matches/MatchFact.aspx?MatchId=3114791"),
    ("Semifinal B", "2016-04-09 15:40", "Team Clan BK", "Team Alingsas BC", 11, 4, "http://bits.swebowl.se/Matches/MatchFact.aspx?MatchId=3114792"),

    -- http://bits.swebowl.se/Matches/Standings.aspx?DivisionId=300&SeasonId=2015&LeagueId=1&LevelId=1&CupGroup=201
    ("Final", "2016-04-10 09:00", "Team Pergamon BC", "Team Clan BK", 8, 11, "http://bits.swebowl.se/Matches/MatchFact.aspx?MatchId=3115167"),
    ("Final", "2016-04-10 12:20", "Team Clan BK", "Team Pergamon BC", 8, 12, "http://bits.swebowl.se/Matches/MatchFact.aspx?MatchId=3115168"),
    ("Final", "2016-04-10 15:40", "Team Pergamon BC", "Team Clan BK", 9, 10, "http://bits.swebowl.se/Matches/MatchFact.aspx?MatchId=3115169")
;
EOD;



return [



/**
 * Titel and introduction to the lab.
 */
"answerFormat" => "text",

"title" => "Lab 1 SQL",

"intro" => <<<EOD
Lek runt med inledande SQL-satser i SQLite. Du får en databas att jobba med och du får använda SQL för att hämta ut och presentera information från databasen.

Det är bra om du har manualen för SQLite uppe, där kan du se [syntaxen för SQL-satserna](https://www.sqlite.org/lang.html) och du kan se vilka [extra funktioner som stöds](https://www.sqlite.org/lang_corefunc.html).

Databasen innehåller en tabell från Bowlingens SM-slutspel i 8-mannalag från 2016. En översikt av matchserien ser du via [matchfakta](http://bits.swebowl.se/Matches/ShowCup.aspx?CupId=613).

Labben innehåller även ett facit i form av en videoserie. Du kan välja hur du gör, försök själv att lösa uppgifterna, eller [kika på videoserien](https://www.youtube.com/playlist?list=PLKtP9l5q3ce-I8RIDMfLjsDsp6mALu2kP) hur man kan tänka när man löser uppgifterna.

EOD
,

"header" => null,

"passPercentage" => 90/100,
"passDistinctPercentage" => 100/100,
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
"title" => "CREATE TABLE Games",

"intro" => <<<EOD
Till att börja med skall vi skapa en ny databas med tabellen $tableA. Eftersom vi kommer köra denna labben många gånger så börjar vi varje körning med en ny tabell. Så gör man normalt inte i en vanlig databas, där vill man att informationen finns kvar mellan körningarna.

Men låt oss se hur vi kan göra detta.

Glöm inte att avsluta varje SQL-sats med ett semikolon `;`.

EOD
,

"shuffle" => false,

"questions" => [



/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Titta i filen `$sqlFile` och kopiera de inledande SQL satser för `DROP TABLE` och `CREATE TABLE`. Exekvera dem i varsin SQL sats.

Svara sedan med resultatet från:

> `SELECT * FROM TABLE Games;`

Det är den sista SQL-satsen som innehåller själva svaret på varje uppgift, det är så labbverktyget fungerar.

EOD
,

"points" => 1,

"answer" => function () use ($sqlite, $tableA, $sqlCreate) {
    execute("$sqlite \"$sqlCreate\"");
    return execute("$sqlite \"select * from $tableA\"");
},

],



/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Börja med att inspektera strukturen av tabellen. Olika databasmotorer har olika sätt att inspektera hur tabeller är skapade. I SQLite skriver du så här.

> `.schema $tableA`

I labben gör du en rad som ser ut så här:

> `SQL ".schema $tableA" false`

Notera att du *inte avslutar* med semikolon nu. Det gör du endast när du skriver ren SQL.

Värdet i slutet kan du ändra till `true` för att få utskrift av resultatet. Det är bra för debugging. Pröva hur det ser ut. Ändra sedan tillbaka till `false` för att få mindre utskrifter.

EOD
,

"points" => 1,

"answer" => function () use ($sqlite, $tableA) {
    return execute("$sqlite \".schema $tableA\"");
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
Titta i filen `$sqlFile` och kopiera den SQL sats som börjar med `INSERT INTO`. Exekvera den.

Svara sedan med resultatet från:

> `SELECT * FROM TABLE Games;`

EOD
,

"points" => 1,

"answer" => function () use ($sqlite, $tableA, $sqlInsert) {
    execute("$sqlite '$sqlInsert'");
    return execute("$sqlite \"select * from $tableA\"");
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

Håll det enkelt, det är tillåtet att någorlunda hårdkoda villkor när du väljer ut datat som önskas. Iallafall nu i inledningen av labben.

EOD
,

"shuffle" => false,

"questions" => [



/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Visa namnet på matcherna som spelats, tillsammans med datumet då de spelades. Sortera resultatet per datum så den sista matchen visas sist. Rubriken för kolumn `name` skall vara "Match" och rubriken för kolumn `start` skall vara "Spelstart".

EOD
,

"points" => 1,

"answer" => function () use ($sqlite) {
    $sql = <<<EOD
SELECT
    name AS Match,
    start AS Spelstart
FROM Games
ORDER BY start
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
Visa spelstart och namnen på de klubbarna som var med och spelade matcherna i delserien "Semifinal A". Rubriken skall vara "Spelstart" för `start`, "Hemmalag" för `teamA` och "Bortalag" för `teamB`.

EOD
,

"points" => 1,

"answer" => function () use ($sqlite) {
    $sql = <<<EOD
SELECT
    start AS Spelstart,
    teamA AS Hemmalag,
    teamB AS Bortalag
FROM Games
WHERE
    name = "Semifinal A"
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
Visa namnen på de två klubbarna som var med och spelade den allra första matchen. Rubriken kan vara "Hemmalag" för `teamA` och "Bortalag" för `teamB`.

Hur du väljer att ta reda på vilken den första matchen är, spelar ingen roll.

EOD
,

"points" => 1,

"answer" => function () use ($sqlite) {
    $sql = <<<EOD
SELECT
    teamA AS Hemmalag,
    teamB AS Bortalag
FROM Games
WHERE
    start = "2016-04-08 20:20"
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
Visa länken till matchfakta (score) för den sista matchen i matchserien "Semifinal B". Rubriken kan vara "Matchfakta".

Välj ett villkor för `WHERE` som effektivt väljer ut den valda matchen. Det är okey att *hårdkoda* villkoret.

EOD
,

"points" => 1,

"answer" => function () use ($sqlite) {
    $sql = <<<EOD
SELECT
    score AS "Matchfakta"
FROM Games
WHERE
    name = "Semifinal B"
    AND
    start = "2016-04-09 15:40"
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
Visa namnen på de lag som deltog i finalspelet, ta bort eventuella dubletter i resultatet (tips `DISTINCT`). Sortera per lagnamn i stigande ordning (tips `ORDER BY`). Döp rubriken till "Deltagare i SM-final".

Använd den kunskapen du har om datamängden i tabellen, för att göra en enkel SQL-sats.

EOD
,

"points" => 1,

"answer" => function () use ($sqlite) {
    $sql = <<<EOD
SELECT DISTINCT
    teamA AS "Deltagare i SM-final"
FROM Games
ORDER BY teamA
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
Använd `SELECT FROM` tillsammans med aggregerande funktioner för att svara på följande frågor.

EOD
,

"shuffle" => false,

"questions" => [



/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Räkna ut antalet matcher som har spelats. Döp rubriken till "Antal matcher". Tips `COUNT()`.

EOD
,

"points" => 1,

"answer" => function () use ($sqlite) {
    $sql = <<<EOD
SELECT
    Count(id) AS "Antal matcher"
FROM Games
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
Summera antalet poäng som hemmalagen tagit ("Poäng hemma"), samt antalet poäng som bortalagen tagit ("Poäng borta"). Tips `SUM()`.

EOD
,

"points" => 1,

"answer" => function () use ($sqlite) {
    $sql = <<<EOD
SELECT
    SUM(scoreA) AS "Poäng hemma",
    SUM(scoreB) AS "Poäng borta"
FROM Games
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
"title" => "Beräknade värden",

"intro" => <<<EOD
I en databas vill man inte dubbellagra information. Man lagrar endast det som behövs och går saker att räkna ut, med hjälp av befintlig data, så räcker det.

Om man dubbellagrar data riskerar man att missa en del av datat vid till exempel en `UPDATE`.

I en databas som är *normaliserad* brukar det inte finnas duplicerad data.

EOD
,

"shuffle" => false,

"questions" => [



/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Varje match har totalt 20 poäng. Vi vet sedan tidigare att det fanns 9 matcher. Det kan totalt bli 20 * 9 poäng i respektive kolumn "Poäng hemma" samt "Poäng borta".  Om det är mindre beror det på att någon delmatch blivit oavgjord.

Skriv en SELECT sats som summerar totalen ("Total") av de poäng (samtliga `scoreA` plus samtliga `scoreB`) som tagits.

EOD
,

"points" => 1,

"answer" => function () use ($sqlite) {
    $sql = <<<EOD
SELECT
    SUM(scoreA) + SUM(scoreB) AS "Total"
FROM Games
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
Använd föregående sats och minska värdet på "Total" med antalet delmatcher (20 * 9) för att räkna ut antalet oavgjorda, eller icke avslutade, delmatcher.

EOD
,

"points" => 1,

"answer" => function () use ($sqlite) {
    $sql = <<<EOD
SELECT
    SUM(scoreA) + SUM(scoreB) - (20 * 9) AS "Total"
FROM Games
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
Skriv en SELECT sats som endast visar de matcher där `scoreA + scoreB` inte blir 20.

Ta med kolumnerna "Omgång", "Hemmalag", "Bortalag", "Poäng hemma", "Poäng borta" samt "Total" som är totalt antal poäng för matchen.

EOD
,

"points" => 1,

"answer" => function () use ($sqlite) {
    $sql = <<<EOD
SELECT
    name AS "Omgång",
    teamA AS "Hemmalag",
    teamB AS "Bortalag",
    scoreA AS "Poäng hemma",
    scoreB AS "Poäng borta",
    scoreA + scoreB AS "Total"
FROM Games
WHERE
    scoreA + scoreB != 20
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
Databaser har inbyggda funktioner som hjälper oss att förbereda rapporterna. Det finns inbyggda funktioner för stränghantering, datum och andra bra att ha funktioner.

Låt oss använda några av de inbyggda funktionera.

EOD
,

"shuffle" => false,

"questions" => [



/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Visa de matcher som spelades i matchserien "Semifinal B". För varje match visa "Hemmalag", "Bortalag" samt en sammanslagen kolumn som visar "scoreA - scoreB" i formen "12 - 8". Lös det genom att skapa en sträng via strängkonkatenering.

I SQLite är `||` operatorn för strängkonkatenering. Döp kolumnen till "Resultat".

Lägg till ytterligare en kolumn som du döper till "Diff" som visar differensen mellan `scoreA` och `scoreB`.

EOD
,

"points" => 1,

"answer" => function () use ($sqlite) {
    $sql = <<<EOD
SELECT
    teamA as "Hemmalag",
    teamB AS "Bortalag",
    scoreA || " - " || scoreB AS "Total",
    scoreA - scoreB AS "Diff"
FROM Games
WHERE
    name = "Semifinal A"
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
"title" => "Rapporter",

"intro" => <<<EOD
Med aningen mer avancerad SQL kan man skapa rapporter direkt från informationen i databasen. Kanske trodde man att det behövdes extra programmeringsstöd, men se när vi nu skapar en resultattabell för matcherna.

I varje match tävlar man om 20 poäng, den som har flest vinner matchen och får 2 matchpoäng. Vid lika delar man 1 matchpoäng per lag.

Du kan skapa IF-satser med [SQLites CASE konstruktion](http://www.sqlite.org/lang_expr.html#case).

Vår mål är att skapa en tabell som ser ut ungefär så här.

| Lag | S | V | O | F | TOTAL | D | P |
|-----|---|---|---|---|-------|---|---|
| Team Clan BK | 3 | 2 | 0 | 1 | 29 - 29 | 0 | 4 |
| Team Pergamon BC | 3 | 1 | 0 | 2 | 29 - 29 | 0 | 2 |

EOD
,

"shuffle" => false,

"questions" => [



/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Skapa en rapport som visar varje match med tidpunkt ("Tid"), teamA ("Hemmalag"), teamB ("Bortalag") samt en sträng om vem som vann. "Lag A", "Lag B" eller "Lika".

EOD
,

"points" => 1,

"answer" => function () use ($sqlite) {
    $sql = <<<EOD
SELECT
    start AS "Tid",
    teamA AS "Hemmalag",
    teamB AS "Bortalag",
    CASE WHEN scoreA > scoreB THEN "Lag A"
        WHEN scoreA = scoreB THEN "Lika"
        ELSE "Lag B"
        END
        AS "Vinnare"
    
FROM Games
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
Det fanns inga matcher som var lika, men låt oss ändra det. Skriv en `UPDATE` sats som ändrar matchen som spelades "2016-04-08 20:20" så att ställningen blev 10-10. Gör samma sak för matchen som spelades "2016-04-09 09:00". Använd endast en `UPDATE` sats för att göra båda ändringarna (tips `IN`).

Skapa en matchlista som består av `name` ("Omgång"), `teamA` ("Lag") och "Poäng" där poäng är 2 om `teamA` vann matchen, 1 om matchen var lika och 0 vid förlorad match.

Vi vill alltså bara se matcher som `teamA` spelat. Till att börja med.

EOD
,

"points" => 1,

"answer" => function () use ($sqlite) {
    $sql = <<<EOD
UPDATE Games SET
    scoreA = 10,
    scoreB = 10
WHERE
    start IN (
        "2016-04-08 20:20",
        "2016-04-09 09:00"
    )
;
SELECT 
    name AS "Omgång",
    teamA AS "Lag",
    CASE WHEN scoreA > scoreB THEN 2
        WHEN scoreA = scoreB THEN 1
        ELSE 0
        END
        AS "Poäng"
FROM Games
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
Skapa en exakt likadan matchlista för bortalaget `teamB`.

EOD
,

"points" => 1,

"answer" => function () use ($sqlite) {
    $sql = <<<EOD
SELECT 
    name AS "Omgång",
    teamB AS "Lag",
    CASE WHEN scoreB > scoreA THEN 2
        WHEN scoreA = scoreB THEN 1
        ELSE 0
        END
        AS "Poäng"
FROM Games
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
Slå samman resultaten från de båda matchlistorna (1, 2) med `UNION ALL` (3) så att det blir en gemensam lista.

EOD
,

"points" => 1,

"answer" => function () use ($sqlite) {
    $sql = <<<EOD
SELECT
    name AS "Omgång",
    teamA AS "Lag",
    CASE WHEN scoreA > scoreB THEN 2
        WHEN scoreA = scoreB THEN 1
        ELSE 0
        END
        AS "Poäng"
FROM Games

UNION ALL

SELECT 
    name AS "Omgång",
    teamB AS "Lag",
    CASE WHEN scoreB > scoreA THEN 2
        WHEN scoreA = scoreB THEN 1
        ELSE 0
        END
        AS "Poäng"
FROM Games
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
"title" => "Vyer",

"intro" => <<<EOD
Vyer är som tabeller. Man kan skapa vyer från andra rapporter, som `UNION ALL` satsen vi precis såg. Det gör det enklare att jobba med SQL-frågor som blir allt större, vi kan helt enkelt dela in dem i vyer. Tips `CREATE VIEW`.

EOD
,

"shuffle" => false,

"questions" => [



/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Skapa en vy `GameList` från SQL-satsen med `UNION ALL`.

Svara med `SELECT * FROM GameList`.

EOD
,

"points" => 1,

"answer" => function () use ($sqlite) {
    $sql = <<<EOD
CREATE VIEW GameList AS
SELECT
    name AS "Omgång",
    teamA AS "Lag",
    CASE WHEN scoreA > scoreB THEN 2
        WHEN scoreA = scoreB THEN 1
        ELSE 0
        END
        AS "Poäng"
FROM Games

UNION ALL

SELECT 
    name AS "Omgång",
    teamB AS "Lag",
    CASE WHEN scoreB > scoreA THEN 2
        WHEN scoreA = scoreB THEN 1
        ELSE 0
        END
        AS "Poäng"
FROM Games
;
SELECT * FROM GameList;

EOD;
    return execute("$sqlite '$sql'");
},

],



/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Då gör vi rapporten för matchtabellen. Börja med att lägga till så rapporten innehållar "Lag", "Spelade" som antal matcher spelade, "Poäng" som totalt antal poäng samlade via vunna eller oavgjorda matcher. Sortera per "Poäng" i sjunkande ordning.

Använd din vy `GameList`. Tips `GROUP BY`.

EOD
,

"points" => 1,

"answer" => function () use ($sqlite) {
    $sql = <<<EOD
SELECT
    Lag,
    COUNT(Lag) AS "Spelade",
    SUM(Poäng) AS "Poäng"
FROM 
    GameList
WHERE
    Omgång = "Final"
GROUP BY Lag
ORDER BY Poäng DESC
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
Bygg vidare på rapporten för matchtabellen. Lägg till "Total" och "Diff", så som det visas i exemplet här under.

| Lag | Spelade | V | O | F | Total | Diff | Poäng |
|-----|:---:|:---:|:---:|:---:|:-------:|:---:|:---:|
| Team Clan BK | 3 | 2 | 0 | 1 | 29 - 29 | 0 | 4 |
| Team Pergamon BC | 3 | 1 | 0 | 2 | 29 - 29 | 0 | 2 |

Du skall nu ha en tabell som innehåller "Lag", "Spelade", "Total", "Diff", "Poäng".

Tips. Skapa en ny vy GameListNew som innehåller den informationen du behöver.
 
EOD
,

"points" => 1,

"answer" => function () use ($sqlite) {
    $sql = <<<EOD
CREATE VIEW GameListNew AS
SELECT
    name AS "Omgång",
    teamA AS "Lag",
    scoreA AS "SerierVunna",
    scoreB AS "SerierFörlorade",
    CASE WHEN scoreA > scoreB THEN 2
        WHEN scoreA = scoreB THEN 1
        ELSE 0
        END
        AS "Poäng"
FROM Games

UNION ALL

SELECT 
    name AS "Omgång",
    teamB AS "Lag",
    scoreB AS "SerierVunna",
    scoreA AS "SerierFörlorade",
    CASE WHEN scoreB > scoreA THEN 2
        WHEN scoreA = scoreB THEN 1
        ELSE 0
        END
        AS "Poäng"
FROM Games
;

SELECT
    Lag,
    COUNT(Lag) AS "Spelade",
    SUM(serierVunna) || " - " || SUM(serierFörlorade) AS "Total",
    SUM(serierVunna) - SUM(serierFörlorade) AS "Diff",
    SUM(Poäng) AS "Poäng"
FROM 
    GameListNew
WHERE
    Omgång = "Final"
GROUP BY Lag
ORDER BY Poäng DESC
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
Pröva nu samma rapport på matchserien "Semifinal A". Om matchpoängen är lika så använder man "Diff" för att välja ut den som vinner.
 
EOD
,

"points" => 1,

"answer" => function () use ($sqlite) {
    $sql = <<<EOD
SELECT
    Lag,
    COUNT(Lag) AS "Spelade",
    SUM(serierVunna) || " - " || SUM(serierFörlorade) AS "Total",
    SUM(serierVunna) - SUM(serierFörlorade) AS "Diff",
    SUM(Poäng) AS "Poäng"
FROM 
    GameListNew
WHERE
    Omgång = "Semifinal A"
GROUP BY Lag
ORDER BY Poäng DESC, DIFF DESC
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
Bygg färdigt rapporten för matchtabellen. Lägg till "Vunna", "Oavgjorda" och "Förlorade", så som det visas i exemplet här under.

| Lag | Spelade | Vunna | Oavgjorda | Förlorade | Total | Diff | Poäng |
|-----|:---:|:---:|:---:|:---:|:-------:|:---:|:---:|
| Team Clan BK | 3 | 2 | 0 | 1 | 29 - 29 | 0 | 4 |
| Team Pergamon BC | 3 | 1 | 0 | 2 | 29 - 29 | 0 | 2 |

Du skall nu ha en tabell som motsvarar tabellen ovan.

Tips. Skapa en ny vy GameListComplete som innehåller den informationen du behöver.
 
EOD
,

"points" => 5,

"answer" => function () use ($sqlite) {
    $sql = <<<EOD
CREATE VIEW GameListComplete AS
SELECT
    name AS "Omgång",
    teamA AS "Lag",
    CASE WHEN scoreA > scoreB THEN 1
        ELSE 0
        END
        AS "Vunna",
    CASE WHEN scoreA = scoreB THEN 1
        ELSE 0
        END
        AS "Oavgjorda",
    CASE WHEN scoreA < scoreB THEN 1
        ELSE 0
        END
        AS "Förlorade",
    scoreA AS "SerierVunna",
    scoreB AS "SerierFörlorade",
    CASE WHEN scoreA > scoreB THEN 2
        WHEN scoreA = scoreB THEN 1
        ELSE 0
        END
        AS "Poäng"
FROM Games

UNION ALL

SELECT 
    name AS "Omgång",
    teamB AS "Lag",
    CASE WHEN scoreA < scoreB THEN 1
        ELSE 0
        END
        AS "Vunna",
    CASE WHEN scoreA = scoreB THEN 1
        ELSE 0
        END
        AS "Oavgjorda",
    CASE WHEN scoreA > scoreB THEN 1
        ELSE 0
        END
        AS "Förlorade",
    scoreB AS "SerierVunna",
    scoreA AS "SerierFörlorade",
    CASE WHEN scoreB > scoreA THEN 2
        WHEN scoreA = scoreB THEN 1
        ELSE 0
        END
        AS "Poäng"
FROM Games
;

SELECT
    Lag,
    COUNT(Lag) AS "Matcher",
    SUM(Vunna) AS "Vunna",
    SUM(Oavgjorda) AS "Oavgjorda",
    SUM(Förlorade) AS "Förlorade",
    SUM(serierVunna) || " - " || SUM(serierFörlorade) AS "Total",
    SUM(serierVunna) - SUM(serierFörlorade) AS "Diff",
    SUM(Poäng) AS "Poäng"
FROM 
    GameListComplete
WHERE
    Omgång = "Final"
GROUP BY Lag
ORDER BY Poäng DESC
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
Kontrollera att din sista matchrapport även fungerar på matchserien "Semifinal B".
 
EOD
,

"points" => 5,

"answer" => function () use ($sqlite) {
    $sql = <<<EOD
SELECT
    Lag,
    COUNT(Lag) AS "Matcher",
    SUM(Vunna) AS "Vunna",
    SUM(Oavgjorda) AS "Oavgjorda",
    SUM(Förlorade) AS "Förlorade",
    SUM(serierVunna) || " - " || SUM(serierFörlorade) AS "Total",
    SUM(serierVunna) - SUM(serierFörlorade) AS "Diff",
    SUM(Poäng) AS "Poäng"
FROM 
    GameListComplete
WHERE
    Omgång = "Semifinal B"
GROUP BY Lag
ORDER BY Poäng DESC, Diff DESC
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
