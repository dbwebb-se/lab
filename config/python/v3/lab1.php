<?php

/**
 * Generate random values to use in lab.
 */
include LAB_INSTALL_DIR . "/config/random.php";


// SECTION 1 ****************************************************

$s1_numOne 		= rand_int(10, 100);
$s1_numTwo 		= rand_int(10, 100);
$s1_numThree 	= rand_int(10, 100);
$s1_numFour 	= rand_int(10, 100);

$s1_floatOne 	= rand_float(10, 100, 2);
$s1_floatTwo 	= rand_float(10, 100, 2);

// kan man ha dessa "jämna" sä man kan dela dem utan att få decimaler?
$s1_divNum 		= 30;
$s1_divNumWith 	= 5;

$s1_wordSerie1 	= ["storage", "memory", "device", "syntax", "computer", "error", "print", "screen", "program", "input"];
$s1_wordSerie2 	= ["icecream", "sunshine", "beach", "music", "vacation", "barbeque", "resort", "water", "restaurant", "beverage"];
$s1_arrRandOne	= rand_int(0, count($s1_wordSerie1)-1);
$s1_wordOne 	= $s1_wordSerie1[$s1_arrRandOne];
$s1_wordTwo 	= $s1_wordSerie2[$s1_arrRandOne];



return [


"passPercentage" => 10/16,
"passDistinctPercentage" => 16/16,

"author" => ["efo", "aar"],

/**
 * Titel and introduction to the lab.
 */
"title" => "Lab 1 - python",

"intro" => <<<EOD
If you need to peek at examples or just want to know more, take a look at the [Python manual](https://docs.python.org/3/library/index.html).

There you will find everything this lab will go through and much more.
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
Create a variable called `num_one` and give it the value $s1_numOne.

Answer with the value of `num_one`.
EOD
,
"points" => 1,
"answer" => function () use ($s1_numOne) {
    return $s1_numOne;
},

],


/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Create another variable called `num_two` and give it the value $s1_numTwo. Create a third variable called `result` and assign to it the sum of the first two variables.

Answer with the `result` variable.
EOD
,
"points" => 1,
"answer" => function () use ($s1_numOne, $s1_numTwo) {

    $result = $s1_numOne + $s1_numTwo;
    return $result;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Create a variable called `num_three` and give it the value $s1_numThree.

Create another variable called `num_four` and give it the value $s1_numFour.

Subtract `num_three` from `num_four` and add the `result` variable from above to result of the subtraction. Answer with the result.
EOD
,
"points" => 1,
"answer" => function () use ($s1_numThree, $s1_numFour, $s1_numOne, $s1_numTwo) {
    return $s1_numFour - $s1_numThree + $s1_numOne + $s1_numTwo;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Answer with the result of a multiplication of `num_one` and `num_three`.
EOD
,
"points" => 1,
"answer" => function () use ($s1_numOne, $s1_numThree) {

    return $s1_numOne*$s1_numThree;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Create a variable called `float_one` and give it the value $s1_floatOne.

Create another variable called `float_two` and give it the value $s1_floatTwo.

Sum the two values and answer with the result, rounded to two decimals.
EOD
,
"points" => 1,
"answer" => function () use ($s1_floatOne, $s1_floatTwo) {
    return round($s1_floatOne+$s1_floatTwo, 2);
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
All variables used in the exercise below are defined above.

Sum `num_three` with `num_one` and subtract `num_four`. Multiply the result by `num_two`, add `float_two` and subtract `float_one`.

Answer with the result.
EOD
,
"points" => 1,
"answer" => function () use ($s1_numThree, $s1_floatOne, $s1_numOne, $s1_numFour, $s1_numTwo, $s1_floatTwo) {
    return ($s1_numThree + $s1_numOne - $s1_numFour) * $s1_numTwo + $s1_floatTwo - $s1_floatOne;
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
"title" => "Strings and concatenation",

"intro" => <<<EOD
EOD
,

"shuffle" => false,

"questions" => [



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Concatenate (svenska: konkatenera) the two words '$s1_wordOne' and '$s1_wordTwo' and answer with the result.
EOD
,
"points" => 1,
"answer" => function () use ($s1_wordOne, $s1_wordTwo) {
    return $s1_wordOne . $s1_wordTwo;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Concatenate the word '$s1_wordTwo' with the integer $s1_numOne with a space between the two variables and answer with the result.
EOD
,
"points" => 1,
"answer" => function () use ($s1_wordTwo, $s1_numOne) {
    return $s1_wordTwo . " " . $s1_numOne;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Concatenate the integer $s1_numOne with the word '$s1_wordOne' with a space between. To the resulting string concatenate the string ' and '. To this string concatenate integer $s1_numTwo and the word '$s1_wordTwo' with a space between between the two variables.

EOD
,
"points" => 1,
"answer" => function () use ($s1_wordOne, $s1_numOne, $s1_wordTwo, $s1_numTwo) {
    return $s1_numOne . " " .$s1_wordOne . " and " . $s1_numTwo . " " .$s1_wordTwo;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Assign the string value '$s1_divNum' to a variable called `string_number` and assign the integer value $s1_divNumWith to a variable called `actual_number`.

Use `int()` to change the type of `string_number` to an integer and divide the integer value with `actual_number`. Answer with an integer by using the function `round()`.
EOD
,
"points" => 1,
"answer" => function () use ($s1_divNum, $s1_divNumWith) {
    return round($s1_divNum / $s1_divNumWith);
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
BTH have two plugin-hybrid cars. A new car and an old car. The new car has a fast charging mode where 80% of the battery can be charged in 30 minutes. The remaining 20% of the battery and the entire battery of the old car is charged by 5% every 30 minutes.

During fast charging the effect of the charger is 200W and during normal charging the effect of the charger is 100W.

The formula for calculating the amount of energy based on effect and time is: `energy = effect * time`. To get the amount of energy in kWh the formula is `energy = (effect in W * time in hours) / 1000`.

Calculate the total amount of energy used to fully charge the two cars. Answer with the amount of energy in kWh.
EOD
,
"points" => 3,
"answer" => function () {
    $newEnergy = 0.5 * 200 + 20/5 * 0.5 * 100;
    $oldEnergy = 100/5 * 0.5 * 100;


    return ($newEnergy + $oldEnergy) / 1000;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Peter has the phonenumber '0731415926' and Anna has the phonenumber '0727182818'. They call each other every sunday afternoon for 9 minutes.

Calculate the number of hours that they talk with each other pr year (assume 52 sundays pr year). Use that number in a string concatenation with the following format:

'Peter calls from [#Peter's phonenumber] to Anna on [#Anna's phonenumber] for [#hours] hours every year.'

Replace the content inside [#] with the corresponding values.

Answer with the concatenated string.
EOD
,
"points" => 3,
"answer" => function () {
    $peter = '0731415926';
    $anna = '0727182818';
    $hours = 52 * 9 / 60;

    return "Peter calls from " . $peter . " to Anna on " . $anna . " for " . $hours . " hours every year.";
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
