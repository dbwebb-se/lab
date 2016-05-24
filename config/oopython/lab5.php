<?php

/**
 * Generate random values to use in lab.
 */
include __DIR__ . "/../random.php";

//SECTION 1 ****************************************************

$s1_present         = ["Ozelot", "Kvothe", "It's a very, very, merry, merry christmas. Gonna party on 'til Santa grants my wishes.", rand_int(10000, 15000)];
$s1_christPresent   = ["Pirate", "Zeldah", "You, oh ,oh, a Christmas. My Christmas tree is delicious", rand_int(20000, 25000)];
$s1_compPresent     = ["Icecream", "Lew", "That's why I celebrate Christmas 'Cause this overweighted redneck devil is big business", rand_int(1, 20)];
$s1_searchStrings   = [
                    ["ew", "False False True "],
                    ["zel", "True False False "],
                    ["irat", "False True False "]
                    ];
$s1_searchString    = $s1_searchStrings[rand_int(0, count($s1_searchStrings) -1)];

$s1_listYear        = [1993, 1994, 1996, 2000, 2003, 2005, 2010, 2013, 2014, 2016];
$s1_listMonth       = ["01", "02", "03", "04", "05", "06" , "07", "08", "09", "10" , "11", "12"];
$s1_listDay         = ["01", "02", "04", "06", "07", "08", "09", "11", "13", "14", "16", "17", "18", "20", "23", "26", "28", "30"];
$s1_year            = $s1_listYear[rand_int(0, count($s1_listYear)-1)];
$s1_month           = $s1_listMonth[rand_int(0, count($s1_listMonth)-1)];
$s1_day             = $s1_listDay[rand_int(0, count($s1_listDay)-1)];
$s1_year2           = $s1_listYear[rand_int(1, count($s1_listYear)-1)];
$s1_month2          = $s1_listMonth[rand_int(1, count($s1_listMonth)-1)];
$s1_day2            = $s1_listDay[rand_int(1, count($s1_listDay)-1)];

$s1_dogNames        = ["Buster", "James", "Zimba", "Goliat"];
$s1_dogRaces        = ["Shitzu", "Cocker spaniel", "Rottwiler", "Grand danois"];
$s1_dogSizes        = ["small", "medium", "big", "big"];
$s1_dogDays         = [rand_int(5, 10), rand_int(7, 14), rand_int(5, 15), rand_int(20, 25)];
#$s1_dogOrders       = [
#                    [1,2,3,4],
#                    [2,4,1,3],
#                    [4,2,3,1],
#                    [3,2,1,4]
#                    ];
#$s1_dogOrder        = $s1_dogOrders[rand_int(0, count($s1_dogOrders) -1)];
$s1_dog1            = [$s1_dogNames[0], $s1_dogSizes[0], $s1_dogRaces[0], $s1_dogDays[0]];
$s1_dog2            = [$s1_dogNames[2], $s1_dogSizes[2], $s1_dogRaces[2], $s1_dogDays[2]];
$s1_dog3            = [$s1_dogNames[3], $s1_dogSizes[3], $s1_dogRaces[3], $s1_dogDays[3]];
#$s1_dog4            = [$s1_dogNames[1], $s1_dogSizes[1], $s1_dogRaces[1], $s1_dogDays[1]];
$s1_priceSmall      = rand_int(100, 120);
$s1_priceMedium     = rand_int(121, 150);
$s1_priceBig        = rand_int(151, 200);

//SECTION 1 ****************************************************

$s1_sumTopNr        = rand_int(10, 20);
$s1_sumTop2Nr       = rand_int(30, 40);

$s1_sumArrays       = [
                [1,2,3,4,5,6,7,8,9],
                [4,5,6,7,9,1,2,3,8],
                [6,7,3,1,9,2,5,4,8]
            ];
$s1_sumArrayString  = implode(", ", $s1_sumArrays[rand_int(0, count($s1_sumArrays) -1)]);
$s1_sumArray        = $s1_sumArrays[rand_int(0, count($s1_sumArrays) -1)];

$s1_indexOfSearch   = rand_int(0, count($s1_sumArray) -1);
$s1_searchFor       = $s1_sumArray[$s1_indexOfSearch];

$s1_powBase         = rand_int(1, 10);
$s1_powTop          = rand_int(1, 5);

$s1_strings         = ["Frontwards", "Backwards", "switcharoo", "Switchy mc switch"];
$s1_string          = $s1_strings[rand_int(0, count($s1_strings) -1)];

return [

/**
 * Titel and introduction to the lab.
 */
"title" => "Lab 5 - Recursion",

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
Create a recursive function in the code below that calculates the sum from the numbers 1 up to $s1_sumTopNr.

Answer with the sum.

EOD
,

"answer" => function () use ($s1_sumTopNr) {
    $sum = 0;
    for($i = 1;$i < $s1_sumTopNr+1; $i++){
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
Create a recursive function in the code below that calculates the sum from the numbers $s1_sumTopNr up to $s1_sumTop2Nr.

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
Create a recursive function in the code below that calculates the sum of the numbers in the list [$s1_sumArrayString].

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
Search for the index of $s1_searchFor in the list [$s1_sumArrayString].

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
Create a recursive function in the code below that claculates $s1_powBase to the power of $s1_powTop.  

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
