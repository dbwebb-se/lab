<?php

/**
 * Titel and introduction to the lab.
 */
include LAB_INSTALL_DIR . "/config/random.php";

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




return [

"passPercentage" => 11/11,
"passDistinctPercentage" => 11/11,

"author" => ["lew", "aar"],

/**
 * Titel and introduction to the lab.
 */
"title" => "Lab 4 - javascript1",

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
"title" => "Arrays",

"intro" => <<<EOD
To copy an array use array.slice() to make a real copy, not a shallow one.
EOD
,

"shuffle" => false,

"questions" => [



/** -----------------------------------------------------------------------------------
 * A question, 1.1.
 */
[

"text" => <<<EOD
Create a variable `array2` holding an array with the words: `[$array2SelectedString]`. Return the element on position: `$array2Within` in array2.  

Answer with the result.
EOD
,

"points" => 1,

"answer" => function () use ($array2Selected, $array2Within) {
        
    return $array2Selected[$array2Within];
},

],



/** -----------------------------------------------------------------------------------
 * A question, 1.2.
 */
[

"text" => <<<EOD
Use the variable `array2`. Concatenate the first item and the last item as a string. Separate the string with `-`.  

Answer with the result.
EOD
,

"points" => 1,

"answer" => function () use ($array2Selected) {
        
    return $array2Selected[0] . '-' . $array2Selected[count($array2Selected)-1];
},

],



/** -----------------------------------------------------------------------------------
 * A question, 1.3.
 */
[

"text" => <<<EOD
Create an array, `array1`, with the items `$array1SelectedString`.

Merge the two arrays, `array1` and `array2`, into a third variable `array3`.

Answer with array3.
EOD
,

"points" => 1,

"answer" => function () use ($array1Selected, $array2Selected) {
    
    $result = array_merge($array1Selected, $array2Selected);
        
    return $result;
},

],



/** -----------------------------------------------------------------------------------
 * A question, 1.4.
 */
[

"text" => <<<EOD
Create a variable `array21` as a clone of `array2`.  
Sort `array21`.  
(Hint: http://stackoverflow.com/questions/3978492/javascript-fastest-way-to-duplicate-an-array-slice-vs-for-loop)

Answer with the resulting array.
EOD
,

"points" => 1,

"answer" => function () use ($array2Selected) {
    
    $a = $array2Selected;
    sort($a);
        
    return $a;
},

],




/** -----------------------------------------------------------------------------------
 * A question, 1.5.
 */
[

"text" => <<<EOD
Create a variable `array11` as a copy of `array1`.  
Sort `array11` according to its values. The smallest value comes first and the largest value comes last.  

Answer with the resulting array.
EOD
,

"points" => 1,

"answer" => function () use ($array1Selected) {
    
    $a = array();
    $a = $array1Selected;
    sort($a);
        
    return $a;
},

],




/** -----------------------------------------------------------------------------------
 * A question, 1.6.
 */
[

"text" => <<<EOD
Create a variable `array22` which holds the same content as `array2` - but all strings are uppercase.  
Use the built-in Array-function `map()` to solve it.  

Answer with the array.
EOD
,

"points" => 1,

"answer" => function () use ($array2Selected) {
    
    $result = array_map("strtoupper", $array2Selected);

    return $result;
},

],



/** -----------------------------------------------------------------------------------
 * A question, 1.7.
 */
[

"text" => <<<EOD
Create a new array, `array12`. It should contain all positive numbers from the `array1`.  
Use the built-in array-function `filter()` to solve it.  

Answer with the resulting array.
EOD
,

"points" => 1,

"answer" => function () use ($array1Selected) {
    
    $a = array_filter($array1Selected, function ($val) {
        return ($val > 0);
    });

    return array_values($a);
},

],



/** -----------------------------------------------------------------------------------
 * A question, 1.8.
 */
[

"text" => <<<EOD
Create a function `arrayAverage()` that takes one array as argument and returns the average of all elements in that array.  

Try out the function using `array1` and answer with the rounded integer result.
EOD
,

"points" => 1,

"answer" => function () use ($array1Selected) {
    
    $sum = 0;
    foreach ($array1Selected as $val) {
        $sum += $val;
    }

    return round($sum / count($array1Selected));
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
"title" => "Modify arrays",

"intro" => <<<EOD
Learn how to modify arrays.
EOD
,

"shuffle" => false,

"questions" => [




/** -----------------------------------------------------------------------------------
 * A question, 2.1.
 */
[

"text" => <<<EOD
Create a new array `myArray` and make it a copy of `array1`. Switch place on the first and the last element, with the help of built-in array-functions.  
Use the array-functions `pop(), push(), shift() and unshift()`.  

Answer with `myArray`.
EOD
,

"points" => 1,

"answer" => function () use ($array1Selected) {
    $a = $array1Selected;
    $last = array_pop($a);
    $first = array_shift($a);
    array_push($a, $first);
    array_unshift($a, $last);
    
    return $a;
},

],



/** -----------------------------------------------------------------------------------
 * A question, 2.2.
 */
[

"text" => <<<EOD
In `myArray` change the `3rd and 4th` value to the boolean value `false` using built-in array-function `splice()`.  

Answer with the resulting array.
EOD
,

"points" => 1,

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
 * A question, 2.3.
 */
[

"text" => <<<EOD
Remove the `4th and 5th` item in 'myArray'. Then insert the string `MEGA` after the item `3rd`. Answer with the resulting array.
EOD
,

"points" => 1,

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



/** -----------------------------------------------------------------------------------
 * Closing up all sections.
 */
] // EOF sections



/**
 * Closing up this lab.
 */
]; // EOF the enritre lab
