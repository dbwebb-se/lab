<?php

/**
 * Generate random values to use in lab.
 */
include __DIR__ . "/../random.php";

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

return [



/**
 * Titel and introduction to the lab.
 */
"title" => "Lab 1 - webgl",

"intro" => "
<p>This lab is an introduction to JavaScript.
</p>
",


"sections" => [



/** ===========================================================================
 * New section of exercises.
 */
[
"title" => "Variables",

"intro" => "
<p>The foundation of variables, numbers, strings and basic arithmetic.</p>
",

"shuffle" => false,

"questions" => [



/** ---------------------------------------------------------------------------
 * A question, 1.1
 */
[

"text" => "
<p>Create a variable called 'numberOne' and give it the value $numberOne. Create another variable called 'numberTwo' and give it the value $numberTwo. Create a third variable called 'result' and assign to it the sum of the first two variables. Answer with the result.
</p>
",

"answer" => function () use ($numberOne, $numberTwo) {

    $sum = $numberOne + $numberTwo;
    return $sum;
},

],



/** ---------------------------------------------------------------------------
 * A question, 1.2
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



/** ---------------------------------------------------------------------------
 * A question, 1.3
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



/** ---------------------------------------------------------------------------
 * A question, 1.4
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



/** ---------------------------------------------------------------------------
 * A question, 1.5
 */
[

"text" => "
<p>Create two variables, 'floatOne' and 'floatTwo'. Give them the values: $floatOne and $floatTwo. Use your 'result'-variable and assign to it the sum of the float numbers. Answer with the result.
</p>
",

"answer" => function () use ($floatOne, $floatTwo) {

    $sum = $floatOne - $floatTwo;
    return $sum;
},

],



/** ---------------------------------------------------------------------------
 * A question, 1.6
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

"intro" => "
<p>If you need a hint, take a look at: <br> https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Number<br>https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Math</p>
",

"shuffle" => false,

"questions" => [



/** ---------------------------------------------------------------------------
 * A question, 2.1
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



/** ---------------------------------------------------------------------------
 * A question, 2.2
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



/** ---------------------------------------------------------------------------
 * A question, 2.3
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



/** ---------------------------------------------------------------------------
 * A question, 2.4
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



/** ---------------------------------------------------------------------------
 * A question, 2.5
 */
[

"text" => "
<p>Use the method 'round', in Math, to round the float number: $sect2Float1 to the closest integer. Answer with your 'result'-variable.
</p>
",

"answer" => function () use ($sect2Float1) {

    return round($sect2Float1);
},

],



/** ---------------------------------------------------------------------------
 * A question, 2.6
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



/** ---------------------------------------------------------------------------
 * A question, 2.7
 */
[

"text" => "
<p>Use the Math property 'PI' to get the float value of 'Pi'. Round it to 4 decimals and answer with the result.
</p>
",

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

"intro" => "
<p>Practice strings and variables. If you need a hint, take a look at: https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/String</p>
",

"shuffle" => false,

"questions" => [



/** ---------------------------------------------------------------------------
 * A question, 3.1
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



/** ---------------------------------------------------------------------------
 * A question, 3.2
 */
[

"text" => "
<p>Use 'length' to find out the length of the string: '$sect3Word'. Answer with the result.
</p>
",

"answer" => function () use ($sect3Word) {

    $result = strlen($sect3Word);
    return $result;
},

],



/** ---------------------------------------------------------------------------
 * A question, 3.3
 */
[

"text" => "
<p>Use 'substr' to extract the last three characters of the word: '$sect3Word'. Answer with the result.
</p>
",

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



/** ===========================================================================
 * Closing up all sections.
 */
] // EOF sections



/**
 * Closing up this lab.
 */
]; // EOF the entire lab
