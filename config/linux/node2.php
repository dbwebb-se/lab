<?php

/**
 * Generate random values to use in lab.
 */
include __DIR__ . "/../random.php";

// Mixed variables n stuff

// SECTION 1 ****************************************************
$file_long = "linux.txt";
$file_short = "abstract.txt";



return [



/**
 * Titel and introduction to the lab.
 */
"title" => "Lab 4 - JavaScript with Nodejs",

"intro" => <<<EOD
JavaScript using nodejs.
EOD
,


"sections" => [



/** ===================================================================================
 * New section of exercises.
 */
[
"title" => "Filesystem",

"intro" => <<<EOD
Some nice text.
EOD
,

"shuffle" => false,

"questions" => [



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Hej hopp 1
EOD
,

"answer" => function () {
    $sum = 1;
    return $sum;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Hej hopp 2
EOD
,

"answer" => function () {
    $sum = 1;
    return $sum;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Hej hopp 3
EOD
,

"answer" => function () {
    $sum = 1;
    return $sum;
},

],



/**
 * Closing up this section.
 */
], // EOF questions
], // EOF section



/** -----------------------------------------------------------------------------------
 * Closing up all sections.
 */
] // EOF sections



/**
 * Closing up this lab.
 */
]; // EOF the enritre lab
