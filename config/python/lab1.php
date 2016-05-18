<?php

/**
 * Generate random values to use in lab.
 */
include __DIR__ . "/../random.php";


// SECTION 1 ****************************************************

$s1_numOne 		= rand_int(10, 100);
$s1_numTwo 		= rand_int(10, 100);
$s1_numThree 	= rand_int(10, 100);
$s1_numFour 	= rand_int(10, 100);

// kan man ha dessa "jämna" sä man kan dela dem utan att få decimaler?
$s1_divNum 		= 30;
$s1_divNumWith 	= 5;
////////////////////////////////

$s1_floatOne 	= rand_float(10, 100, 2);
$s1_floatTwo 	= rand_float(10, 100, 2);

$s1_numFive		= rand_int(100, 500);
$s1_numSix		= rand_int(100, 500);
$s1_numSeven	= rand_int(10, 100);

$s1_modOne 		= rand_int(100, 900);
$s1_modTwo 		= rand_int(10, 100);

$s1_wordSerie1 	= ["storage", "memory", "device", "syntax", "computer", "error", "print", "screen", "program", "input"];
$s1_wordSerie2 	= ["icecream", "sunshine", "beach", "music", "vacation", "barbeque", "resort", "water", "restaurant", "beverage"];
$s1_arrRandOne	= rand_int(0, count($s1_wordSerie1)-1);
$s1_wordOne 	= $s1_wordSerie1[$s1_arrRandOne];
$s1_wordTwo 	= $s1_wordSerie2[$s1_arrRandOne];

// SECTION 2 ****************************************************

$s2_numOne 		= rand_int(10, 500);
$s2_numTwo 		= rand_int(10, 500);
$s2_numThree 	= rand_int(10, 500);
$s2_numFour 	= rand_int(10, 500);

$s2_ifNumOne	= rand_int(10, 999);
$s2_ifNumTwo	= rand_int(10, 999);

// Chuck-a-luck stuff
$dice1			= rand_int(1,6);
$dice2			= rand_int(1,6);
$dice3			= rand_int(1,6);

$totVal 		= $dice1+$dice2+$dice3;


// SECTION 3 ****************************************************

$s3_numSerie = [6,8,95,2,12,152,4,78,621,45];
$s3_numSerieToPrint = implode(",", $s3_numSerie);
$s3_wordSerie1 = ["storage", "memory", "device", "syntax", "computer", "error", "print", "screen", "program", "input"];
$s3_arrRandOne	= rand_int(0, 9);
$s3_word = $s3_wordSerie1[$s3_arrRandOne];
$s3_numOne		= rand_int(10, 999);
$s3_floatOne	= rand_float(10, 999, 2);

// SECTION 4 ****************************************************

$s4_numOne 		= rand_int(1, 100);
$s4_numTwo 		= rand_int(1, 100);
$s4_numThree 	= rand_int(1, 100);
$s4_wordSerie 	= ["icecream", "sunshine", "beach", "music", "vacation", "barbeque", "resort", "water", "restaurant", "beverage"];
$s4_arrRand		= rand_int(0, 9);
$s4_word 		= $s4_wordSerie[$s4_arrRand];

// SECTION 5 ****************************************************

$s5_addNum		= rand_int(3, 9);
$s5_addTo		= rand_int(10, 100);
$s5_addTimes	= rand_int(20, 80);

$s5_subNum		= rand_int(3, 9);
$s5_subFrom		= rand_int(10, 100);
$s5_subTimes	= rand_int(20, 80);

$s5_numSerie 	= [6,8,95,2,12,152,4,78,621,45];
$s5_numSeriePrint	= implode(",", $s5_numSerie);

$s5_numSerie2 = [67,2,12,28,128,15,90,4,579,450];
$s5_numSerie2Print	= implode(",", $s5_numSerie2);


return [



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
"title" => "Integers, strings, floats and basic arithmetics",

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
Create a variable called 'numOne' and give it the value $s1_numOne. Create another variable called 'numTwo' and give it the value $s1_numTwo. Create a third variable called 'result' and assign to it the sum of the first two variables.

Answer with the result.
EOD
,

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
Create a variable called 'numThree' and give it the value $s1_numThree. 

Create another variable called 'numFour' and give it the value $s1_numFour. 

Subtract 'numThree' from 'numFour' and answer with the result.
EOD
,

"answer" => function () use ($s1_numThree, $s1_numFour) {

    return $s1_numFour-$s1_numThree;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Find out the product of 'numOne' and 'numThree' and answer with the result.
EOD
,

"answer" => function () use ($s1_numOne, $s1_numThree) {

    return $s1_numOne*$s1_numThree;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Divide $s1_divNum with $s1_divNumWith and answer with the result.
EOD
,

"answer" => function () use ($s1_divNum, $s1_divNumWith) {

    return $s1_divNum/$s1_divNumWith;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Create a variable called 'floatOne' and give it the value $s1_floatOne. 

Create another variable called 'floatTwo' and give it the value $s1_floatTwo.

Sum the two values and answer with the result, rounded to 2 decimals.
EOD
,

"answer" => function () use ($s1_floatOne, $s1_floatTwo) {

    return round($s1_floatOne+$s1_floatTwo, 2);
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Subtract 'floatTwo' from 'floatOne' and answer with the result. Round to 2 decimals.
EOD
,

"answer" => function () use ($s1_floatOne, $s1_floatTwo) {

    return round($s1_floatOne-$s1_floatTwo, 2);
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Answer with the product of 'floatOne' and 'floatTwo', rounded to 4 decimals.
EOD
,

"answer" => function () use ($s1_floatOne, $s1_floatTwo) {

    return round($s1_floatOne*$s1_floatTwo, 4);
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Create three variables: 'n1' = $s1_numFive, 'n2' = $s1_numSix and 'n3' = $s1_numSeven. Sum up 'n1' and 'n2'. Subtract 'n3' and answer with the result.
EOD
,

"answer" => function () use ($s1_numFive, $s1_numSix, $s1_numSeven) {

    return ($s1_numFive+$s1_numSix)-$s1_numSeven;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Answer with the result of $s1_modOne modulo (%) $s1_modTwo.
EOD
,

"answer" => function () use ($s1_modOne, $s1_modTwo) {

    return $s1_modOne%$s1_modTwo;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Add the word: '$s1_wordOne' to the word: '$s1_wordTwo' and answer with the result.
EOD
,

"answer" => function () use ($s1_wordOne, $s1_wordTwo) {

    return $s1_wordTwo . $s1_wordOne;
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
Answer with the boolean value of: $s2_numOne is less than $s2_numTwo.
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
Answer with the boolean value of: $s2_numOne == $s2_numThree.
EOD
,

"answer" => function () use ($s2_numOne, $s2_numThree) {

	return $s2_numOne == $s2_numThree;
},

],


/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Create three variables representing dice values: 'd1' = $dice1, 'd2' = $dice2 and 'd3' = $dice3. Sum them up and answer with the result.
EOD
,

"answer" => function () use ($dice1, $dice2, $dice3) {

	return $dice1+$dice2+$dice3; 
},

],


/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Create an if statement to see if the total value of your dices is 11 or higher. If that is the case, answer with the string: 'big', else answer with the string: 'nothing'. 
EOD
,

"answer" => function () use ($totVal) {

	$result = "nothing";
	if($totVal >= 11) {
		$result = "big";
	}
	return $result; 
},

],


/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Create an elif statement that checks your total dice value. The checks and results should be: three of the same value = 'triple', total of 11 or higher = 'big', total of 10 or lower = 'small'. If you get a triple you should not make more checks.
EOD
,

"answer" => function () use ($totVal, $dice1, $dice2, $dice3) {

	$result = "";
	$triple = false;

	if($dice1 === $dice2 && $dice1 === $dice3) {
		$result = "triple";
		$triple = true;
	}
	if(!$triple) {
		if($totVal <= 10) {
			$result = "small";	
		}
		else if($totVal >= 11) {
			$result = "big";
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



/** ===================================================================================
 * New section of exercises.
 */
[
"title" => "Built-in functions",

"intro" => <<<EOD
Some useful built-in functions.
EOD
,

"shuffle" => false,

"questions" => [



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Use `max()` to find the largest number in the serie: $s3_numSerieToPrint. 

Answer with the result. 
EOD
,

"answer" => function () use ($s3_numSerie) {

	return max($s3_numSerie);
	
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Use `min()` to find the smallest number in the serie: $s3_numSerieToPrint.

Answer with the result.
EOD
,

"answer" => function () use ($s3_numSerie) {

	return min($s3_numSerie);
	
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Use `len()` to find the number of letters in the word: $s3_word.

Answer with the result.
EOD
,

"answer" => function () use ($s3_word) {

	return strlen($s3_word);
	
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Convert the number $s3_numOne to a string and add it to the word '$s3_word'. Answer with the result.
EOD
,

"answer" => function () use ($s3_numOne, $s3_word) {

	return $s3_word .= $s3_numOne;
	
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Convert the number $s3_floatOne to an integer and then to a string. Add it to the beginning of the word: '$s3_word'. Answer with the result. 
EOD
,

"answer" => function () use ($s3_floatOne, $s3_word) {

	$temp = intval($s3_floatOne);
	return $temp .= $s3_word;
	
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

"intro" => <<<EOD
Basic functions.
EOD
,

"shuffle" => false,

"questions" => [



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Create a function called 'prodNr' that takes two arguments, $s4_numOne and $s4_numTwo. The function should return the product of the numbers.

Answer with a call to the function. 
EOD
,

"answer" => function () use ($s4_numOne, $s4_numTwo) {

	return $s4_numOne*$s4_numTwo;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Create a function called 'funnyWord' that takes one argument and adds it to the string ' is a funny word'. If the argument is 'water', the function should return: 'water is a funny word'.

Use the argument '$s4_word' and answer with a call to the function.
EOD
,

"answer" => function () use ($s4_word) {

	return $s4_word . " is a funny word";
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Create a function called 'inRange' that takes one argument. The function should return 'true' if the argument is higher than 50 and lower than 100. If the number is out of range, the function should return 'false'. The return type should be boolean.

Use the argument $s4_numThree and answer with a call to the function.
EOD
,

"answer" => function () use ($s4_numThree) {

	$result = false;

    if($s4_numThree > 50 && $s4_numThree < 100) {
       $result = true;
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
Create a while-loop that adds $s5_addNum to the number $s5_addTo, $s5_addTimes times. Answer with the result. 
EOD
,

"answer" => function () use ($s5_addNum, $s5_addTo, $s5_addTimes) {

	$result = $s5_addTo;
	$i = 0;
	while($i < $s5_addTimes) {
		$result += $s5_addNum;
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
Create a while-loop that subtracts $s5_subNum from $s5_subFrom, $s5_subTimes times. Answer with the result. 
EOD
,

"answer" => function () use ($s5_subNum, $s5_subFrom, $s5_subTimes) {

	$result = $s5_subFrom;
	$i = 0;
	while($i < $s5_subTimes) {
		$result -= $s5_subNum;
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
Create a for-loop that counts the number of elements in the serie:

> $s5_numSeriePrint

Answer with the result. 
EOD
,

"answer" => function () use ($s5_numSerie) {

	return count($s5_numSerie);
	
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Create a for-loop that sums up the numbers in the serie:

> $s5_numSerie2Print

Answer with the result. 
EOD
,

"answer" => function () use ($s5_numSerie2) {

	$result = 0;
	
	for($i = 0; $i < count($s5_numSerie2); $i++) {
		$result += $s5_numSerie2[$i];
	}
	return $result;
	
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Create a for-loop that finds the largest number in the serie:

> $s5_numSeriePrint

Answer with the result. 
EOD
,

"answer" => function () use ($s5_numSerie) {

	$result = 0;
	
	for($i = 0; $i < count($s5_numSerie); $i++) {
		if($s5_numSerie[$i] > $result) {
			$result = $s5_numSerie[$i];
		}
	}
	return $result;
	
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Create a for-loop that goes through the numbers:

> $s5_numSerie2Print

If the current number is even, you should add it to a variable and if the current number is odd, you should subtract it from the variable.

Answer with the final result. 
EOD
,

"answer" => function () use ($s5_numSerie2) {

	$result = 0;

	for($i = 0; $i < count($s5_numSerie2); $i++) {
		if($s5_numSerie2[$i] % 2 === 0) {
			$result += $s5_numSerie2[$i];
		}
		else {
			$result -= $s5_numSerie2[$i];
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
