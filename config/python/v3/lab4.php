<?php

/**
 * Generate random values to use in lab.
 */
include __DIR__ . "/../../random.php";


$passwords = [
    "Se3ret",
    "mYsecretpassword",
    "mYsecretpassw0rd",
    "mYsecretPASSW0rd"
];

$passwordsRand = rand_int(0, count($passwords) - 1);
$password = $passwords[$passwordsRand];
$secondPassword = $passwords[($passwordsRand + 2)%(count($passwords))];
$thirdPassword = $passwords[($passwordsRand + 3)%(count($passwords))];

$stoicTexts = [
    "Stoicism has just a few central teachings. It sets out to remind us of how unpredictable the world can be.",
    "How brief our moment of life is. How to be steadfast, and strong, and in control of yourself.",
    "And finally, that the source of our dissatisfaction lies in our impulsive dependency on our reflexive senses rather than logic."
];
$stoicTextsRand = rand_int(0, count($stoicTexts) - 1);
$stoicText = $stoicTexts[$stoicTextsRand];

/**
 * Titel and introduction to the lab.
 */


return [


"passPercentage" => 10/16,
"passDistinctPercentage" => 16/16,

"author" => ["efo", "aar"],

/**
 * Titel and introduction to the lab.
 */
"title" => "Lab 4 - python",

"intro" => "
In this lab we take another look at functions and we use modules to structure our code.
",


"sections" => [



/** ===================================================================================
 * New section of exercises.
 */
[
"title" => "Functions",

"intro" => "

",

"shuffle" => false,

"questions" => [



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
Create a function `valid_password` that takes one string argument. Check whether the argument is a valid password according to the following rules:

* 8 characters or longer
* Contains upper and lowercase letters
* Contains a number

The function should return True or False depending on whether the password is valid.

Answer with the return value of the function when called with the string '$password'.

Tip: Use built-in character functions `isupper()`, `islower()`, `idigit()`.
",
"points" => 1,
"answer" => function () use ($password) {
    return 1 === preg_match('~[0-9]~', $password) &&
        1 === preg_match('~[A-Z]~', $password) &&
        1 === preg_match('~[a-z]~', $password) &&
        strlen($password) >= 8;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
Using the function `valid_password` answer with the return value of the function when called with the string '$secondPassword'.
",
"points" => 1,
"answer" => function () use ($secondPassword) {
    return 1 === preg_match('~[0-9]~', $secondPassword) &&
        1 === preg_match('~[A-Z]~', $secondPassword) &&
        1 === preg_match('~[a-z]~', $secondPassword) &&
        strlen($secondPassword) >= 8;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
Create a function `number_of_vowels` that takes one argument. The function returns the number of vowels (vokaler) in the given argument.

Answer with the number of vowels in the following text:

'$stoicText'
",
"points" => 1,
"answer" => function () use ($stoicText) {
    return preg_match_all('/[aeiou]/i', $stoicText, $matches);
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
Create a function `analyze_password` that uses `valid_password` and `number_of_vowels`. The function should return whether or not a password is valid and how many vowels the given password contains concatenated to a string.

Example: With the input value " . $passwords[0] . " the function should return the following string: '" . $passwords[0] . " is not a valid password and contains 2 vowels.'.

With the input value " . $passwords[3] . " the function should return the following string: '" . $passwords[3] . " is a valid password and contains 4 vowels.'.

Answer with the return value of the function `analyze_password` called with the following argument: $thirdPassword.
",
"points" => 1,
"answer" => function () use ($thirdPassword) {
    if (1 === preg_match('~[0-9]~', $thirdPassword) &&
        1 === preg_match('~[A-Z]~', $thirdPassword) &&
        1 === preg_match('~[a-z]~', $thirdPassword) &&
        strlen($thirdPassword) >= 8) {
            return "$thirdPassword is a valid password and contains " . preg_match_all('/[aeiou]/i', $thirdPassword, $matches) . " vowels.";
    } else {
        return "$thirdPassword is not a valid password and contains " . preg_match_all('/[aeiou]/i', $thirdPassword, $matches) . " vowels.";
    }
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

EOD
,
"points" => 3,
"answer" => function () {
    return 2;
},


],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD

EOD
,
"points" => 3,
"answer" => function () {
    return 3;
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
