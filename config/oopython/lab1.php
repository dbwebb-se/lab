<?php

/**
 * Generate random values to use in lab.
 */
include __DIR__ . "/../random.php";

$arrayNames = ["Misty", "Buster", "Gordon", "Lilly", "Misha", "Nova", "Perrin", "Nynaeve", "Kvothe", "Denna", "Basion"];
$arrayEyeColors = ["Blue", "Green", "Brown", "Red", "Black"];
$arrayAnimal = ["dog", "cat"];

//SECTION 1 ****************************************************
$s1_catName = $arrayNames[rand_int(0, count($arrayNames) - 1)];
$s1_catEyeColor = $arrayEyeColors[rand_int(0, count($arrayEyeColors) - 1)];
$s1_livesLeft = rand_int(1, 9);
$s1_dogName = $arrayNames[rand_int(1, count($arrayNames) - 1) - 1];
$s1_dogEyeColor = $arrayEyeColors[rand_int(1, count($arrayEyeColors) - 1) - 1];
$s1_catNrOfPaws = rand_int(0, 3);

//SECTION 2 ****************************************************
$s2_ac1Owner = $arrayNames[rand_int(2, count($arrayNames) - 1) - 2];
$s2_acBalance = rand_float(100, 200, 2);
$s2_firstDeposit = rand_float(50, 100, 2);
$s2_balanceAfterFirstDeposit = $s2_acBalance + $s2_firstDeposit;
$s2_firstWithdraw = rand_float(30, 70, 2);
$s2_ac2Owner = $arrayNames[rand_int(3, count($arrayNames) - 1) - 3];
$s2_2balanceAfterFirstWithdraw = $s2_acBalance - $s2_firstWithdraw;
$s2_ac1PlusAc2 = $s2_balanceAfterFirstDeposit + $s2_2balanceAfterFirstWithdraw;
$s2_ba2PlusBa1PlusFloat = $s2_ac1PlusAc2 + rand_float(5, 20, 2);

//SECTION 3 ****************************************************
$s3_animalSpeak =$arrayAnimal[rand_int(0, 1)];

return [

/**
 * Titel and introduction to the lab.
 */
"title" => "Lab 1 - oopython",

"intro" => "
<p>If you need to peek at examples or just want to know more, take a look at the page: https://docs.python.org/3/library/index.html. Here you will find everything this lab will go through and much more.
</p>
",


"sections" => [



/** ===================================================================================
 * New section of exercises.
 */
[
"title" => "Objects and classes",

"intro" => "
<p>Basic object oriented python.</p>
",

"shuffle" => false,

"questions" => [



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Create a class called Cat in a new file. The Cat object should have the attributes eye color and name. Initiate a variable named cat with a Cat object, give it eye color $s1_catEyeColor and name $s1_catName. Answer with the string 'My cats name is <cat name> and has <cat eye color> eyes.'.
</p>
",

"answer" => function () use ($s1_catEyeColor, $s1_catName) {

    $result = "My cats name is $s1_catName and has $s1_catEyeColor eyes.";
    return $result;
},

],


/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Expand your Cat class with number of lives left. Initialize the attribute in the constructor to -1. In the code below set the attribute to $s1_livesLeft. Answer with number of lives the cat has left.
</p>
",

"answer" => function () use ($s1_livesLeft) {

    return $s1_livesLeft;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Create a new function in the Cat class, called description, that returns the string 'My cats name is <name>, has <color> eyes and has <livesLeft> lives left to live.' Answer with your cats function.
</p>
",

"answer" => function () use ($s1_catName, $s1_catEyeColor, $s1_livesLeft) {

    return "My cats name is $s1_catName, has $s1_catEyeColor eyes and has $s1_livesLeft lives left to live.";
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Create a new class named Dog, it should look the same as the Cat class. But in the description function it should print 'My dogs name...' instead of 'My cats name...'. In the constructor set lives left to live to 1. Initiate a new variable called dog with the Dog class, give dog the name $s1_dogName and eye color $s1_dogEyeColor. Put cat and dog variables in a list. Iterate through the list and put their discriptions together in a string and answer with it.
</p>
",

"answer" => function () use ($s1_catName, $s1_catEyeColor, $s1_livesLeft, $s1_dogName, $s1_dogEyeColor) {

    return "My cats name is $s1_catName, has $s1_catEyeColor eyes and has $s1_livesLeft lives left to live. My dogs name is $s1_dogName, has $s1_dogEyeColor eyes and has 1 lives left to live.";
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Create a private variable for the cat class called evil. In the constructor the variable should be set to true by default if no argument is given. Create a function in the class that returns if the cat is evil or not. Answer with if the cat is evil or not.
</p>
",

"answer" => function () {

    return round(true);
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>In the code below create a function that takes cat as an argument. If attribute evil for cat is true, return 'All cats are evil!' otherwise return 'This cat is not evil!' Answer with the returned string.
</p>
",

"answer" => function () {

    return "All cats are evil!";
},

],

/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Create a static variable in the Cat class. It should be an int that contains the number of paws a cat has, 4. In the code below assign the variable for cat1 to $s1_catNrOfPaws.
Answer with the string '<Misty> has cat1.nrOfPaws paws but cats have Cat.nrOfpaws paws'
</p>
",

"answer" => function () use ($s1_catName, $s1_catNrOfPaws) {

    return "$s1_catName has $s1_catNrOfPaws paws but cats have 4 paws";
},

],

/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Create a classmethod for the cat class. It should return 'Cats have class.nrOfPaws paws'. Answe with cat's new method.
</p>
",

"answer" => function () {

    return "Cats have 4 paws";
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
"title" => "Overloading methods",

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
<p>Create a new class called BankAccount. It give it the attributes balance and owner. Owner should be a private attribute. The constructor should take the name for the owner as argument. Balance should be initalized to $s2_acBalance in the constructor. Balance shall always have 2 decimals. It should also have three functions, showBalance, depositMoney and withdrawMoney. ShowBalance returns '<Owner> has <Balance> kr'. DepositMoney takes one argument, amount, and adds the amount to the balance. WithdrawMoney draws the amount of money sent as an argument from balance. In the code below create a function, where you create a new instance of the class BankAccount, that takes the owner name as argument, and returns the objects. Create a new variable called bankAccount1 and initialize it with the create bank account function, name the owner $s2_ac1Owner. Deposit $s2_firstDeposit kr to the account and answer with the showBalance function.
</p>
",

"answer" => function () use ($s2_balanceAfterFirstDeposit, $s2_ac1Owner) {

	return "$s2_ac1Owner has $s2_balanceAfterFirstDeposit kr";
},

],


/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Overload the add(+) function for the BankAccount class. It should work with the attribute balance of the account. The function should be able to sum the balance of two bank accounts(BankAccount + BankAccount), BankAccount + int and BankAccount + float. It should return a float with 2 decimals. Initiate a new BankAccount called bankAccount2 with the owner $s2_ac2Owner and withdraw $s2_firstWithdraw kr from it. Answer with bankAccount1 + bankAccount2.
</p>
",

"answer" => function () use ($s2_ac1PlusAc2) {

	return $s2_ac1PlusAc2;
},

],


/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Overload the iadd(+=) function for the BankAccount class. It should work with the currentBalance of the account. The function should be able to add two bank accounts together(add togehter the balance of the accounts), BankAccount + int and BankAccount + float. Update ba's account with += ba2. Answer with ba's showBalande function.
</p>
",

"answer" => function () use ($s2_ac1Owner, $s2_ac1PlusAc2) {

	return "$s2_ac1Owner has $s2_ac1PlusAc2 kr";
},

],


/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>If you look in the iadd and add functions for BankAccount you should be using basically the same code in both functions. To minize code size of the class, create a private function where you do those calculations and then call it from iadd and add.
calculate ba2 += ba + <5.20>
Answer with ba2.showBalance()
</p>
",

"answer" => function () use ($s2_ba2PlusBa1PlusFloat, $s2_ac2Owner) {

	return "$s2_ac2Owner has $s2_ba2PlusBa1PlusFloat kr";
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
"title" => "Inheritance",

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
<p>Create a new class, Animal, that will act as a parent to Cat and Dog. It shall have the attributes name and eye color instead of the Cat and Dog classes. Rewrite Dog and Cat so that they inherit from Animal. Answer with the description from cat and dog, seperated with space.
</p>
",

"answer" => function () use ($s1_catName, $s1_catEyeColor, $s1_livesLeft, $s1_dogName, $s1_dogEyeColor) {

	return "My cats name is $s1_catName, has $s1_catEyeColor eyes and has $s1_livesLeft lives left to live. My dogs name is $s1_dogName, has $s1_dogEyeColor eyes and has 1 lives left to live.";

},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>create a new function in Animal named speak, make it should be abstract. Overwrite it in Dog and Cat, in dog return 'Voff' and in cat 'Meow'. Create another function in Animal called speakTwice. It should return a string where self.speak is been called twice, with space as seperation between the two. Answer with $s3_animalSpeak's speakTwice function
</p>
",

"answer" => function () use ($s3_animalSpeak) {

    if($s3_animalSpeak == "cat"){
	   return "Meow Meow";
   }else{
       return "Voff Voff";
   }
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Create a static method in Dog called interact. Its input parameter should be another class, If the argument is of type Cat the string 'Chase!' should be returned otherwise
return 'Lick!'

Answer with dog's interact function and pass cat as argument.
</p>
",

"answer" => function () use ($s3_animalSpeak) {

	if($s3_animalSpeak == "cat"){
	   return "Chase!";
   }else{
       return "Lick!";
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
