<?php

/**
 * Generate random values to use in lab.
 */
include __DIR__ . "/../random.php";


// Settings
$base = __DIR__ . "/lab1_extra";
$file = "ircLog.txt";



return [



/**
 * Titel and introduction to the lab.
 */
"answerFormat" => "text",

"title" => "Lab 1 - linux",

"intro" => "
<p>En lab där du använder Unix verktyg som finns tillgängliga via kommandoraden, tillsammans med lite Bash, för att finna och hantera information i en IRC loggfil. 
</p>
",

"passPercentage" => 70/100,
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

"intro" => "
<p>Öva Linux kommandon och använd dem tillsammans med Bash. I denna övningen kommer du främst använda kommandon som `grep`, `wc`, `head` och `tail` för att söka ut information i en loggfil från irc-chatten. Sedan kombinerar du utskriften av kommandona in till variabler i Bash. Använd man-sidorna vid behov för att finna informaiton om hur du löser uppgifterna.</p>
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
    return exec("cd $base && wc -l $file");
    //return trim(exec("cd $base && wc -l $file")); // Mac OS
},

],



/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Använd `wc` tillsammans med `cut` för att räkna ut hur många ord, words, ircloggen består av. Spara enbart antalet ord i en variabel och svara med den.
</p>
",

"points" => 1,

"answer" => function () use ($base, $file) {
    return exec("cd $base &&  wc -w $file | cut -d' ' -f1");
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
    return exec("cd $base && cat $file | grep pansar | grep notepad");
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
    $res = [];
    exec("cd $base && tail -4 $file", $res);
    return implode("\n", $res);
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
    return exec("cd $base && grep 'Log opened' $file | head -1");
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
    return exec("cd $base && grep '<@wasa>' $file | head -3 | tail -1");
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
    return exec("cd $base && grep '11:15' $file | wc -l");
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
    $res = [];
    exec("cd $base && grep -A 10 'Day changed Wed Jun 17 2015' $file | tail -10", $res);
    return implode("\n", $res);
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
    $res = [];
    exec("cd $base && grep Forum $file | grep htmlphp | grep projektet", $res);
    return implode("\n", $res);
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
    return exec("cd $base && grep '<@Bobbzorzen>' $file | grep -B 2 cewl | head -1");
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
    return exec("cd $base && grep -A 9 'Mon Jun 08 2015' $file | tail -6 | wc -w");
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
    return exec("cd $base && grep 07:48 $file | grep pansar | head -1");
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
