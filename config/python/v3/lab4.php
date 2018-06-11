<?php

/**
 * Generate random values to use in lab.
 */
include __DIR__ . "/../../random.php";





/**
 * Titel and introduction to the lab.
 */


return [


"passPercentage" => 10/16,
"passDistinctPercentage" => 16/16,

"author" => ["efo", "aar"],

/**
 * Titel and introduction to the lab.
 */
"title" => "Lab 4 - python",

"intro" => "
In this lab we take another look at functions and we use modules to structure our code.
",


"sections" => [



/** ===================================================================================
 * New section of exercises.
 */
[
"title" => "Functions",

"intro" => "

",

"shuffle" => false,

"questions" => [



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "

",
"points" => 1,
"answer" => function () {
    return 1;
},

],





/**
 * Closing up this section.
 */
], // EOF questions
], // EOF section



/** ===================================================================================
 * New section of exercises.
 */
[
"title" => "Extra assignments",

"intro" => <<<EOD
These questions are worth 3 points each. Solve them for extra points.
EOD
,

"shuffle" => false,

"questions" => [



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD

EOD
,
"points" => 3,
"answer" => function () {
    return 2;
},


],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD

EOD
,
"points" => 3,
"answer" => function () {
    return 3;
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
