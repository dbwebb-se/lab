<?php

/**
 * Generate random values to use in lab.
 */
include __DIR__ . "/../random.php";

// FUNCTIONS

$num1      = rand_int(1, 999);
$num2      = rand_int(1, 999);
$range1    = rand_int(10, 49);
$range2    = rand_int(60, 99);
$range3    = rand_int(20, 29);
$range4    = rand_int(40, 49);

$fruits             = ["banana", "apple", "kiwi", "plum"];
$fruitColors        = ["yellow", "green", "green", "red"];
$fruitString        = implode(", ", $fruits);
$fruitColorString   = implode(", ", $fruitColors);
$fruitWhich         = rand_int(0, count($fruits)-1);
$fruit              = $fruits[$fruitWhich];
$fruitColor         = $fruitColors[$fruitWhich];

// ARRAYS

$array1 = [
[42, 78, -1, 0, -432, 799, 2, 1100],
[47, 98, -13, 0, -412, 499, 3, 1200],
[41, 76, -16, 0, -462, 699, 4, 1300],
[46, 73, -18, 0, -442, 779, 5, 1400],
[49, 72, -10, 0, -412, 739, 6, 1500],
];
$array1Which = rand_int(0, count($array1) - 1);
$array1Selected = $array1[$array1Which];
$array1SelectedString = implode(",", $array1Selected);
$array1Length = count($array1Selected);
$array1String = implode(",", $array1Selected);

$array2 = [
['melon', 'banana', 'apple', 'orange', 'lemon'],
['potato', 'carrot', 'onion', 'leek', 'cabbage'],
['milk', 'juice', 'lemonade', 'soda', 'water'],
['candy', 'cake', 'cupcakes', 'lollipop', 'pringles'],
['beef', 'chicken', 'pork', 'sausage', 'tofu']
];
$array2Which = rand_int(0, count($array2) - 1);
$array2Selected = $array2[$array2Which];
$array2SelectedString = implode(",", $array2Selected);
$array2Within = rand_int(1, count($array2Selected) - 2);

// OBJECTS

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

$person1Print1      = "My name is $person1FirstName";
$person1Print2      = "My name is $person1FirstName $person1LastName from $person1Nationality";
$person1BornFormat  = $person1Born->format('Y-m-d');
$person1BornYear    = $person1Born->format('Y');
$person1Print3      = "I was born $person1BornYear";

$person2FirstName   = $persons[$person2Nr]["firstName"];
$person2LastName    = $persons[$person2Nr]["lastName"];
$person2Nationality = $persons[$person2Nr]["nationality"];
$person2Born        = $persons[$person2Nr]["born"];

$person2Print2      = "My name is $person2FirstName $person2LastName from $person2Nationality";
$person2BornFormat  = $person2Born->format('Y-m-d');
$person2BornYear    = $person2Born->format('Y');
$person2Print3      = "I was born $person2BornYear";


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
"title" => "Lab 2 - webgl",

"intro" => <<<EOD
Practise arrays. You might find useful help here:  
https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Array
EOD
,


"sections" => [



/** ===================================================================================
 * New section of exercises.
 */
[
"title" => "Basic functions",

"intro" => "",

"shuffle" => false,

"questions" => [



/** -----------------------------------------------------------------------------------
 * A question, 1.1
 */
[

"text" => <<<EOD
Create a function called 'sumNumbers()'. The function should take two arguments and return the sum of them. Test the function using the arguments $num1 and $num2.  

Answer with the result.
EOD
,

"answer" => function () use ($num1, $num2) {

    return $num1 + $num2;
},

],



/** -----------------------------------------------------------------------------------
 * A question, 1.2
 */
[

"text" => <<<EOD
Create a function 'sumRangeNumbers()' that returns the sum of all numbers between two chosen numbers. The function should take two arguments, one representing the lowest boundary and one that represents the highest boundary. For example, the arguments 10 and 20 should return the sum of 10+11+12+13...+20.  

Test it using the values $range1 and $range2 and answer with the result.
EOD
,

"answer" => function () use ($range1, $range2) {

    $result = 0;
    for($i = $range1; $i <= $range2; $i++) {
            $result += $i;
    }
    return $result;
},

],



/** -----------------------------------------------------------------------------------
 * A question, 1.3
 */
[

"text" => <<<EOD
Create a function called 'fruitColor()' that takes one argument called 'fruit' and returns the color of the fruit. The function should be aware of the following fruits ($fruitString) with respective color ($fruitColorString).  

Try it out using the fruit '$fruit' and answer with the result.
EOD
,

"answer" => function () use ($fruitColor) {

    $result = $fruitColor;
    return $result;

},

],



/** -----------------------------------------------------------------------------------
 * A question, 1.4
 */
[

"text" => <<<EOD
Create a function 'printRange()' that takes two arguments 'rangeStart' and 'rangeStop' and returns a string with all numbers comma-separated in the range. Try it using the arguments $range3 and $range4.  

Answer with the result.
EOD
,

"answer" => function () use ($range3, $range4) {

    $range = range($range3, $range4);
    $result = implode(",", $range);

    return $result;
},

],




/**
 * Closing up this section.
 */
], // EOF questions
], // EOF section



/** ===========================================================================
 * New section of exercises.
 */
[
"title" => "Arrays",

"intro" => <<<EOD
To copy an array use array.slice() to make a real copy, not a shallow one.
EOD
,

"shuffle" => false,

"questions" => [



/** ---------------------------------------------------------------------------
 * A question, 2.1
 */
[

"text" => <<<EOD
Create a variable 'array1' holding an array with the numbers $array1SelectedString.  

Answer with the array.
EOD
,

"answer" => function () use ($array1Selected) {

    return $array1Selected;
},

],



/** -----------------------------------------------------------------------------------
 * A question, 2.2
 */
[

"text" => <<<EOD
Use the variable 'array1'. How many items does the array have?  

Answer with the result.
EOD
,

"answer" => function () use ($array1Length) {

    return $array1Length;
},

],



/** -----------------------------------------------------------------------------------
 * A question, 2.3
 */
[

"text" => <<<EOD
Create a variable 'array2' holding an array with the words: $array2SelectedString.  

Answer with the array.
EOD
,

"answer" => function () use ($array2Selected) {

    return $array2Selected;
},

],



/** -----------------------------------------------------------------------------------
 * A question, 2.4
 */
[

"text" => <<<EOD
Return the element on position: $array2Within in 'array2'.  

Answer with the result.
EOD
,

"answer" => function () use ($array2Selected, $array2Within) {

    return $array2Selected[$array2Within];
},

],



/** -----------------------------------------------------------------------------------
 * A question, 2.5
 */
[

"text" => <<<EOD
Return element $array2Within in 'array2'.  

Answer with the result.
EOD
,

"answer" => function () use ($array2Selected, $array2Within) {

    return $array2Selected[$array2Within-1];
},

],



/** -----------------------------------------------------------------------------------
 * A question, 2.6
 */
[

"text" => <<<EOD
Use the variable 'array2'. Concatenate the first item and the last item as a string. Separate the string with '-'.  

Answer with the result.
EOD
,

"answer" => function () use ($array2Selected) {

    return $array2Selected[0] . '-' . $array2Selected[count($array2Selected)-1];
},

],



/** -----------------------------------------------------------------------------------
 * A question, 2.7
 */
[

"text" => <<<EOD
Create a variable 'array21' as a clone of 'array2'. Sort 'array21'. Answer with the resulting array.  

(Hint: http://stackoverflow.com/questions/3978492/javascript-fastest-way-to-duplicate-an-array-slice-vs-for-loop)
EOD
,

"answer" => function () use ($array2Selected) {

    $a = $array2Selected;
    sort($a);

    return $a;
},

],



/** -----------------------------------------------------------------------------------
 * A question, 2.8
 */
[

"text" => <<<EOD
Create a new array 'messageOfToday'. It should contain all items from 'array2' where each item is concatenated with the string ' is good for you!'. Use the built-in array-function 'forEach()' to solve it. Each sentence shold start with a capital letter.  

Answer with the resulting array.
EOD
,

"answer" => function () use ($array2Selected) {

    $a = array();
    $str = "";
    foreach ($array2Selected as $val) {
        $a[] = ucfirst($val) .  " is good for you!";
    }

    return $a;
},

],



/** ---------------------------------------------------------------------------
 * Closing up this section.
 */
], // EOF questions
], // EOF section



/** ===================================================================================
 * New section of exercises.
 */
[
"title" => "Modify arrays",

"intro" => <<<EOD
Let us modify some arrays!
EOD
,

"shuffle" => false,

"questions" => [




/** -----------------------------------------------------------------------------------
 * A question, 3.1
 */
[

"text" => <<<EOD
Create a new array 'myArray' and make it a copy of 'array1'. Get the last element from 'myArray' using the built-in array-function 'pop()'.  

Answer with the resulting array.
EOD
,

"answer" => function () use ($array1Selected) {

    $a = $array1Selected;
    array_pop($a);

    return $a;
},

],




/** -----------------------------------------------------------------------------------
 * A question, 3.2
 */
[

"text" => <<<EOD
Add the boolean value 'true' to the array 'myArray' using built-in array-function 'push()'.  

Answer with the resulting array.
EOD
,

"answer" => function () use ($array1Selected) {

    $a = $array1Selected;
    array_pop($a);
    array_push($a, true);

    return $a;
},

],



/** -----------------------------------------------------------------------------------
 * A question, 3.3
 */
[

"text" => <<<EOD
Use the built-in array-function 'shift()' to remove the first item from the array 'myArray'.  

Answer with the resulting array.
EOD
,

"answer" => function () use ($array1Selected) {

    $a = $array1Selected;
    array_pop($a);
    array_push($a, true);
    array_shift($a);

    return $a;
},

],



/** -----------------------------------------------------------------------------------
 * A question, 3.4
 */
[

"text" => <<<EOD
Add the float number '3.14' to the beginning of 'myArray' using built-in array-function 'unshift()'.  

Answer with the resulting array.
EOD
,

"answer" => function () use ($array1Selected) {

    $a = $array1Selected;
    array_pop($a);
    array_push($a, true);
    array_shift($a);
    array_unshift($a, 3.14);

    return $a;
},

],



/** -----------------------------------------------------------------------------------
 * A question, 3.5
 */
[

"text" => <<<EOD
Change 'myArray' element 3 and 4 to the boolean value 'false' using built-in array-function 'splice()'.  

Answer with the resulting array.
EOD
,

"answer" => function () use ($array1Selected) {

    $a = $array1Selected;
    array_pop($a);
    array_push($a, true);
    array_shift($a);
    array_unshift($a, 3.14);
    $a[2] = false;
    $a[3] = false;

    return $a;
},

],



/** -----------------------------------------------------------------------------------
 * A question, 3.6
 */
[

"text" => <<<EOD
Extract the last two elements as a slice from 'myArray' using built-in array-function 'slice()'.  

Answer with the slice array.
EOD
,

"answer" => function () use ($array1Selected) {

    $a = $array1Selected;
    array_pop($a);
    array_push($a, true);
    array_shift($a);
    array_unshift($a, 3.14);
    $a[2] = false;
    $a[3] = false;
    $a = array_slice($a, -2);

    return $a;
},

],



/** -----------------------------------------------------------------------------------
 * A question, 3.7
 */
[

"text" => <<<EOD
Remove item 4 and 5 in 'myArray'. Answer with the resulting array.
EOD
,

"answer" => function () use ($array1Selected) {

    $a = $array1Selected;
    array_pop($a);
    array_push($a, true);
    array_shift($a);
    array_unshift($a, 3.14);
    $a[2] = false;
    $a[3] = false;
    unset($a[3]);
    unset($a[4]);

    return array_values($a);
},

],



/** -----------------------------------------------------------------------------------
 * A question, 3.8
 */
[

"text" => <<<EOD
Insert the string 'MEGA' after item 3 in 'myArray'. Answer with the resulting array.
EOD
,

"answer" => function () use ($array1Selected) {

    $a = $array1Selected;
    array_pop($a);
    array_push($a, true);
    array_shift($a);
    array_unshift($a, 3.14);
    $a[2] = false;
    $a[3] = false;
    unset($a[3]);
    unset($a[4]);
    array_splice($a, 3, 0, "MEGA");

    return $a;
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
"title" => "Create object",

"intro" => <<<EOD
Start by creating an empty object called 'person' by using the object literal.
EOD
,

"shuffle" => false,

"questions" => [



/** -----------------------------------------------------------------------------------
 * A question, 4.1
 */
[

"text" => <<<EOD
Give your person-object the property 'firstName' with a value of '$person1FirstName'. Add a method called 'print1()' that returns a presentation of the object, like this: 'My name is $person1FirstName.' Use 'this.firstName' to construct the string.  

Answer with the result from calling 'person.print1()'.
EOD
,

"answer" => function () use ($person1Print1) {

    return $person1Print1;
},

],



/** -----------------------------------------------------------------------------------
 * A question, 4.2
 */
[

"text" => <<<EOD
Add properties 'lastName' and 'nationality' to your person-object. Their values should be '$person1LastName' and '$person1Nationality'. Create the method 'person.print2()' which should say: '$person1Print2'.  

Answer with a call to person.print2().
EOD
,

"answer" => function () use ($person1Print2) {

    return $person1Print2;
},

],



/** -----------------------------------------------------------------------------------
 * A question, 4.3
 */
[

"text" => <<<EOD
Add the property 'born' with the value of a Date object: '$person1BornFormat'. Create a method 'print3()' that says exactly the same as 'print2()' followed by '$person1Print3'.  

Answer with a call to person.print3().
EOD
,

"answer" => function () use ($person1Print2, $person1Print3) {

    return $person1Print2 . " " . $person1Print3;
},

],



/** -----------------------------------------------------------------------------------
 * A question, 4.4
 */
[

"text" => <<<EOD
Create a second person, called 'person2' by using built-in function 'Object.create()' with your 'person'-object. The person2 should have the following properties: '$person2FirstName, $person2LastName, $person2Nationality, $person2BornFormat'.  

Print out details on the second person using 'person2.print3()'.
EOD
,

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

"intro" => <<<EOD
Like it says, more on objects.
EOD
,

"shuffle" => false,

"questions" => [



/** -----------------------------------------------------------------------------------
 * A question, 5.1
 */
[

"text" => <<<EOD
Create a object called 'shape' with the properties: 'x', 'y', 'height', 'width' and 'print'. Create a new object from 'shape' called 'shape1' and initiate the properties with: x:$x1, y:$y1, height:$h1, width: $w1. Use the 'print' method to print out the assigned values as: 'x:?, y:?, height:?, width:?'.  

Answer with a call to shape.print().
EOD
,

"answer" => function () use ($x1, $y1, $h1, $w1) {

    return "x:$x1, y:$y1, height:$h1, width:$w1";
},

],



/** -----------------------------------------------------------------------------------
 * A question, 5.2
 */
[

"text" => <<<EOD
Create a method 'shape.init(x, y, height, width)' that helps you to initiate a object. Try it out by re-initing 'shape1' using the method.   

Answer with 'shape1.print()'.
EOD
,

"answer" => function () use ($x1, $y1, $h1, $w1) {

    return "x:$x1, y:$y1, height:$h1, width:$w1";
},

],



/** -----------------------------------------------------------------------------------
 * A question, 5.3
 */
[

"text" => <<<EOD
Create another object from 'shape' called 'shape2' and initiate the properties with: x:$x2, y:$y2, height:$h2, width: $w2.  

Use the 'print' method to print out the assigned values.
EOD
,

"answer" => function () use ($x2, $y2, $h2, $w2) {

    return "x:$x2, y:$y2, height:$h2, width:$w2";
},

],



/** -----------------------------------------------------------------------------------
 * A question, 5.4
 */
[

"text" => <<<EOD
Create a method in 'shape' that calculates and returns the area of the shape. Try it out by calling it for 'shape1' and 'shape2'.  

Answer with both values, separated by ', '. (notice the comma+space)
EOD
,

"answer" => function () use ($a1, $a2) {

    return "$a1, $a2";
},

],



/** -----------------------------------------------------------------------------------
 * A question, 5.5
 */
[

"text" => <<<EOD
Create a method 'shape.overlapPoint(posX, posY)' that checks if a position x, y is within the current shape. Or, the shape overlaps that position. The shapes position x and y is top left of the shape. Return true or false. Test by checking if x:$x3, y:$y3 is within 'shape1' and if x:$x4, y:$y4 is within 'shape2'.  

Return the result separated by ', '. (notice the comma+space)
EOD
,

"answer" => function () use ($a1, $a2) {

    return "true, false";
},

],



/** -----------------------------------------------------------------------------------
 * A question, 5.6
 */
[

"text" => <<<EOD
Create a method 'shape.overlapShape()' that takes a shape as argument and checks if the shapes overlaps (colliding bodies). Return true or false. Create a new 'shape3' and initiate the properties with: x:$x5, y:$y5, height:$h5, width: $w5.  

Return the result from checking 'shape1.overlapShape(shape3)'.
EOD
,

"answer" => function () {

    return true;
},

],



/** -----------------------------------------------------------------------------------
 * A question, 5.7
 */
[

"text" => <<<EOD
Create a method 'shape.move(moveX, moveY)' which moves the shape from its current position by adding 'x += moveX' and 'y += moveY'. Try it out by moving 'shape3' using 'moveX: $w1, moveY: $h1'.  

Re-check if the bodies 'shape1' and 'shape3' collides.
EOD
,

"answer" => function () {

    return false;
},

],



/**
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
