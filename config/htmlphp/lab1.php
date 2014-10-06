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
$s2_smallCompare	= rand_int(20, 40);
$s2_small1			= rand_int(2, 10);
$s2_small2			= rand_int(2, 10);
$s2_small3			= rand_int(2, 10);
$s2_small4			= rand_int(2, 10);
$s2_small5			= rand_int(2, 10);
$s2_smallSum		= $s2_small1+$s2_small2+$s2_small3+$s2_small4+$s2_small5;

// ################### SECTION 3 ##################

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

// ################### SECTION 4 ##################

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
"title" => "Conditions, booleans, if, else and else if",

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



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Sum up the numbers: $s2_small1, $s2_small2, $s2_small3, $s2_small4 and $s2_small5. Save the result in a variable called 'totalSum'. Create an if-statement to see if 'totalSum' is higher, lower or equal to $s2_smallCompare. Answer with the corresponding result as a string: 'higher', 'lower', 'equal'.
</p>
",

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

"text" => "
<p>Use the values from the last excercise ($s2_small1, $s2_small2, $s2_small3, $s2_small4, $s2_small5). Create an if/else statement to see if the serie of numbers contains at least a pair. Answer with the correspoding result as a string: 'pair' or 'nothing'.
</p>
",

"answer" => function () use ($s2_small1, $s2_small2, $s2_small3, $s2_small4, $s2_small5) {
		
	$res = "nothing";
	$count = 0;
	$temp = [$s2_small1, $s2_small2, $s2_small3, $s2_small4, $s2_small5];
	
	for($i=0;$i<count($temp);$i++) {
		for($j=$i;$j<count($temp);$j++) {
			if($temp[$i]===$temp[$j]) {
				$count++;
			}
		}
	}
	if($count > 5) {
		$res = "pair";
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
<p>Use strlen() to find the length of the word: '$s3_word2'. Answer with the result.
</p>
",

"answer" => function () use ($s3_word2) {
		
	
	return strlen($s3_word2);  
	
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Use substr() to find the character at index $s3_sub1 in the word '$s3_word1'. Answer with the result.
</p>
",

"answer" => function () use ($s3_word1, $s3_sub1) {

	return substr($s3_word1, $s3_sub1, 1);
	
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Use substr() to find the two characters at index 3 and 4 in the word '$s3_word2'. Answer with the result.
</p>
",

"answer" => function () use ($s3_word2) {

	return substr($s3_word2, 3, 2);
	
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Use strpos() to find the first matching index of the character '$s3_strpos1' in the word '$s3_word3'. Answer with the result.
</p>
",

"answer" => function () use ($s3_word3, $s3_strpos1) {

	return strpos($s3_word3, $s3_strpos1);
	
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Use strpos() to find the first matching, (if any), index of the characters 'xyz' in the word '$s3_word3'. Answer with the result.
</p>
",

"answer" => function () use ($s3_word3) {

	return strpos($s3_word3, "xyz");
	
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Use min() to find the smallest number in the serie: $s3_numserie1Print. Answer with the result.
</p>
",

"answer" => function () use ($s3_numserie1) {

	return min($s3_numserie1);
	
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Use max() to find the biggest number in the serie: $s3_numserie2Print. Answer with the result.
</p>
",

"answer" => function () use ($s3_numserie2) {

	return max($s3_numserie2);
	
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Use intval() to find the integer representation of the string: $s3_parse1. Answer with the result.
</p>
",

"answer" => function () use ($s3_parse1) {

	return intval($s3_parse1);
	
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Use floatval() to find the float representation of the string: $s3_parse1. Answer with the result.
</p>
",

"answer" => function () use ($s3_parse1) {

	return floatval($s3_parse1);
	
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
<p>Create a while-loop that adds $s4_addNum to the number $s4_addTo, $s4_addTimes times. Answer with the result. 
</p>
",

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

"text" => "
<p>Create a while-loop that subtracts $s4_toSub from the number $s4_subFrom until the number is between $s4_toReachLow and $s4_toReachHigh. Answer with the final result as a float, rounded to 2 decimals. 
</p>
",

"answer" => function () use($s4_subFrom, $s4_toSub, $s4_toReachLow, $s4_toReachHigh) {

	$result = $s4_subFrom;
	$i = 0;
	while($result > $s4_toReachLow && $result > $s4_toReachHigh) {
		$result -= $s4_toSub;
	}

	return round($result, 2);
	
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Create a for-loop that iterates from 0 to (including) $s4_forSmall. Add the integer value for each iteration to a string. Answer with the final string.
</p>
",

"answer" => function () use($s4_forSmall) {

	$result = "";

	for($i=0;$i<=$s4_forSmall;$i++) {
		$result .= $i;
	}

	return $result;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Create a for-loop that goes through the numbers: $s4_numserie1Print. If the current number is even, you should add it to a variable and if the current number is odd, you should subtract it from the variable. Answer with the final result.
</p>
",

"answer" => function () use($s4_numserie1) {

	$result = 0;

	for($i = 0; $i < count($s4_numserie1); $i++) {
		if($s4_numserie1[$i] % 2 === 0) {
			$result += $s4_numserie1[$i];
		}
		else {
			$result -= $s4_numserie1[$i];
		}
	}
	return $result;
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
