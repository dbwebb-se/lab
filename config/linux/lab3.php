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



return [



/**
 * Titel and introduction to the lab.
 */
"title" => "Lab 3 - linux",

"intro" => <<<EOD
JavaScript using nodejs.
EOD
,


"sections" => [



/** ===================================================================================
 * New section of exercises.
 */
[
"title" => "Integers, floats and variables",

"intro" => <<<EOD
Some nice text.
EOD
,

"shuffle" => false,

"questions" => [



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Create a variable called 'numberOne' and give it the value $numberOne. 

Create another variable called 'numberTwo' and give it the value $numberTwo.

Create a third variable called 'result' and assign to it the sum of the first two variables.

Answer with the result.
EOD
,

"answer" => function () use ($numberOne, $numberTwo) {
    $sum = $numberOne + $numberTwo;
    return $sum;
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
