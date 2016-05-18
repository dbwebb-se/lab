<?php

/**
 * Generate random values to use in lab.
 */
include __DIR__ . "/../random.php";

// ################### SECTION ##################

$s1_numOne 			= rand_int(10, 500);
$s1_numTwo 			= rand_int(10, 500);
$s1_numThree		= rand_int(100, 500);
$s1_numFour			= rand_int(10, 99);

$s1_floatOne		= rand_float(10, 500, 2);
$s1_floatTwo		= rand_float(10, 500, 2);
$s1_floatThree		= rand_float(50, 100, 2);
$s1_floatFour		= rand_float(10, 100, 2);

$s1_modOne 			= rand_int(500, 1000);
$s1_modTwo 			= rand_int(10, 99);

// ################### SECTION ##################

$s1_wordList1		= ["ice", "earth", "fire", "wind"];
$s1_wordList2		= ["kitten", "mouse", "chicken", "puppy", "rabbit"];
$s1_singleWord1		= $s1_wordList1[rand_int(0, count($s1_wordList1)-1)];
$s1_singleWord2		= $s1_wordList2[rand_int(0, count($s1_wordList2)-1)];
$s1_wordRand1		= rand_int(0, count($s1_wordList1)-1);
$s1_wordRand2		= rand_int(0, count($s1_wordList2)-1);
$s1_sentence        = "There are $s1_numOne $s1_singleWord2's doing some $s1_singleWord1.";

// ################### SECTION ##################

$s2_numOne			= rand_int(10, 500);
$s2_numTwo			= rand_int(10, 500);
$s2_numThree		= rand_int(10, 500);
$s2_numFour			= rand_int(10, 500);
$s2_smallCompare	= rand_int(20, 40);
$s2_smallIf1	    = rand_int(22, 28);
$s2_smallIf2	    = rand_int(32, 38);
$s2_small1			= rand_int(2, 10);
$s2_small2			= rand_int(2, 10);
$s2_small3			= rand_int(2, 10);
$s2_small4			= rand_int(2, 10);
$s2_small5			= rand_int(2, 10);
$s2_smallSum		= $s2_small1+$s2_small2+$s2_small3+$s2_small4+$s2_small5;

// ################### SECTION ##################

$s3_wordList1 		= ["bank", "beam", "duck", "foot", "hood", "iron", "routing", "seal", "letter", "pound"];
$s3_wordList2 		= ["alligator", "elephant", "badger", "baboon", "cattle", "camel", "dolphin", "crocodile", "ferret", "monkey"];
$s3_word1 			= $s3_wordList1[rand_int(0, count($s3_wordList1)-1)];
$s3_word2 			= $s3_wordList2[rand_int(0, count($s3_wordList2)-1)];
$s3_sub1			= rand_int(0, strlen($s3_word1)-1);
$s3_sub2 			= $s3_word2[2] . $s3_word2[3];
$s3_word3			= $s3_wordList2[rand_int(0, count($s3_wordList2)-1)];
$s3_strpos1			= $s3_word3[rand_int(0, strlen($s3_word3)-1)];
$s3_numserie1		= [rand_int(-100, 100), rand_int(-100, 100), rand_int(-100, 100), rand_int(-100, 100), rand_int(-100, 100)];
$s3_numserie2		= [rand_int(-100, 100), rand_int(-100, 100), rand_int(-100, 100), rand_int(-100, 100), rand_int(-100, 100)];
$s3_numserie1Print	= implode(",",$s3_numserie1);
$s3_numserie2Print	= implode(",",$s3_numserie2);
$s3_parse1			= (string)rand_int(-100, -1) . ".78Xyt56" . "&%";

// ################### SECTION ##################

$s4_addNum			= rand_int(3, 9);
$s4_addTo			= rand_int(10, 100);
$s4_addTimes		= rand_int(20, 80);
$s4_subFrom			= rand_int(500, 1000);
$s4_toSub			= rand_float(4, 8, 2);
$s4_toReachLow		= rand_int(20, 50);
$s4_toReachHigh		= $s4_toReachLow+10;
$s4_forSmall		= rand_int(10, 20);
$s4_numserie1		= [rand_int(10, 100), rand_int(10, 100), rand_int(10, 100), rand_int(10, 100), rand_int(10, 100), rand_int(10, 100), rand_int(10, 100), rand_int(10, 100), rand_int(10, 100), rand_int(10, 100)];
$s4_numserie1Print	= implode(",",$s4_numserie1);

return [



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
Create two variables called 'numOne' and 'numTwo' and assign to them the values $s1_numOne and $s1_numTwo.

Sum up the variables and answer with the result.
EOD
,

"answer" => function () use ($s1_numOne, $s1_numTwo) {

    return $s1_numOne + $s1_numTwo;
},

],


/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Use your two variables 'numOne' and 'numTwo'. Subtract 'numOne' from 'numTwo' and answer with the result.
EOD
,

"answer" => function () use ($s1_numOne, $s1_numTwo) {

    return $s1_numTwo - $s1_numOne;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Use your two variables 'numOne' and 'numTwo'. Answer with the product of the variables.
EOD
,

"answer" => function () use($s1_numOne, $s1_numTwo) {

    return $s1_numOne * $s1_numTwo;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Divide 'numOne' with 'numTwo' and use the function round() to round the answer to 1 decimal.
EOD
,

"answer" => function () use($s1_numOne, $s1_numTwo) {

    return round($s1_numOne / $s1_numTwo, 1);
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Create a variable called 'floatOne' and give it the value $s1_floatOne. Create another variable called 'floatTwo' and give it the value $s1_floatTwo. Sum up the variables, round off to 2 decimals and answer with the result.
EOD
,

"answer" => function () use($s1_floatOne, $s1_floatTwo) {

    return round($s1_floatOne + $s1_floatTwo, 2);
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Subtract 'floatOne' from 'floatTwo', round up to 3 decimals and answer with the result.
EOD
,

"answer" => function () use($s1_floatOne, $s1_floatTwo) {

    return round($s1_floatTwo - $s1_floatOne, 3);
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Create a variable called 'floatThree' and give it the value $s1_floatThree.  Add 'floatOne' to 'floatTwo' and multiply the result with 'floatThree', take that result and divide it by 'numOne'.

Answer with the result rounded to 4 decimals.
EOD
,

"answer" => function () use($s1_floatOne, $s1_floatTwo, $s1_floatThree, $s1_numOne) {

    return round((($s1_floatOne + $s1_floatTwo) * $s1_floatThree) / $s1_numOne, 4);
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Create a variable 'modOne' with a value of $s1_modOne and a variable 'modTwo' holding the value $s1_modTwo.

Answer with the result of 'modOne' modulo (%) 'modTwo'.
EOD
,

"answer" => function () use ($s1_modOne, $s1_modTwo) {

    return $s1_modOne % $s1_modTwo;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Answer with the integer value of 'modOne' divided by 'modTwo' by using the function `floor()`.
EOD
,

"answer" => function () use ($s1_modOne, $s1_modTwo) {

    return floor($s1_modOne / $s1_modTwo);
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Use the function `max()` to get the highest value from your variables 'modOne', 'modTwo', 'floatOne', 'floatTwo', 'numOne', 'numTwo'.
EOD
,

"answer" => function () use ($s1_numOne, $s1_numTwo, $s1_floatOne, $s1_floatTwo, $s1_modOne, $s1_modTwo) {

    return max($s1_numOne, $s1_numTwo, $s1_floatOne, $s1_floatTwo, $s1_modOne, $s1_modTwo);
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Use the function `min()` to get the smallest value from your variables 'modOne', 'modTwo', 'floatOne', 'floatTwo', 'numOne', 'numTwo'.
EOD
,

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
"title" => "Strings and basic string operations",

"intro" => <<<EOD
The foundation for strings.
EOD
,

"shuffle" => false,

"questions" => [




/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Create a variable called 'wordOne' and assign the word '$s1_singleWord1' to it. 

Create another variable called 'wordTwo' and assign the word '$s1_singleWord2'. 

Concatenate the two strings, and separate them by a hyphen `-`, into a new variable called 'result'.

Answer with the result-variable.
EOD
,

"answer" => function () use ($s1_singleWord1, $s1_singleWord2) {

    return $s1_singleWord1 . '-' . $s1_singleWord2;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Concatenate your variable 'wordOne' with your variable 'floatThree', separate the words with a '='. Answer with the result.
EOD
,

"answer" => function () use ($s1_singleWord1, $s1_floatThree) {

    return $s1_singleWord1 . '=' . $s1_floatThree;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Concatenate your variable 'numOne' with your variable 'wordTwo', separate the words with a space. Answer with the result.
EOD
,

"answer" => function () use ($s1_numOne, $s1_singleWord2) {

    return $s1_numOne . ' ' . $s1_singleWord2;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Create the string: "$s1_sentence" by combining pure text with the values of your variables 'wordOne', 'wordTwo' and 'numOne'. Store the resulting text in a variable 'sentence'. Answer with the variable.
EOD
,

"answer" => function () use ($s1_sentence) {

    return $s1_sentence;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Use `strlen()` to find the length of the variable 'sentence'. Answer with the result.
EOD
,

"answer" => function () use ($s1_sentence) {


	return strlen($s1_sentence);

},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Use `substr()` to find the character at index $s3_sub1 in the word '$s3_word1'. Answer with the result.
EOD
,

"answer" => function () use ($s3_word1, $s3_sub1) {

	return substr($s3_word1, $s3_sub1, 1);

},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Use `substr()` to find the two characters at index 3 and 4 in the word '$s3_word2'. Answer with the result.
EOD
,

"answer" => function () use ($s3_word2) {

	return substr($s3_word2, 3, 2);

},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Use `strpos()` to find the first matching index of the character '$s3_strpos1' in the word '$s3_word3'. Answer with the result.
EOD
,

"answer" => function () use ($s3_word3, $s3_strpos1) {

	return strpos($s3_word3, $s3_strpos1);

},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Use `strpos()` to find the first matching, (if any), index of the characters 'xyz' in the word '$s3_word3'. Answer with the result.
EOD
,

"answer" => function () use ($s3_word3) {

	return strpos($s3_word3, "xyz");

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
"title" => "Conditions, booleans, if, else and else if",

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
Store the boolean result of the test: '$s2_numOne is less than $s2_numTwo' in a variable. Answer with the variable.
EOD
,

"answer" => function () use ($s2_numOne, $s2_numTwo) {

	return $s2_numOne < $s2_numTwo;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Answer with the boolean value of: $s2_numThree is larger than $s2_numFour.
EOD
,

"answer" => function () use ($s2_numThree, $s2_numFour) {

	return $s2_numThree > $s2_numFour;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Sum up the numbers: $s2_small1, $s2_small2, $s2_small3, $s2_small4 and $s2_small5. Save the result in a variable called 'totalSum'.

Create an if/elseif-statement to see if 'totalSum' is higher, lower or equal to $s2_smallCompare.

Answer with the corresponding result as a string: 'higher', 'lower', 'equal'.
EOD
,

"answer" => function () use ($s2_smallSum, $s2_smallCompare) {
	$res = "equal";
	if($s2_smallSum < $s2_smallCompare) {
		$res = "lower";
	}
	else if($s2_smallSum > $s2_smallCompare) {
		$res = "higher";
	}

	return $res;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Create an if-statement that checks if a value is between (or equal to) $s2_smallIf1 and  $s2_smallIf2. Use the variable 'totalSum' to test the if-statement. Answer with a boolean true if the value is between the values, otherwise respond with false.
EOD
,

"answer" => function () use ($s2_smallSum, $s2_smallIf1, $s2_smallIf2) {

	$res = false;
    if ($s2_smallSum >= $s2_smallIf1 && $s2_smallSum <= $s2_smallIf2) {
        $res = true;
    }
	return $res;
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

"intro" => <<<EOD
For-loops and while-loops.
EOD
,

"shuffle" => false,

"questions" => [



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Create a while-loop that adds $s4_addNum to the number $s4_addTo, $s4_addTimes times. Use variables to store the numbers. Answer with the result.
EOD
,

"answer" => function () use ($s4_addNum, $s4_addTo, $s4_addTimes) {
	$result = $s4_addTo;
	$i = 0;
	while($i < $s4_addTimes) {
		$result += $s4_addNum;
		$i+=1;
	}
	return $result;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Create a while-loop that subtracts $s4_toSub from the number $s4_subFrom until the number is between (not equal to) $s4_toReachLow and $s4_toReachHigh. Answer with the final result as a float, rounded to 2 decimals.
EOD
,

"answer" => function () use($s4_subFrom, $s4_toSub, $s4_toReachLow, $s4_toReachHigh) {

	$result = $s4_subFrom;
	$i = 0;
	while(! ($result > $s4_toReachLow && $result < $s4_toReachHigh) ) {
		$result -= $s4_toSub;
	}

	return round($result, 2);

},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Create a for-loop that iterates from 0 to (including) $s4_forSmall. Add the integer value for each iteration to a string and separate each item with a ','. Answer with the final string without an ending ','.
EOD
,

"answer" => function () use($s4_forSmall) {

	$result = "";

	for($i=0;$i<=$s4_forSmall;$i++) {
		$result .= $i . ',';
	}

	return rtrim($result, ',');
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Create a for-loop that goes through (and including) the numbers $s4_toReachLow to $s4_toReachHigh. If the current number is even, you should multiply it with PI and add it to a variable 'res'. If the current number is odd, you should subtract the square root of it, from the variable 'res'. If the current number ends with a zero, then ignore it. Answer with the final result of 'res' and round it to the nearest higher integer value.
EOD
,

"answer" => function () use($s4_toReachLow, $s4_toReachHigh) {

    $i = $s4_toReachLow;
    $max = $s4_toReachHigh;

	$res = 0;

	for($i = $s4_toReachLow; $i <= $max; $i++) {
		if ($i % 10 != 0) {
            if ($i % 2 === 0) {
    			$res += $i * pi();
    		} else {
    			$res -= sqrt($i);
    		}
        }
	}
	return intval(ceil($res));
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
