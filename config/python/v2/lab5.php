<?php

/**
 * Generate random values to use in lab.
 */
include LAB_INSTALL_DIR . "/config/random.php";

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


return [

"passPercentage" => 10/16,
"passDistinctPercentage" => 16/16,

"author" => ["efo", "lew"],

/**
 * Titel and introduction to the lab.
 */
"title" => "Lab 5 - python",

"intro" => <<<EOD
A look into dictionaries and tuples.
EOD
,


"sections" => [



/** ===================================================================================
 * New section of exercises.
 */
[
"title" => "Dictionaries",

"intro" => <<<EOD
Some basics with dictionaries.
EOD
,

"shuffle" => false,

"questions" => [



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Create a small phonebook using a dictionary. Use the names as keys and numbers as values.

Use

> $s1_dictNameSet1Print

and corresponding numbers

> $s1_dictNrSet1Print

Add the phonenumbers as integers. Answer with the resulting dictionary.
EOD
,
"points" => 1,
"answer" => function () use ($s1_dictNameSet1, $s1_dictNrSet1) {

    return array_combine($s1_dictNameSet1, $s1_dictNrSet1);
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
How many items are there in the dictionary?
EOD
,
"points" => 1,
"answer" => function () use ($s1_dictNameSet1, $s1_dictNrSet1) {

    return count(array_combine($s1_dictNameSet1, $s1_dictNrSet1));
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Use the `get()` method on your phonebook and answer with the phonenumber of '$s1_name1'.
EOD
,

"points" => 1,
"answer" => function () use ($s1_number1) {

    return (int)$s1_number1;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Get all keys from the dictionary and return them in a sorted list.
EOD
,
"points" => 1,
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

"text" => <<<EOD
Get all values from the dictionary and return them in a sorted list.
EOD
,
"points" => 1,
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

"text" => <<<EOD
Use the in-operator to test if the name '$s1_name1' exists in the dictionary. Answer with the return boolean value.
EOD
,

"points" => 1,
"answer" => function () {

    return true;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Get and remove the item '$s1_name1' from the phonebook (use pop()). Answer with the resulting dictionary.
EOD
,

"points" => 1,
"answer" => function () use ($s1_dictNameSet1, $s1_dictNrSet1, $s1_name1) {

    $res = array_combine($s1_dictNameSet1, $s1_dictNrSet1);

    unset($res[$s1_name1]);

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
"title" => "Tuples",

"intro" => <<<EOD
Some basics with tuples.
EOD
,

"shuffle" => false,

"questions" => [



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Create a tuple with '$s2_tuple1Print'. Answer with the length of the tuple as an integer.
EOD
,
"points" => 1,
"answer" => function () use ($s2_tuple1) {

    return count($s2_tuple1);
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Create a tuple out of:

> ($s2_tuple1Print).

Assign each value in the tuple to different variables:

> 'a','b','c','d','e'.

Answer with the variable: 'd'.
EOD
,
"points" => 1,
"answer" => function () use ($s2_tuple1) {
	$temp = $s2_tuple1[3];

    return $temp;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Use the list

> [$s2_listSerie1Print]

Assign the first two elements to a tuple with a slice on the list.

Answer with the first element in the tuple as an integer.
EOD
,
"points" => 1,
"answer" => function () use ($s2_listSerie1) {
	$temp = (int)$s2_listSerie1[0];

    return $temp;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Create a tuple with

> ($s2_tuple2Print)

Convert it to a list and replace the second element with:

> "$s2_replWord1"

Convert it back to a tuple and answer with the first three elements in a comma-separated string,  without an ending `,`.
EOD
,
"points" => 1,
"answer" => function () use ($s2_tuple2, $s2_replWord1) {
	$temp = $s2_tuple2;
	$repl = $s2_replWord1;
	$temp[1] = $repl;
    return (string)implode(",", array_slice($temp, 0, 3));
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
"title" => "Extra assignments",

"intro" => <<<EOD
These questions are worth 3 points each. Solve them for extra points.
EOD
,

"shuffle" => false,

"questions" => [



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Use a for-loop to walk through the dictionary and create a string representing it. Each name and number should be on its own row, separated by a space. The names must come in alphabetical order. Note that every row should end with a newline character, `\\n`.

Answer with the resulting string.
EOD
,
"points" => 3,
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

"text" => <<<EOD
Convert the phonenumber to a string and add the prefix '+1-', representing the language code, to each phone-number.

Answer with the resulting dictionary.
EOD
,
"points" => 3,
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
