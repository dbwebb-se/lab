<?php

/**
 * Generate random values to use in lab.
 */
include LAB_INSTALL_DIR . "/config/random.php";

// SECTION 1 ****************************************************

$greeterValue = "Hi, the weather is nice today!";

$s4_numOne 		= rand_int(1, 100);
$s4_numTwo 		= rand_int(1, 100);
$s4_numThree 	= rand_int(1, 100);
$s4_wordSerie 	= ["icecream", "sunshine", "beach", "music", "vacation", "barbeque", "resort", "water", "restaurant", "beverage"];
$s4_arrRand		= rand_int(0, 9);
$s4_word 		= $s4_wordSerie[$s4_arrRand];

$s1_wordList 		= [
['melon', 'banana', 'apple', 'orange', 'lemon'],
['potato', 'carrot', 'onion', 'leek', 'cabbage'],
['milk', 'juice', 'lemonade', 'soda', 'water'],
['candy', 'cake', 'cupcakes', 'lollipop', 'pringles'],
['car', 'bus', 'plane', 'helicopter', 'train']
];
$s1_word5 			= $s1_wordList[rand_int(0, 4)][rand_int(0, 4)];
$s1_word6 			= $s1_wordList[rand_int(0, 4)][rand_int(0, 4)];

$multiplicatorStart = rand_int(1, 5);
$multiplicatorEnd = rand_int(11, 25);

$deciderList = [["blunderbuss", "crudivore", "fartlek", "filibuster", "hemidemisemiquaver"], [rand_int(1, 100), rand_int(1, 100), rand_int(1, 100), rand_int(1, 100), rand_int(1, 100)]];

$stringOrInteger = rand_int(0, 1);
$deciderValue = $deciderList[$stringOrInteger][rand_int(0, count($deciderList[$stringOrInteger]) - 1)];
$deciderStringValue = $deciderList[0][rand_int(0, count($deciderList[0]) - 1)];
$deciderIntegerValue = $deciderList[1][rand_int(0, count($deciderList[1]) - 1)];

$sentenceList = ["Pack my Box with five dozen LiQuor juGs.", "JackDaws Love my big Sphinx of QuarTz.", "The fiVe boXing Wizards jump quickLy.", "How vexingly Quick Daft zeBras jumP!", "Bright viXens juMp; doZy fowl Quack.", "SphiNx of bLack quArtz, juDge my vow."];

$sentence = $sentenceList[rand_int(0, count($sentenceList) - 1)];


//$s3_slice2PrintList = implode(",", $s3_slice2Use);
/**
 * Titel and introduction to the lab.
 */



return [

"passPercentage" => 10/16,
"passDistinctPercentage" => 16/16,

"author" => ["efo", "lew"],

/**
 * Titel and introduction to the lab.
 */
"title" => "Lab 3 - python",

"intro" => <<<EOD
In these exercises we will work with functions.
EOD
,


"sections" => [



/** ===================================================================================
 * New section of exercises.
 */
[
"title" => "Functions",

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
Create a function called `greeter` that returns `"$greeterValue"`.

Answer with the return value from a call to the function.
EOD
,
"points" => 1,
"answer" => function () use ($greeterValue) {

	return $greeterValue;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Assign the words: '$s1_word5' and '$s1_word6' to two different variables.

Create a function and pass the two words as arguments to it. Your function should return them as a single word.

Answer with the result.
EOD
,
"points" => 1,
"answer" => function () use ($s1_word5, $s1_word6) {

    return $s1_word5 . $s1_word6;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Create a function called `funny_word` that takes one argument and prepends it to the string ' is a funny word'. **EXAMPLE:** If the argument is 'water', the function should return: `"water is a funny word"`.

Use the argument '$s4_word' and answer with a call to the function.
EOD
,

"points" => 1,
"answer" => function () use ($s4_word) {
	return $s4_word . " is a funny word";
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Create a function called `summation` that takes two arguments. The function should return the sum of the two arguments.

Answer with the return value from a call to the function with the two arguments $s4_numOne and $s4_numTwo.
EOD
,
"points" => 1,
"answer" => function () use ($s4_numOne, $s4_numTwo) {

	return $s4_numOne+$s4_numTwo;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Create a function called `multiplication` that takes two arguments. The function should return the product of the two arguments.

Answer with the return value from a call to the function with the two arguments $s4_numOne and $s4_numTwo.
EOD
,
"points" => 1,
"answer" => function () use ($s4_numOne, $s4_numTwo) {

	return $s4_numOne*$s4_numTwo;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Create a function called `in_range` that takes one argument. The function should return `True` if the argument is higher than 50 and lower than 100. If the number is out of range, the function should return `False`. The return type should be boolean.

Use the argument $s4_numThree and answer with a call to the function.
EOD
,

"points" => 1,
"answer" => function () use ($s4_numThree) {

	$result = false;

    if($s4_numThree > 50 && $s4_numThree < 100) {
       $result = true;
    }
    return $result;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Create a function called `multiplicator`. Inside the function create a loop that iterates from $multiplicatorStart to $multiplicatorEnd (both included). For each number use the `multiplication` function from above to get the square of the current number. The function should return a comma-separated string of the squared numbers.

Answer with a call to the function `multiplicator`.
EOD
,

"points" => 1,
"answer" => function () use ($multiplicatorStart, $multiplicatorEnd) {

	$resultString = "";

	for ($i = $multiplicatorStart; $i <= $multiplicatorEnd; $i++) {
		$resultString .= $i*$i . ",";
	}

    return $resultString;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Create a function called `squares_in_range`. Inside the function create a loop that iterates from $multiplicatorStart to $multiplicatorEnd (both included). For each number use the `multiplication` function from above to get the square of the current number. Use the `in_range` function to check if the value is between 50 and 100. The function should return a comma-separated string of either `"Inside"` or `"Outside"`, use an if-statement to concatenate the strings to the return value.

Answer with a call to the function `squares_in_range`.
EOD
,

"points" => 1,
"answer" => function () use ($multiplicatorStart, $multiplicatorEnd) {

	$resultString = "";

	for ($i = $multiplicatorStart; $i <= $multiplicatorEnd; $i++) {
		$resultString.= $i*$i > 50 && $i*$i < 100 ? "Inside":"Outside";
		$resultString.= ",";
	}

    return $resultString;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Create a function called `decider`. The function takes one argument. If the argument is a string return a call to `funny_word()`, if the argument is an integer return the square of the argument by using the `multiplication` function.

Answer with a call to the function `decider` with the argument $deciderValue.
EOD
,

"points" => 1,
"answer" => function () use ($deciderValue) {

	if (gettype($deciderValue) == "integer") {
		return $deciderValue * $deciderValue;
	} else {
		return $deciderValue . " is a funny word";
	}
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Create a function called `double_decider`. The function takes two arguments. For each argument call the `decider` function. Concatenate the returned values in a string.

Separate the two values by ' and the square is '.

Answer with a call to the function `double_decider` with the arguments: $deciderStringValue and $deciderIntegerValue.
EOD
,

"points" => 1,
"answer" => function () use ($deciderStringValue, $deciderIntegerValue) {


	return $deciderStringValue . " is a funny word and the square is " . $deciderIntegerValue * $deciderIntegerValue;

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
Create a function that returns a binary string value of a given integer. Return only the binary number and not any identification that it is a binary number.

Example: Calling the function with the number 3 should return `"11"`.

Answer with a call to the function with the argument $s4_numThree.
EOD
,
"points" => 3,
"answer" => function () use ($s4_numThree) {
    return decbin($s4_numThree);
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Write a Python function that accepts a string and calculate the number of upper case letters and lower case letters. The function should return a string with the format "Lower case letters: #, upper case letters: #". Only count letters, you can ignore space and special characters.

Answer with a call to the function with the argument: `"$sentence"`.
EOD
,
"points" => 3,
"answer" => function () use ($sentence) {
	$lower = 0;
	$upper = 0;
	for ($i = 0; $i < strlen($sentence); $i++) {
		if (ctype_upper($sentence[$i])) {
			$upper++;
		} elseif (ctype_lower($sentence[$i])) {
			$lower++;
		} else {
			continue;
		}
	}

	return "Lower case letters: " . $lower . ", upper case letters: " . $upper;
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
