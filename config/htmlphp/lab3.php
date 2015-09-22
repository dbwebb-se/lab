<?php

/**
 * Generate random values to use in lab.
 */
include __DIR__ . "/../random.php";

// ################### SECTION 1 ##################

$s1_num1	= rand_int(10, 1000);
$s1_num2	= rand_int(10, 1000);

$s1_numArrs	= [
[1,321,5,89,8],
[2,134,8,35,5],
[3,652,9,74,7],
[4,256,5,13,1],
[5,946,2,86,9]
];
$s1_numArrWhich	 = rand_int(1, count($s1_numArrs)-1);
$s1_numArrWhich2 = $s1_numArrWhich-1;
$s1_useNumArr1 = $s1_numArrs[$s1_numArrWhich];
$s1_useNumArr2 = $s1_numArrs[$s1_numArrWhich2];
$s1_printNumArr1 = implode(",", $s1_useNumArr1);
$s1_printNumArr2 = implode(",", $s1_useNumArr2);

$s1_singleWords = ["potato", "carrot", "leek", "onion", "turnip", "cabbage"];
$s1_singleWord1 = $s1_singleWords[rand_int(0, count($s1_singleWords)-1)];

$s1_smallNr = rand_int(5, 20);
$s1_bigNr	= rand_int(25, 50);

$s1_array1 = ["green", "brown", "pink", "white", "gray", "blue"];
$s1_array2 = ["frog", "bear", "pig", "lion", "wolf", "whale"];
$s1_array1Print = implode(",", $s1_array1);
$s1_array2Print = implode(",", $s1_array2);
$s1_array3 = array_combine($s1_array1, $s1_array2);

$s1_dollars = 1.261215;
$s1_euroToConvert = rand_int(100, 999);

$s1_inRange = rand_int(10, 150);

$s1_diameter = rand_int(5, 20);
$s1_circleArea = round((($s1_diameter/2)*($s1_diameter/2))*pi(),4);


// ################### SECTION 2 ##################



// ################### SECTION 3 ##################



// ################### SECTION 4 ##################



return [



/**
 * Titel and introduction to the lab.
 */
"title" => "Lab 3 - Htmlphp",

"intro" => "
<p>If you need to peek at examples or just want to know more, take a look at the page: http://php.net/manual/en/langref.php. Here you will find everything this lab will go through and much more.
</p>
",


"sections" => [



/** ===================================================================================
 * New section of exercises.
 */
[
"title" => "Basic functions",

"intro" => "",

"shuffle" => false,

"questions" => [



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Create a function called 'sumNumbers' that should take 2 numbers as arguments and return the sum of them. Answer with a call to the function using the numbers $s1_num1 and $s1_num2.
</p>
",

"answer" => function () use ($s1_num1, $s1_num2) {

    return $s1_num1+$s1_num2;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Create a function called 'sumArray' that should take an array as argument and return the sum of all items in the array. Answer with a call to the function using the array: [$s1_printNumArr1].
</p>
",

"answer" => function () use ($s1_useNumArr1) {

	$res = 0;
	for($i=0;$i<count($s1_useNumArr1);$i++) {
		$res += $s1_useNumArr1[$i];
	}

    return $res;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Create a function called 'modArray' that should take 2 arguments, an array and a string. Replace the first item in the array with the string and return the array. Answer with a call to the function using the arguments: [$s1_printNumArr2] and '$s1_singleWord1'.
</p>
",

"answer" => function () use ($s1_useNumArr2, $s1_singleWord1) {

	$s1_useNumArr2[0] = $s1_singleWord1;
    return $s1_useNumArr2;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Create a function called 'printRange' that should take 2 numbers as arguments, start and stop. The function should add all even numbers between start and stop (not including) to an array and return it. Answer with a call to the function using the arguments: $s1_smallNr and $s1_bigNr.
</p>
",

"answer" => function () use ($s1_smallNr, $s1_bigNr) {

	$res = [];
	for($i=$s1_smallNr+1; $i<$s1_bigNr; $i++) {
		if($i%2 === 0) {
			array_push($res, $i);
		}
	}
    return $res;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Create a function called 'combineArrays' that takes two arrays as arguments. The function should combine the arrays to one associative array and return it. The first argument is the key and the second argument is the value. Answer with a call to the function using the arguments: [$s1_array1Print] and [$s1_array2Print].
</p>
",

"answer" => function () use ($s1_array3) {

	return $s1_array3;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Create a function called 'euroToDollar' that takes one argument, the euro amount to convert to dollars. Count 1 Euro as $s1_dollars dollars. Return the dollar amount of $s1_euroToConvert Euros. Answer with the result as a float with 4 decimals.
</p>
",

"answer" => function () use ($s1_dollars, $s1_euroToConvert) {

	return round(($s1_euroToConvert*$s1_dollars), 4);
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Create a function called 'inRange' that takes one argument. The function should return 'true' if the argument is higher than 50 and lower than 100. If the number is out of range, the function should return 'false'. The return type should be boolean. Use the argument $s1_inRange and answer with a call to the function.
</p>
",

"answer" => function () use ($s1_inRange) {

	$result = false;

    if($s1_inRange > 50 && $s1_inRange < 100) {
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
<p>Create a function called 'calculateArea' that takes one argument, the diameter of a circle. The function should return the area of the circle, with 4 decimals. Answer with the result if the diameter is $s1_diameter. ( hint: pi() )
</p>
",

"answer" => function () use ($s1_circleArea) {

	return $s1_circleArea;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Create a function called 'fibonacci'. The function should use the Fibbonacci Sequence (http://en.wikipedia.org/wiki/Fibonacci_number), starting with 1 and 2. Return the sum of all odd numbers in the sequence, when the value dont exceed 1.000.000. Answer with a call of the function. A Fibonacci-sequence can look like this: 1, 2, 3, 5, 8, 13, 21, 34, 55 etc. You add the current value with the last, i.e. 1+2=3, 3+2=5, 5+3=8 etc.
</p>
",

"answer" => function () {

	$prev = 2;
	$prev2 = 1;
	$res = 1;
	$num = 0;
	while ($num < 1000000) {
	  $num = $prev + $prev2;

	  $prev2 = $prev;
	  $prev = $num;

	  if (($num % 2) != 0 && $num < 1000000) {
	    $res += $num;
	  }
	}
	return $res;
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
