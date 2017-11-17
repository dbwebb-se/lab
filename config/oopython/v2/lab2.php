<?php

/**
 * Generate random values to use in lab.
 */
include LAB_INSTALL_DIR . "/config/random.php";

//SECTION 1 ****************************************************

$s1_present         = ["Ozelot", "Kvothe", "It's a very, very, merry, merry christmas. Gonna party on 'til Santa grants my wishes.", rand_int(10000, 15000)];
$s1_christPresent   = ["Pirate", "Zeldah", "You, oh, oh, a Christmas. My Christmas tree is delicious", rand_int(20000, 25000)];
$s1_compPresent     = ["Icecream", "Lew", "That's why I celebrate Christmas 'Cause this overweighted redneck devil is big business", rand_int(1, 20)];
$s1_searchStrings   = [
                    ["ew", "False False True "],
                    ["zel", "True False False "],
                    ["irat", "False True False "]
                    ];
$s1_searchString    = $s1_searchStrings[rand_int(0, count($s1_searchStrings) -1)];

$s1_dogNames        = ["Buster", "James", "Zimba", "Goliat"];
$s1_dogRaces        = ["Shitzu", "Cocker spaniel", "Rottweiler", "Grand danois"];
$s1_dogSizes        = ["small", "medium", "big", "big"];
$s1_dogDays         = [rand_int(5, 10), rand_int(7, 14), rand_int(5, 15), rand_int(20, 25)];
#$s1_dogOrders       = [
#                    [1,2,3,4],
#                    [2,4,1,3],
#                    [4,2,3,1],
#                    [3,2,1,4]
#                    ];
#$s1_dogOrder        = $s1_dogOrders[rand_int(0, count($s1_dogOrders) -1)];
$s1_dog1            = [$s1_dogNames[0], $s1_dogSizes[0], $s1_dogRaces[0], $s1_dogDays[0]];
$s1_dog2            = [$s1_dogNames[2], $s1_dogSizes[2], $s1_dogRaces[2], $s1_dogDays[2]];
$s1_dog3            = [$s1_dogNames[3], $s1_dogSizes[3], $s1_dogRaces[3], $s1_dogDays[3]];
#$s1_dog4            = [$s1_dogNames[1], $s1_dogSizes[1], $s1_dogRaces[1], $s1_dogDays[1]];
$s1_priceSmall      = rand_int(100, 120);
$s1_priceMedium     = rand_int(121, 150);
$s1_priceBig        = rand_int(151, 200);

return [



/**
 * Titel and introduction to the lab.
 */

"title" => "Lab 2 - oopython",

"intro" => <<<EOD

EOD
,


"sections" => [



/** ===========================================================================
 * New section of exercises.
 */
[
"title" => "More classes",

"intro" => <<<EOD
Practice more on creating classes in python.
EOD
,

"shuffle" => false,

"questions" => [



/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
For the next few exercises we will work on a dog kennel, we will have three classes when we are done, *Dog*, *DogType* and *Kennel*.

Create a new class called Dog. Declare the variables `name`, `size`, `race` and numberOfDays (to stay at kennel) in the constructor.  
Give it a method that returns a string of its information in the format "name: xxx, size: ccc, race: fff, nrOfDays: 000".

In the code below initialize a new Dog variable calle `dog1`, give it the name "$s1_dog1[0]", the size "$s1_dog1[1]", the race "$s1_dog1[2]" and `$s1_dog1[3]` days to stay.

Answer with the info method of `dog1`.
EOD
,

"answer" => function () use ($s1_dog1) {

    return "name: $s1_dog1[0], size: $s1_dog1[1], race: $s1_dog1[2], nrOfDays: $s1_dog1[3]";

},

],



/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
The next class that you will create will hold dogs of a certain type. Eg. small, medium or big sized.

Create a new class called DogType. In the constructor declare the variables `size`, `cost` (per day), `numberOfAllowedDogs` and a private list that will contain *Dog objects*. Declare the list containing `Dogs` to an empty list in the constructor.  
Give the class a new method called `addDog`, it should take a Dog object as parameter. In the method add the Dog to the list if you have room for it and it has the correct size. If you add the dog return `True` otherwise return `False`.

Initialize a new DogType variable in the code below, name it `smallDogs`, set `size` to "small", `cost` to `$s1_priceSmall` and `numberOfAllowedDogs` to `3`. 
Use the add method to add dog1.

Answer with the result from adding `dog1` to `smallDogs`.
EOD
,

"answer" => function () {
    return True;
},

],



/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
In the DogType class create a new method called `retrieveDog`, take a `name` as parameter. If the dogs name is the same as a dog  in the list remove it from the list and return the object, otherwise return `False`.

In the code below retrieve "$s1_dog1[0]" from `smallDogs`. 

Answer with the returned Dogs number of days stayed.
EOD
,

"answer" => function () use ($s1_dog1) {
    return $s1_dog1[3];
},

],



/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Time to make the Kennel class. Choose a way to store three *DogType objects*, a list, a dictionary or one variable for each. We will have the dog types `small`, `medium` and `big` dogs.  
In the constructor:  
Initialize the DogType for small dogs with size "small", cost `$s1_priceSmall` and numberOfAllowedDogs `3`.  
Initialize the DogType for medium dogs with size `medium`, cost `$s1_priceMedium` and numberOfAllowedDogs `2`.  
Initialize the DogType for big dogs with size `big`, cost `$s1_priceBig` and numberOfAllowedDogs `1`.

Create a method in Kennel that checks-in a new dog at the Kennel, it takes a *Dog object* as parameter. In the method add the dog to the appropriate DogType and return whats returned from the DogType `addDog` method.

In the code below initialize a new Kennel variable and check-in `dog1` to the kennel.

Answer with the result from the check-in.
EOD
,

"answer" => function () {
    return True;
},

],



/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Create a new method in the kennel class for checking out a Dog. It takes a `name` and `size` as parameter.  
In the method try to retrieve the dog from appropriate DogType with the DogType method `retrieveDog`. The check out method should return the `cost` for having the dog at the Kennel, aka days stayed * cost of size.

In the code below create a new Dog variable called `dog2`, give it the name "$s1_dog2[0]", the size "$s1_dog2[1]", the race "$s1_dog2[2]" and `$s1_dog2[3]` days to stay.  
Check-in `dog2` at the kennel and checkout `dog1`, "$s1_dog1[0]", "$s1_dog1[1]", from the Kennel.

Answer with the price of having `dog1` at the Kennel, the result from the check out method.
EOD
,

"answer" => function () use ($s1_dog1, $s1_priceSmall) {

    return $s1_dog1[3] * $s1_priceSmall;
},

],



/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Create a class named Present.  
Declare the variables `content` and `recipient` in the constructor.  
Give it a `info` method where you return "content: xxx, recipient: yyy".

Initialize a new Present variable in the code below named `present`. Give it the content "$s1_present[0]", recipient "$s1_present[1]".

Answer with the result from the `info` method.
EOD
,

"answer" => function () use ($s1_present) {

    return "content: $s1_present[0], recipient: $s1_present[1]";
},

],



/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Create a new class called ChristmasPresent it should *inherit from Present*.  
Give ChristmasPresent the variale `rhyme`. Use *super* to initiate the variables from the parent class (Present) with `content` and `recipient` from the constructor.

Override the `info` method from Present to return "content: xxx, recipient: yyy, rhyme: zzz". A tip, you can access the parent method with super and just add rhyme to the returned string and return that.

Create a new ChristmasPresent variable in the code below. Give it the content "$s1_christPresent[0]", recipient "$s1_christPresent[1]" and rhyme "$s1_christPresent[2]".

Answer with the christmas presents `info` method.
EOD
,

"answer" => function () use ($s1_christPresent) {
    
    return "content: $s1_christPresent[0], recipient: $s1_christPresent[1], rhyme: $s1_christPresent[2]";
},

],

/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Create a new class called CompanyPresent it should *inherit from Present*.  
Give CompanyPresent the variale `Cost`. Use "super" to initiate the variables from the parent class (Present) with content and recipient from the constructor.

Override the `info` method from Present to return "content: xxx, recipient: yyy, cost: zzz". A tip, you can access the parent method with super and just add cost to the returned string and return that.

Create a new CompanyPresent variable in the code below. Give it the content "$s1_compPresent[0]", recipient "$s1_compPresent[1]" and cost `$s1_compPresent[3]`.
EOD
,

"answer" => function () use ($s1_compPresent) {
    
    return "content: $s1_compPresent[0], recipient: $s1_compPresent[1], cost: $s1_compPresent[3]";
},

],


/** ---------------------------------------------------------------------------
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
