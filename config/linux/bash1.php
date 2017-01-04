<?php

/**
 * Generate random values to use in lab.
 */
include __DIR__ . "/../random.php";


// Settings
$base = __DIR__ . "/bash1_extra";


// For shell exec to get correct
putenv('LANG=C.UTF-8');



return [



/**
 * Titel and introduction to the lab.
 */
"answerFormat" => "text",

"title" => "Bash 1 - linux",

"intro" => "
En lab där du använder Unix kommandon som finns tillgängliga via kommandoraden för att kopiera, flytta och hitta i en katalogstruktur.
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
"title" => "Bash",

"intro" => <<<EOD
Öva Linux kommandon för att ta sig runt och ändra i en katalogstruktur.

I denna övningen kommer du främst använda kommandon som `cp`, `mv`, `find`, `chmod` och `chown` för att ändra i en katalogstruktur.

Övningen baseras på katalogen `apache2/` och alla filer som ska hittas, flyttas, kopieras och ändras rättigheter för finns i denna katalogstruktur.

För att din bash kod ska köras använd `` runt ditt kommand, ex.: `kommando`

Använd bash-variabler för att strukturera och underlätta i koden. `&&` kan användas för att köra flera kommandon efter varann.

EOD
,

"shuffle" => false,

"questions" => [


/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD

Använd kommandot `find` för att hitta filen `apache2.conf`

EOD
,

"points" => 1,

"answer" => function () use ($base) {
    return execute("cd $base && find . -name 'apache2.conf'");
},

],



/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD

Skriv ut filen du nyss hittade `apache2.conf` filens rättigheter i oktal format

EOD
,

"points" => 1,

"answer" => function () use ($base) {
    $file = execute("cd $base && find . -name 'apache2.conf'");
    return exec("cd $base && stat -c '%a' $file");
},

],



/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD

Använd kommandot `find` för att hitta alla filer med rättigheterna 664

EOD
,

"points" => 1,

"answer" => function () use ($base) {
    return exec("cd $base && find . -type f -perm 0664 -print");
},

],



/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD

Använd kommandot `find` för att hitta alla tomma filer

EOD
,

"points" => 1,

"answer" => function () use ($base) {
    return exec("cd $base && find . -type f -empty");
},

],


/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD

Skriv ut hur stor katalogen `apache2/sites-available` är i human-readable format

EOD
,

"points" => 1,

"answer" => function () use ($base) {
    return execute("cd $base && du -h ./apache2/sites-available/");
},

],



/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD

Summera katalogen `apache2/` storlek i human-readable format

EOD
,

"points" => 1,

"answer" => function () use ($base) {
    return execute("cd $base && du -sch ./apache2/");
},

],



/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD

Kolla om katalogen `apache2/md/` finns och om den inte gör det skapa den. Skriv ut storleken i human-readable formatet för den nya katalogen.

EOD
,

"points" => 1,

"answer" => function () use ($base) {
    execute("cd $base && mkdir -p ./apache2/md/");
    return execute("cd $base && du -h ./apache2/md/");
},

],


/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD

Använd kommandot `rsync` för att kopiera filen `ports.conf` till katalogen `apache2/db/` och använd `find` för att skriva ut sökvägen till båda `ports.conf` filerna

EOD
,

"points" => 1,

"answer" => function () use ($base) {
    $file = execute("cd $base && find . -name 'ports.conf'");
    execute("cd $base && rsync $file ./apache2/md/");
    return execute("cd $base && find . -name 'ports.conf'");
},

],



/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD

Ändra filen `apache2/conf-available/charset.conf` rättigheter till `-rw-rw-r--` och skriv ut filens rättigheter i oktal format

EOD
,

"points" => 1,

"answer" => function () use ($base) {
    $file = execute("cd $base && find ./apache2/conf-available/ -name 'charset.conf'");
    execute("cd base && chmod 664 $file");
    return execute("cd $base && stat -c '%a' $file");
},

],



/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD

Använd kommandot `rsync` för att kopiera alla filer som slutar med filändelsen `.conf` i katalogen: `apache2/mods-available/`
till katalogen: `apache2/db/`


EOD
,

"points" => 1,

"answer" => function () use ($base) {
    return count(glob("$base/apache2/db/*.conf")) > 0 && count(glob("$base/apache2/mods-enabled/*.conf")) < 1;
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
