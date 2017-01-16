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

Gä först till katalogen `apache2/mods-available` och använd  här kommandot `ls` för att lista filerna i katalogen. Lista bara filer som börjar på 'a' och har filändelsen '.conf'. Lista filerna så varje ny fil hamnar på en egen rad.

Du kan använda `&&` för att kedja ihop två eller fler kommandon på samma rad.

Tips: Använd ett wildcard `*` för att matcha mot flera filer.

EOD
,

"points" => 1,

"answer" => function () use ($base) {
    return execute("cd $base && cd ./apache2/mods-available/ && ls -1 a*.conf");
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

Använd kommandot `file` för att skriva ut filtypen för alla filer och kataloger i `apache2`.

EOD
,

"points" => 1,

"answer" => function () use ($base) {
    return execute("cd $base && file apache2/*");
},

],



/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD

Använd kommandot `file` för att skriva ut filtypen för alla filer och kataloger i `apache2`. Denna gång skriv bara ut filtypen utan filnamn.

EOD
,

"points" => 1,

"answer" => function () use ($base) {
    return execute("cd $base && file -b apache2/*");
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
"title" => "cp, mv, mkdir och rm",

"intro" => <<<EOD

I denna del använder vi kommandona  `cp`, `mv`, `mkdir` och `rm` för att ändra i en katalogstruktur.

EOD
,

"shuffle" => false,

"questions" => [



/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD

Använd kommandot `mkdir` för att skapa en katalog med namnet `backup/` om katalogen inte redan finns. Kopiera alla filer som har filändelsen `.conf` i `apache2/mods-available` till en ny katalog i `backup/` med namnet `conf/`.

Lista alla filer i den nya `backup/conf/` katalogen, sortera filerna i storleksordning med den största filen först. Lista filerna så varje ny fil hamnar på en egen rad.

Tips: Använd `&&` för att exekverera flera kommandon i rad och `man mkdir` för att hitta rätt flagga.

EOD
,

"points" => 1,

"answer" => function () use ($base, $tmpBase) {
    execute("cd $tmpBase && mkdir -p backup && mkdir -p backup/conf");
    execute("cd $base && cp apache2/mods-available/*.conf $tmpBase/backup/conf");
    return execute("cd $tmpBase && ls -1S ./backup/conf");
},

],



/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD

Använd kommandot `mkdir` för att skapa en ny underkatalog `backup/php/` om den inte redan finns.
Använd kommandot `mv` för att flytta alla filer som börjar med 'php' från `backup/conf` till den nya katalogen `backup/php/`.

Lista alla filer i `backup/conf/` katalogen. Lista filerna så varje ny fil hamnar på en egen rad.

EOD
,

"points" => 1,

"answer" => function () use ($base, $tmpBase) {
    return execute("cd $tmpBase && mkdir -p backup/php && mv backup/conf/php* backup/php && ls -1 ./backup/conf");
},

],



/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD

Ta bort alla filer som börjar med 'proxy' från `backup/conf`.

Lista alla filer i `backup/conf` katalogen. Lista filerna så varje ny fil hamnar på en egen rad.

EOD
,

"points" => 1,

"answer" => function () use ($base, $tmpBase) {
    return execute("cd $tmpBase && rm backup/conf/proxy* && ls -1 ./backup/conf");
},

],



/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD

Använd kommandot `cp` för att flytta alla filer från `backup/php` till `backup` och ta sedan bort hela `backup/php` katalogen.

Lista alla filer och kataloger i `backup` katalogen, använd en flagga så alla kataloger får ett snedstreck (`/`) efter namnet. Lista filerna så varje ny fil hamnar på en egen rad.

EOD
,

"points" => 1,

"answer" => function () use ($base, $tmpBase) {
    return execute("cd $tmpBase && cp backup/php/* backup/ && rm -rf backup/php && ls -1p ./backup/");
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
"title" => "find",

"intro" => <<<EOD

I denna del använder vi kommandot `find` för att ta hitta i en katalogstruktur.

I denna del av labben arbetar du med ursprungskatalogen `apache2/`.

EOD
,

"shuffle" => false,

"questions" => [



/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD

Använd kommandot `find` för att hitta filen `apache2.conf` i `apache2/` katalogen.

EOD
,

"points" => 1,

"answer" => function () use ($base) {
    return execute("cd $base && find ./apache2 -name 'apache2.conf'");
},

],



/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD

Använd kommandot `find` för att hitta alla tomma filer i `apache2/` katalogen.

EOD
,

"points" => 1,

"answer" => function () use ($base) {
    return execute("cd $base && find ./apache2 -type f -empty");
},

],



/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD

Använd kommandot `find` för att hitta alla kataloger som avslutas med `-enabled` i `apache2/` katalogen.

EOD
,

"points" => 1,

"answer" => function () use ($base) {
    return execute("cd $base && find . -type d -name '*-enabled'");
},

],



/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD

Använd kommandot `find` för att hitta alla filer som har `ssl` i filnamnet och har filändelsen `.conf`, sök i de två katalogerna `apache2/sites-available` och `apache2/mods-available`.

EOD
,

"points" => 1,

"answer" => function () use ($base) {
    return execute("cd $base && find ./apache2/sites-available ./apache2/mods-available -type f -name '*ssl*.conf'");
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
