<?php

/**
 * Titel and introduction to the lab.
 */
include __DIR__ . "/../random.php";


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

$person1Nr = rand_int(0, count($persons) - 1);
$person2Nr = ($person1Nr + 1) % count($persons);

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
$person2BornFormat  = $person1Born->format('Y-m-d');
$person2BornYear    = $person2Born->format('Y');
$person2Print3      = "I was born $person2BornYear.";


$x1 = rand_int(10, 90);
$y1 = rand_int(10, 90);
$w1 = rand_int(10, 20);
$h1 = rand_int(10, 20);
$a1 = $w1 * $h1;

$x2 = rand_int(10, 90);
$y2 = rand_int(10, 90);
$w2 = rand_int(10, 20);
$h2 = rand_int(10, 20);
$a2 = $w2 * $h2;

$x3 = $x1 + $w1 - 1;
$y3 = $y1 + $h1 - 1;

$x4 = $x2 - 1;
$y4 = $y2 - 1;

$x5 = $x1 + round($w1 / 2);
$y5 = $y1 + round($h1 / 2);
$w5 = $w1;
$h5 = $h1;


return [



/**
 * Titel and introduction to the lab.
 */
"title" => "Lab 4 - javascript1",

"intro" => "
<p>Practice basics on objects.
</p>
",


"sections" => [



/** ===================================================================================
 * New section of exercises.
 */
[
"title" => "Create object",

"intro" => "
<p>Start by creating an empty object called 'person' by using the object literal.</p>
",

"shuffle" => false,

"questions" => [



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Give your person-object the property 'firstName' with a value of '$person1FirstName'. Add a method called 'print1()' that returns a presentation of the object, like this: 'My name is $person1FirstName.' Answer with the result from calling 'person.print1()'.  
</p>
",

"answer" => function () use ($person1Print1) {
    
    return $person1Print1;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Add properties 'lastName' and 'nationality' to your person-object. Their values should be '$person1LastName' and '$person1Nationality'. Create the method 'person.print2()' which should say: '$person1Print2'.
</p>
",

"answer" => function () use ($person1Print2) {
    
    return $person1Print2;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Add the property 'born' with the value of a Date object: '$person1BornFormat'. Create a method 'print3()' that says exactly the same as 'print2()' followed by '$person1Print3'.
</p>
",

"answer" => function () use ($person1Print2, $person1Print3) {
    
    return $person1Print2 . " " . $person1Print3;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Create a second person, called 'person2' by using built-in function 'Object.create()'. The person2 should have the following properties: '$person2FirstName, $person2LastName, $person2Nationality, $person2BornFormat'. Print out details on the second person using 'person2.print3()'.
</p>
",

"answer" => function () use ($person2Print2, $person2Print3) {
    
    return $person2Print2 . " " . $person2Print3;
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
"title" => "More on objects",

"intro" => "
<p>
</p>
",

"shuffle" => false,

"questions" => [



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Create a object called 'shape' with the properties: 'x', 'y', 'height', 'width' and 'print'. Create a new object from 'shape' called 'shape1' and initiate the properties with: x:$x1, y:$y1, height:$h1, width: $w1. Use the 'print' method to print out the assigned values as: 'x:?, y:?, height:?, width:?'
</p>
",

"answer" => function () use ($x1, $y1, $h1, $w1) {

    return "x:$x1, y:$y1, height:$h1, width:$w1";
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Create another object from 'shape' called 'shape2' and initiate the properties with: x:$x2, y:$y2, height:$h2, width: $w2. Use the 'print' method to print out the assigned values.
</p>
",

"answer" => function () use ($x2, $y2, $h2, $w2) {

    return "x:$x2, y:$y2, height:$h2, width:$w2";
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Create a method in 'shape' that calculates and returns the area of the shape. Try it out by calling it for 'shape1' and 'shape2'. Answer with both values, separated by ', '. 
</p>
",

"answer" => function () use ($a1, $a2) {

    return "$a1, $a2";
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Create a method 'shape.overlapPoint()' that checks if a position x, y is within the current shape. Or, the shape overlaps that position. Position x, y is top left of the shape. Return true or false. Test by checking if x:$x3, y:$y3 is within 'shape1' and if x:$x4, y:$y4 is within 'shape2'. Return the result separated by ', '.
</p>
",

"answer" => function () use ($a1, $a2) {

    return "true, false";
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Create a method 'shape.overlapShape()' that takes a shape as argument and checks if the shapes overlaps (colliding bodies). Return true or false. Create a new 'shape3' and initiate the properties with: x:$x5, y:$y5, height:$h5, width: $w5. Return the result from checking 'shape1.overlapShape(shape3)'.
</p>
",

"answer" => function () {

    return true;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Create a method 'shape.move(moveX, moveY)' which moves the shape from its current position by adding 'x += moveX' and 'y += moveY'. Try it out by moving 'shape3' using 'moveX: $w1, moveY: $h1'. Re-check if the bodies 'shape1' and 'shape3' collides.
</p>
",

"answer" => function () {

    return false;
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
