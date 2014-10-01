<?php

/**
 * Generate random values to use in lab.
 */
include __DIR__ . "/../random.php";

// ################### SECTION 1 ##################

$s1_numOne 			= rand_int(10, 500);
$s1_numTwo 			= rand_int(10, 500);
$s1_numThree		= rand_int(100, 500);
$s1_numFour			= rand_int(10, 99);

$s1_floatOne		= rand_float(10, 500, 2);
$s1_floatTwo		= rand_float(10, 500, 2);

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
<p>Create two variables 'numOne' and 'numTwo' and assign to them the values $s1_numOne and $s1_numTwo. Sum up the variables and answer with the result.
</p>
",

"answer" => function () use ($s1_numOne, $s1_numTwo) {

    return $s1_numOne + $s1_numTwo;
},

],


/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Use your two variables 'numOne' and 'numTwo'. Subtract 'numOne' from 'numTwo' and answer with the result.
</p>
",

"answer" => function () use ($s1_numOne, $s1_numTwo) {

    return $s1_numTwo - $s1_numOne;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Use your two variables 'numOne' and 'numTwo'. Answer with the product of the variables.
</p>
",

"answer" => function () use($s1_numOne, $s1_numTwo) {

    return $s1_numOne * $s1_numTwo;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Divide '$s1_numThree' with '$s1_numFour' and answer with the result.
</p>
",

"answer" => function () use($s1_numThree, $s1_numFour) {

    return $s1_numThree / $s1_numFour;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Create a variable called 'floatOne' and give it the value $s1_floatOne. Create another variable called 'floatTwo' and give it the value $s1_floatTwo. Sum up the variables and answer with the result.
</p>
",

"answer" => function () use($s1_floatOne, $s1_floatTwo) {

    return $s1_floatOne / $s1_floatTwo;
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
