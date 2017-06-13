<?php

/**
 * Generate random values to use in lab.
 */
include LAB_INSTALL_DIR . "/config/random.php";

// SECTION 1 ****************************************************

$dice1			= rand_int(1,6);
$dice2			= rand_int(1,6);
$dice3			= rand_int(1,6);
$dice4			= rand_int(1,6);
$dice5			= rand_int(1,6);

$s1_wordSerie2 	= ["icecream", "sunshine", "beach", "music", "vacation", "barbeque", "resort", "water", "restaurant", "beverage"];

$s1_arrRandOne  = rand_int(0, count($s1_wordSerie2)-1);
$s1_word        = $s1_wordSerie2[$s1_arrRandOne];

$loopNumberStart = rand_int(10, 50);
$loopNumberEnd = rand_int(60, 90);

$s5_addNum		= rand_int(3, 9);
$s5_addTo		= rand_int(10, 100);
$s5_addTimes	= rand_int(20, 80);

$s5_subNum		= rand_int(3, 9);
$s5_subFrom		= rand_int(10, 100);
$s5_subTimes	= rand_int(20, 80);


$longwords = ["philanthropist", "constitutionality", "disproportionality", "internationalization"];
$longRandom     = rand_int(0, count($longwords)-1);
$longword       = $longwords[$longRandom];



/**
 * Titel and introduction to the lab.
 */


return [

"passPercentage" => 10/16,
"passDistinctPercentage" => 16/16,

"author" => ["efo"],

/**
 * Titel and introduction to the lab.
 */
"title" => "Lab 2 - python",

"intro" => <<<EOD
In this exercise we will look into flow-control. If-statements, for-loops and while-loops.
EOD
,


"sections" => [



/** ===================================================================================
 * New section of exercises.
 */
[
"title" => "Boolean operators and if-statements",

"intro" => <<<EOD
The basics of boolean operators and if-statements.
EOD
,

"shuffle" => false,

"questions" => [



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Create three variables representing dice values: `dice1` = $dice1, `dice2` = $dice2 and `dice3` = $dice3.

Answer with the boolean value of the expression '`dice1` is greater than `dice2`'.

EOD
,
"points" => 1,
"answer" => function () use ($dice1, $dice2) {

    return $dice1 > $dice2;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Sum the three variables `dice1`, `dice2` and `dice3`.

Use an if-statement to decide if the sum of the three variables i greater than 11. If the sum is greater than 11 answer with 'big' otherwise answer with 'small'.

EOD
,
"points" => 1,
"answer" => function () use ($dice1, $dice2, $dice3) {
    $string = "small";
    if ($dice1 + $dice2 + $dice3 > 11) {
        $string = "big";
    }
    return $string;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Add the sum of `dice4` = $dice4 and `dice5` = $dice5 to the sum of the three other dices.

Use an if, elseif, else statement to check the total value of the dices. Answer with 'small' if the sum is smaller than 11, 'intermediate' if the sum is greater than or equal to 11 but smaller than 21. If the sum is greater than or equal to 21 answer with 'big'.

EOD
,
"points" => 1,
"answer" => function () use ($dice1, $dice2, $dice3, $dice4, $dice5) {

    $sum = $dice1 + $dice2 + $dice3 + $dice4 + $dice5;
    if ($sum >= 21) {
        $string = "big";
    } elseif ($sum >= 11 && $sum < 21) {
        $string = "intermediate";
    } else {
        $string = "small";
    }
    return $string;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Create a variable `summer_word` containing the word '$s1_word'.

Answer with True if `summer_word` contains the letter 's' otherwise answer with False.

Tip: Use the `in` operator.

EOD
,
"points" => 1,
"answer" => function () use ($s1_word) {
    return strpos($s1_word, 's') !== false;
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
"title" => "For-loops",

"intro" => <<<EOD
The basics of iteration and for-loops.
EOD
,

"shuffle" => false,

"questions" => [



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD

Loop through the numbers 0 to 10 (10 included) and concatenate a string with the numbers comma-separated. You should have a comma at the end of the string.

Answer with the string.

EOD
,
"points" => 1,
"answer" => function () use ($s1_word) {
    $numbers_string = "";
    for ($i = 0; $i <= 10; $i++) {
        $numbers_string.= $i . ",";
    }

    return $numbers_string;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD

Loop through the letters of the variable `summer_word` from above. Concatenate the consonants from `summer_word` and answer with the new word.

EOD
,
"points" => 1,
"answer" => function () use ($s1_word) {
    $new_word = "";
    for ($i = 0; $i < strlen($s1_word); $i++) {
        if (strpos('bcdfghjklmnpqrstvxzw', $s1_word[$i]) !== false) {
            $new_word.= $s1_word[$i];
        }
    }

    return $new_word;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD

Loop through all numbers from $loopNumberStart to $loopNumberEnd both numbers included. Add all odd (udda) numbers together and answer with the result.

Tip: Use the modulus % operator.

EOD
,
"points" => 1,
"answer" => function () use ($loopNumberStart, $loopNumberEnd) {
    $mighty_sum = 0;
    for ($i = $loopNumberStart; $i <= $loopNumberEnd; $i++) {
        if ($i%2) {
            $mighty_sum += $i;
        }
    }
    return $mighty_sum;
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
"title" => "While-loops",

"intro" => <<<EOD
The basics of while-loops.
EOD
,

"shuffle" => false,

"questions" => [



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Create a while-loop that starts at value $s5_addNum and ends when the value is greater than $s5_addTimes, the value should be incremented by 3 for each iteration. Concatenate a string with the numbers comma-separated. You should have a comma at the end of the string.

Answer with the string.
EOD
,
"points" => 1,
"answer" => function () use ($s5_addNum, $s5_addTimes) {
    $numbers_string = "";
    $start = $s5_addNum;
	while($start <= $s5_addTimes) {
		$numbers_string.= $start . ",";
		$start+=3;
	}
	return $numbers_string;

},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Create a while-loop that adds $s5_addNum to the number $s5_addTo, $s5_addTimes times. Answer with the result.
EOD
,
"points" => 1,
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
"points" => 1,
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
Use a for-loop or a while-loop to reverse the word '$longword'.

Answer with the reversed word.


EOD
,
"points" => 3,
"answer" => function () use ($longword) {
    $reversed = "";
    for ($i = 0; $i < strlen($longword); $i++) {

        $reversed = $longword[$i] . $reversed;
    }
    return $reversed;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Swedish numberplates consist of three letters and three numbers. The numbers range from 001 to 999. Using one of the four common rules of arithmetics (+, -, *, /), how many of the numberplates can the two first numbers give the third number?

Examples:
'ABC123' can be combined to 1 + 2 = 3. So this numberplate is good.
'ABC129' 1 and 2 cannot be combined to give 9 using the four rules of arithmetics, so this does not work.

Do not count multiple times if more than one rule of arithmetics work.


Answer with the number of numberplates.
EOD
,
"points" => 3,
"answer" => function () {
    $count = 0;
    for ($i = 0; $i < 10; $i++) {
        for ($j = 0; $j < 10; $j++) {
            for ($k = 0; $k < 10; $k++) {
                if ($i == 0 && $j == 0 && $k == 0) {
                    continue;
                }

                if ($i + $j == $k) {
                    $count++;
                    continue;
                }

                if ($i - $j == $k) {
                    $count++;
                    continue;
                }

                if ($i * $j == $k) {
                    $count++;
                    continue;
                }

                if ($j > 0) {
                    if ($i / $j == $k) {
                        $count++;
                        continue;
                    }
                }
            }
        }
    }

    return $count;
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
