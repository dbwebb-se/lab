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
En lab där du använder Unix verktyg som finns tillgängliga via kommandoraden, tillsammans med lite Bash, för att finna och hantera information i en [IRC loggfil](ircLog.txt).
",

"header" => null,

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

"intro" => <<<EOD
Öva Linux kommandon och använd dem tillsammans med Bash.

I denna övningen kommer du främst använda kommandon som `grep`, `wc`, `head` och `tail` för att söka ut information i en loggfil från irc-chatten.

Write HTML in text, wrap in backtick `<a href="moped">mask</a>`

Pure link as HTML <a href="moped">mask</a>

```
<html> 
```

a > 2

Sedan kombinerar du utskriften av kommandona in till variabler i Bash. Använd man-sidorna vid behov för att finna informaiton om hur du löser uppgifterna.
EOD
,

"shuffle" => false,

"questions" => [



/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
Skapa en variabel `FILE` och tilldela den värdet `$file`.

Svara med variabelns värde, dvs `\$FILE`.
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
Använd kommandot `wc` för att räkna ut hur många rader ircloggen består av. Visa endast antalet rader och filens namn, separerade av ett mellanslag.

Spara svaret i en variabel och svara med variabelns innehåll.
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
Använd `wc` tillsammans med `cut` för att räkna ut hur många ord, words, ircloggen består av.

Spara enbart antalet ord i en variabel och svara med den.
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
Hitta raden med 'pansars' åsikt om 'notepad'.

Spara svaret i en variabel och svara med variabelns innehåll.
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
Hitta de fyra sista raderna i filen.
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
När öppnades ircloggen för första gången? Ledtråd 'Log opened'. Svara med raden som säger när loggen öppnades för första gången.
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
Vad innehåller den tredje raden där wasa säger något?
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
Hur många rader är det som är loggade enligt tiden 11:15?
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
Hitta de första 10 raderna från dagen 'Wed Jun 17 2015'.
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
Hittade raderna som är inlagda angående 'forum' och innehåller detaljer om 'projektet' och 'htmlphp'.
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
Vad sa 'Bobbzorzen' två rader innan han sa 'cewl'?
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
Hur många ord är det i den fjärde till nionde raden, under dagen 'Mon Jun 08 2015'?
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
Hitta den första raden där 'pansar' säger något när klockan är 07:48.
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
