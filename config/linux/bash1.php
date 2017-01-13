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
En lab där du använder Unix kommandon som finns tillgängliga via kommandoraden för att hitta, skriva ut information om filer och ändra i en katalogstruktur.
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

I denna övningen kommer du främst använda kommandon som `stat`, `find`, `du` för att bekanta dig med en katalogstruktur.

Övningen baseras på katalogen `apache2/` och alla filer som ska hittas och kopieras för finns i denna katalogstruktur.

För att din bash kod ska köras använd `` runt ditt kommand, ex.: `kommando`.

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

Vilka rättigheter har filen `apache2.conf`? Svara med dess rättigheter i oktal format.

Tips: använd `stat` och `man`.

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

Använd kommandot `find` för att hitta alla tomma filer.

EOD
,

"points" => 1,

"answer" => function () use ($base) {
    return execute("cd $base && find . -type f -empty");
},

],



/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD

Skriv ut hur stor katalogen `apache2/sites-available` i human-readable format.

Tips: Använd kommandot `du`.

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

Tips: Använd kommandot `du`.

EOD
,

"points" => 1,

"answer" => function () use ($base) {
    return execute("cd $base && du -sch ./apache2/");
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
"title" => "Bash",

"intro" => <<<EOD
Öva Linux kommandon för att ta sig runt och ändra i en katalogstruktur.

I denna del kommer du främst använda kommandon som `cp`, `rsync` och `find` för att ändra i en katalogstruktur.

Övningen baseras nu på en kopia av katalogen `apache2/`, som du själv skapar i första övningen. Alla filer som ska hittas och kopieras finns i denna kopierade katalogstruktur.

EOD
,

"shuffle" => false,

"questions" => [



/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD

Ta bort en eventuell `/tmp/apache2_copy/` katalog. Använd kommandot `rsync` för att kopiera `apache2` till en nya katalogen `/tmp/apache2_copy`. Skriv ut den totala summerade storleken i human-readable format för den nya katalogen.

EOD
,

"points" => 1,

"answer" => function () use ($base, $tmpBase) {
    execute("rm -rf /tmp/apache2_copy");
    execute("cd $base && rsync -rl apache2/ /tmp/apache2_copy/");
    return execute("du -sch /tmp/apache2_copy/");
},

],



/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD

Användaren av apache2-katalogen har gjort 3 egna konfigurationsfiler i `sites-available` katalogen.
De två som ska finnas i denna katalog är 000-default.conf och default-ssl.conf. Ta bort de andra filerna från `/tmp/apache2_copy/sites-available` och skriv ut storleken på `/tmp/apache2_copy/sites-available` i human-readable format.

Tips: Använd find tillsammans med exec.

EOD
,

"points" => 1,

"answer" => function () use ($tmpBase) {
    execute("find /tmp/apache2_copy/ -name '*default*.conf' -exec rm -rf {} \;");
    return execute("du -h /tmp/apache2_copy/sites-available/");
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
    return execute("cd $base && find . -type f -perm 0664 -print");
},

],



/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD

Ta bort alla tomma filer i `/tmp/apache2_copy` katalogen. Skriv ut den totala summerade storleken på hela `/tmp/apache2_copy` katalogen i human-readable format.

Tips: Använd find tillsammans.

EOD
,

"points" => 1,

"answer" => function () use ($tmpBase) {
    $file = execute("find /tmp/apache2_copy -empty -type f -delete");
    return execute("du -sch /tmp/apache2_copy/");
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
