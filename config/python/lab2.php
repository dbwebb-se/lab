<?php

/**
 * Generate random values to use in lab.
 */
include __DIR__ . "/../random.php";

// SECTION 1 ****************************************************

$s1_wordList 		= [
['melon', 'banana', 'apple', 'orange', 'lemon'],
['potato', 'carrot', 'onion', 'leek', 'cabbage'],
['milk', 'juice', 'lemonade', 'soda', 'water'],
['candy', 'cake', 'cupcakes', 'lollipop', 'pringles'],
['car', 'bus', 'plane', 'helicopter', 'train']
];
$s1_smallArrRand	= rand_int(0, 4);
$s1_smallArrRand2	= rand_int(0, 4);
$s1_smallArrRand3	= rand_int(0, 4);
$s1_smallArrRand4	= rand_int(0, 4);
$s1_word 			= $s1_wordList[rand_int(0, 4)][rand_int(0, 4)];
$s1_word2 			= $s1_wordList[rand_int(0, 4)][rand_int(0, 4)];
$s1_word3			= $s1_wordList[rand_int(0, 4)][rand_int(0, 4)];
$s1_word4 			= $s1_wordList[rand_int(0, 4)][rand_int(0, 4)];
$s1_word5 			= $s1_wordList[rand_int(0, 4)][rand_int(0, 4)];
$s1_word6 			= $s1_wordList[rand_int(0, 4)][rand_int(0, 4)];
$s1_letter			= $s1_word4[rand_int(0, strlen($s1_word4)-1)];

$s1_format = [
["grandma", 42, "cows"],
["father", 9, "cats"],
["brother", 2, "dogs"],
["sister", 2, "houses"],
["book", 398, "pages"]
];
$s1_formatRand 		= $s1_format[rand_int(0, count($s1_format)-1)];
$s1_f1				= $s1_formatRand[0];
$s1_f2				= $s1_formatRand[1];
$s1_f3				= $s1_formatRand[2];

$s1_findSlice = [
"154.84.56.0 : (wallpaper), soda", 
"567.1.53.4 : (greece), table", 
"196.98.2.54 : (tree), window", 
"984.45.6.65 : (wasp), boat", 
"789.234.2.54 : (sunshine), bakery"];
$s1_slice1		= $s1_findSlice[rand_int(0, count($s1_findSlice)-1)];

/**
 * Titel and introduction to the lab.
 */


return [



/**
 * Titel and introduction to the lab.
 */
"title" => "Lab 2 - python",

"intro" => "
<p>Strings and files
</p>
",


"sections" => [



/** ===================================================================================
 * New section of exercises.
 */
[
"title" => "Strings",

"intro" => "
<p>The basics of strings</p>
",

"shuffle" => false,

"questions" => [



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Assign the word: '$s1_word' to a variable and put your variable as the answer.
</p>
",

"answer" => function () use ($s1_word) {

    return $s1_word;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Assign the word '$s1_word' to a variable. Create another variable where you put the first and the last letter in the word. Answer with the second variable.
</p>
",

"answer" => function () use ($s1_word) {

	$a = $s1_word[0];
	$b = strlen($s1_word);
	$c = $s1_word[$b-1];
    return $a . $c;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Assign the word: $s1_word2 to a variable. Answer with the length of the word as an integer.
</p>
",

"answer" => function () use ($s1_word2) {

    return strlen($s1_word2);
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Use the 'in-operator' to see if the word: '$s1_word3' contains the letter 'a'. Answer with a boolean result.
</p>
",

"answer" => function () use ($s1_word3) {

	$result = false;
	for($i = 0; $i < strlen($s1_word3); $i++) {
		if($s1_word3[$i] === "a") {
			$result = true;
		}
	}
    return $result;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Make all the letters in the word '$s1_word2' capitalized. Answer with the capitalized word.
</p>
",

"answer" => function () use ($s1_word2) {

    return strtoupper($s1_word2);
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[
"text" => "
<p>Use the built-in function 'startswith()' to see if the word '$s1_word4' starts with the letter '$s1_letter'. Answer with the boolean value.
</p>
",

"answer" => function () use ($s1_word4, $s1_letter) {
	$result = false;

	if($s1_word4[0] === $s1_letter) {
		$result = true;
	}
    return $result;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Assign the words: '$s1_word5' and '$s1_word6' to two different variables. Create a function and pass the two words as arguments to it. Your function should return them as a single word. Answer with the result.
</p>
",

"answer" => function () use ($s1_word5, $s1_word6) {

    return $s1_word5 . $s1_word6;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Create a function and pass the word: '$s1_word' to it. Your function should return the sentence: 'This word was: $s1_word'. Answer with the result.
</p>
",

"answer" => function () use ($s1_word) {

    return "This word was: " . $s1_word;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Create a function and pass the word: '$s1_word6' to it. Your function should return the string 'yes' if the word is longer than 5 characters. Else return 'no'. Answer with the result.
</p>
",

"answer" => function () use ($s1_word6) {

	$len = strlen($s1_word6);
	$result = "no";
	if($len > 5) {
		$result = "yes";
	}
    return $result;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Create a function and pass the word: '$s1_word2' to it. Your function should return a string with the word backwards. Answer with the result.
</p>
",

"answer" => function () use ($s1_word2) {

	$result = "";
	$len = strlen($s1_word2)-1;
	for($i = $len; $i > -1; $i--) {
		$result .= $s1_word2[$i];
	}
    return $result;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Create a function and pass the word: '$s1_word5' to it. Your function should exclude the first and the last letter of the word and return it. Answer with the result.
</p>
",

"answer" => function () use ($s1_word5) {

	$result = "";
	$len = strlen($s1_word5);
	for($i = 1; $i < $len-1; $i++) {
		$result .= $s1_word5[$i];
	}
    return $result;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Use the funktion str.format() to print out: 'My 'string' has 'integer' 'string''. Use the values: '$s1_f1', '$s1_f2' and '$s1_f3'. Answer with the result.
</p>
",

"answer" => function () use ($s1_f1, $s1_f2, $s1_f3) {

    return "My " . $s1_f1 . " has " . $s1_f2 . " " . $s1_f3;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Use 'find' and 'slice' on the string: '$s1_slice1' to get the word inside the parenthesis. Answer with the word as a string.
</p>
",

"answer" => function () use ($s1_slice1) {

    $a = strpos($s1_slice1, "(");
    $b = strpos($s1_slice1, ")");
    $result = "";

    for($i = $a+1; $i < $b; $i++) {
    	$result .= $s1_slice1[$i];
    }

    return $result;
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
"title" => "Files",

"intro" => "
<p>This section uses the text file: 'httpd-access.txt'</p>
",

"shuffle" => false,

"questions" => [



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Open the file and count the number of times a line starts with '81'. Answer with the result as an integer.
</p>
",

"answer" => function () {

   return 112;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Find out the last 4 digits on line 821 in the file. Answer with the result as an integer.
</p>
",

"answer" => function () {
	return 2154;
},

],

/* Find out which ip adress (first serie of numbers on each line) that has the highest amount of entries in the file. Test with the adresses: '81.226.253.26' and '95.19.133.73'. Answer with the highest amount of entries as an integer.*/

/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Find out which of the ip adresses 81.226.253.26 and 95.19.133.73 that has the highest amount of entries. Answer with the result as an integer.
</p>
",

"answer" => function () {
	return 93;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Count the number of periods (.) there are in the file. Use the built-in function count() on the file after you have converted it to a string. Answer with the result as an integer. 
</p>
",

"answer" => function () {
	return 5199;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Find the characters on line 637 from index 65 to index 75. Make sure that the character at index 75 also gets included. Answer with the piece of string you found.
</p>
",

"answer" => function () {
	return "source.php?";
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Find the last element on each line and sum all that are even numbers. Answer with the result as an integer.
</p>
",

"answer" => function () {
	return 2226;
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
