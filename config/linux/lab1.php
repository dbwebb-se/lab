<?php

/**
 * Generate random values to use in lab.
 */
include __DIR__ . "/../random.php";


return [



/**
 * Titel and introduction to the lab.
 */
"title" => "Lab 1 - linux",

"intro" => "
<p>TBD
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
<p>TBD.
</p>
",

"answer" => function () {

    return true;
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
