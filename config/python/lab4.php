<?php

/**
 * Generate random values to use in lab.
 */
include __DIR__ . "/../random.php";

// SECTION 1 ****************************************************
$s1_dictNames = [
["Baggins", "Aragorn", "Smaug"],
["Solo", "Skywalker", "Vader"],
["Chandler", "Monica", "Ross"],
["Clinton", "Obama", "Bush"],
["Jagger", "Diamond", "Cash"]
];
$s1_dictNrs = [
[55523412, 55564222, 55567894],
[55511243, 55568711, 55590858],
[55523645, 55564452, 55545872],
[55590899, 55567345, 55564533],
[55537654, 55598078, 55587768]
];
$s1_rand1 = rand_int(0, 2);

$s1_dictNameSet1 	= $s1_dictNames[$s1_rand1];
$s1_dictNameSet1Print	= implode(", ", $s1_dictNameSet1);

$s1_dictNrSet1 	= $s1_dictNrs[$s1_rand1];
$s1_dictNrSet1Print	= implode(", ", $s1_dictNrSet1);

$s1_name1 	= $s1_dictNameSet1[$s1_rand1];
$s1_number1 = $s1_dictNrSet1[$s1_rand1];

// SECTION 2

$s2_tuples = [
["frog", 54, 4.77, "fridge", 2],
["bear", 65, 6.47, "chair", 5],
["moose", 12, 1.98, "table", 7],
["elephant", 33, 7.28, "stove", 4],
["snake", 89, 9.63, "bookshelf", 1]
];
$s2_rand1 = rand_int(0, count($s2_tuples)-1);
$s2_tuple1 = $s2_tuples[$s2_rand1];
$s2_tuple1Print = implode(", ", $s2_tuple1);

$s2_rand2 = rand_int(0, count($s2_tuples)-1);
$s2_tuple2 = $s2_tuples[$s2_rand2];
$s2_tuple2Print = implode(", ", $s2_tuple2);
$s2_replWords = ["bucket", "elevator", "hammer", "fire", "green", "music", "elephant", "beverage", "cow", "curtain"];
$s2_replWord1 = $s2_replWords[rand_int(0, count($s2_replWords)-1)];
/**
 * Titel and introduction to the lab.
 */
$dictNames = [
["Baggins", "Aragorn", "Smaug"],
["Solo", "Skywalker", "Vader"],
["Chandler", "Monica", "Ross"],
["Clinton", "Obama", "Bush"],
["Jagger", "Diamond", "Cash"]
];
$dictNrs = [
[55523412, 55564222, 55567894],
[55511243, 55568711, 55590858],
[55523645, 55564452, 55545872],
[55590899, 55567345, 55564533],
[55537654, 55598078, 55587768]
];
$r1 = 2; // 0-4
$r2 = 4;// 0-4
$sr1 = 1; // 0-2
$tuples = [
["frog", 54, 4.77, "fridge", 2],
["bear", 65, 6.47, "chair", 5],
["moose", 12, 1.98, "table", 7],
["elephant", 33, 7.28, "stove", 4],
["snake", 89, 9.63, "bookshelf", 1]
];


return [



/**
 * Titel and introduction to the lab.
 */
"title" => "Lab 4 - python",

"intro" => "
<p>Dictionaries and tuples
</p>
",


"sections" => [



/** ===================================================================================
 * New section of exercises.
 */
[
"title" => "Dictionaries",

"intro" => "
<p>Some basics with dictionaries</p>
",

"shuffle" => false,

"questions" => [



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Create a small phonebook using a dictionary. Use the names as keys and numbers as values. Use '$s1_dictNameSet1Print' and corresponding numbers: '$s1_dictNrSet1Print'. Answer with the keys comma-separated, sorted in an alphabetical and ascending order and in a string.
</p>
",

"answer" => function () use ($s1_dictNameSet1, $s1_dictNrSet1) {
	
	$res = $s1_dictNameSet1;
	asort($res);
    return implode(",", $res);
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Use your phonebook and answer with the values (phonenumbers) comma-separated, in ascending order and as a string. 
</p>
",

"answer" => function () use ($s1_dictNrSet1) {
	
	$res = $s1_dictNrSet1;
	asort($res);
    return (string)implode(",", $res);
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Use the 'get() method' on your phonebook and answer with '$s1_name1's phonenumber. Answer with an integer. 
</p>
",

"answer" => function () use ($s1_number1) {
	
    return (int)$s1_number1;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Open 'alice.txt' and create a dictionary that holds all words as separate keys and the frequency as values. Find out how many times the word: 'youth' is used in the text and answer with the right integer. 
</p>
",

"answer" => function () {
	// Use: line = line.translate(str.maketrans("", "", string.punctuation))
	// Dont use: line = line.translate(string.punctuation)
    return 6;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Use your dictionary over 'alice.txt' and find the key that have a value of 4 and has exactly 5 characters. Answer with the key as a string. 
</p>
",

"answer" => function () {
	
	return "other";
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
"title" => "Tuples",

"intro" => "
<p>Some basics with tuples</p>
",

"shuffle" => false,

"questions" => [



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Create a tuple with '$s2_tuple1Print'. Answer with the length of the tuple as an integer.
</p>
",

"answer" => function () use ($s2_tuple1) {
	
    return count($s2_tuple1);
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Create a tuple with ($s2_tuple2Print). Replace the second element with: '$s2_replWord1'. Answer with the first three elements in a comma-separated string.
</p>
",

"answer" => function () use ($s2_tuple2, $s2_replWord1) {
	$temp = $s2_tuple2;
	$repl = $s2_replWord1;
	$temp[1] = $repl;
    return (string)implode(",", array_slice($temp, 0, 3));
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Open 'alice.txt' and find the 5 most frequently used words in the text. Answer with a comma-separated string in the format: 'word:number,word:number' etc, in decending order based on the number.
</p>
",

"answer" => function () {
	
    return "the:66,said:37,and:35,you:34,to:33";
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Use the two tuples: ($s2_tuple1Print) and ($s2_tuple2Print). Name the tuples 'tupleOne' and 'tupletwo' and then swap the values and answer with a float value representing the sum of the second and third element in 'tupleOne';
</p>
",

"answer" => function () use ($s2_tuple2) {
	
	$val1 = $s2_tuple2[1];
	$val2 = $s2_tuple2[2];
    return $val1+$val2;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Open 'httpd-access.txt' and find the ip-adress with the most entries. Answer with sum of all digits in the ip-adress as an integer.
</p>
",

"answer" => function () {
	
    return 30;
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
