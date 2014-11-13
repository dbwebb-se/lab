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
$s1_extraWords2		= ["pirate", "donkey", "jacket", "bag", "money"];
$s1_extraWords3		= ["cord", "light", "painting", "tablet", "potato"];
$s1_shortList1		= [$s1_listWords[rand_int(0, count($s1_listWords)-1)][rand_int(0, 4)], $s1_listWords[rand_int(0, count($s1_listWords)-1)][rand_int(0, 4)]];
$s1_shortList1Print	= implode(", ", $s1_shortList1);
$s1_shortList2		= [$s1_listWords[rand_int(0, count($s1_listWords)-1)][rand_int(0, 4)], $s1_listWords[rand_int(0, count($s1_listWords)-1)][rand_int(0, 4)]];
$s1_shortList2Print	= implode(", ", $s1_shortList2);

$s1_list1 			= $s1_listWords[rand_int(0, count($s1_listWords)-1)];
$s1_list1Print 		= implode(", ", $s1_list1);
$s1_list2 			= $s1_listWords[rand_int(0, count($s1_listWords)-1)];
$s1_list2Print 		= implode(", ", $s1_list2);
$s1_word1			= $s1_extraWords[rand_int(0, count($s1_extraWords)-1)];
$s1_word2			= $s1_extraWords2[rand_int(0, count($s1_extraWords2)-1)];
$s1_word3			= $s1_extraWords3[rand_int(0, count($s1_extraWords3)-1)];

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

// SECTION 3

$s3_split1 = [
"I have not failed. I've just found 10,000 ways that won't work.",
"For every minute you are angry you lose sixty seconds of happiness.",
"I love deadlines. I love the whooshing noise they make as they go by.",
"Whenever I feel the need to exercise, I lie down until it goes away.",
"One good thing about music, when it hits you, you feel no pain."
];
$s3_split1Nr = rand_int(0, count($s3_split1)-1);
$s3_split1Use = $s3_split1[$s3_split1Nr];
$s3_split1Answer = explode(" ", $s3_split1Use);
$s3_split1AnswerNr = rand_int(0, count($s3_split1Answer)-1);
$s3_split1SingleWordAnswer = $s3_split1Answer[$s3_split1AnswerNr];

$s3_slice1 = [
["a", "b", "c", "d", "e"],
["pig", "horse", "cow", "cat", "dog"],
["reggae", "rock", "blues", "jazz", "opera"],
["dvd", "mp3", "blu-ray", "vhs", "cd"],
["tree", "stone", "grass", "water", "sky"]
];
$s3_slice1Rand = rand_int(0, count($s3_slice1)-1);
$s3_slice1Use = $s3_slice1[$s3_slice1Rand];

$s3_slice1ReplaceList = [
["book", "candle"],
["freezer", "fridge"],
["green", "purple"],
["picture", "canvas"] 
];
$s3_slice1Replace = $s3_slice1ReplaceList[rand_int(0, count($s3_slice1ReplaceList)-1)];
$s3_slice1Answer = $s3_slice1Use;
$s3_slice1Answer[1] = $s3_slice1Replace[0];
$s3_slice1Answer[2] = $s3_slice1Replace[1];
$s3_slice1PrintList = implode(", ", $s3_slice1Use);
$s3_slice1PrintReplace = implode(", ", $s3_slice1Replace);
$s3_slice2Use = $s3_slice1Use;
$s3_slice2Use[count($s3_slice2Use)-2] = $s3_slice1Replace[0];
$s3_slice2Use[count($s3_slice2Use)-1] = $s3_slice1Replace[1];
$s3_slice3 = $s3_slice1Use;
array_splice($s3_slice3, 3, 0, $s3_slice1Replace);

$s3_del1Rand = rand_int(0, count($s3_slice1)-1);
$s3_del1List = $s3_slice1[$s3_del1Rand];
$s3_del2List = $s3_del1List;
$s3_printDel1 = implode(", ", $s3_del1List);
unset($s3_del1List[0]);
unset($s3_del2List[1], $s3_del2List[2]);

$s3_aliasLists = [
["a","b","c","d","e"],
["e","d","c","b","a"],
["b","a","e","d","c"],
["c","b","a","e","d"],
["d","c","b","a","e"]
];
$s3_aliasRand = rand_int(0, count($s3_aliasLists)-1);
$s3_aliasUse = $s3_aliasLists[$s3_aliasRand];
$s3_aliasPrint = implode(", ",$s3_aliasUse);

$s3_aliasReplace = ["x", "y", "z", "p", "s"];
$s3_aliasReplaceWith = $s3_aliasReplace[rand_int(0, count($s3_aliasReplace)-1)];

//$s3_slice2PrintList = implode(",", $s3_slice2Use);
/**
 * Titel and introduction to the lab.
 */



return [



/**
 * Titel and introduction to the lab.
 */
"title" => "Lab 3 - python",

"intro" => "",


"sections" => [



/** ===================================================================================
 * New section of exercises.
 */
[
"title" => "List basics",

"intro" => "",

"shuffle" => false,

"questions" => [



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Concatenate the two lists [$s1_shortList1Print] and [$s1_shortList2Print]. Answer with your list. 
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
<p>Use the list [$s1_list1Print]. Add the words: '$s1_word1' and '$s1_word2' as the second and third element. Answer with the modified list.
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
	sort($tempList);
	return $tempList;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Use the list from the last excercise ([$s1_list2Print]) and sort it in decending alphabetical order. Answer with the sorted list.
</p>
",

"answer" => function () use ($s1_list2) {
	$tempList = $s1_list2;
	rsort($tempList);
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
<p>Some basic built-in functions
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
<p>Use built-in functions, such as 'sum' and 'len' to get the average value of the list: [$s2_numSerie2Print]. Answer with the result as a float with at most one decimal.
</p>
",

"answer" => function () use ($s2_numSerie2) {

    return round(floatval(array_sum($s2_numSerie2)/count($s2_numSerie2)), 1);
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
<p>Use the string: '$s3_split1Use' and split it with the delimiter ' ' (space). Answer with the element at index $s3_split1AnswerNr.
</p>
",

"answer" => function () use ($s3_split1SingleWordAnswer) {

    return $s3_split1SingleWordAnswer;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Use slice on the list [$s3_slice1PrintList] and replace the second and third element with '$s3_slice1PrintReplace'. Answer with the modified list.
</p>
",

"answer" => function () use ($s3_slice1Answer) {

    return $s3_slice1Answer;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Use slice on the list [$s3_slice1PrintList] and replace the last two elements with '$s3_slice1PrintReplace'. Answer with the modified list.
</p>
",

"answer" => function () use ($s3_slice2Use) {

    return $s3_slice2Use;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Use slice on the list [$s3_slice1PrintList] and insert the words '$s3_slice1PrintReplace' after the third element. Answer with the modified list.
</p>
",

"answer" => function () use ($s3_slice3) {

    return $s3_slice3;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Use 'del' on the list [$s3_printDel1] and delete the first element. Answer with the modified list.
</p>
",

"answer" => function () use ($s3_del1List) {

    return array_values($s3_del1List);
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Use 'del' on the list [$s3_printDel1] and delete the second and third element. Answer with the modified list.
</p>
",

"answer" => function () use ($s3_del2List) {

    return array_values($s3_del2List);
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Assign the list [$s3_aliasPrint] to a variable called 'list1'. Assign the list again, but to another variable called 'list2'. Answer with the result of 'list1 is list2'. 
</p>
",

"answer" => function () {

    return false;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Use your lists from the last exercise. Assign 'list1' to another variable called 'list3' like this: list3 = list1. Answer with the result of 'list1 is list3'.
</p>
",

"answer" => function () {

    return true;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Use your lists from the last exercise. Change the first element in 'list1' to '$s3_aliasReplaceWith'. Answer with 'list3'.
</p>
",

"answer" => function () use($s3_aliasUse, $s3_aliasReplaceWith) {
	$temp = $s3_aliasUse;
	$temp[0] = $s3_aliasReplaceWith;
    return $temp;
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
<p>Create a function that returns the list passed as argument sorted in numerical and ascending order. Also multiply all values with 10. Use the list: [$s2_numSerie3Print], and the built-in method 'sort()'. Answer with the sorted list.
</p>
",

"answer" => function () use ($s2_numSerie3) {

    $a = [];
    for($i = 0; $i < count($s2_numSerie3); $i++) {
    	$a[$i] = ($s2_numSerie3[$i] * 10);
    }
    sort($a);    
    
    return $a; //implode(",",$a);
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
    for ($i = 0; $i < count($result); $i++) {
    	if ($result[$i]%2===0) {
    		$result[$i] *= $s2_smallInt1;
    	} else {
    		$result[$i] += $s2_smallInt2;
    	}
    }
    rsort($result);
    return $result; //implode(",", $result);
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
