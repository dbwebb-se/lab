<?php

/**
 * Titel and introduction to the lab.
 */
include __DIR__ . "/../random.php";

// basic functions 

// SECTION 1

$num1      = rand_int(1, 999); //10; // 1-999
$num2      = rand_int(1, 999); //6;  // 1-999
$num3      = rand_int(100, 999); //6;  // 1-999

$range1    = rand_int(10, 49);
$range2    = rand_int(60, 99);

$colors = ['red', 'blue', 'green', 'black', 'purple', 'yellow', 'pink', 'grey', 'brown', 'white'];
$color = $colors[rand_int(0, count($colors)-1)];

$degree = rand_int(1, 360);

$range3    = rand_int(20, 29);
$range4    = rand_int(40, 49);
$range5    = rand_int(100, 199);
$range6    = rand_int(500, 599);
$inRange   = rand_int(200, 499);
$outRange  = rand_int(600, 699);

$fruits             = ["banana", "apple", "kiwi", "plum"];
$fruitColors        = ["yellow", "green", "green", "red"];
$fruitString        = implode(", ", $fruits);
$fruitColorString   = implode(", ", $fruitColors);
$fruitWhich         = rand_int(0, count($fruits)-1);
$fruit              = $fruits[$fruitWhich];
$fruitColor         = $fruitColors[$fruitWhich];

$wordSerie2 = ['red', 'blue', 'green', 'black', 'purple', 'yellow', 'pink', 'grey', 'brown', 'white'];
$smallRandNr = rand_int(0, count($wordSerie2)-1); // 0-9
$smallRand2 = $smallRandNr+5;
$currWord = $wordSerie2[$smallRandNr];

$money = rand_int(500, 999);
$years = rand_int(10, 50);
$interest = rand_int(1, 5);

$fbStart    = rand_int(1, 5); // 1-5
$fbStop     = rand_int(20, 30); //25; // 20-30

// SECTION 2 Black jack

$handSize = 5;
$card1 = rand_int(1, 11);
$card2 = rand_int(1, 11);
$card3 = rand_int(1, 11);
$card4 = rand_int(1, 11);
$card5 = rand_int(1, 11);
$cardSum = $card1+$card2+$card3;
$dealer1 = rand_int(1, 11);
$dealer2 = rand_int(1, 11);
$dealer3 = rand_int(1, 11);
$dealerSum = $dealer1+$dealer2+$dealer3;

// are these used? maybe... rewrite exercises and move above this comment
/*

cant see them used when ctrl-f them. do not dare to remove them...

$numberOne      = rand_int(1, 999); //10; // 1-999
$numberTwo      = rand_int(1, 999); //6;  // 1-999
$numberThree    = rand_int(100, 999); //56; // 100-999
$floatTwo = 5.22; // 100-999
$lowNr = 15; // 0 - 100
$highNr = 625; // 500 - 999
$smallNr = 2; // 1-5
$qRandNr = 2; // 0-4 for the questions
$monthNr = 7; // 1-12
$serie1 = [347, -221, 54, 435];  // 100-999
$wordSerie2 = ['red', 'blue', 'green', 'black', 'purple', 'yellow', 'pink', 'grey', 'brown', 'white'];
$questionSerie1 = ['How are you?', 'How is the weather?', 'What is your name?', 'Where are you going?', 'Where are you from?'];
$answerSerie1 = ['I have never been better.', 'Cloudy, with a chance of meatballs', 'I am Batman', 'I am going to Gotham City', 'Krypton'];
*/


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
<p>Create a function called 'sumNumbers()'. The function should take two arguments and return the sum of them. Test the function using the arguments $num1 and $num2. Answer with the result.
</p>",

"answer" => function () use ($num1, $num2) {

    return $num1 + $num2;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Create a function called 'productNumbers()'. The function should take three arguments and return the product of them. Try the function using the numbers $num1, $num2 and $num3. Answer with the result.
</p>",

"answer" => function () use ($num1, $num2, $num3) {
    
    return $num1 * $num2 * $num3;
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
<p>Create a function called 'fruitColor()' that takes one argument called 'fruit' and returns the color of the fruit. The function should be aware of the following fruits ($fruitString) with respective color ($fruitColorString). Try it out using the fruit '$fruit' and answer with the result.
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
<p>Create a function 'printRangeReversed()' that takes two arguments 'rangeStart' and 'rangeStop' and returns a string with all numbers in reversed order, comma-separated in the range. Try it using the arguments $range4 and $range3. Answer with the result.
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

"text" => "
<p>Create a function called 'stringRepeat()' that returns a string a specific number of times. The function should take two arguments, one string and one number: '$currWord' and $smallRand2. The number represents the number of times the string should be added to a string. Test the function and answer with the result.
</p>
",

"answer" => function () use ($currWord, $smallRand2) {
    
    $result = '';

    for($i = 0; $i < $smallRand2; $i++) {
        $result .= $currWord;
    }
    return $result;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Create a function called 'calculateInterest()' that returns the money you have after x years of interest, given three arguments: $money, $years and $interest. First argument represents the start money, the second argument represents the number of years your money produces interest. The third argument is the interest rate in percent (%). Test your function and answer with the result with a maximum of 4 decimals. 
</p>
",

"answer" => function () use ($money, $years, $interest) {
   
    $result = $money; 
    $currentInterest = 0;

    for($i = 0; $i < $years; $i++) {
        $currentInterest = ($result / 100) * $interest;
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
<p>Create a function called 'degreesToRadians()' that should take one argument, a degree value. The function should convert the value to radians and return the result with max 4 decimals. Test your function with the value $degree and answer with the result.  
</p>",

"answer" => function () use ($degree) {
    
    return round(($degree * (pi()/180)), 4);
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Create a function called 'fizzBuzz()' that takes two arguments 'start' and 'stop' and returns a comma-separated string. The arguments represents the starting point and stop point of the game 'Fizz Buzz' (http://en.wikipedia.org/wiki/Fizz_buzz). The function should run from start to stop and add 'Fizz', 'Buzz' or both to your 'result'-variable at appropriate numbers. Each entry to your result should be comma-separated. If 'stop' is equal or lower than 'start', the function should return an appropriate error message. Test the function using start=$fbStart and stop=$fbStop.
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

[
"title" => "Black jack functions",

"intro" => "
<p>In this section, you could re-use your code from lab 1
</p>
",

"shuffle" => false,

"questions" => [



/** -----------------------------------------------------------------------------------
 * A question.
 */

[

"text" => "
<p>Create a function called 'sumCards()' that should take two variables, the sum of the players hand and the sum of the dealers hand. Your hand should be three cards with the values: $card1, $card3 and $card3. The dealers hand should be three card with the values: $dealer1, $dealer2, $dealer3. The function should return the sum and the player: 'Player: $cardSum, Dealer: $dealerSum'. Test your function with the given values and answer with the result.
</p>
",

"answer" => function () use ($cardSum, $dealerSum) {

    return "Player: " . $cardSum . ", Dealer: " . $dealerSum;

},

],


/** -----------------------------------------------------------------------------------
 * A question.
 */

[

"text" => "
<p>Create a function called 'sumCards2()' that should take two variables, the sum of the players hand and the sum of the dealers hand. Players hand should be three cards with the values: $card1, $card3 and $card3. The dealers hand should be three card with the values: $dealer1, $dealer2, $dealer3. This time you should include the check from lab 1 where you find out the boundaries of the player and the dealer. Player hand = 21 ('black jack'), Player hand less than 21 ('safe'), Player hand larger than 21 ('busted'). Dealer hand less than 17 ('safe'), Dealer hand larger or equal to 17 and less than 21 ('stop'), Dealer hand = 21 ('black jack'), Delaer hand larger than 21 ('busted'). Return a string in the format: 'Player: safe, Dealer: busted'. Test your function with the given values and answer with the result.
</p>
",

"answer" => function () use ($cardSum, $dealerSum) {

    $d = "Dealer: ";
    $p = "Player: ";
    $res = "";

    if ($dealerSum < 17) {
        $d .= "safe";
    }
    else if ($dealerSum >= 17 && $dealerSum < 21) {
        $d .= "stop";
    }
    else if ($dealerSum === 21) {
        $d .= "black jack";
    }
    else {
        $d .= "busted";
    }

    if ($cardSum < 21) {
        $p .= "safe";
    }
    else if ($cardSum === 21) {
        $p .= "black jack";
    }
    else if ($cardSum > 21) {
        $p .= "busted";
    }
    return $p . ", " . $d;

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
