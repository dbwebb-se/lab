<?php

/**
 * Generate random values to use in lab.
 */
include __DIR__ . "/../random.php";

// Mixed variables n stuff

// SECTION 1 ****************************************************

$wordArray = ["Elephant", "Kangaroo", "Wildebeast", "Crocodile", "Antilope"];
$randomWordIndex = rand_int(0, count($wordArray) - 1);
$randomWord = $wordArray[$randomWordIndex];

$numberArrays = [[3, 43, 23, 15, 87], [2, 48, 19, 12, 93], [6, 46, 12, 19, 82], [4, 51, 33, 11, 94]];
$randomOfArrays = rand_int(0, count($numberArrays) - 1);
$numberArray = $numberArrays[$randomOfArrays];
$numberArrayString = implode(",", $numberArray);



// SECTION 2 ****************************************************

$numberArrayAdded = array_merge($numberArray, [rand_int(60, 79), rand_int(20, 40)]);
$numberArrayAddedString = implode(",", $numberArrayAdded);

$numberArrayMore = array_merge($numberArrayAdded, [rand_int(60, 79), rand_int(20, 40)]);
$numberArrayMoreString = implode(",", $numberArrayMore);



// SECTION 3 ****************************************************

$stringArrays = [["Neil Armstrong", "Michael Collins", "Buzz Aldrin"],
                 ["Pete Conrad", "Richard F. Gordon Jr.", "Alan Bean"],
                 ["Jim Lovell", "Jack Swigert", "Fred Haise"],];
$randomStringIndex = rand_int(0, count($stringArrays) - 1);
$stringArray = $stringArrays[$randomStringIndex];
$stringArrayString = "'".implode("','", $stringArray)."'";
$apolloMission = 10 + $randomStringIndex + 1;
$notApolloMission = 10 + $randomStringIndex;

$reduceArrays = [[5, 8, 11, 14, 17, 20, 23, 28, 31],
                 [37, 42, 43, 48, 53, 58, 61, 68, 71],
                 [73, 78, 83, 88, 97, 102, 103, 106, 109],
                 [113, 128, 131, 136, 139, 148, 151, 156, 163]];
$randomReduceIndex = rand_int(0, count($reduceArrays) - 1);
$reduceArray = $reduceArrays[$randomReduceIndex];
$reduceArrayString = implode(",", $reduceArray);


// Function to decide whether or not a number is prime
function isPrime($number) {
    $start = 2;
    while ($start <= sqrt($number)) {
        if ($number % $start++ < 1) return false;
    }
    return $number > 1;
}



return [



/**
 * Titel and introduction to the lab.
 */
"title" => "node1 - JavaScript med Nodejs",

"intro" => <<<EOD
JavaScript using nodejs.
EOD
,


"sections" => [


/** ===================================================================================
 * New section of exercises.
 */
[
"title" => "nodejs built-ins",

"intro" => <<<EOD
In this section we try out some of the new nodejs and ES6 features.
EOD
,

"shuffle" => false,

"questions" => [



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD

Create a variable called `numbersArray` holding the numbers $numberArrayString.

Use find to get the first occurence of a number bigger than or equal to 42.

Answer with the number.
EOD
,

"answer" => function () use ($numberArray) {
    for ($i=0; $i < count($numberArray); $i++) {
        if ($numberArray[$i] >= 42) {
            return $numberArray[$i];
        }
    }
},

],


/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD

Find the smallest number in `numbersArray` by using the spread operator `...` and the function `Math.min()`.

Answer with the smallest number.

EOD
,

"answer" => function () use ($numberArray) {
    return min($numberArray);
},

],




/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD

Create a function called `meaningOfLife()` with one default parameter with the value of 42.

The function should return the sentence 'The meaning of life is ' concatenated with the parameter.

Answer with a call to the `meaningOfLife()` function without any parameters.

EOD
,

"answer" => function () {
    return 'The meaning of life is ' . 42;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD

Check if the word $randomWord contains the letters 'oo'. Return true or false depending on the answer.

Tip: Use nodejs function `includes`.

EOD
,

"answer" => function () use ($randomWord) {
    return strpos($randomWord, "oo") > -1;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD

Check if the word $randomWord starts with the letters 'El'. Return true or false depending on the answer.

Tip: Use nodejs function `startsWith`.

EOD
,

"answer" => function () use ($randomWord) {
    return strpos($randomWord, "El") === 0;
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
"title" => "Filtering arrays",

"intro" => <<<EOD
In this section we filter arrays in different ways.
EOD
,

"shuffle" => false,

"questions" => [



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD

Use `numbersArray` from above holding the numbers $numberArrayString.

Use a for-loop to save all numbers smaller than 42 in a new array.

Answer with the resulting array.

EOD
,

"answer" => function () use ($numberArray) {
    $resultArray = [];
    for ($i=0; $i < count($numberArray); $i++) {
        if ($numberArray[$i] < 42) {
            $resultArray[] = $numberArray[$i];
        }
    }
    return $resultArray;
},

],


/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD

Create a variable called `moreNumbersArray` holding the numbers $numberArrayAddedString.

Use the built-in higher-order function `filter` and a callback function to filter out all numbers bigger than or equal to 42.

Use arrow-notation to keep the code short and concise.

Answer with the resulting array.

EOD
,

"answer" => function () use ($numberArrayAdded) {
    $resultArray = [];
    for ($i=0; $i < count($numberArrayAdded); $i++) {
        if ($numberArrayAdded[$i] < 42) {
            $resultArray[] = $numberArrayAdded[$i];
        }
    }
    return $resultArray;
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
"title" => "Transforming arrays",

"intro" => <<<EOD
In this section we change arrays using the higher-order functions map and reduce.
EOD
,

"shuffle" => false,

"questions" => [



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD

Create a variable called `stringArray` holding the strings $stringArrayString.

Use a for-loop to concatenate the string ' was on the apollo $apolloMission' too each name in the array.

Store the result in a new array and answer with that array.

EOD
,

"answer" => function () use ($stringArray, $apolloMission) {
    $resultArray = [];
    for ($i=0; $i < count($stringArray); $i++) {
        $resultArray[$i] = $stringArray[$i] . " was on the apollo $apolloMission";
    }
    return $resultArray;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD

Use the `stringArray` from above and the built-in higher-order function `map` to concatenate the string ' was not on the apollo $notApolloMission' and each name.

Use arrow notation to keep the code simple and concise.

Answer with the resulting array.

EOD
,

"answer" => function () use ($stringArray, $notApolloMission) {
    $resultArray = [];
    for ($i=0; $i < count($stringArray); $i++) {
        $resultArray[$i] = $stringArray[$i] . " was not on the apollo $notApolloMission";
    }
    return $resultArray;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD

Create a variable called `maybePrimeNumber` holding the numbers $reduceArrayString.

In a for-loop sum all prime numbers from `maybePrimeNumber`, you need to find out whether or not the number is a prime number.

Answer with the resulting sum.

EOD
,

"answer" => function () use ($reduceArray) {
    $sum = 0;
    for ($i=0; $i < count($reduceArray); $i++) {
        if (isPrime($reduceArray[$i])) {
            $sum += $reduceArray[$i];
        }
    }
    return $sum;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD

Create a function `isNotPrime()` that takes one parameter (an integer) and tests if that number is a prime number. If the number is not prime, the number is returned otherwise return 0.

Use the built-in higher-order functions `reduce` to sum all numbers that are NOT prime numbers.

Answer with the resulting sum.

EOD
,

"answer" => function () use ($reduceArray) {
    $sum = 0;
    for ($i=0; $i < count($reduceArray); $i++) {
        if (!isPrime($reduceArray[$i])) {
            $sum += $reduceArray[$i];
        }
    }
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
