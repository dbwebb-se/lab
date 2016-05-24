<?php

/**
 * Generate random values to use in lab.
 */
include __DIR__ . "/../random.php";


// Settings
$base = __DIR__ . "/lab6_extra";
$db = "$base/db.sqlite";
$sqlite = "sqlite3 -header -column $db";

$tableA = "Games";




return [



/**
 * Titel and introduction to the lab.
 */
"answerFormat" => "text",

"title" => "Lab 6 SQL - htmlphp",

"intro" => <<<EOD
Lek runt med inledande SQL-satser i SQLite. Du får en databas att jobba med och du får använda SQL för att hämta ut och presentera information från databasen.

Det är bra om du har manualen för SQLite uppe, där kan du se [syntaxen för SQL-satserna](https://www.sqlite.org/lang.html) och du kan se vilka [extra funktioner som stöds](https://www.sqlite.org/lang_corefunc.html).

EOD
,

"header" => null,

"passPercentage" => 70/100,
"passDistinctPercentage" => 90/100,

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
"title" => "Bash",

"intro" => <<<EOD
Jobba mot tabellen $tableA för att hämta ut information och presentera den. Tabellen innehåller en matchserie från ...
EOD
,

"shuffle" => false,

"questions" => [



/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Börja med att inspektera innehållet i tabellen. Olika databasmotorer har olika sätt att inspektera hur tabeller är skapade. I SQLite skiver du så här.

> .schema $tableA

Börja med att göra en SQL-fråga som ser ut så här:

> SQL ".schema $tableA" false

Värdet i slutet kan du ändra till `true` för att få utskrift av resultatet.

Nu kan du skriva en SQL-fråga till, för att med `SELECT` visa alla raderna i tabellen.

Denna sista SQL-fråga blir ditt svar på första uppgiften.

EOD
,

"points" => 1,

"answer" => function () use ($sqlite, $tableA) {
    $res = [];
    exec("$sqlite \"select * from $tableA\"", $res);
    return implode("\n", $res);
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
