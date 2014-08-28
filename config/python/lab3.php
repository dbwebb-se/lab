<?php

/**
 * Generate random values to use in lab.
 */
include __DIR__ . "/../random.php";

// SECTION 1 ****************************************************

$s1_listWords 		= [
["table", "wall", "desk", "chair", "floor"],
["wasp", "fly", "butterfly", "bumblebee", "mosquito"],
["lion", "tiger", "ozelot", "bobcat", "cougar"],
["Dafoe", "Sheen", "Berenger", "Depp", "Whitaker"],
["flute", "guitar", "drums", "piano", "bass"]
];
$s1_extraWords		= ["icecream", "hotdog", "purple", "yellow", "elevator"];
$s1_shortList1		= [$s1_listWords[rand_int(0, count($s1_listWords)-1)][rand_int(0, 4)], $s1_listWords[rand_int(0, count($s1_listWords)-1)][rand_int(0, 4)]];
$s1_shortList1Print	= implode(", ", $s1_shortList1);
$s1_shortList2		= [$s1_listWords[rand_int(0, count($s1_listWords)-1)][rand_int(0, 4)], $s1_listWords[rand_int(0, count($s1_listWords)-1)][rand_int(0, 4)]];
$s1_shortList2Print	= implode(", ", $s1_shortList2);

$s1_list1 			= $s1_listWords[rand_int(0, count($s1_listWords)-1)];
$s1_list1Print 		= implode(", ", $s1_list1);
$s1_list2 			= $s1_listWords[rand_int(0, count($s1_listWords)-1)];
$s1_list2Print 		= implode(", ", $s1_list2);
$s1_word1			= $s1_extraWords[rand_int(0, count($s1_extraWords)-1)];
$s1_word2			= $s1_extraWords[rand_int(0, count($s1_extraWords)-1)];
$s1_word3			= $s1_extraWords[rand_int(0, count($s1_extraWords)-1)];

$s1_list3			= $s1_listWords[rand_int(0, count($s1_listWords)-1)];
$s1_wordToList3		= $s1_list3[rand_int(0, count($s1_list3)-1)];
$s1_list3Print 		= implode(", ", $s1_list3);

// SECTION 2

$s2_listNumbers = [
[98,5,12,369,1],
[123,4,125,69,155],
[67,50,2,39,15],
[567,23,12,36,7],
[45,22,2,498,78]
];
$s2_numSerie1		= $s2_listNumbers[rand_int(0, count($s2_listNumbers)-1)];
$s2_numSerie1Print	= implode(", ", $s2_numSerie1);
$s2_numSerie2		= $s2_listNumbers[rand_int(0, count($s2_listNumbers)-1)];
$s2_numSerie2Print	= implode(", ", $s2_numSerie2);
$s2_numSerie3		= $s2_listNumbers[rand_int(0, count($s2_listNumbers)-1)];
$s2_numSerie3Print	= implode(", ", $s2_numSerie3);

$s2_listSent = [
"The?sun?is?shining",
"The?snow?is?falling",
"The?rain?is?pouring",
"The?wind?is?blowing",
"The?grass?is?growing"
];
$s2_listSent1		= $s2_listSent[rand_int(0, count($s2_listSent)-1)];
$s2_smallInt1		= rand_int(1, 3);
$s2_smallInt2		= rand_int(5, 9);

/**
 * Titel and introduction to the lab.
 */
$words = ["Finland", "Sweden", "Norway", "Denmark", "Iceland"];
$listWords = [
["table", "wall", "desk", "chair", "floor"],
["wasp", "fly", "butterfly", "bumblebee", "mosquito"],
["lion", "tiger", "ozelot", "bobcat", "cougar"],
["Dafoe", "Sheen", "Berenger", "Depp", "Whitaker"],
["flute", "guitar", "drums", "piano", "bass"]
];
$listSent = [
"The?sun?is?shining",
"The?snow?is?falling",
"The?rain?is?pouring",
"The?wind?is?blowing",
"The?grass?is?growing"
];
$listNumbers = [
[98,5,12,369,1],
[123,4,125,69,155],
[67,50,2,39,15],
[567,23,12,36,7],
[45,22,2,498,78]
];
$r1 = 1; // 0-4
$r2 = 2; // 0-4
$r3 = 3; // 0-4
$r4 = 4; // 0-4


return [



/**
 * Titel and introduction to the lab.
 */
"title" => "Lab 3 - python",

"intro" => "
<p>
</p>
",


"sections" => [



/** ===================================================================================
 * New section of exercises.
 */
[
"title" => "List basics",

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
<p>Concatinate the two lists [$s1_shortList1Print] and [$s1_shortList2Print]. Answer with your list. 
</p>
",

"answer" => function () use ($s1_shortList1, $s1_shortList2) {
	$result = array_merge($s1_shortList1, $s1_shortList2);
	return $result;
	
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Use the list [$s1_list1Print]. Update it with the words: '$s1_word1' and '$s1_word2' as the second and third element. Answer with the modified list.
</p>
",

"answer" => function () use ($s1_list1, $s1_word1, $s1_word2) {
	$tempList = $s1_list1;
	array_splice($tempList, 1, 0, $s1_word1);

	array_splice($tempList, 2, 0, $s1_word2);
	return $tempList;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Use the list [$s1_list1Print]. Replace the third word with: '$s1_word3'. Answer with the modified list.
</p>
",

"answer" => function () use ($s1_list1, $s1_word3) {

	$tempList = $s1_list1;
	$tempList[2] = $s1_word3;
	return $tempList;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Sort the list [$s1_list2Print] in ascending alphabetical order. Answer with the sorted list.
</p>
",

"answer" => function () use ($s1_list2) {
	$tempList = $s1_list2;
	asort($tempList);
	return $tempList;
	
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Use pop() to get the second and the last element in the list: [$s1_list1Print]. Answer with the popped elements in a new list.
</p>
",

"answer" => function () use ($s1_list1) {
	$result = [];
	array_push($result, $s1_list1[1]);
	array_push($result, $s1_list1[count($s1_list1)-1]);
	return $result;
	
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Use remove() to delete the word: '$s1_wordToList3' from the list: [$s1_list3Print]. Answer with the modified list.
</p>
",

"answer" => function () use ($s1_wordToList3, $s1_list3) {

	$result = [];
	for($i = 0; $i < count($s1_list3); $i++) {
		if($s1_list3[$i] != $s1_wordToList3) {
			array_push($result, $s1_list3[$i]);
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
"title" => "Built-in list functions",

"intro" => "
<pSome basic built-in functions
</p>
",

"shuffle" => false,

"questions" => [



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Use a built-in function to sum all numbers in the list: [$s2_numSerie1Print]. Answer with the result as an integer.
</p>
",

"answer" => function () use ($s2_numSerie1) {

    return array_sum($s2_numSerie1);
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Use a built-in function to get the average value of the list: [$s2_numSerie2Print]. Answer with the result as a float.
</p>
",

"answer" => function () use ($s2_numSerie2) {

    return floatval(array_sum($s2_numSerie2)/count($s2_numSerie2));
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Use a built-in function to get the lowest number in the list: [$s2_numSerie3Print]. Answer with the result as a integer.
</p>
",

"answer" => function () use ($s2_numSerie3) {

    return min($s2_numSerie3);
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Use the built-in functions split() and join() to fix this string: '$s2_listSent1' into a real sentence, (without '?'). Answer with the fixed string.
</p>
",

"answer" => function () use ($s2_listSent1) {

    $a = explode("?", $s2_listSent1);
    $b = join($a, " ");
    return $b;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Open the file 'httpd-access.txt' and answer with the first four characters of the eighth element on line 893. Answer as a string.
</p>
",

"answer" => function () {

    return "HTTP";
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
"title" => "Lists as arguments",

"intro" => "
<p>Some excercises with passing lists as arguments to a function.
</p>
",

"shuffle" => false,

"questions" => [



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Create a function that returns the list passed as argument sorted in numerical and ascending order. Use the list: [$s2_numSerie3Print]. Answer with the sorted list.
</p>
",

"answer" => function () use ($s2_numSerie3) {

    $a = $s2_numSerie3;
    asort($a);
    return implode(",",$a);
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Create a function that takes the list: [$s2_numSerie2Print] as argument. The function should multiply all even numbers by $s2_smallInt1 and add $s2_smallInt2 to all odd numbers. Answer with the modified list sorted in numerical order, descending.
</p>
",

"answer" => function () use ($s2_numSerie2, $s2_smallInt1, $s2_smallInt2) {

	$result = $s2_numSerie2;
	for($i = 0; $i < count($result); $i++) {
		if($result[$i]%2===0) {
			$result[$i] *= $s2_smallInt1;
		}
		else {
			$result[$i] += $s2_smallInt2;	
		}
	}
    arsort($result);
    return implode(",", $result);
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
