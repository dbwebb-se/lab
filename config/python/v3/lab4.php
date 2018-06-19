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
"title" => "Modules",

"intro" => <<<EOD
In this section we will look into modules and how we can structure our code.
EOD
,

"shuffle" => false,

"questions" => [



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Create a a new Python file called `physics.py`. Import you new file/module in `answer.py` using the import statement: import physics

In your physics module create a function `free_fall` that calculates the speed after a free fall without air resistance. The function takes two arguments time and initial speed. The inital speed argument should have a default value of 0 and it should be possible to call the function only with a time argument.

Tip: the formula for calculating the speed of a free fall without air resistance is: speed = initial speed + g * time, where g = 9.82.

Answer with a call to the function with time = 5.
EOD
,
"points" => 1,
"answer" => function () {
    return 9.82 * 5;
},


],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Modify your defined function `free_fall` to take another argument `gravity` with a default value of 9.82.

Answer with a call to the function with time = 3, an initial speed of 4 and a gravity value of 1.62 (gravity on the moon).
EOD
,
"points" => 1,
"answer" => function () {
    return 1.62 * 3 + 4;
},


],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Kinetic energy describes the energy of an object with a certain mass (m) and velocity (v).

Create a function `kinetic_energy` that calculates the amount of energy of an object. The formula for calculating kinetic energy is: energy = 0.5 * m * v².

Use your defined function `free_fall` in combination with `kinetic_energy` to calculate the kinetic energy of an object with m = 10 after a free fall of time = 10 with the default gravity of earth (9.82).

Round the answer to one decimal.
EOD
,
"points" => 1,
"answer" => function () {
    return round(0.5 * 10 * (9.82 * 10) * (9.82 * 10), 1);
},


],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Potential energy is the energy stored in an object by virtue of the objects position in a gravitational field. The higher an object is lifted the greater the potential energy. The formula for calculating the potential energy is: energy = m * g * h, with m being the mass of the object, g the gravity and h the height of the object.

When an object falls all of the potential energy is converted into kinetic energy. So it is possible to calculate the height of the fall based on the amount of kinetic energy an object has at the end of the fall using the following formula: height = kinetic energy / (m * g).

Create a function `height` that calculates the height of a free fall of time = 10 for an object with m = 10 and g = 9.82.

Round the answer to one decimal.
EOD
,
"points" => 1,
"answer" => function () {
    return round(0.5 * 10 * (9.82 * 10) * (9.82 * 10) / (9.82 * 10), 1);
},


],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Every point mass attracts every other point mass by a force acting along the line intersecting both points. The formula for calculating the force between two point masses is the following: force = G * m1*m2 / r². Where G = 6.674 * 10⁻¹¹, m1 and m2 is the masses of the two objects and r is the distance between the two objects.

Create a function `gravitational_pull` in your physics module that returns the force given three arguments m1, m2 and r.

Answer with the returned value from a call to the function with the following arguments m1 = 5.972*10²⁴, m2 = 1.989*10³⁰ and r = 149.6*10⁹. The calculated force is the gravitational pull between the sun and the earth.

Tip: Use the math.pow(x, y) function.
EOD
,
"points" => 1,
"answer" => function () {
    $G = 6.674 * pow(10, -11);
    $m1 = 5.972 * pow(10, 24);
    $m2 = 1.989 * pow(10, 30);
    $r = 1.496 * pow(10, 11);
    return $G * $m1 * $m2 / ($r * $r);
},


],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Using the already defined functions `height` and `gravitational_pull` to calculate the gravitational pull between the earth and the object of m = 10 before the free fall.

EOD
,
"points" => 1,
"answer" => function () {
    $G = 6.674 * pow(10, -11);
    $m1 = 5.972 * pow(10, 24);
    $m2 = 10;
    $r = 491;
    return $G * $m1 * $m2 / ($r * $r);
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
