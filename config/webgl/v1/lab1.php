<?php

/**
 * Generate random values to use in lab.
 */
include LAB_INSTALL_DIR . "/config/random.php";

// SECTION 1 ****************************************************

$numberOne      = rand_int(20, 999);
$numberTwo      = rand_int(20, 999);
$numberThree    = rand_int(20, 999);
$floatOne       = rand_float(100, 999, 2);
$floatTwo       = rand_float(100, 999, 2);
$moduloOne      = rand_int(100, 999);
$moduloTwo      = rand_int(10, 100);

// SECTION 2 ****************************************************

$sect2Int = rand_int(20, 999);
$sect2WordSerie1 = ['bulldog', 'rabbit', 'chicken', 'mouse', 'horse', 'camel', 'crocodile', 'werewolf', 'reindeer', 'elephant'];
$sect2SmallRand = rand_int(0, count($sect2WordSerie1)-1);
$sect2IntText = $sect2Int . ".$numberTwo " . $sect2WordSerie1[$sect2SmallRand];

$serie1 = [
    rand_int(100, 999),
    rand_int(100, 999),
    rand_int(100, 999),
    rand_int(100, 999)
];
$serie1_imp = implode(",", $serie1);

$sect2Float1 = rand_float(10, 999, 2);

$e_val = rand_int(10, 100);

// SECTION 3 ****************************************************

$firstWord = "JavaScript";
$secondWord = "rocks!";

$sect3SentenceSerie = ['I am in a glass case of emotion.', 'If peeing your pants is cool, consider me Miles Davis.', 'Do you want to hear the most annoying sound in the world?', 'Thank you very little.', 'Tigers love pepper, they hate cinnamon.', 'I wake up in the morning and I piss excellence.', 'I think most Scottish cuisine is based on a dare.', 'I do not know, I mostly just hurt people.', 'I aim to misbehave.', 'I wish monkeys could Skype.'];
$sect3SmallRand = rand_int(0, 9); //3; // 0-9
$sect3WordSerie = ['bulldog', 'rabbit', 'chicken', 'mouse', 'horse', 'camel', 'crocodile', 'werewolf', 'reindeer', 'elephant'];
$sect3Word = $sect3WordSerie[$sect3SmallRand];
$sect3SmallInt =  rand_int(0, 4);
$sect3Sentence = $sect3SentenceSerie[$sect3SmallRand];

$sect3WordSerie = ['bulldog', 'rabbit', 'chicken', 'mouse', 'horse', 'camel', 'crocodile', 'werewolf', 'reindeer', 'elephant'];
$sect3Word = $sect3WordSerie[$sect3SmallRand];

// SECTION 4 ****************************************************

$aYear          = rand_int(1970, 2014);//2014
$aMonth         = 'Aug';
$aDay           = rand_int(1, 29);
$aDate          = "$aMonth $aDay, $aYear";

// SECTION 5 ****************************************************

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

// SECTION 6 ****************************************************

$fruits        = ["banana", "apple", "kiwi", "plum"];
$fruitColors   = ["yellow", "green", "green", "purple"];

$fruitWhich = rand_int(0, count($fruits)-1);
$fruit      = $fruits[$fruitWhich];
$fruitColor = $fruitColors[$fruitWhich];

// SECTION 7 AND 8 ****************************************************

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



/**
 * Titel and introduction to the lab.
 */
"title" => "Lab 1 - webgl",

"intro" => <<<EOD
This lab is an introduction to JavaScript.
EOD
,


"sections" => [



/** ===========================================================================
 * New section of exercises.
 */
[
"title" => "Variables",

"intro" => <<<EOD
The foundation of variables, numbers, strings and basic arithmetic.
EOD
,

"shuffle" => false,

"questions" => [



/** ---------------------------------------------------------------------------
 * A question, 1.1
 */
[

"text" => <<<EOD
Create a variable called 'numberOne' and give it the value $numberOne. Create another variable called 'numberTwo' and give it the value $numberTwo. Create a third variable called 'result' and assign to it the sum of the first two variables.

Answer with the result.
EOD
,

"answer" => function () use ($numberOne, $numberTwo) {

    $sum = $numberOne + $numberTwo;
    return $sum;
},

],



/** ---------------------------------------------------------------------------
 * A question, 1.2
 */
[

"text" => <<<EOD
Use your variables 'numberOne' and 'numberTwo' and answer with the product of the numbers in your 'result'-variable.
EOD
,

"answer" => function () use ($numberOne, $numberTwo) {

    $sum = $numberOne * $numberTwo;
    return $sum;
},

],



/** ---------------------------------------------------------------------------
 * A question, 1.3
 */
[

"text" => <<<EOD
Use your two variables, 'numberOne' and 'numberTwo'. Create one more, called 'numberThree' and give it the value: $numberThree. Use your variable 'result' and assign to it the sum of all three variables.

Answer with the result.
EOD
,

"answer" => function () use ($numberOne, $numberTwo, $numberThree) {

    $sum = $numberOne + $numberTwo + $numberThree;
    return $sum;
},

],



/** ---------------------------------------------------------------------------
 * A question, 1.4
 */
[

"text" => <<<EOD
Use your variables 'numberOne', 'numberTwo' and 'numberThree'. Subtract 'numberThree' from the product of the other two variables.

Answer with your 'result'-variable.
EOD
,

"answer" => function () use ($numberOne, $numberTwo, $numberThree) {

    $sum = ($numberOne * $numberTwo) - $numberThree;
    return $sum;
},

],



/** ---------------------------------------------------------------------------
 * A question, 1.5
 */
[

"text" => <<<EOD
Create two variables, 'floatOne' and 'floatTwo'. Give them the values: $floatOne and $floatTwo. Use your 'result'-variable and assign to it the sum of the float numbers.

Answer with the result.
EOD
,

"answer" => function () use ($floatOne, $floatTwo) {

    $sum = $floatOne + $floatTwo;
    return $sum;
},

],



/** ---------------------------------------------------------------------------
 * A question, 1.6
 */
[

"text" => <<<EOD
Answer with the result of $moduloOne modulus (%) $moduloTwo.
EOD
,

"answer" => function () use ($moduloOne, $moduloTwo) {

    return $moduloOne%$moduloTwo;
},

],



/** ---------------------------------------------------------------------------
 * Closing up this section.
 */
], // EOF questions
], // EOF section



/** ===========================================================================
 * New section of exercises.
 */
[
"title" => "Built-in Number- and Math-functions",

"intro" => <<<EOD
If you need a hint, take a look at:  
https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Number  
https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Math
EOD
,

"shuffle" => false,

"questions" => [



/** ---------------------------------------------------------------------------
 * A question, 2.1
 */
[

"text" => <<<EOD
Create a variable 'someIntText' and give it a value of '$sect2IntText'. Use the function 'parseInt' to find out the integer representation of the text.

Answer with your 'result'-variable.
EOD
,

"answer" => function () use ($sect2IntText) {

    return (int)$sect2IntText;
},

],



/** ---------------------------------------------------------------------------
 * A question, 2.2
 */
[

"text" => <<<EOD
Use your variable 'someIntText'. Use the function 'parseFloat' to find out the float representation of the text.

Answer with your 'result'-variable.
EOD
,

"answer" => function () use ($sect2IntText) {

    return (float)$sect2IntText;
},

],



/** ---------------------------------------------------------------------------
 * A question, 2.3
 */
[

"text" => <<<EOD
Use the method 'max', in Math, to find out the highest number in the serie: $serie1_imp.

Answer with your 'result'-variable.
EOD
,

"answer" => function () use ($serie1) {

    return max($serie1);
},

],



/** ---------------------------------------------------------------------------
 * A question, 2.4
 */
[

"text" => <<<EOD
Use the method 'min', in Math, to find out the lowest number in the serie: $serie1_imp.

Answer with your 'result'-variable.
EOD
,

"answer" => function () use ($serie1) {

    return min($serie1);
},

],



/** ---------------------------------------------------------------------------
 * A question, 2.5
 */
[

"text" => <<<EOD
Use the method 'round', in Math, to round the float number: $sect2Float1 to the closest integer.

Answer with your 'result'-variable.
EOD
,

"answer" => function () use ($sect2Float1) {

    return round($sect2Float1);
},

],



/** ---------------------------------------------------------------------------
 * A question, 2.6
 */
[

"text" => <<<EOD
Use the Math property 'E' to get the float value of 'E'. Find the product of 'E' and $e_val. Use the built-in method 'ceil()' to get an integer value of your result.
EOD
,

"answer" => function () use($e_val) {

    $res = M_E * $e_val;
    return ceil($res);
},

],



/** ---------------------------------------------------------------------------
 * A question, 2.7
 */
[

"text" => <<<EOD
Use the Math property 'PI' to get the float value of 'Pi'. Round it to 4 decimals and answer with the result.
EOD
,

"answer" => function () {

    return round(pi(), 4);
},

],



/** ---------------------------------------------------------------------------
 * Closing up this section.
 */
], // EOF questions
], // EOF section



/** ===========================================================================
 * New section of exercises.
 */
[
"title" => "Strings, String-methods, functions and properties",

"intro" => <<<EOD
Practice strings and variables. If you need a hint, take a look at:  
https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/String
EOD
,

"shuffle" => false,

"questions" => [



/** ---------------------------------------------------------------------------
 * A question, 3.1
 */
[

"text" => <<<EOD
Create a variable, named 'firstWord', that holds the word '$firstWord'. Create a second variable, named 'secondWord', that holds the word '$secondWord'. Create a third variable, named 'bothWords', and put together 'firstWord' and 'secondWord' with a space between.

Answer with the variable 'bothWords'.
EOD
,

"answer" => function () use ($firstWord, $secondWord) {

    $bothWords = $firstWord . " " . $secondWord;
    return $bothWords;
},

],



/** ---------------------------------------------------------------------------
 * A question, 3.2
 */
[

"text" => <<<EOD
Use 'length' to find out the length of the string: '$sect3Word'.

Answer with the result.
EOD
,

"answer" => function () use ($sect3Word) {

    $result = strlen($sect3Word);
    return $result;
},

],



/** ---------------------------------------------------------------------------
 * A question, 3.3
 */
[

"text" => <<<EOD
Use 'substr' to extract the last three characters of the word: '$sect3Word'.

Answer with the result.
EOD
,

"answer" => function () use ($sect3Word) {

    $result = substr($sect3Word, (strlen($sect3Word)-3));
    return $result;
},

],



/** ---------------------------------------------------------------------------
 * Closing up this section.
 */
], // EOF questions
], // EOF section



/** ===================================================================================
 * New section of exercises.
 */
[
"title" => "Date object",

"intro" => <<<EOD
For more functions and methods, look into:  
https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Date
EOD
,

"shuffle" => false,

"questions" => [



/** -----------------------------------------------------------------------------------
 * A question, 4.1
 */
[

"text" => <<<EOD
Create a Date object called 'myDate' and initiate it with: '$aDate'. Use the built-in function Date.getFullYear to get the year from your Date object.

Answer with the result.
EOD
,

"answer" => function () use ($aYear) {

    return $aYear;
},

],


/** -----------------------------------------------------------------------------------
 * A question, 4.2
 */
[

"text" => <<<EOD
Create a new Date object that is equal to 'myDate' plus 30 days. Use Date.getDate and answer with the day of the month.
EOD
,

"answer" => function () use ($aDate) {
    $myDate = new DateTime($aDate);
    $interval = new DateInterval("P30D");
    $myDate->add($interval);
    $res = $myDate->format('d');
    return (int)$res;
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
"title" => "If, else if and else",

"intro" => <<<EOD
If you need a hint, take a look at:  
https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Statements/if...else
EOD
,

"shuffle" => false,

"questions" => [



/** -----------------------------------------------------------------------------------
 * A question, 5.1.
 */
[

"text" => <<<EOD
Create five variables: 'card1'=$card1, 'card2'=$card2, 'card3'=$card3, 'card4'=$card4, 'card5'=$card5.

Add them up and answer with the result.
EOD
,

"answer" => function () use ($card1, $card2, $card3, $card4, $card5) {

    return $card1+$card2+$card3+$card4+$card5;
},

],



/** -----------------------------------------------------------------------------------
 * A question, 5.2.
 */
[

"text" => <<<EOD
Use an if statement to see if the five cards (card1-card5) have a combined value that is higher than 21.

If the value is higher, answer with the string 'busted'. Else answer with the string 'safe'.
EOD
,

"answer" => function () use ($cardSum) {

    return $cardSum > 21 ? "busted" : "safe";
},

],



/** -----------------------------------------------------------------------------------
 * A question, 5.3.
 */
[

"text" => <<<EOD
Use if else statements to see if the combined value of the first three cards (card1-card3) is lower, higher or exactly 21.

Answer with lower = 'safe', higher = 'busted', 21 = 'black jack'.
EOD
,

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
 * A question, 5.4.
 */
[

"text" => <<<EOD
Create three variables: 'dealer1' = $dealer1, 'dealer2' = $dealer2 and 'dealer3' = $dealer3. Combine the if, else and the AND (&&) statements to see what the dealer should do. If the combined value of the dealercards is lower than 17, answer with 'safe', if the value is higher than or equal to 17 and lower than 21 answer 'stop'. If the value is 21 answer 'black jack'. If the value is higher than 21 answer 'busted'.
EOD
,

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
 * A question, 6.1
 */
[

"text" => <<<EOD
Use a switch-case statement to figure out the color of a fruit. You have the following fruits - banana=yellow, apple=green, kiwi=green, plum=purple). Create a variable 'myFruit' which holds the current value of your fruit. If 'myFruit' is banana, the result should be 'The banana is yellow.'.

Answer with the result where 'myFruit = $fruit'.
EOD
,

"answer" => function () use ($fruit, $fruitColor) {

    $result = "The $fruit is $fruitColor.";
    return $result;
},

],



/** -----------------------------------------------------------------------------------
 * A question, 6.2
 */
[

"text" => <<<EOD
Extend your switch-case statement with a default value. The result should be 'That is an unknown fruit.' when the variable 'myFruit' has an unknown value.

Answer with the result where 'myFruit = pear'.
EOD
,

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
 * A question, 7.1
 */
[

"text" => <<<EOD
Use a for-loop to increment $loopLarge1 with the value $loopTiny1, $loopSmall1 times.

Answer with the result.
EOD
,

"answer" => function () use ($loopLarge1, $loopSmall1, $loopTiny1) {

    $result = $loopLarge1;
    for ($i = 0; $i < $loopSmall1; $i++) {
        $result += $loopTiny1;
    }
    return $result;
},

],



/** -----------------------------------------------------------------------------------
 * A question, 7.2
 */
[

"text" => <<<EOD
Use a for-loop to decrement $loopLarge2 with the value $loopTiny2, $loopSmall2 times.

Answer with the result.
EOD
,

"answer" => function () use ($loopLarge2, $loopSmall2, $loopTiny2) {

    $result = $loopLarge2;
    for ($i = 0; $i < $loopSmall2; $i++) {
        $result -= $loopTiny2;
    }
    return $result;
},

],



/** -----------------------------------------------------------------------------------
 * A question, 7.3
 */
[

"text" => <<<EOD
Use a for-loop to add all the values in the range - $loopRange1 to $loopRange2 - to a string with each number separated by a comma ','. The result should not end with a comma.
EOD
,

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
 * A question, 8.1
 */
[

"text" => <<<EOD
Use a while-loop to increment $loopSmall1 with the value $loopTiny1 until it has reached or passed $loopLarge1.

Answer with the amount of steps needed.
EOD
,

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
 * A question, 8.2
 */
[

"text" => <<<EOD
Use a while-loop to subtract $loopTiny2 from $loopLarge2 until the value has reached or passed 0.

Answer with the amount of steps needed.
EOD
,

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



/** ===========================================================================
 * Closing up all sections.
 */
] // EOF sections



/**
 * Closing up this lab.
 */
]; // EOF the entire lab
