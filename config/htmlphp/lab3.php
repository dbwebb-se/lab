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

"intro" => "
<p>??????</p>
",

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
<p>Create a function called 'printRange' that should take 2 numbers as arguments, start and stop. The function should add all even numbers between start and stop to an array and return it. Answer with a call to the function using the arguments: $s1_smallNr and $s1_bigNr.
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



/**
 * Closing up this section.
 */
], // EOF questions
], // EOF section



/** ===================================================================================
 * New section of exercises.
 */
[
"title" => "",

"intro" => "
<p>?????
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
"title" => "",

"intro" => "
<p>????? 
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



/** -----------------------------------------------------------------------------------
 * Closing up all sections.
 */
] // EOF sections



/**
 * Closing up this lab.
 */
]; // EOF the entire lab
