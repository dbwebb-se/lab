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

$s2_tuplesListNumbers = [
[98,5,12,369,1],
[123,4,125,69,155],
[67,50,2,39,15],
[567,23,12,36,7],
[45,22,2,498,78]
];
$s2_listSerie1		= $s2_tuplesListNumbers[rand_int(0, count($s2_tuplesListNumbers)-1)];
$s2_listSerie1Print	= implode(", ", $s2_listSerie1);

/**
 * Titel and introduction to the lab.
 */
/* Unused stuff
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
];*/


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
<p>Some basics with dictionaries.</p>
",

"shuffle" => false,

"questions" => [



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Create a small phonebook using a dictionary. Use the names as keys and numbers as values. Use '$s1_dictNameSet1Print' and corresponding numbers: '$s1_dictNrSet1Print'. Add the phonenumbers as integers. Answer with the resulting dictionary.
</p>
",

"answer" => function () use ($s1_dictNameSet1, $s1_dictNrSet1) {
	
    return array_combine($s1_dictNameSet1, $s1_dictNrSet1);
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>How many items are there in the dictionary? 
</p>
",

"answer" => function () use ($s1_dictNameSet1, $s1_dictNrSet1) {
    
    return count(array_combine($s1_dictNameSet1, $s1_dictNrSet1));
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Use the 'get()' method on your phonebook and answer with the phonenumber of '$s1_name1'. 
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
<p>Get all keys from the dictionary and return them in a sorted list. 
</p>
",

"answer" => function () use ($s1_dictNameSet1, $s1_dictNrSet1) {
    
    $res = $s1_dictNameSet1;
    sort($res);
    return $res;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Get all values from the dictionary and return them in a sorted list. 
</p>
",

"answer" => function () use ($s1_dictNameSet1, $s1_dictNrSet1) {
    
    $res = $s1_dictNrSet1;
    sort($res);
    return $res;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Use the in-operator to test if the name '$s1_name1' exists in the dictionary. Answer with the return boolean value.
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
<p>Use the in-operator to test if the phone number $s1_number1 exists in the dictionary. Answer with the return boolean value.
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
<p>Use a for-loop to walk through the dictionary and and create a string representing it. Each name and number should be on its own row, separated by a space. The names must come in alphabetical order. Answer with the resulting string.
</p>
",

"answer" => function () use ($s1_dictNameSet1, $s1_dictNrSet1) {
    
    $res = array_combine($s1_dictNameSet1, $s1_dictNrSet1);
    ksort($res);

    $str = "";
    foreach ($res as $key => $val) {
        $str .= $key . " " . $val . "\n";
    };

    return $str;
},


],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Convert the phonenumber to a string and add the prefix '+1-', representing the language code, to each phone-number. Answer with the resulting dictionary.
</p>
",

"answer" => function () use ($s1_dictNameSet1, $s1_dictNrSet1) {
    
    $res = array_combine($s1_dictNameSet1, $s1_dictNrSet1);

    $res = array_map( function($val) {
            return "+1-" . $val;
        },
        $res
    );
    return $res;
},


],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Get and remove the item '$s1_name1' from the phonebook (use pop()). Answer with the resulting dictionary.
</p>
",

"answer" => function () use ($s1_dictNameSet1, $s1_dictNrSet1, $s1_name1) {
    
    $res = array_combine($s1_dictNameSet1, $s1_dictNrSet1);

    unset($res[$s1_name1]);

    return $res;
},


],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Add the item you just popped from the phonebook. Answer with the resulting dictionary.
</p>
",

"answer" => function () use ($s1_dictNameSet1, $s1_dictNrSet1) {
    
    $res = array_combine($s1_dictNameSet1, $s1_dictNrSet1);

    return $res;
},


],



/** -----------------------------------------------------------------------------------
 * A question.
 */
/*
[

"text" => "
<p>Open 'alice.txt' and create a dictionary that holds all words as separate keys and the frequency as values. Find out how many times the word: 'youth' is used in the text and answer with the right integer. Hint: For Python 3, use: line = line.translate(str.maketrans('', '', string.punctuation)). May be a mistake in the book. 
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
/*[

"text" => "
<p>Use your dictionary over 'alice.txt' and find the key that has a value of 4 and has exactly 5 characters. Answer with the key as a string. 
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
<p>Create a tuple out of: ($s2_tuple1Print). Assign each value in the tuple to different variables: 'a','b','c','d','e'. Answer with the variable: 'd'. Hint: a,b,c = tuple.
</p>
",

"answer" => function () use ($s2_tuple1) {
	$temp = $s2_tuple1[3];	

    return $temp;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Use the list [$s2_listSerie1Print]. Assign the first two elements to a tuple with a slice on the list. Answer with the first element in the tuple as an integer.
</p>
",

"answer" => function () use ($s2_listSerie1) {
	$temp = (int)$s2_listSerie1[0];	

    return $temp;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Create a tuple with ($s2_tuple2Print). Convert it to a list and replace the second element with: '$s2_replWord1'. Convert it back to a tuple and answer with the first three elements in a comma-separated string.
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
/*[

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
/*[

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
/*[

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
