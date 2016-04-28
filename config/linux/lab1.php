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
<p>PREPARE ? spara svar i variabel, trim(), only get words in wc, pipe
</p>
",

"points" => 1,

"answer" => function () use ($file) {

    return "TBD";
},

],



/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Skapa en variabel `FILE` och tilldela den värdet `$file`. Svara med variabelns värde, dvs `\$FILE`.
</p>
",

"points" => 1,

"answer" => function () use ($file) {

    return $file;
},

],



/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Använd kommandot `wc` för att räkna ut hur många rader ircloggen består av. Visa endast antalet rader och filens namn, separerade av ett mellanslag. Spara svaret i en variabel och svara med variabelns innehåll.
</p>
",

"points" => 1,

"answer" => function () use ($base, $file) {
    //return exec("cd $base && wc --lines $file");
    return trim(exec("cd $base && wc -l $file"));
},

],



/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Använd `wc` för att räkna ut hur många ord, words, ircloggen består av. Spara antalet ord i en variabel och svara med den.
</p>
",

"points" => 1,

"answer" => function () use ($base, $file) {
    //return exec("cd $base && wc --lines $file");
    return "TBD";
},

],



/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Hitta raden med 'pansars' åsikt om 'notepad'. Spara svaret i en variabel och svara med variabelns innehåll.
</p>
",

"points" => 1,

"answer" => function () use ($base, $file) {
    //return exec("cd $base && wc --lines $file");
    return "TBD";
},

],



/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Hitta de fyra sista raderna i filen.
</p>
",

"points" => 1,

"answer" => function () use ($base, $file) {
    //return exec("cd $base && wc --lines $file");
    return "TBD";
},

],



/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>När öppnades ircloggen för första gången? Ledtråd 'Log opened'. Svara med raden som säger när loggen öppnades för första gången.
</p>
",

"points" => 1,

"answer" => function () use ($base, $file) {
    //return exec("cd $base && wc --lines $file");
    return "TBD";
},

],



/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Vad innehåller den tredje raden där wasa säger något?
</p>
",

"points" => 1,

"answer" => function () use ($base, $file) {
    //return exec("cd $base && wc --lines $file");
    return "TBD";
},

],



/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Hur många rader är det som är loggade enligt tiden 11:15?
</p>
",

"points" => 1,

"answer" => function () use ($base, $file) {
    //return exec("cd $base && wc --lines $file");
    return "TBD";
},

],



/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Hitta de första 10 raderna från dagen 'Wed Jun 17 2015'.
</p>
",

"points" => 3,

"answer" => function () use ($base, $file) {
    //return exec("cd $base && wc --lines $file");
    return "TBD";
},

],



/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Hittade raderna som är inlagda angående 'forum' och innehåller detaljer om 'projektet' och 'htmlphp'.
</p>
",

"points" => 3,

"answer" => function () use ($base, $file) {
    //return exec("cd $base && wc --lines $file");
    return "TBD";
},

],



/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Vad sa 'Bobbzorzen' två rader innan han sa 'cewl'?
</p>
",

"points" => 3,

"answer" => function () use ($base, $file) {
    //return exec("cd $base && wc --lines $file");
    return "TBD";
},

],



/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Hur många ord är det i den fjärde till nionde raden, under dagen 'Mon Jun 08 2015'?
</p>
",

"points" => 3,

"answer" => function () use ($base, $file) {
    //return exec("cd $base && wc --lines $file");
    return "TBD";
},

],



/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Hitta den första raden där 'pansar' säger något när klockan är 07:48.
</p>
",

"points" => 3,

"answer" => function () use ($base, $file) {
    //return exec("cd $base && wc --lines $file");
    return "TBD";
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
