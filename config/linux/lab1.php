<?php

/**
 * Generate random values to use in lab.
 */
include __DIR__ . "/../random.php";


// Settings
$base = __DIR__;
$file = "ircLog.txt";



return [



/**
 * Titel and introduction to the lab.
 */
"title" => "Lab 1 - linux",

"intro" => "
<p>En lab där du använder Unix verktyg som finns tillgängliga via kommandoraden, tillsammans med lite Bash, för att finna och hantera information i en IRC loggfil. 
</p>
",


"sections" => [



/** ===========================================================================
 * New section of exercises.
 */
[
"title" => "Bash",

"intro" => "
<p>TBD.</p>
",

"shuffle" => false,

"questions" => [



/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Skapa en variabel `FILE` och tilldela den värdet `$file`. Svara med variabelns värde, dvs `\$FILE`.
</p>
",

"answer" => function () use ($file) {

    return $file;
},

],



/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Använd kommandot `wc` för att räkna ut hur många rader ircloggen består av. Visa endast antalet rader och filens namn. Spara svaret i en variabel och svara med variabelns innehåll.
</p>
",

"answer" => function () use ($base, $file) {
    return exec("cd $base && wc --lines $file");
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
