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
// $s2_ac1Owner = $arrayNames[rand_int(2, count($arrayNames) - 1) - 2];
// $s2_acBalance = rand_int(100, 200);
// $s2_firstDeposit = rand_int(50, 100);
// $s2_balanceAfterFirstDeposit = $s2_acBalance + $s2_firstDeposit;
// $s2_firstWithdraw = rand_int(30, 70);
// $s2_ac2Owner = $arrayNames[rand_int(3, count($arrayNames) - 1) - 3];
// $s2_2balanceAfterFirstWithdraw = $s2_acBalance - $s2_firstWithdraw;
// $s2_ac1PlusAc2 = $s2_balanceAfterFirstDeposit + $s2_2balanceAfterFirstWithdraw;
// $s2_ba2PlusBa1PlusFloat = $s2_ac1PlusAc2 + $s2_2balanceAfterFirstWithdraw + 5;

// $s1_listYear        = [1993, 1994, 1996, 2000, 2003, 2005, 2010, 2013, 2014, 2016];
// $s1_listMonth       = ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10" , "11", "12"];
// $s1_listDay         = ["1", "2", "4", "6", "7", "8", "9", "11", "13", "14", "16", "17", "18", "20", "23", "26", "28", "30"];
// $s1_year            = $s1_listYear[rand_int(0, count($s1_listYear)-1)];
// $s1_month           = $s1_listMonth[rand_int(0, count($s1_listMonth)-1)];
// $s1_day             = $s1_listDay[rand_int(0, count($s1_listDay)-1)];
// $s1_year2           = $s1_listYear[rand_int(1, count($s1_listYear)-1)];
// $s1_month2          = $s1_listMonth[rand_int(1, count($s1_listMonth)-1)];
// $s1_day2            = $s1_listDay[rand_int(1, count($s1_listDay)-1)];

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



// /** -----------------------------------------------------------------------------------
//  * A question.
//  */
// [
// 
// "text" => <<<EOD
// Create a private variable for the Cat class called `evil`.  
// In the constructor the variable should be set to `True` by default if no argument is given.
// 
// Create a function in the class that returns if the cat is evil or not. 
// 
// Answer with if the cat is evil or not.
// EOD
// ,
// 
// "answer" => function () {
// 
//     return true;
// },
// 
// ],



// /** -----------------------------------------------------------------------------------
//  * A question.
//  */
// [
// 
// "text" => <<<EOD
// In the code below create a function that takes a Cat object as an argument. If variable `evil` for Cat is true, return "All cats are evil!" otherwise return "This cat is not evil!".
// 
// Answer with the returned string.
// EOD
// ,
// 
// "answer" => function () {
// 
//     return "All cats are evil!";
// },
// 
// ],



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


// /** ===================================================================================
//  * New section of exercises.
//  */
// [
// "title" => "Inheritance",
// 
// "intro" => <<<EOD
// 
// EOD
// ,
// 
// "shuffle" => false,
// 
// "questions" => [
// 
// 
// 
// /** -----------------------------------------------------------------------------------
//  * A question.
//  */
// [
// 
// "text" => <<<EOD
// Create a new class, Animal, that will act as a *parent* to Cat and Dog.  
// The Animal class shall contain the variables `name` and `eyeColor` instead of the Cat and Dog classes.  
// Rewrite Dog and Cat so that they inherit from Animal.
// 
// Answer with the description from `cat` and `dog`, seperated with space.
// EOD
// ,
// 
// "answer" => function () use ($s1_catName, $s1_catEyeColor, $s1_livesLeft, $s1_dogName, $s1_dogEyeColor) {
// 
// 	return "My cats name is $s1_catName, has $s1_catEyeColor eyes and $s1_livesLeft lives left to live. My dogs name is $s1_dogName, has $s1_dogEyeColor eyes and 1 lives left to live.";
// 
// },
// 
// ],
// 
// 
// 
// /** -----------------------------------------------------------------------------------
//  * A question.
//  */
// [
// 
// "text" => <<<EOD
// Create a new function in Animal named `speak`, *force* child classes to override it. 
// 
// Overwrite it in Dog and Cat. In dog return "Voff" and in cat "Meow".
// 
// Create another function in Animal called `speakTwice`. It should return a string where `self.speak` is called twice, with space as seperation between the two.
// 
// Answer with `speakTwice` for $s3_animalSpeak.
// EOD
// ,
// 
// "answer" => function () use ($s3_animalSpeak) {
// 
//     if($s3_animalSpeak == "cat"){
// 	   return "Meow Meow";
//    }else{
//        return "Voff Voff";
//    }
// },
// 
// ],
// 
// 
// 
// /** -----------------------------------------------------------------------------------
//  * A question.
//  */
// [
// 
// "text" => <<<EOD
// Create a static method in Dog called `interact`. Its input parameter should be an object.
// If the argument is of class Cat return the string "Chase!" otherwise return "Lick!".
// 
// Answer with dog interact function and pass $s3_animalSpeak as argument.
// EOD
// ,
// 
// "answer" => function () use ($s3_animalSpeak) {
// 
// 	if($s3_animalSpeak == "cat"){
// 	   return "Chase!";
//    }else{
//        return "Lick!";
//    }
// 
// },
// 
// ],
// 
// /**
//  * Closing up this section.
//  */
// ], // EOF questions
// ], // EOF section


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



// /** -----------------------------------------------------------------------------------
//  * A question.
//  */
// [
// 
// "text" => <<<EOD
// Create a new class called BankAccount.
// 
// Declare the variables `balance` and `owner` in the constructor. `owner` should be a private variable.
// 
// The constructor should take the name for the owner as argument. Balance should be initalized to `$s2_acBalance` in the constructor.
// 
// BankAccount should also have four functions: `accountInfo` `getBalance`, `depositMoney` and `withdrawMoney`.  
// accountInfo returns "`$s2_ac1Owner` has `$s2_balanceAfterFirstDeposit` kr".  
// getBalance returns the balance.  
// depositMoney takes one argument, `amount`, and adds the amount to the balance.  
// withdrawMoney draws the `amount` of money sent as an argument from balance.
// 
// In the code below create a function, where you create a *new instance of the class BankAccount*, the function should take the `owner` name as argument, and return the created object.
// 
// Create a new variable called `bankAccount1` and initialize it with the create bank account function, name the owner "$s2_ac1Owner".  
// Deposit `$s2_firstDeposit` kr to the account and answer with the `accountInfo` function.
// EOD
// ,
// 
// "answer" => function () use ($s2_balanceAfterFirstDeposit, $s2_ac1Owner) {
// 
//     return "$s2_ac1Owner has $s2_balanceAfterFirstDeposit kr";
// },
// 
// ],
// 
// 
// /** -----------------------------------------------------------------------------------
//  * A question.
//  */
// [
// 
// "text" => <<<EOD
// Overload the *add(+)* function for the BankAccount class. The function should be able to sum the balance of two bank accounts (BankAccount + BankAccount) and BankAccount + an int.  
// 
// Initiate a new BankAccount called `bankAccount2` with the owner "$s2_ac2Owner" and withdraw `$s2_firstWithdraw` kr from it. 
// 
// Answer with `bankAccount1 + bankAccount2`.
// EOD
// ,
// 
// "answer" => function () use ($s2_ac1PlusAc2) {
// 
// 	return $s2_ac1PlusAc2;
// },
// 
// ],
// 
// 
// /** -----------------------------------------------------------------------------------
//  * A question.
//  */
// [
// 
// "text" => <<<EOD
// Overload the *iadd(+=)* function for the BankAccount class. The function should be able to add two bank accounts together (BankAccount += BankAccount) and BankAccount += an int.
// 
// Update `bankAccount1` with `bankAccount1 += bankAccount2`. 
// 
// Answer with `accountInfo` for bankAccount1.
// EOD
// ,
// 
// "answer" => function () use ($s2_ac1Owner, $s2_ac1PlusAc2) {
// 
// 	return "$s2_ac1Owner has $s2_ac1PlusAc2 kr";
// },
// 
// ],
// 
// 
// /** -----------------------------------------------------------------------------------
//  * A question.
//  */
// [
// 
// "text" => <<<EOD
// If you look in the `iadd` and `add` functions for BankAccount you should be using basically the same code in both functions.  
// To minize code size of the class, create a private function where you do the shared calculations and then call it from `iadd` and `add`.
// 
// calculate `bankAccount2 += bankAccount1 + 5`.
// 
// Answer with bankAccount2.accountInfo()
// EOD
// ,
// 
// "answer" => function () use ($s2_ba2PlusBa1PlusFloat, $s2_ac2Owner) {
// 
// 	return "$s2_ac2Owner has $s2_ba2PlusBa1PlusFloat kr";
// },
// 
// ],


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
