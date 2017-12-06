<?php

/**
 * Generate random values to use in lab.
 */
include LAB_INSTALL_DIR . "/config/random.php";

$arrayNames = ["Misty", "Buster", "Gordon", "Lilly", "Misha", "Nova", "Perrin", "Nynaeve", "Kvothe", "Denna", "Basion"];
$arrayEyeColors = ["blue", "green", "brown", "red", "black"];
$arrayAnimal = ["dog", "cat"];

//SECTION 1 ****************************************************
$s1_catName = $arrayNames[rand_int(0, count($arrayNames) - 1)];
$s1_catEyeColor = $arrayEyeColors[rand_int(0, count($arrayEyeColors) - 1)];
$s1_livesLeft = rand_int(1, 9);
$s1_dogName = $arrayNames[rand_int(1, count($arrayNames) - 1) - 1];
$s1_dogEyeColor = $arrayEyeColors[rand_int(1, count($arrayEyeColors) - 1) - 1];
$s1_catNrOfPaws = rand_int(0, 3);
$s1_CatNrOfPaws = 4;

//SECTION 2 ****************************************************


$s1_hours            = rand_int(19, 40);
$s1_minutes          = rand_int(1, 9);
$s1_seconds          = rand_int(1, 40);
$s1_hours2           = rand_int(19, 40);
$s1_minutes2         = rand_int(19, 40);
$s1_seconds2         = rand_int(1, 9);
$s1_hours3           = rand_int(4, 25);
$s1_minutes3         = rand_int(1, 31);
$s1_seconds3         = rand_int(30, 45);

//SECTION 3 ****************************************************
$s3_animalSpeak =$arrayAnimal[rand_int(0, 1)];


return [
"author" => ["aar"],
"passPercentage" => 10/13,
"passDistinctPercentage" => 13/13,
/**
 * Titel and introduction to the lab.
 */
"title" => "Lab 1 - oopython",

"intro" => <<<EOD
If you need to peek at examples or just want to know more, take a look at the [Python documentation](https://docs.python.org/3/library/index.html). Here you will find everything this lab will go through and much more.
EOD
,


"sections" => [



/** ===================================================================================
 * New section of exercises.
 */
[
"title" => "Objects and classes",

"intro" => <<<EOD
Basic object oriented python.
EOD
,

"shuffle" => false,

"questions" => [



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Create a new file, for creating classes in. Create a class called Cat in your new file. Give the Cat class the instance attribute `eye_color` and `name` in the constructor. Make it so that values for the attributes can be sent as arguments to the constructor.  
Create a *get*-method for each attribute.


Dont forget to import the file!

In the code below initiate a new variable named `cat` with a new *Cat object*, give it eye color "$s1_catEyeColor" and name "$s1_catName". 

Answer with the string "My cats name is `name` and has `eye-color` eyes.", use your get-methods to retrieve the values..
EOD
,
"points" => 1,

"answer" => function () use ($s1_catEyeColor, $s1_catName) {

    $result = "My cats name is $s1_catName and has $s1_catEyeColor eyes.";
    return $result;
},

],


/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Expand your Cat class with the instance attribute `lives-left` and a *set*- and *get*-method for the attribute.

Initialize the attribute in the constructor to `-1`. In the code below use the set-method to change the value to `$s1_livesLeft`.

Answer with number of lives the cat has left.
EOD
,
"points" => 1,

"answer" => function () use ($s1_livesLeft) {

    return $s1_livesLeft;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Create a new method in the Cat class, called `description`. The method should return the string "My cats name is `name`, has `eye-color` eyes and `lives-left` lives left to live.".

Answer with the result returned from the method.
EOD
,
"points" => 1,

"answer" => function () use ($s1_catName, $s1_catEyeColor, $s1_livesLeft) {

    return "My cats name is $s1_catName, has $s1_catEyeColor eyes and $s1_livesLeft lives left to live.";
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Create a static attribute in the Cat class, "nr_of_paws", that contains the number of paws a cat have. Set its value to `$s1_CatNrOfPaws` in the declaration.  
Also create a method for the class that returns "self.nr_of_paws".

Answer with the string "`$s1_catName` has `$s1_CatNrOfPaws` paws."
EOD
,
"points" => 1,

"answer" => function () use ($s1_catName, $s1_CatNrOfPaws) {

    return "$s1_catName has $s1_CatNrOfPaws paws.";
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD

In the code below, for your **cat variable**, assign the nr_of_paws attribute to `$s1_catNrOfPaws`.

Answer with the string "`$s1_catName` has `$s1_catNrOfPaws` paws but cats have `<Cat.nr_of_paws>` paws.".  
Use the method, from previous exercise, to get how many paws `$s1_catName` have and the class name, "Cat.nr_of_paws", to get how many paws cats have.
EOD
,
"points" => 1,

"answer" => function () use ($s1_catName, $s1_catNrOfPaws) {

    return "$s1_catName has $s1_catNrOfPaws paws but cats have 4 paws.";
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Create a new class named Dog, it should have the same attributes and methods as the Cat class.  
But in the description method return "My dogs name..." instead of "My cats name...".

In the constructor set lives left to live to `1`.

Dont forget to import the new class!

In the code below initiate a new variable called `dog` with the *Dog class*. Give dog the name "$s1_dogName" and eye color "$s1_dogEyeColor".

Put cat and dog variables in a list. Iterate through the list and concatenate the result from their description methods together in a string, without any seperation between the two string.

Answer with the string.
EOD
,
"points" => 1,

"answer" => function () use ($s1_catName, $s1_catEyeColor, $s1_livesLeft, $s1_dogName, $s1_dogEyeColor) {

    return "My cats name is $s1_catName, has $s1_catEyeColor eyes and $s1_livesLeft lives left to live.My dogs name is $s1_dogName, has $s1_dogEyeColor eyes and 1 lives left to live.";
},

],



/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Create a new class named Time.  
Declare the instance attributes `hours`, `minutes` and `seconds` in the constructor. Make it so that values for the attributes can be sent as arguments to the constructor.  
Give the class a method named `info` that returns time as a string with the format "h-m-s". Numbers below 10 should have a leading zero when returned in the info method.


Initialize a new *Time object* and assign it to a variable called `time1`. Give it hours `$s1_hours`, minutes `$s1_minutes` and seconds `$s1_seconds`.

Answer with the result from the info method.

EOD
,
"points" => 1,

"answer" => function () use ($s1_hours, $s1_minutes, $s1_seconds) {
    return "$s1_hours-" . ($s1_minutes < 10 ? "0$s1_minutes" : "$s1_minutes") . "-" . ($s1_seconds < 10 ? "0$s1_seconds" : "$s1_seconds");
},

],



/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Create a static method in your Time class. The method should take one argument, a string in the format as the one `info` returns, "h-m-s", and return the time it represents converted to number of seconds.

Answer with the result from the new static method, use `time1.info()` as argument to it.

EOD
,
"points" => 1,

"answer" => function () use ($s1_hours, $s1_minutes, $s1_seconds) {
    $t = 60;
    return (($s1_hours * $t * $t) + ($s1_minutes * $t) + $s1_seconds);
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
"title" => "Overriding methods",

"intro" => <<<EOD

EOD
,

"shuffle" => false,

"questions" => [



/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Overload the `add operator(+)` in the Time class.  
It should return the duration of two objects added together, in seconds.

Initialize a new Time object to a variable called `time2` , give it hours `$s1_hours2`, minutes `$s1_minutes2` and seconds `$s1_seconds2`.

Answer with `time1+time2`.
EOD
,
"points" => 1,

"answer" => function () use ($s1_hours, $s1_minutes, $s1_seconds, $s1_hours2, $s1_minutes2, $s1_seconds2) {
    $t = 60;
    return (($s1_hours * $t * $t) + ($s1_minutes * $t) + $s1_seconds) + (($s1_hours2 * $t * $t) + ($s1_minutes2 * $t) + $s1_seconds2);
},

],



/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Overload the `iadd operator(+=)` in the Time class to update the own object with the sum of each unit,  hours+hours, minutes+minutes and seconds+seconds.  

Initialize a new Time object to a variable called `time3` , give it hours `$s1_hours3`, minutes `$s1_minutes3` and seconds `$s1_seconds3`.  
In the code use "+=" to update `time2` with `time3`.

Answer with `time2`s info method.
EOD
,
"points" => 1,

"answer" => function () use ($s1_hours2, $s1_minutes2, $s1_seconds2, $s1_hours3, $s1_minutes3, $s1_seconds3) {
    $h = $s1_hours2 + $s1_hours3;
    $m = $s1_minutes2 + $s1_minutes3;
    $s = $s1_seconds2 + $s1_seconds3;
    return "$h-$m-$s";
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


/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Overload the `smaller than operator(<)` in the Time class.  
It should return True if the time is shorter than the other.

Answer with `time1<time2`.
EOD
,
"points" => 3,

"answer" => function () use ($s1_hours, $s1_minutes, $s1_seconds, $s1_hours2, $s1_minutes2, $s1_seconds2) {
    if ($s1_hours < $s1_hours2){
        return true;
    } elseif ($s1_hours == $s1_hours2){
        if((int)$s1_minutes < (int)$s1_minutes2){
            return true;
        } elseif((int)$s1_minutes == (int)$s1_minutes2 && (int)$s1_seconds < (int)$s1_seconds2){
            return true;
        }else{
            return false;
        }
    } else{
        return false;
    }
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
]; // EOF the entire lab
