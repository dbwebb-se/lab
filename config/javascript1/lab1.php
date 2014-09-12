<?php

/**
 * Generate random values to use in lab.
 */
include __DIR__ . "/../random.php";

// Mixed variables n stuff

/*
 *   Tror inte dessa används, har ctrl-F:at dem men jag vågar inte ta bort dem... :o

    $numberFour     = rand_int(110, 450);
    $lowNr          = rand_int(1, 100); //15; // 0 - 100
    $highNr         = rand_int(500, 999); //625; // 500 - 999
    $smallNr        = rand_int(1, 5); //2; // 1-5
    $smallRandNr    = rand_int(0, 9); //3; // 0-9
    $caseNrs        = [1, 2, 3, 4, 5];
    $smallestRandNr = rand_int(0, 2); //1; // 0-2
    $wordSerie1     = ['bulldog', 'rabbit', 'chicken', 'mouse', 'horse', 'camel', 'crocodile', 'werewolf', 'reindeer', 'elephant'];
    $wordSerie2     = ['guitar', 'violin', 'drums'];
    $sentenceSerie1 = ['I am in a glass case of emotion.', 'If peeing your pants is cool, consider me Miles Davis.', 'Do you want to hear the most annoying sound in the world?', 'Thank you very little.', 'Tigers love pepper, they hate cinnamon.', 'I wake up in the morning and I piss excellence.', 'I think most Scottish cuisine is based on a dare.', 'I do not know, I mostly just hurt people.', 'I aim to misbehave.', 'I wish monkeys could Skype.'];

*/



// SECTION 1 ****************************************************

$numberOne      = rand_int(20, 999);// 100-999
$numberTwo      = rand_int(20, 999);// 100-999
$numberThree    = rand_int(20, 999);

$floatOne       = rand_float(100, 999, 2); // 100.00 - 999.99
$floatTwo       = rand_float(100, 999, 2); //5.22; // 100-999

$moduloOne      = rand_int(100, 999);
$moduloTwo      = rand_int(10, 100);

// SECTION 2 ****************************************************


$sect2Int       = rand_int(20, 999);// 100-999
$sect2WordSerie1     = ['bulldog', 'rabbit', 'chicken', 'mouse', 'horse', 'camel', 'crocodile', 'werewolf', 'reindeer', 'elephant'];
$sect2SmallRand = rand_int(0, count($sect2WordSerie1)-1); //3; // 0-9
$sect2IntText    = $sect2Int . ".$numberTwo " . $sect2WordSerie1[$sect2SmallRand];

// SECTION 3 ****************************************************

$serie1         = [
    rand_int(100, 999),
    rand_int(100, 999),
    rand_int(100, 999),
    rand_int(100, 999)
];  // 100-999
$serie1_imp     = implode(",", $serie1);

$sect3Float1    = rand_float(10, 999, 2);
$sect3Float2    = rand_float(10, 999, 2);

$sect3TinyInt   = rand_int(2, 5);
$sect3SmallInt  = rand_int(10, 100);
$sect3BigInt    = rand_int(200, 999);

$e_val          = rand_int(10, 100);
// SECTION 4 ****************************************************

$sect4SmallRand    = rand_int(0, 9); //3; // 0-9
$sect4WordSerie     = ['bulldog', 'rabbit', 'chicken', 'mouse', 'horse', 'camel', 'crocodile', 'werewolf', 'reindeer', 'elephant'];
$sect4Word     = $sect4WordSerie[$sect4SmallRand];
$sect4BigInt    = rand_int(200, 999);

$firstWord      = "JavaScript";
$secondWord     = "rocks!";

// SECTION 5 ****************************************************

$sect5SentenceSerie = ['I am in a glass case of emotion.', 'If peeing your pants is cool, consider me Miles Davis.', 'Do you want to hear the most annoying sound in the world?', 'Thank you very little.', 'Tigers love pepper, they hate cinnamon.', 'I wake up in the morning and I piss excellence.', 'I think most Scottish cuisine is based on a dare.', 'I do not know, I mostly just hurt people.', 'I aim to misbehave.', 'I wish monkeys could Skype.'];
$sect5SmallRand    = rand_int(0, 9); //3; // 0-9
$sect5WordSerie     = ['bulldog', 'rabbit', 'chicken', 'mouse', 'horse', 'camel', 'crocodile', 'werewolf', 'reindeer', 'elephant'];
$sect5Word     = $sect5WordSerie[$sect5SmallRand];
$sect5SmallInt =  rand_int(0, 4);
$sect5Sentence = $sect5SentenceSerie[$sect5SmallRand];

$sect5WordSerie     = ['bulldog', 'rabbit', 'chicken', 'mouse', 'horse', 'camel', 'crocodile', 'werewolf', 'reindeer', 'elephant'];
$sect5Word     = $sect5WordSerie[$sect5SmallRand];

// SECTION 6 ****************************************************

$aYear          = rand_int(1970, 2014);//2014
$aMonth         = 'Aug';
$aDay           = rand_int(1, 29);
$aDate          = "$aMonth $aDay, $aYear";

// SECTION 7 ****************************************************

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

// SECTION 8 ****************************************************

// switch
$fruits        = ["banana", "apple", "kiwi", "plum"];
$fruitColors   = ["yellow", "green", "green", "purple"];

$fruitWhich = rand_int(0, count($fruits)-1);
$fruit      = $fruits[$fruitWhich];
$fruitColor = $fruitColors[$fruitWhich];

// SECTION 9 AND 10 ****************************************************

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
"title" => "Lab 1 - javascript1",

"intro" => "
<p>If you need to peek at examples or just want to know more, take a look at the references at MDN's (Mozilla Developers Network) page: https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference. Here you will find everything this lab will go through and much more.
</p>
",


"sections" => [



/** ===================================================================================
 * New section of exercises.
 */
[
"title" => "Integers, floats and variables",

"intro" => "
<p>The foundation of variables, numbers, strings and basic arithmetic. In questions 1.5 and 1.6 you are going to work with floats. One way to round a float to a certain amount of decimals is:  Math.round(val*10000)/10000, where 'val' is your float number.</p>
",

"shuffle" => false,

"questions" => [



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Create a variable called 'numberOne' and give it the value $numberOne. Create another variable called 'numberTwo' and give it the value $numberTwo. Create a third variable called 'result' and assign to it the sum of the first two variables. Answer with the result.</p>
",

"answer" => function () use ($numberOne, $numberTwo) {

    $sum = $numberOne + $numberTwo;
    return $sum;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Use your two variables, 'numberOne' and 'numberTwo'. Create one more, called 'numberThree' and give it the value: $numberThree. Use your variable 'result' and assign to it the sum of all three variables. Answer with the result.
</p>
",

"answer" => function () use ($numberOne, $numberTwo, $numberThree) {

    $sum = $numberOne + $numberTwo + $numberThree;
    return $sum;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Use your variables 'numberOne' and 'numberTwo' and answer with the product of the numbers in your 'result'-variable.
</p>
",

"answer" => function () use ($numberOne, $numberTwo) {

    $sum = $numberOne * $numberTwo;
    return $sum;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Use your variables 'numberOne', 'numberTwo' and 'numberThree'. Subtract 'numberThree' from the product of the other two variables. Answer with your 'result'-variable.
</p>
",

"answer" => function () use ($numberOne, $numberTwo, $numberThree) {

    $sum = ($numberOne * $numberTwo) - $numberThree;
    return $sum;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Create two variables, 'floatOne' and 'floatTwo'. Give them the values: $floatOne and $floatTwo. Use your 'result'-variable and assign to it the sum of the float numbers. Answer with the result.
</p>
",

"answer" => function () use ($floatOne, $floatTwo) {

    $sum = $floatOne + $floatTwo;
    return $sum;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Use your variables 'floatOne' and 'numberOne'. Answer with the product of them in your 'result'-variable.
</p>
",

"answer" => function () use ($floatOne, $numberOne) {

    $sum = $floatOne * $numberOne;
    return $sum;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Answer with the result of $moduloOne modulus (%) $moduloTwo. 
</p>
",

"answer" => function () use ($moduloOne, $moduloTwo) {

    return $moduloOne%$moduloTwo;
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
"title" => "Built-in Number-methods and functions",

"intro" => "
<p>If you need a hint, take a look at: <br> https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Number
</p>
",

"shuffle" => false,

"questions" => [



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Create a variable 'someIntText' and give it a value of '$sect2IntText'. Use the function 'parseInt' to find out the integer representation of the text. Answer with your 'result'-variable.
</p>
",

"answer" => function () use ($sect2IntText) {

    return (int)$sect2IntText;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Use your variable 'someIntText'. Use the function 'parseFloat' to find out the float representation of the text. Answer with your 'result'-variable.
</p>
",

"answer" => function () use ($sect2IntText) {

    return (float)$sect2IntText;
},

],



/** -----------------------------------------------------------------------------------
 * A question. Removed by mos, isInteger is only available in Chrome.
 */
/*
[

"text" => '
<p>Use your variable "someIntText". Use the built-in method "isInteger" to find out if it is a number. Assign the result to your "result"-variable and put it in your answer. The variable-type in your answer should be a boolean.
</p>
',

"answer" => function () use ($someIntText) {
    
    $result = false;

    if(is_int($someIntText)) {
        $result = true;
    }
    return $result;
},

],

*/

/**
 * Closing up this section.
 */
], // EOF questions
], // EOF section



/** ===================================================================================
 * New section of exercises.
 */
[
"title" => "Built-in Math-methods and functions",

"intro" => "
<p>If you need a hint, take a look at: <br> 
https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Math
</p>
",

"shuffle" => false,

"questions" => [



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Use the method 'max', in Math, to find out the highest number in the serie: $serie1_imp. Answer with your 'result'-variable.
</p>
",

"answer" => function () use ($serie1) {

    return max($serie1);
},

],


/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Use the method 'min', in Math, to find out the lowest number in the serie: $serie1_imp. Answer with your 'result'-variable.
</p>
",

"answer" => function () use ($serie1) {

    return min($serie1);
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Use the method 'round', in Math, to round the float number: $sect3Float1 to the closest integer. Answer with your 'result'-variable.
</p>
",

"answer" => function () use ($sect3Float1) {

    return round($sect3Float1);
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Find out the quotient of $sect3BigInt / $sect3SmallInt and use the method 'floor', in Math, to get only the integer value. Use your 'result'-variable in your answer.
</p>
",

"answer" => function () use ($sect3BigInt, $sect3SmallInt) {

    $sum = $sect3BigInt / $sect3SmallInt;
    return floor($sum);
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Use the Math property 'E' to get the float value of 'E'. Find the product of 'E' and $e_val. Use the built-in method 'ceil()' to get an integer value of your result.
</p>
",

"answer" => function () use($e_val) {
    $res = M_E * $e_val;
    return ceil($res);
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Use the Math property 'PI' to get the float value of 'Pi'. Round the result to 4 decimals. It can be a bit tricky to round up to a 4 decimals, but you can figure it out. Answer with your 'result'-variable.
</p>
",

"answer" => function () {

    return round(pi(), 4);
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Use the method 'pow', in Math, to find the power of (base) $sect3SmallInt and (exponent) $sect3TinyInt. Answer with the result.
</p>
",

"answer" => function () use ($sect3SmallInt, $sect3TinyInt) {

    return pow($sect3SmallInt, $sect3TinyInt);
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
"title" => "Strings and variables",

"intro" => "
<p>Practice strings and variables. If you need a hint, take a look at: https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/String</p>

",

"shuffle" => false,

"questions" => [


/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Create a variable, named 'firstWord', that holds the word '$firstWord'. Create a second variable, named 'secondWord', that holds the word '$secondWord'. Create a third variable, named 'bothWords', and put together 'firstWord' and 'secondWord' with a space between. Answer with the variable 'bothWords'.
</p>
",

"answer" => function () use ($firstWord, $secondWord) {

    $bothWords = $firstWord . " " . $secondWord;
    return $bothWords;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Create a variable called 'wordOne' and assign to it: '$sect4Word'. Add the number $sect4BigInt to the word and answer with the result in your 'result'-variable.
</p>
",

"answer" => function () use ($sect4Word, $sect4BigInt) {
    $sum = $sect4Word . $sect4BigInt;
    return $sum;
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
"title" => "Built-in String-methods, functions and properties",

"intro" => "
<p>If you need a hint, take a look at: <br>
https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/String 
</p>
",

"shuffle" => false,

"questions" => [



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Use 'charAt' on a string to return the character at a given index. Use it on the word '$sect5Word' and answer with the character at index $sect5SmallInt.
</p>
",
// måste fixa smallnr -1
"answer" => function () use ($sect5Word, $sect5SmallInt) {
    $result = $sect5Word{$sect5SmallInt};
    return $result;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Use 'toUpperCase' to transform the string: '$sect5Sentence' to uppercase. Answer with the result.
</p>
",

"answer" => function () use ($sect5Sentence) {
    $result = strtoupper($sect5Sentence);
    return $result;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Use 'length' to find out the length of the string: '$sect5Word'. Answer with the result.
</p>
",

"answer" => function () use ($sect5Word) {
    $result = strlen($sect5Word);
    return $result;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Use 'substr' to extract the last three characters of the word: '$sect5Word'. Answer with the result.
</p>
",

"answer" => function () use ($sect5Word) {
    $result = substr($sect5Word, (strlen($sect5Word)-3));
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
"title" => "Built-in Date-methods and functions",

"intro" => "
<p>If you need a hint, take a look at: <br>
https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Date
</p>
",

"shuffle" => false,

"questions" => [



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Create a Date object called 'myDate' and initiate it with: '$aDate'. Use the built-in function Date.getFullYear to get the year from your Date object. Answer with the result.
</p>
",

"answer" => function () use ($aYear) {

    return $aYear;
},

],


/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Create a new Date object that is equal to 'myDate' plus 30 days. Use Date.getDate and answer with the day of the month.
</p>
",

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

"intro" => "
<p>If you need a hint, take a look at: <br>
https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Statements/if...else
</p>
",

"shuffle" => false,

"questions" => [



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Create five variables: 'card1'=$card1, 'card2'=$card2, 'card3'=$card3, 'card4'=$card4, 'card5'=$card5. Add them up and answer with the result. 
</p>
",

"answer" => function () use ($card1, $card2, $card3, $card4, $card5) {

    return $card1+$card2+$card3+$card4+$card5;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Use an if statement to see if the five cards (card1-card5) have a combined value that is higher than 21. If the value is higher, answer with the string 'busted'. Else answer with the string 'safe'.
</p>
",

"answer" => function () use ($cardSum) {
    
    return $cardSum > 21 ? "busted" : "safe";
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Use if else statements to see if the combined value of the first three cards (card1-card3) is lower, higher or exactly 21. Answer with lower = 'safe', higher = 'busted', 21 = 'black jack'.
</p>
",

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
 * A question.
 */
[

"text" => "
<p>Create three variables: 'dealer1' = $dealer1, 'dealer2' = $dealer2 and 'dealer3' = $dealer3. Combine the if, else and the AND (&&) statements to see what the dealer should do. If the combined value of the dealercards is lower than 17, answer with 'safe', if the value is higher than or equal to 17 and lower than 21 answer 'stop'. If the value is 21 answer 'black jack'. If the value is higher than 21 answer 'busted'. 
</p>
",

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

"intro" => "
<p>If you need a hint, take a look at: <br>
https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Statements/switch
</p>
",

"shuffle" => false,

"questions" => [



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Use a switch-case statement to figure out the color of a fruit. You have the following fruits - banana=yellow, apple=green, kiwi=green, plum=purple). Create a variable 'myFruit' which holds the current value of your fruit. If 'myFruit' is banana, the result should be 'The banana is yellow.'. Answer with the result where 'myFruit = $fruit'. 
</p>
",

"answer" => function () use ($fruit, $fruitColor) {
    
    $result = "The $fruit is $fruitColor.";
    return $result;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Extend your switch-case statement with a default value. The result should be 'That is an unknown fruit.' when the variable 'myFruit' has an unknown value. Answer with the result where 'myFruit = pear'.
</p>
",

"answer" => function () {
    
    $result = "That is an unknown fruit.";
    return $result;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
/*
[

"text" => "
<p>Pass the number " . $smallNr . " to a switch case statement with the cases: " . implode(',', $caseNrs) . ". Return a variable with the initial value of " . $highNr . ". Add your number to it and answer with the result.
</p>
",

"answer" => function () use ($smallNr, $caseNrs, $highNr) {
    
    $result = $highNr;
    switch ($smallNr) {
        case (1) : 
        $result += 1;
        break;
        case (2) : 
        $result += 2;
        break;
        case (3) : 
        $result += 3;
        break;
        case (4) : 
        $result += 4;
        break;
        case (5) : 
        $result += 5;
        break;
        default: $result = $highNr;
    }
    return $result;
},

],
*/


/** -----------------------------------------------------------------------------------
 * A question.
 */
/*
[

"text" => "
<p>Build a switch case statement with the cases: " . implode(',', $wordSerie2) . ". Answer with a string, like: 'My favorite instrument is (your word)'. Use the word: '" . $wordSerie2[$smallestRandNr] . "'. If you try with an instrument that you do not have in your cases you should answer 'I dont like music.'.
</p>
",

"answer" => function () use ($wordSerie2, $smallestRandNr) {
    
    $result = 'My favorite instrument is ';

    switch ($wordSerie2[$smallestRandNr]) {
        case ('guitar') : 
        $result .= 'guitar';
        break;
        case ('violin') : 
        $result .= 'violin';
        break;
        case ('drums') : 
        $result .= 'drums';
        break;
        default: $result = 'I dont like music.';
    }
    return $result;
},

],
*/



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

"intro" => "
<p>If you need a hint, take a look at: <br>
https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Statements/for
</p>
",

"shuffle" => false,

"questions" => [



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Use a for-loop to increment $loopLarge1 with the value $loopTiny1, $loopSmall1 times. Answer with the result.
</p>
",

"answer" => function () use ($loopLarge1, $loopSmall1, $loopTiny1) {
    
    $result = $loopLarge1;
    for ($i = 0; $i < $loopSmall1; $i++) {
        $result += $loopTiny1;
    }
    return $result;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Use a for-loop to decrement $loopLarge2 with the value $loopTiny2, $loopSmall2 times. Answer with the result.
</p>
",

"answer" => function () use ($loopLarge2, $loopSmall2, $loopTiny2) {
    
    $result = $loopLarge2;
    for ($i = 0; $i < $loopSmall2; $i++) {
        $result -= $loopTiny2;
    }
    return $result;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Use a for-loop to add all the values in the range - $loopRange1 to $loopRange2 - to a string with each number separated by a comma ','. The result should not end with a comma.
</p>
",

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

"intro" => "
<p>If you need a hint, take a look at: <br>
https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Statements/while
</p>
",

"shuffle" => false,

"questions" => [



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Use a while-loop to increment $loopSmall1 with the value $loopTiny1 until it has reached or passed $loopLarge1. Answer with the amount of steps needed.
</p>",

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
 * A question.
 */
[

"text" => "
<p>Use a while-loop to subtract $loopTiny2 from $loopLarge2 until the value has reached or passed 0. Answer with the amount of steps needed.
</p>",

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
