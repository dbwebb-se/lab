<?php

/**
 * Generate random values to use in lab.
 */
include LAB_INSTALL_DIR . "/config/random.php";

// Black Jack variables
$handSize = 5;
$card1 = rand_int(1, 11);
$card2 = rand_int(1, 11);
$card3 = rand_int(1, 11);
$card4 = rand_int(1, 11);
$card5 = rand_int(1, 11);
$cardSum = $card1+$card2+$card3+$card4+$card5;
$dealer1 = rand_int(1, 11);
$dealer2 = rand_int(1, 11);
$dealer3 = rand_int(1, 11);
$dealerSum = $dealer1+$dealer2+$dealer3;

// switch
$fruits        = ["banana", "apple", "kiwi", "plum"];
$fruitColors   = ["yellow", "green", "green", "purple"];

$fruitWhich = rand_int(0, count($fruits)-1);
$fruit      = $fruits[$fruitWhich];
$fruitColor = $fruitColors[$fruitWhich];

// loops
$loopLarge1 =  rand_int(100, 999);
$loopLarge2 =  rand_int(100, 999);
$loopSmall1 =  rand_int(10, 20);
$loopSmall2 =  rand_int(10, 20);
$loopTiny1  =  rand_int(3, 9);
$loopTiny2  =  rand_int(3, 9);
$loopRange1  =  rand_int(20, 29);
$loopRange2  =  rand_int(40, 49);



return [

"passPercentage" => 11/11,
"passDistinctPercentage" => 11/11,

"author" => ["lew", "aar"],

/**
 * Titel and introduction to the lab.
 */
"title" => "Lab 2 - javascript1",

"intro" => <<<EOD
If you need to peek at examples or just want to know more, take a look at the references at [MDNs (Mozilla Developers Network)](https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference.)

There you will find everything this lab will go through and much more.
EOD
,


"sections" => [



/** ===================================================================================
 * New section of exercises.
 */
[
"title" => "If, else if and else",

"intro" => <<<EOD
If you need a hint, take a look at:  
https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Statements/if...else
EOD
,

"shuffle" => false,

"questions" => [



/** -----------------------------------------------------------------------------------
 * A question, 1.1.
 */
[

"text" => <<<EOD
Create five variables: `card1, card2, card3, card4, card5`. 

Assign the values `$card1, $card2, $card3, $card4, $card5` to the variables created above.

Add them up and put the sum in a variable called `result`. 

Put the result in your answer.
EOD
,

"points" => 1,

"answer" => function () use ($card1, $card2, $card3, $card4, $card5) {

    return $card1+$card2+$card3+$card4+$card5;
},

],



/** -----------------------------------------------------------------------------------
 * A question, 1.2.
 */
[

"text" => <<<EOD
Use an `if statement` to see if the five cards (card1-card5) have a combined value that is higher than `21`.

If the value is higher, answer with the string `"busted"`. Else answer with the string `"safe"`.
EOD
,

"points" => 1,

"answer" => function () use ($cardSum) {

    return $cardSum > 21 ? "busted" : "safe";
},

],



/** -----------------------------------------------------------------------------------
 * A question, 1.3.
 */
[

"text" => <<<EOD
Use `if else statements` to see if the combined value of the first three cards (card1-card3) is lower, higher or exactly `21`.

Answer with a string corresponding to the result:  
lower = `"safe"`  
higher = `"busted"`  
21 = `"black jack"`
EOD
,

"points" => 1,

"answer" => function () use ($card1, $card2, $card3) {
    $hand = $card1+$card2+$card3;

    $res = "safe";

    if($hand > 21) {
        $res = "busted";
    }
    else if($hand == 21) {
        $res = "black jack";
    }
    return $res;
},

],



/** -----------------------------------------------------------------------------------
 * A question, 1.4.
 */
[

"text" => <<<EOD
Create three variables: `dealer1, dealer2, dealer3`. 

Assign the values `$dealer1, $dealer2, $dealer3` to the variables created above.

Combine the `if`, `else` and the `AND (&&)` statements to see what the dealer should do.

If the combined value of the dealercards is lower than 17, answer with `"safe"`, if the value is higher than or equal to 17 and lower than 21 answer `"stop"`. If the value is 21 answer `"black jack"`. If the value is higher than 21 answer `"busted"`.
EOD
,

"points" => 1,

"answer" => function () use ($dealerSum) {

    $res = "";
    if($dealerSum < 17) {
        $res = "safe";
    }
    else if($dealerSum >= 17 && $dealerSum < 21) {
        $res = "stop";
    }
    else if($dealerSum === 21) {
        $res = "black jack";
    }
    else {
        $res = "busted";
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
"title" => "Switch, case",

"intro" => <<<EOD
If you need a hint, take a look at:  
https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Statements/switch
EOD
,

"shuffle" => false,

"questions" => [



/** -----------------------------------------------------------------------------------
 * A question, 2.1.
 */
[

"text" => <<<EOD
Use a `switch-case statement` to figure out the color of a fruit. You have the following fruits:
    
    banana=yellow, apple=green, kiwi=green, plum=purple. 
    
Create a variable `myFruit` which holds the current value of your fruit. If 'myFruit' is banana, the result should be `"The banana is yellow."`  

Answer with the result where 'myFruit = $fruit'.
EOD
,

"points" => 1,

"answer" => function () use ($fruit, $fruitColor) {

    $result = "The $fruit is $fruitColor.";
    return $result;
},

],



/** -----------------------------------------------------------------------------------
 * A question, 2.2.
 */
[

"text" => <<<EOD
Extend your switch-case statement with a `default value`. The result should be:  

`"That is an unknown fruit."` when the variable 'myFruit' has an unknown value.

Answer with the result where 'myFruit = pear'.
EOD
,

"points" => 1,

"answer" => function () {

    $result = "That is an unknown fruit.";
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
"title" => "For loops",

"intro" => <<<EOD
If you need a hint, take a look at:  
https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Statements/for
EOD
,

"shuffle" => false,

"questions" => [



/** -----------------------------------------------------------------------------------
 * A question, 3.1.
 */
[

"text" => <<<EOD
Use a `for-loop` to increment `$loopLarge1` with the value `$loopTiny1`, `$loopSmall1` times.  

Answer with the result.
EOD
,

"points" => 1,

"answer" => function () use ($loopLarge1, $loopSmall1, $loopTiny1) {

    $result = $loopLarge1;
    for ($i = 0; $i < $loopSmall1; $i++) {
        $result += $loopTiny1;
    }
    return $result;
},

],



/** -----------------------------------------------------------------------------------
 * A question, 3.2.
 */
[

"text" => <<<EOD
Use a for-loop to decrement `$loopLarge2` with the value `$loopTiny2`, `$loopSmall2` times.  

Answer with the result.
EOD
,

"points" => 1,

"answer" => function () use ($loopLarge2, $loopSmall2, $loopTiny2) {

    $result = $loopLarge2;
    for ($i = 0; $i < $loopSmall2; $i++) {
        $result -= $loopTiny2;
    }
    return $result;
},

],



/** -----------------------------------------------------------------------------------
 * A question, 3.3.
 */
[

"text" => <<<EOD
Use a for-loop to add all the values in the range `$loopRange1 to $loopRange2` to a string with each number separated by a comma ','. 

The result should not end with a comma. You should neither have a space after the comma.

Answer with the resulting string.
EOD
,

"points" => 1,

"answer" => function () use ($loopRange1, $loopRange2) {

    $result = '';
    $temp = [];
    for ($i = $loopRange1; $i <= $loopRange2; $i++) {
        //$result .= $i . ',';
        array_push($temp, $i);
    }
    $result = implode(",", $temp);
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
"title" => "While loops",

"intro" => <<<EOD
If you need a hint, take a look at:  
https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Statements/while
EOD
,

"shuffle" => false,

"questions" => [



/** -----------------------------------------------------------------------------------
 * A question, 4.1.
 */
[

"text" => <<<EOD
Use a `while-loop` to increment `$loopSmall1` with the value `$loopTiny1` until it has reached or passed `$loopLarge1`.  

Answer with the amount of steps needed.
EOD
,

"points" => 1,

"answer" => function () use ($loopLarge1, $loopSmall1, $loopTiny1) {

    $result = 0;
    $countThis = $loopSmall1;
    while ($countThis < $loopLarge1) {

        $result++;
        $countThis += $loopTiny1;
    }
    return $result;
},

],



/** -----------------------------------------------------------------------------------
 * A question, 4.2.
 */
[

"text" => <<<EOD
Use a while-loop to subtract `$loopTiny2` from `$loopLarge2` until the value has reached or passed `0`.  

Answer with the amount of steps needed.
EOD
,

"points" => 1,

"answer" => function () use ($loopTiny2, $loopLarge2) {
    $result = 0;
    $countThis = $loopLarge2;
    while ($countThis > 0) {

        $result++;
        $countThis -= $loopTiny2;
    }
    return $result;
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
