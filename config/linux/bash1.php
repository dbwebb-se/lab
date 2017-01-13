<?php

/**
 * Generate random values to use in lab.
 */
include __DIR__ . "/../random.php";


// Settings
$base = __DIR__ . "/bash1_extra";
$tmpBase = "/tmp";


// For shell exec to get correct
putenv('LANG=C.UTF-8');



return [



/**
 * Titel and introduction to the lab.
 */
"answerFormat" => "text",

"title" => "Bash 1 - linux",

"intro" => "
En lab där du använder Unix kommandon som finns tillgängliga via kommandoraden för att lista, hitta, skriva ut information om filer och ändra i en katalogstruktur.

Labben använder sig av en apache2 katalogstruktur som finns på denna sökväg './apache2'.
",

"header" => null,

"passPercentage" => 100/100,
"passDistinctPercentage" => 100/100,

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
"title" => "ls",

"intro" => <<<EOD

I denna del använder vi kommandot `ls` för att lista filer och kataloger.

EOD
,

"shuffle" => false,

"questions" => [



/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD

Använd kommandot `ls` för att lista filerna i apache2 katalogen, lista filerna så varje ny fil hamnar på en egen rad.

Tips: Använd kommandot `man ls` för att se de olika flaggor man kan använda för ls.

EOD
,

"points" => 1,

"answer" => function () use ($base) {
    return execute("cd $base && ls -1 ./apache2");
},

],



/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD

Använd kommandot `ls` för att lista filerna i apache2 katalogen, använd en flagga så alla kataloger får ett snedstreck (`/`) efter namnet. Lista filerna så varje ny fil hamnar på en egen rad.

Tips: Använd kommandot `man ls` för att se de olika flaggor man kan använda för ls.

EOD
,

"points" => 1,

"answer" => function () use ($base) {
    return execute("cd $base && ls -1p ./apache2");
},

],



/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD

Använd kommandot `ls` för att lista filerna i apache2/mods-available katalogen. Lista bara filer som börjar på 'a' och har filändelsen '.conf'. Lista filerna så varje ny fil hamnar på en egen rad.

Tips: Använd ett wildcard `*` för att matcha mot flera filer.

EOD
,

"points" => 1,

"answer" => function () use ($base) {
    return execute("cd $base && ls -1 ./apache2/mods-available/a*.conf");
},

],



/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD

Lista alla, även dolda, filer och kataloger i `apache2/sites-available` katalogen, lista filerna så varje ny fil hamnar på en egen rad.

EOD
,

"points" => 1,

"answer" => function () use ($base) {
    return execute("cd $base && ls -1a ./apache2/sites-available");
},

],



/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD

Lista alla filer och kataloger i `apache2/conf-available`, sortera filerna i storleksordning med den minsta filen först. Lista filerna så varje ny fil hamnar på en egen rad.

EOD
,

"points" => 1,

"answer" => function () use ($base) {
    return execute("cd $base && ls -1rS ./apache2/conf-available");
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
"title" => "file",

"intro" => <<<EOD

I denna del använder vi kommandot `file` för att ta reda på information om filerna i katalogstrukturen.

EOD
,

"shuffle" => false,

"questions" => [



/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD

Använd kommandot `ls` för att lista filerna i apache2 katalogen, lista filerna så varje ny fil hamnar på en egen rad.

Tips: Använd kommandot `man ls` för att se de olika flaggor man kan använda för ls.

EOD
,

"points" => 1,

"answer" => function () use ($base) {
    return execute("cd $base && ls -1 ./apache2");
},

],



/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD

Använd kommandot `ls` för att lista filerna i apache2 katalogen, använd en flagga så alla kataloger får ett snedstreck (`/`) efter namnet. Lista filerna så varje ny fil hamnar på en egen rad.

Tips: Använd kommandot `man ls` för att se de olika flaggor man kan använda för ls.

EOD
,

"points" => 1,

"answer" => function () use ($base) {
    return execute("cd $base && ls -1p ./apache2");
},

],



/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD

Använd kommandot `ls` för att lista filerna i apache2/mods-available katalogen. Lista bara filer som börjar på 'a' och har filändelsen '.conf'. Lista filerna så varje ny fil hamnar på en egen rad.

Tips: Använd ett wildcard `*` för att matcha mot flera filer.

EOD
,

"points" => 1,

"answer" => function () use ($base) {
    return execute("cd $base && ls -1 ./apache2/mods-available/a*.conf");
},

],



/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD

Lista alla, även dolda, filer och kataloger i `apache2/sites-available` katalogen, lista filerna så varje ny fil hamnar på en egen rad.

EOD
,

"points" => 1,

"answer" => function () use ($base) {
    return execute("cd $base && ls -1a ./apache2/sites-available");
},

],



/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD

Lista alla filer och kataloger i `apache2/conf-available`, sortera filerna i storleksordning med den minsta filen först. Lista filerna så varje ny fil hamnar på en egen rad.

EOD
,

"points" => 1,

"answer" => function () use ($base) {
    return execute("cd $base && ls -1rS ./apache2/conf-available");
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
