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


$timeOfFall = rand_int(4, 8);
$timeOfFallLess = $timeOfFall - 2;
$timeOfFallMore = $timeOfFall + 1;
$timeOfFallEvenMore = $timeOfFall + 2;

$startYear = rand_int(1997, 2004);
$endYear = $startYear + 6;

$multiplicator = rand_int(4, 10);

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

Tip: Use built-in character functions `isupper()`, `islower()`, `isdigit()`.
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
Create a new Python file called `physics.py`. Import your new file/module in `answer.py` using the import statement: import physics

In your physics module create a function `free_fall` that calculates the speed after a free fall without air resistance. The function takes two arguments time and initial speed. The inital speed argument should have a default value of 0 and it should be possible to call the function only with a time argument.

Tip: the formula for calculating the speed of a free fall without air resistance is: speed = initial speed + g * time, where g = 9.82.

Answer with a call to the function with time = $timeOfFall.
EOD
,
"points" => 1,
"answer" => function () use ($timeOfFall) {
    return 9.82 * $timeOfFall;
},


],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Modify your defined function `free_fall` to take another argument `gravity` with a default value of 9.82.

Answer with a call to the function with time = $timeOfFallLess, an initial speed of 4 and a gravity value of 1.62 (gravity on the moon).
EOD
,
"points" => 1,
"answer" => function () use ($timeOfFallLess) {
    return 1.62 * $timeOfFallLess + 4;
},


],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Kinetic energy describes the energy of an object with a certain mass (m) and velocity (v).

Create a function `kinetic_energy` that calculates the amount of kinetic energy of an object. The formula for calculating kinetic energy is: energy = 0.5 * m * v².

Use your defined function `free_fall` in combination with `kinetic_energy` to calculate the kinetic energy of an object with m = 10 after a free fall of time = $timeOfFallMore with the default gravity of earth (9.82).

Round the answer to one decimal.
EOD
,
"points" => 1,
"answer" => function () use ($timeOfFallMore) {
    return round(0.5 * 10 * (9.82 * $timeOfFallMore) * (9.82 * $timeOfFallMore), 1);
},


],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Potential energy is the energy stored in an object by virtue of the objects position in a gravitational field. The higher an object is lifted the greater the potential energy. The formula for calculating the potential energy is: energy = m * g * h, with m being the mass of the object, g the gravity and h the height of the object.

When an object falls, all of the potential energy is converted into kinetic energy. So it is possible to calculate the height of the fall based on the amount of kinetic energy an object has at the end of the fall using the following formula: height = kinetic energy / (m * g).

Create a function `height` that calculates the height of a free fall of time = $timeOfFallMore for an object with m = 10 and g = 9.82.

Round the answer to one decimal.
EOD
,
"points" => 1,
"answer" => function () use ($timeOfFallMore) {
    return round(0.5 * 10 * (9.82 * $timeOfFallMore) * (9.82 * $timeOfFallMore) / (9.82 * 10), 1);
},


],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Every point mass attracts every other point mass by a force acting along the line intersecting both points. The formula for calculating the force between two point masses is the following: force = G * m1*m2 / r². Where G = 6.674 * 10⁻¹¹, m1 and m2 is the masses of the two objects and r is the distance between the two objects.

Create a function `gravitational_pull` in your physics module that returns the force given three arguments m1, m2 and r.

Answer with the returned value from a call to the function with the following arguments m1 = 5.972 * 10²⁴, m2 = 10 and r = 100. The calculated force is the gravitational pull between the earth and an object with a mass of 10kg and 100 meters above the surface of the earth.

Tip: Use the math.pow(x, y) function.
EOD
,
"points" => 1,
"answer" => function () {
    $G = 6.674 * pow(10, -11);
    $m1 = 5.972 * pow(10, 24);
    $m2 = 10;
    $r = 100;
    return $G * $m1 * $m2 / ($r * $r);
},


],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Using the already defined functions `height` and `gravitational_pull` to calculate the gravitational pull between the earth (m = 5.972 * 10²⁴) and an object of m = 10 before a free fall of $timeOfFallEvenMore seconds.

Round the answer to one decimal.
EOD
,
"points" => 1,
"answer" => function () use ($timeOfFallEvenMore) {
    $G = 6.674 * pow(10, -11);
    $m1 = 5.972 * pow(10, 24);
    $m2 = 10;
    $r = 0.5 * 10 * (9.82 * $timeOfFallEvenMore) * (9.82 * $timeOfFallEvenMore) / (9.82 * 10);
    return round($G * $m1 * $m2 / ($r * $r), 1);
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
Whether a certain year is a leap year depends on a few different rules. There is a leap year every year whose number is perfectly divisible by four - except for years which are both divisible by 100 and not divisible by 400. The second part of the rule effects century years. For example; the century years 1600 and 2000 are leap years, but the century years 1700, 1800, and 1900 are not.

Create a function `leap_year` that checks whether a certain year is a leap year. The function should take one argument.

Then create another function `leap_decider` that takes two arguments: `start_year` and `end_year`. The return value from the function should be a string containing the years and whether the years are leap years.

Example: With the arguments start_year: 1999 and end_year: 2005, the string would be:

1999 is not a leap year, 2000 is a leap year, 2001 is not a leap year, 2002 is not a leap year, 2003 is not a leap year, 2004 is a leap year, 2005 is not a leap year

Answer with a call to `leap_decider` with the following arguments $startYear and $endYear.

EOD
,
"points" => 3,
"answer" => function () use ($startYear, $endYear) {
    $leapArr = [];
    while ($startYear <= $endYear) {
        if ($startYear%4 == 0 && !($startYear%100 == 0 && $startYear%400 != 0)) {
            $leapArr[] = $startYear . " is a leap year";
        } else {
            $leapArr[] = $startYear . " is not a leap year";
        }

        $startYear++;
    }

    return implode(", ", $leapArr);
},


],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Create a function `multiplication_table` that returns a multiplication table from 1 up to the argument given. As 4 * 3 = 3 * 4 you only need to return half of the multiplication table.

Example: With the argument being 3 the returned multiplication table should be:

1

2 4

3 6 9

Which is equal to the string '1\\n2 4\\n3 6 9\\n'


Answer with a call to the function with the argument $multiplicator.

EOD
,
"points" => 3,
"answer" => function () use ($multiplicator) {
    $multiplicationTable = "";

    for ($i = 1; $i <= $multiplicator; $i++) {
        for ($j = 1; $j <= $i; $j++) {
            $multiplicationTable.= $j*$i . " ";
        }

        $multiplicationTable = trim($multiplicationTable) . "\n";
    }

    return $multiplicationTable;
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
