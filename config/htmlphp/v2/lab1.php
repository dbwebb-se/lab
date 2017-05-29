<?php

/**
 * Generate random values to use in lab.
 */
include LAB_INSTALL_DIR . "/config/random.php";

// ################### SECTION ##################

$s1_numOne = rand_int(10, 500);
$s1_numTwo = rand_int(10, 500);

while ($s1_numOne % $s1_numTwo == 0) {
    $s1_numTwo = rand_int(10, 500);
}

$s1_numThree = rand_int(100, 500);
$s1_numFour = rand_int(10, 99);

$s1_floatOne = rand_float(10, 500, 2);
$s1_floatTwo = rand_float(10, 500, 2);
$s1_floatThree = rand_float(50, 100, 2);
$s1_floatFour = rand_float(10, 100, 2);

$s1_modOne = rand_int(500, 1000);
$s1_modTwo = rand_int(10, 99);

// ################### SECTION ##################

$s1_wordList1 = ["ice", "earth", "fire", "wind"];
$s1_wordList2 = ["kitten", "mouse", "chicken", "puppy", "rabbit"];
$s1_singleWord1 = $s1_wordList1[rand_int(0, count($s1_wordList1)-1)];
$s1_singleWord2 = $s1_wordList2[rand_int(0, count($s1_wordList2)-1)];
$s1_wordRand1 = rand_int(0, count($s1_wordList1)-1);
$s1_wordRand2 = rand_int(0, count($s1_wordList2)-1);
$s1_sentence = "There are $s1_numOne $s1_singleWord2's doing some $s1_singleWord1.";

$extra1 = sqrt(pow(2, 64) - 1);
$extra2 = 100 * (100+1) / 2;



return [

"passPercentage" => 10/16,
"passDistinctPercentage" => 16/16,

/**
 * Titel and introduction to the lab.
 */
"title" => "Lab 1 - htmlphp",

"intro" => <<<EOD
If you need to peek at examples or just want to know more, take a look at the [PHP manual](http://php.net/manual/en/langref.php).

Here you will find everything this lab will go through and much more.
EOD
,


"sections" => [



/** ===================================================================================
 * New section of exercises.
 */
[
"title" => "Integers, floats and basic arithmetics",

"intro" => <<<EOD
The foundation of numbers and basic arithmetic.
EOD
,

"shuffle" => false,

"questions" => [



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Create two variables called `numOne` and `numTwo` and assign to them the values $s1_numOne and $s1_numTwo.

Sum up the variables and answer with the result.
EOD
,

"points" => 1,

"answer" => function () use ($s1_numOne, $s1_numTwo) {

    return $s1_numOne + $s1_numTwo;
},

],


/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Use your two variables `numOne` and `numTwo`. Subtract `numOne` from `numTwo` and answer with the result.
EOD
,

"points" => 1,

"answer" => function () use ($s1_numOne, $s1_numTwo) {

    return $s1_numTwo - $s1_numOne;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
// [
// 
// "text" => <<<EOD
// Use your two variables `numOne` and `numTwo`. Answer with the product of the variables.
// EOD
// ,
// 
// "answer" => function () use($s1_numOne, $s1_numTwo) {
// 
//     return $s1_numOne * $s1_numTwo;
// },
// 
// ],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Divide `numOne` with `numTwo` and use the function `round()` to round the answer to 1 decimal.
EOD
,

"points" => 1,

"answer" => function () use($s1_numOne, $s1_numTwo) {

    return round($s1_numOne / $s1_numTwo, 1);
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Create a variable called `floatOne` and give it the value $s1_floatOne. Create another variable called `floatTwo` and give it the value $s1_floatTwo. Sum up the variables and answer with the result rounded to 2 decimals.
EOD
,

"points" => 1,

"answer" => function () use($s1_floatOne, $s1_floatTwo) {

    return round($s1_floatOne + $s1_floatTwo, 2);
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Subtract `floatOne` from `floatTwo`, round up to 3 decimals and answer with the result.
EOD
,

"points" => 1,

"answer" => function () use($s1_floatOne, $s1_floatTwo) {

    return round($s1_floatTwo - $s1_floatOne, 3);
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Create a variable called `floatThree` and give it the value $s1_floatThree.  Add `floatOne` to `floatTwo` and multiply the result with `floatThree`, take that result and divide it by `numOne`.

Answer with the result rounded to 4 decimals.
EOD
,

"points" => 1,

"answer" => function () use($s1_floatOne, $s1_floatTwo, $s1_floatThree, $s1_numOne) {

    return round((($s1_floatOne + $s1_floatTwo) * $s1_floatThree) / $s1_numOne, 4);
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Create a variable `modOne` with a value of $s1_modOne and a variable `modTwo` holding the value $s1_modTwo.

Answer with the result of `modOne` modulo (%) `modTwo`.
EOD
,

"points" => 1,

"answer" => function () use ($s1_modOne, $s1_modTwo) {

    return $s1_modOne % $s1_modTwo;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Answer with the integer value of `modOne` divided by `modTwo` by using the function `floor()`.
EOD
,

"points" => 1,

"answer" => function () use ($s1_modOne, $s1_modTwo) {

    return floor($s1_modOne / $s1_modTwo);
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Use the function `max()` to get the highest value from your variables `modOne`, `modTwo`, `floatOne`, `floatTwo`, `numOne`, `numTwo`.
EOD
,

"points" => 1,

"answer" => function () use ($s1_numOne, $s1_numTwo, $s1_floatOne, $s1_floatTwo, $s1_modOne, $s1_modTwo) {

    return max($s1_numOne, $s1_numTwo, $s1_floatOne, $s1_floatTwo, $s1_modOne, $s1_modTwo);
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Use the function `min()` to get the smallest value from your variables `modOne`, `modTwo`, `floatOne`, `floatTwo`, `numOne`, `numTwo`.
EOD
,

"points" => 1,

"answer" => function () use ($s1_numOne, $s1_numTwo, $s1_floatOne, $s1_floatTwo, $s1_modOne, $s1_modTwo) {

    return min($s1_numOne, $s1_numTwo, $s1_floatOne, $s1_floatTwo, $s1_modOne, $s1_modTwo);
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
You are going to solve the well-known 'chessboard and rice grain problem'.  

Imagine you have a standard chessboard and put one rice grain on the first square. Then you put two grains on the second square, four on the third, eight on the fourth and so on... How many rice grains are there on the last square?  

Answer with the square root of the result. (Make sure the answer is of the type `double`)
EOD
,

"points" => 3,

"answer" => function () use($extra1) {

    return $extra1;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Sum all numbers from 1 to 100. Answer with the result. (Make sure the answer is of the type `integer`)
EOD
,

"points" => 3,

"answer" => function () use($extra2) {

    return $extra2;
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
