<?php

/**
 * Generate random values to use in lab.
 */
include __DIR__ . "/../random.php";

//SECTION 1 ****************************************************

$s1_sumTopNr        = rand_int(10, 20);
$s1_sumTop2Nr       = rand_int(30, 40);

$s1_sumArrays       = [
                [1,2,3,4,13,6,7,8,9],
                [4,5,6,11,9,1,2,3,8],
                [6,7,3,14,9,2,5,4,8]
            ];
$s1_cantFindNumbers = [10, 12, 15, 16, 17, 18, 19, 20];

$s1_sumArray        = $s1_sumArrays[rand_int(0, count($s1_sumArrays) -1)];
$s1_sumArrayString  = implode(", ", $s1_sumArray);
$s1_indexOfSearch   = rand_int(2, count($s1_sumArray) -1);
$s1_searchFor       = $s1_sumArray[$s1_indexOfSearch];

$s1_cantFind        = $s1_cantFindNumbers[rand_int(0, count($s1_cantFindNumbers) -1)];

$s1_powBase         = rand_int(1, 10);
$s1_powTop          = rand_int(1, 5);

$s1_strings         = ["Frontwards", "Backwards", "switcharoo", "Switchy mc switch"];
$s1_string          = $s1_strings[rand_int(0, count($s1_strings) -1)];

return [

/**
 * Titel and introduction to the lab.
 */
"title" => "Lab 4 - Recursion",

"intro" => <<<EOD
If you need to peek at examples or just want to know more, take a look at the page: https://docs.python.org/3/library/index.html. Here you will find everything this lab will go through and much more.
EOD
,


"sections" => [



/** ===========================================================================
 * New section of exercises.
 */
[
"title" => "Simple recursion",

"intro" => <<<EOD
Practice on creating recursive functions.

EOD
,

"shuffle" => false,

"questions" => [



/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Create a recursive function in the code below that calculates the sum of the numbers `$s1_sumTopNr` up to `$s1_sumTop2Nr`.

Answer with the sum.
EOD
,

"answer" => function () use ($s1_sumTopNr, $s1_sumTop2Nr) {
    $sum = 0;
    for($i = $s1_sumTopNr; $i < $s1_sumTop2Nr+1; $i++){
        $sum += $i;
    }
    return $sum;
},

],



/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Create a recursive function in the code below that calculates the sum of the numbers in the list `[$s1_sumArrayString]`.  
If its an empty list return `0`.

Answer with the sum.
EOD
,

"answer" => function () use ($s1_sumArray) {

    $sum = 0;
    for($i = 0; $i < count($s1_sumArray); $i++){
        $sum += $s1_sumArray[$i];
    }

    return $sum;
},

],



/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Create a recursive function in the code below that searches a list for a number and returns the index of the number.  
Find the index of `$s1_searchFor` in the list `[$s1_sumArrayString]`.  
If the number cant be found, return -1.

Answer with the index.
EOD
,

"answer" => function () use ($s1_indexOfSearch){
    return $s1_indexOfSearch;
},

],



/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Use the function from the previous assignment to find the number `$s1_cantFind` in the list `[$s1_sumArrayString]`.

Answer with the index.

EOD
,

"answer" => function () {
    return -1;
},

],



/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Create a recursive function in the code below that calculates `$s1_powBase` to the power of `$s1_powTop`.

Answer with the result.
EOD
,

"answer" => function () use ($s1_powBase, $s1_powTop) {
    return pow($s1_powBase, $s1_powTop);
},

],



/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Create a recursive function in the code below that turns a string backwards. Turn the string "$s1_string" backwards.  

Answer with the backward string.
EOD
,

"answer" => function () use ($s1_string) {
    return strrev($s1_string);
},

],



/** ---------------------------------------------------------------------------
 * Closing up this section.
 */
], // EOF questions
], // EOF section



/** ===========================================================================
 * Closing up all sections.
 */
] // EOF sections



/**
 * Closing up this lab.
 */
]; // EOF the entire lab
