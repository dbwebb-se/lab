<?php

/**
 * Titel and introduction to the lab.
 */
include __DIR__ . "/../random.php";

// basic functions
$numberOne      = rand_int(1, 999); //10; // 1-999
$numberTwo      = rand_int(1, 999); //6;  // 1-999
$numberThree    = rand_int(100, 999); //56; // 100-999

$range1    = rand_int(10, 49);
$range2    = rand_int(60, 99);
$range3    = rand_int(20, 29);
$range4    = rand_int(40, 49);
$range5    = rand_int(100, 199);
$range6    = rand_int(500, 599);
$inRange   = rand_int(200, 499);
$outRange  = rand_int(600, 699);

$colors = ['red', 'blue', 'green', 'black', 'purple', 'yellow', 'pink', 'grey', 'brown', 'white'];
$color = $colors[rand_int(0, count($colors)-1)];

$fruits             = ["banana", "apple", "kiwi", "plum"];
$fruitColors        = ["yellow", "green", "green", "red"];
$fruitString        = implode(", ", $fruits);
$fruitColorString   = implode(", ", $fruitColors);
$fruitWhich         = rand_int(0, count($fruits)-1);
$fruit              = $fruits[$fruitWhich];
$fruitColor         = $fruitColors[$fruitWhich];

$fbStart    = rand_int(1, 5); // 1-5
$fbStop     = rand_int(20, 30); //25; // 20-30


// are these used? maybe... rewrite exercises and move above this comment
$floatTwo = 5.22; // 100-999
$lowNr = 15; // 0 - 100
$highNr = 625; // 500 - 999
$smallNr = 2; // 1-5
$smallRandNr = 5; // 0-9
$qRandNr = 2; // 0-4 for the questions
$monthNr = 7; // 1-12

$serie1 = [347, -221, 54, 435];  // 100-999
$wordSerie2 = ['red', 'blue', 'green', 'black', 'purple', 'yellow', 'pink', 'grey', 'brown', 'white'];
$questionSerie1 = ['How are you?', 'How is the weather?', 'What is your name?', 'Where are you going?', 'Where are you from?'];
$answerSerie1 = ['I have never been better.', 'Cloudy, with a chance of meatballs', 'I am Batman', 'I am going to Gotham City', 'Krypton'];



return [



/**
 * Titel and introduction to the lab.
 */
"title" => "Lab 2 - javascript1",

"intro" => "
<p>Practice to write functions.
</p>
",


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
 * A question.
 */
[

"text" => "
<p>Create a function called 'sumNumbers()'. The function should take two arguments and return the sum of them. Test the function using the arguments $numberOne and $numberTwo. Answer with the result.
</p>",

"answer" => function () use ($numberOne, $numberTwo) {

    return $numberOne + $numberTwo;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Create a function 'productNumbers()'. The function should take three arguments and return the product of them. Try the function using the numbers $numberOne, $numberTwo and $numberThree. Answer with the result.
</p>",

"answer" => function () use ($numberOne, $numberTwo, $numberThree) {
    
    return $numberOne * $numberTwo * $numberThree;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Create a function 'sumRangeNumbers()' that returns the sum of all numbers between two chosen numbers. The function should take two arguments, one representing the lowest boundary and one that represents the highest boundary. For example, the arguments 10 and 20 should return the sum of 10+11+12+13...+20. Test it using the values $range1 and $range2 and answer with the result.
</p>",

"answer" => function () use ($range1, $range2) {

    $result = 0;
    for($i = $range1; $i <= $range2; $i++) {
            $result += $i;
    }
    return $result;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Create a function 'stringPhrase()' that returns a phrase. Your word is '$color'. Pass the word as an argument to the function and the returned phrase should be: 'My favorite color is $color.'. Test your function and answer with the result.
</p>",

"answer" => function () use ($color) {

    return 'My favorite color is ' . $color . ".";
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
/*
[

"text" => "
<p>Create a function that returns an answer to the exact question "' . $questionSerie1[$qRandNr] . '". The answer should be "' . $answerSerie1[$qRandNr] . '". If the question is otherwise, the function should return "I do not understand". Name the function "stringResponse" and answer with the result.
</p>",

"answer" => function () use ($questionSerie1, $answerSerie1, $qRandNr) {

    $result = '';
    for($i = 0; $i < count($questionSerie1); $i++) {
        if($questionSerie1[$qRandNr] === $questionSerie1[$i]) {
            $result = $answerSerie1[$i];
        }
    }
    return $result;
    
},

],
*/




/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Create a function 'fruitColor()' that takes one argument called 'fruit' and returns the color of the fruit. The function should be aware of the following fruits ($fruitString) with respective color ($fruitColorString). Try it out using the fruit '$fruit' and answer with the result.
</p>",

"answer" => function () use ($fruitColor) {

    $result = $fruitColor;
    return $result;
    
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Create a function 'printRange()' that takes two arguments 'rangeStart' and 'rangeStop' and returns a string with all numbers comma-separated in the range. Try it using the arguments $range3 and $range4. Answer with the result.
</p>",

"answer" => function () use ($range3, $range4) {
    
    $range = range($range3, $range4);
    $result = implode(",", $range);

    return $result;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Create a function 'printRangeReversed()' that takes two arguments 'rangeStart' and 'rangeStop' and returns a string with all numbers comma-separated in the range. Try it using the arguments $range4 and $range3. Answer with the result.
</p>",

"answer" => function () use ($range3, $range4) {
    
    $range = range($range4, $range3, -1);
    $result = implode(",", $range);

    return $result;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Create a function 'printAnyRange()' that takes two arguments 'rangeStart' and 'rangeStop' and returns a string with all numbers comma-separated in the range. If 'rangeStart' is smaller than 'rangeStop' the call the function 'printRange()'.  If 'rangeStart' is greater than 'rangeStop' the call the function 'printRangeReversed()' Try it using the arguments $range3 and $range4 (both ways). Answer with the result using arguments $range3 and $range4.
</p>",

"answer" => function () use ($range3, $range4) {
    
    if ($range3 < $range4) {
        $range = range($range3, $range4);
        $result = implode(",", $range);
    } else if ($range3 > $range4) {
        $range = range($range3, $range4, -1);
        $result = implode(",", $range);
    }

    return $result;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
/*
[

"text" => "
<p>Create a function that returns a string with all numbers comma-separated, in a range of: $range3 - $range4. Make sure that the order of the arguments should not matter. For example if the arguments are: 5 and 10, the function should print: 5,6,7,8,9,10. If the arguments are: 10 and 5, the function should return: 10,9,8,7,6,5. If the arguments are the same, return out only that number. Name the function printRange and answer with the result.
</p>",

"answer" => function () use ($numberTwo, $numberThree) {
    
    $result = [];
    $res = "";
    $i = 0;

    if($numberThree < $numberTwo) {
        for($i = $numberThree; $i < $numberTwo+1; $i++) {
            array_push($result, i);
        }
    }
    else if($numberThree > $numberTwo) {
        for($i = $numberThree; $i > $numberTwo-1; $i--) {
            array_push($result, i);
        }
    }
    else {
        array_push($result, $numberThree);
    }
    $res = join(",", $result);

    return $res;
},

],
*/


/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => '
<p>Create a function that returns a string a specific number of times. The function should take 2 arguments, one string and one number: "' . $wordSerie2[$smallRandNr] . '" and ' . ($smallRandNr+5) . ' . The number represents the number of times the string should be added to a string. Name the function "stringRepeat" and answer with the result.
</p>
',

"answer" => function () use ($wordSerie2, $smallRandNr) {
    
    $result = '';

    for($i = 0; $i < $smallRandNr+5; $i++) {
        $result .= $wordSerie2[$smallRandNr];
    }
    return $result;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => '
<p>Create a function that returns the money you have, after years of interest, given three arguments: ' . $highNr . ', ' . $lowNr . ' and ' . $smallNr . '. First argument represents the start money, the second argument represents the number of years your money produces interest. The third argument is the interest rate in percent (%). Name the function "calculateInterest" and answer with the result with a maximum of 4 decimals. 
</p>
',

"answer" => function () use ($highNr, $lowNr, $smallNr) {
   
    $result = $highNr; 
    $currentInterest = 0;

    for($i = 0; $i < $lowNr; $i++) {
        $currentInterest = ($result / 100) * $smallNr;
        $result += $currentInterest; 
    }
    return round($result, 4);
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Create a function 'inRange()' that takes three arguments, 'rangeStart', 'rangeStop' and 'value'. The function should return boolean 'true' if 'value' is greater than 'rangeStart' and less than 'rangeStop'. Otherwise it should return boolean 'false'. Try it out using the range $range5 - $range6 and the value $inRange. Answer with the result.
</p>",

"answer" => function () use ($range5, $range6, $inRange) {
    
    $result = false;

    if($inRange > $range5 && $inRange < $range6) {
       $result = true;
    }
    return $result;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Try out the function 'inRange()' using the range $range5 - $range6 and the value $outRange. Answer with the result.
</p>",

"answer" => function () use ($range5, $range6, $outRange) {
    
    $result = false;

    if($outRange > $range5 && $outRange < $range6) {
       $result = true;
    }
    return $result;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Create a function 'fizzBuzz()' that takes two arguments 'start' and 'stop' and returns a comma-separated string. The arguments represents the starting point and stop point of the game 'Fizz Buzz' (http://en.wikipedia.org/wiki/Fizz_buzz). The function should run from start to stop and add 'Fizz', 'Buzz' or both to your 'result'-variable at appropriate numbers. Each entry to your result should be comma-separated. If 'stop' is equal or lower than 'start', the function should return an appropriate error message. Test the function using start=$fbStart and stop=$fbStop.
</p>",

"answer" => function () use ($fbStart, $fbStop) {
    
    $result = [];
    $res = "";

    if($fbStop <= $fbStart) {
        $result = 'Stop is lower than start or they are the same. Try again!';
    }
    else {
        for($i = $fbStart; $i < $fbStop+1; $i++) {
            if($i % 3 === 0 && $i % 5 !== 0) {
                array_push($result, "Fizz");
            }
            else if($i % 5 === 0 && $i % 3 !== 0) {
                array_push($result, "Buzz");
            }
            else if($i % 3 === 0 && $i % 5 === 0) {
                array_push($result, "Fizz Buzz");
            }
            else {
                array_push($result, $i);
            }
        }
    }
    $res = implode(",", $result);
    return $res;
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
/*
[
"title" => "Throw/catch exeptions",

"intro" => "
<p>something about it...
</p>
",

"shuffle" => false,

"questions" => [



/** -----------------------------------------------------------------------------------
 * A question.
 */
/*
[

"text" => '
<p>Create a function that takes one argument, "monthNr". Use the number: ' . $monthNr . '. The function should return the name of the month representing the passed value, for example: monthNr = 2 should return "February". Create an exception for values out of range such if monthNr < 1 and > 12. Name the function monthException and return the name of the month. Answer with the returned string.
</p>
',

"answer" => function () use ($monthNr) {

    function monthException($monthNr) {
        $newMonthNr = $monthNr -1;
        $months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

        if($newMonthNr < 0 || $newMonthNr >= 12) {
            throw new Exception('Month number ' . $monthNr . ' does not exist in this universe...yet.');
        }
        else{
            return $months[$newMonthNr];
        }
    }
    try {
        return monthException($monthNr);
    }
    catch (Exception $e){
        return 'Caught Exception: ' . $e->getMessage();
    }

},

],


/** -----------------------------------------------------------------------------------
 * A question.
 */
/*
[

"text" => '
<p>Create a function that takes one argument, ' . $numberOne . '. The function should return the string "EVEN" if the number is even. Create an exception if the number is odd. The message should be "NOT EVEN". Name the function "oddOrEven" and answer with the result as a string.
</p>
',

"answer" => function () use ($numberOne) {

    function oddOrEven($nr) {

        $result = "";
        if($nr % 2 === 0){
            $result = "EVEN";
            return $result;
        }
        else {
            throw new Exception("NOT EVEN");
        }
    }
    try {
        return oddOrEven($numberOne);
    }
    catch (Exception $e){
        return $e->getMessage();
    }
},

],


/** -----------------------------------------------------------------------------------
 * A question.
 */
/*
[

"text" => '
<p>Create a function called "colorCheck". The function should take one argument, a string with the color: "' . $wordSerie2[$smallRandNr] . '". Use try catch to print out "I do not have the color ' . $wordSerie2[$smallRandNr] . '" if it do not exist. If it exists, just return the color. The colors to check with are: "green", "red", "purple", "white" and "brown". 
</p>
',

"answer" => function () use ($wordSerie2, $smallRandNr) {

    function colorCheck($clr) {
        $result = '';
        if($clr === 'green' || $clr === 'red' || $clr === 'purple' || $clr === 'white' || $clr === 'brown'){
            $result = $clr;
        }
        else {
            throw new Exception("I do not have the color " . $clr . ".");
        }
        return $result;
    }
    try {
        return colorCheck($wordSerie2[$smallRandNr]);
    }
    catch (Exception $e){
        return $e->getMessage();
    }
},

],



/**
 * Closing up this section.
 */
/*
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
