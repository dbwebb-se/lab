<?php

/**
 * Titel and introduction to the lab.
 */
include LAB_INSTALL_DIR . "/config/random.php";


$persons = array(
    array(
        'firstName'     => 'Isaac',
        'lastName'      => 'Newton',
        'nationality'   => 'England',
        'born'          => new DateTime("Jan 4, 1643")
    ),
    array(
        'firstName'     => 'Henri',
        'lastName'      => 'Becquerel',
        'nationality'   => 'France',
        'born'          => new DateTime("Dec 15, 1852")
    ),
    array(
        'firstName'     => 'Albert',
        'lastName'      => 'Einstein',
        'nationality'   => 'Germany',
        'born'          => new DateTime("Mar 14, 1879")
    ),
);

$person1Nr = 0;
// $person2Nr = ($person1Nr + 1) % count($persons);
$person2Nr = 1;
$person3Nr = 2;

$person1FirstName   = $persons[$person1Nr]["firstName"];
$person1LastName    = $persons[$person1Nr]["lastName"];
$person1Nationality = $persons[$person1Nr]["nationality"];
$person1Born        = $persons[$person1Nr]["born"];

$person1Print1      = "My name is $person1FirstName.";
$person1Print2      = "My name is $person1FirstName $person1LastName from $person1Nationality.";
$person1BornFormat  = $person1Born->format('Y-m-d');
$person1BornYear    = $person1Born->format('Y');
$person1Print3      = "I was born $person1BornYear.";

$person2FirstName   = $persons[$person2Nr]["firstName"];
$person2LastName    = $persons[$person2Nr]["lastName"];
$person2Nationality = $persons[$person2Nr]["nationality"];
$person2Born        = $persons[$person2Nr]["born"];

$person2Print2      = "My name is $person2FirstName $person2LastName from $person2Nationality.";
$person2BornFormat  = $person2Born->format('Y-m-d');
$person2BornYear    = $person2Born->format('Y');
$person2Print3      = "I was born $person2BornYear.";

$person3FirstName   = $persons[$person3Nr]["firstName"];
$person3LastName    = $persons[$person3Nr]["lastName"];
$person3Nationality = $persons[$person3Nr]["nationality"];
$person3Born        = $persons[$person3Nr]["born"];

$person3Print2      = "My name is $person3FirstName $person3LastName from $person3Nationality.";
$person3BornFormat  = $person3Born->format('Y-m-d');
$person3BornYear    = $person3Born->format('Y');
$person3Print3      = "I was born $person3BornYear.";



return [

"passPercentage" => 5/5,
"passDistinctPercentage" => 5/5,

"author" => ["lew", "aar"],


/**
 * Titel and introduction to the lab.
 */
"title" => "Lab 5 - webgl",

"intro" => <<<EOD
Practice basics on objects.
EOD
,


"sections" => [



/** ===================================================================================
 * New section of exercises.
 */
[
"title" => "Create object",

"intro" => <<<EOD
Start by creating an empty object called `person` by using the object literal.
EOD
,

"shuffle" => false,

"questions" => [



/** -----------------------------------------------------------------------------------
 * A question, 1.1.
 */
[

"text" => <<<EOD
Give your person-object the property `firstName` with a value of `"$person1FirstName"`. Add a method called `print1()` that returns a presentation of the object, like this: `"My name is $person1FirstName."`  
Use `this.firstName` to construct the string.  

Answer with the result from calling `person.print1()`.
EOD
,

"points" => 1,

"answer" => function () use ($person1Print1) {
    
    return $person1Print1;
},

],



/** -----------------------------------------------------------------------------------
 * A question, 1.2.
 */
[

"text" => <<<EOD
Add properties `lastName` and `nationality` to your person-object. Their values should be `"$person1LastName"` and `"$person1Nationality"`.  

Create the method `person.print2()` which should say: `"$person1Print2"`.
EOD
,

"points" => 1,

"answer" => function () use ($person1Print2) {
    
    return $person1Print2;
},

],



/** -----------------------------------------------------------------------------------
 * A question, 1.3.
 */
[

"text" => <<<EOD
Add the property `born` with the value of a Date object: `"$person1BornFormat"`.

Create a method `print3()` that says exactly the same as `print2()` followed by `"$person1Print3"`.
EOD
,

"points" => 1,

"answer" => function () use ($person1Print2, $person1Print3) {
    
    return $person1Print2 . " " . $person1Print3;
},

],



/** -----------------------------------------------------------------------------------
 * A question, 1.4.
 */
[

"text" => <<<EOD
Create a second person, called `person2` by using built-in function `Object.create()`.

person2 should have the following properties: `"$person2FirstName", "$person2LastName", "$person2Nationality", "$person2BornFormat"`.  

Print out details on the second person using `person2.print3()`.
EOD
,

"points" => 1,

"answer" => function () use ($person2Print2, $person2Print3) {
    
    return $person2Print2 . " " . $person2Print3;
},

],



/** -----------------------------------------------------------------------------------
 * A question, 1.5.
 */
[

"text" => <<<EOD
Add the method, `init(firstName, lastName, nationality, born)`, to your Person-object. The method should help you create new Person-objects. 

Try it out using the following properties: `"$person3FirstName", "$person3LastName", "$person3Nationality", "$person3BornFormat"`. 

Name the variable holding the person `person3`.

Print out details on the third person using `person3.print3()`.
EOD
,

"points" => 1,

"answer" => function () use ($person3Print2, $person3Print3) {
    
    return $person3Print2 . " " . $person3Print3;
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
