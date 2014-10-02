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
$s1_floatThree		= rand_float(50, 100, 2);
$s1_floatFour		= rand_float(10, 100, 2);

$s1_modOne 			= rand_int(100, 1000);
$s1_modTwo 			= rand_int(10, 99);

$s1_wordList1		= ["kitten", "mouse", "chicken", "puppy", "rabbit"];
$s1_wordList2		= ["ice", "earth", "fire", "wind"];
$s1_singleWord1		= $s1_wordList1[rand_int(0, count($s1_wordList1)-1)];
$s1_singleWord2		= $s1_wordList2[rand_int(0, count($s1_wordList2)-1)];
$s1_singAndSing		= $s1_singleWord2 . "-" . $s1_singleWord1;
$s1_wordRand1		= rand_int(0, count($s1_wordList1)-1);
$s1_wordRand2		= rand_int(0, count($s1_wordList2)-1);

// ################### SECTION 2 ##################

$s2_numOne			= rand_int(10, 500);
$s2_numTwo			= rand_int(10, 500);
$s2_numThree		= rand_int(10, 500);
$s2_numFour			= rand_int(10, 500);

return [



/**
 * Titel and introduction to the lab.
 */
"title" => "Lab 1 - Htmlphp",

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
<p>Create two variables called 'numOne' and 'numTwo' and assign to them the values $s1_numOne and $s1_numTwo. Sum up the variables and answer with the result.
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

    return $s1_floatOne + $s1_floatTwo;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Use your variables, 'floatOne' and 'floatTwo'. Subtract 'floatOne' from 'floatTwo' and answer with the result. 
</p>
",

"answer" => function () use($s1_floatOne, $s1_floatTwo) {

    return $s1_floatTwo - $s1_floatOne;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Use your variables, 'floatOne' and 'floatTwo'. Create another variable called 'floatThree' and give it the value $s1_floatThree. Sum 'floatOne' with 'floatThree' and subtract 'floatTwo'. Answer with the result. 
</p>
",

"answer" => function () use($s1_floatOne, $s1_floatTwo, $s1_floatThree) {

    return ($s1_floatThree + $s1_floatOne) - $s1_floatTwo;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Answer with the result of $s1_modOne modulo (%) $s1_modTwo.
</p>
",

"answer" => function () use ($s1_modOne, $s1_modTwo) {

    return $s1_modOne%$s1_modTwo;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Create a variable called 'wordOne' and assign the word '$s1_singleWord2' to it. Create another variable called 'wordTwo' and assign the word '$s1_singleWord1'. Concatinate the two strings into a new variable called 'result'. Make sure that the new string has a hyphen (-) between the words. Answer with the result-variable.
</p>
",

"answer" => function () use ($s1_singAndSing) {

    return $s1_singAndSing;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Concatinate your 'wordOne'-variable ('$s1_singleWord1') and your variable called 'floatThree' ($s1_floatThree). Answer with the result.
</p>
",

"answer" => function () use ($s1_singleWord1, $s1_floatThree) {

    return $s1_singleWord1 . $s1_floatThree;
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
<p>Answer with the boolean value of: $s2_numOne is less than $s2_numTwo.
</p>
",

"answer" => function () use ($s2_numOne, $s2_numTwo) {

	return $s2_numOne < $s2_numTwo;  
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Answer with the boolean value of: $s2_numThree is larger than $s2_numFour.
</p>
",

"answer" => function () use ($s2_numThree, $s2_numFour) {

	return $s2_numThree > $s2_numFour;  
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
