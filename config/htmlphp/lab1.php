<?php

/**
 * Generate random values to use in lab.
 */
include __DIR__ . "/../random.php";

return [



/**
 * Titel and introduction to the lab.
 */
"title" => "Lab 1 - Html php",

"intro" => "
<p>If you need to peek at examples or just want to know more, take a look at the page: http://php.net/manual/en/langref.php. Here you will find everything this lab will go through and much more.
</p>
",


"sections" => [



/** ===================================================================================
 * New section of exercises.
 */
[
"title" => "Integers, strings, floats and basic arithmetics",

"intro" => "
<p>The foundation of numbers and basic arithmetic.</p>
",

"shuffle" => false,

"questions" => [



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>
</p>
",

"answer" => function () {

    return 0;
},

],


/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>
</p>
",

"answer" => function () {

    return 0;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>
</p>
",

"answer" => function () {

    return 0;
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
"title" => "Conditions, exceptions, booleans, if, else and elif",

"intro" => "
<p>
</p>
",

"shuffle" => false,

"questions" => [



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>
</p>
",

"answer" => function () {

	return 0;  
},

],



/** ===================================================================================
 * New section of exercises.
 */
[
"title" => "Built-in functions",

"intro" => "
<p>Some useful built-in functions.
</p>
",

"shuffle" => false,

"questions" => [



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>
</p>
",

"answer" => function () {

	return 0;
	
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>
</p>
",

"answer" => function () {

	return 0;
	
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
"title" => "Functions",

"intro" => "
<p>Basic functions
</p>
",

"shuffle" => false,

"questions" => [



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p> 
</p>
",

"answer" => function () {

	return 0;
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
"title" => "Iteration and loops",

"intro" => "
<p>For-loops and while-loops. 
</p>
",

"shuffle" => false,

"questions" => [



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p> 
</p>
",

"answer" => function () {

	
	return 0;
	
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p> 
</p>
",

"answer" => function () {

	return 0;
	
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
]; // EOF the entire lab
