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

EOD
,

"shuffle" => false,

"questions" => [



/** ---------------------------------------------------------------------------
 * A question.

[

"text" => <<<EOD
Använd kommandot `pwd` för att skriva ut din nuvarande plats i katalogstrukturen.

EOD
,

"points" => 1,

"answer" => function () use ($base) {
    return execute("pwd");
},

],



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

Kopiera filen `ports.conf` till en ny katalog `/apache2/db`

EOD
,

"points" => 1,

"answer" => function () use ($base) {
    // $file = exec("cd $base && find . -name 'ports.conf'");
    // exec("cd $base && mkdir ./apache2/db && chmod 777 ./apache2/db");
    // exec("cd $base && cp $file ./apache2/db/");
    return file_exists("$base/apache2/db/ports.conf");
},

],



/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD

Ändra filen `/apache2/conf-available/charset.conf` rättigheter till `-rw-rw-r--`

EOD
,

"points" => 1,

"answer" => function () use ($base) {
    // exec("cd $base && chmod 664 ./etc/db/pdo.ini");
    return substr(sprintf('%o', fileperms($base."/apache2/conf-available/charset.conf")), -4) == "664";
},

],

/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Ändra gruppen till `www-data` på filen `/apache2/sites-enabled/000-default.conf`
EOD
,

"points" => 1,

"answer" => function () use ($base) {
    $filename = "$base/apache2/sites-enabled/000-default.conf";
    return posix_getgrgid(filegroup($filename))["name"] == "www-data";
},

],


/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD

Flytta all filer som slutar med filändelsen `.conf` i katalogen: `/apache2/mods-enabled/`
till katalogen: `/apache2/db/`

Tips använd kommandot `mv`

EOD
,

"points" => 1,

"answer" => function () use ($base) {
    return count(glob("$base/apache2/db/*.conf")) > 0 && count(glob("$base/apache2/mods-enabled/*.conf")) < 1;
},

],



/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Ta bort `conf-available` katalogen som finns '/apache2/conf-available'
EOD
,

"points" => 1,

"answer" => function () use ($base) {
    return !file_exists("$base/apache2/conf-available");
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
