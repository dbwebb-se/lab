<?php

/**
 * Generate random values to use in lab.
 */
include __DIR__ . "/../random.php";


// SECTION 1 ****************************************************
$s1_objects = 
[
['name'=>'Roo', 'animal'=>'kangaroo', 'appearIn'=>'Winnie the pooh', 'color'=>"brown"],
['name'=>'Eeyore', 'animal'=>'donkey', 'appearIn'=>'Winnie the pooh', 'color'=>'gray'],
['name'=>'Sid', 'animal'=>'sloth', 'appearIn'=>'Ice Age', 'color'=>'yellow'],
['name'=>'Manny', 'animal'=>'mammoth', 'appearIn'=>'Ice Age', 'color'=>'brown'],
['name'=>'Kermit', 'animal'=>'frog', 'appearIn'=>'The Muppets', 'color'=>'green']
];
$s1_objects2 =
[
['name'=>'Piglet', 'animal'=>'pig', 'appearIn'=>'Winnie-the-pooh', 'color'=>'pink'],
['name'=>'Stripe', 'animal'=>'gremlin', 'appearIn'=>'Gremlins', 'color'=>'green'],
['name'=>'Nemo', 'animal'=>'clownfish', 'appearIn'=>'Finding Nemo', 'color'=>'orange'],
['name'=>'Bruce', 'animal'=>'shark', 'appearIn'=>'Finding Nemo', 'color'=>'gray'],
['name'=>'Falcor', 'animal'=>'luckdragon', 'appearIn'=>'The Neverending story', 'color'=>'pink']
];
$s1_rand1 = rand_int(0, count($s1_objects)-1);
$s1_obj1 = $s1_objects[$s1_rand1];
$s1_obj1Name = $s1_obj1["name"];
$s1_obj1Color = $s1_obj1["color"];
$s1_obj1Color = $s1_obj1["animal"];
$s1_obj1AppearIn = $s1_obj1["appearIn"];

$s1_print1 = "My name is " . $s1_obj1Name;
$s1_print2 = $s1_print1 . " and I am a " . $s1_obj1Color . " " . $s1_obj1Animal;
$s1_print3 = $s1_print2 . ". I appear in the movie " . $s1_obj1AppearIn . ".";

$s1_rand2 = rand_int(0, count($s1_objects2)-1);
$s1_obj2 = $s1_objects2[$s1_rand2];
$s1_obj2Name = $s1_obj2["name"];
$s1_obj2Color = $s1_obj2["color"];
$s1_obj2Animal = $s1_obj2["animal"];
$s1_obj2AppearIn = $s1_obj2["appearIn"];

$s1_print3New = "My name is " . $s1_obj2Name . " and I am a " . $s1_obj2Color . " " . $s1_obj2Anmial . ". I appear in the movie " . $s1_obj2AppearIn . ".";


// SECTION 2 ****************************************************

$s2_accounts1 = [
    ["Savings", "56892", 11000],
    ["Private", "85691", 12000],
    ["Travel", "85223", 16800],
    ["Family", "66952", 50000]
];
$s2_accounts2 = [
    ["Clothes", "42136", 65000],
    ["Budget", "98755", 10520],
    ["Shopping", "74563", 13895]
];
$s2_accounts3 = [
    ["Salary", "20156", 16000],
    ["Secret", "49653", 10900],
    ["Food", "15899", 45000]
];
$s2_acc1 = $s2_accounts1[rand_int(0, count($s2_accounts1)-1)];
$s2_acc1Name = $s2_acc1[0];
$s2_acc1Nr = $s2_acc1[1];
$s2_acc1Balance = $s2_acc1[2];

$s2_acc2 = $s2_accounts2[rand_int(0, count($s2_accounts2)-1)];
$s2_acc2Name = $s2_acc2[0];
$s2_acc2Nr = $s2_acc2[1];
$s2_acc2Balance = $s2_acc2[2];

$s2_acc3 = $s2_accounts3[rand_int(0, count($s2_accounts3)-1)];
$s2_acc3Name = $s2_acc3[0];
$s2_acc3Nr = $s2_acc3[1];
$s2_acc3Balance = $s2_acc3[2];

$s2_bigNr = rand_float(1000, 10000, 2);
$s2_acc3NewBalance = $s2_bigNr + $s2_acc3Balance;
$s2_acc1NewBalance = $s2_acc1Balance - $s2_bigNr;

$s2_print1 = "Account: " . $s2_acc1Name . ", Number: " . $s2_acc1Nr . ", Balance: " . $s2_acc1Balance;
$s2_print2 = "Account: " . $s2_acc2Name . ", Number: " . $s2_acc2Nr . ", Balance: " . $s2_acc2Balance;
$s2_print3 = "Account: " . $s2_acc3Name . ", Number: " . $s2_acc3Nr . ", Balance: " . $s2_acc3Balance;
$s2_printNew = "Account: " . $s2_acc3Name . ", Number: " . $s2_acc3Nr . ", Balance: " . $s2_acc3New;
$s2_lastPrint = "Balance: " . $s2_acc1NewBalance . ", Balance: " . $s2_acc2Balance . ", " . "Balance: " . $s2_acc3NewBalance;


/**
 * Titel and introduction to the lab.
 */


return [



/**
 * Titel and introduction to the lab.
 */
"title" => "Lab 6 - python",

"intro" => "
<p>In this section you should answer with a 'print-method' to all questions. The first print-method should be called 'print1', the next 'print2' etc...
</p>
",


"sections" => [



/** ===================================================================================
 * New section of exercises.
 */
[
"title" => "Objects sect 1",

"intro" => "
<p>Some basics on objects
</p>
",

"shuffle" => false,

"questions" => [



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Create an object-class called 'Character'. Create an instance of the object and call it: 'myObj'. Give it two attributes: 'name' and 'print1'. The name should be '$s1_obj1Name'. Answer with the print-method and present your object's name: 'My name is $s1_obj1Name'.
</p>
",

"answer" => function () use ($s1_print1) {

    return $s1_print1;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Give your object some more attributes: 'color' and 'animal'. Use the values: '$s1_obj1Color' and '$s1_obj1Animal'. Answer with a new print-method in the format: '$s1_print2'.
</p>
",

"answer" => function () use ($s1_print2) {

    return $s1_print2;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Give your object a last attribute: 'appearIn'. Use the value: '$s1_obj1AppearIn'. Answer with a new print-method in the format: '$s1_print3'.
</p>
",

"answer" => function () use ($s1_print3) {

    return $s1_print3;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Make a deep-copy of your object and call it 'myObj2'. Change its attributes to name: '$s1_obj2Name', animal: '$s1_obj2Animal', color: '$s1_obj2Color', appearIn: '$s1_obj2AppearIn'. Use the new objects 'print3' as your answer.
</p>
",

"answer" => function () use ($s1_print3New) {

    return $s1_print3New;
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
<p>Create an object-class called 'Account'. Give it the attributes: 'name', 'number', 'balance' and a print-method that prints out its information as a string: 'Account: ?, Number: ?, Balance: ? '. Initiate 'name' and 'number' with the string 'unknown' and initiate 'balance' with 0.0. Call the print-method on the object-class and answer with the printed result.
</p>
",

"answer" => function () {

    return "Account: unknown, Number: unknown, Balance: 0.0";
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Create an instance of the Account-class, called 'acc1' and assign the values: name: '$s2_acc1Name', number: $s2_acc1Nr, balance: $s2_acc1Balance. Answer with the print-method.
</p>
",

"answer" => function () use ($s2_print1) {

    return $s2_print1;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Create another instance of the Account-class, called 'acc2' and assign the values: name: '$s2_acc2Name', number: $s2_acc2Nr, balance: $s2_acc2Balance. Answer with the print-method.
</p>
",

"answer" => function () use ($s2_print2) {

    return $s2_print2;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Create one more instance of the Account-class, called 'acc3' and assign the values: name: '$s2_acc3Name', number: $s2_acc3Nr, balance: $s2_acc3Balance. Answer with the print-method.
</p>
",

"answer" => function () use ($s2_print3) {

    return $s2_print3;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Create a method in the Account class, called 'transfer'. It should take two arguments, a float number that represents the amount to transfer, and another account-object that the money should be transferred to. The balance can not be lower than zero. Change its own balance and the other objects balance with the corresponding argument. Answer with the print-method on acc3 after you moved the value: $s2_bigNr from acc1 to acc3. 
</p>
",

"answer" => function () use ($s2_printNew) {

    return $s2_printNew;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Create one more method in the Account-class, called 'current' that only prints out the current balance: 'Balance: ?'. Put your three accounts in a list and loop over it and print out the balance for each object. Each print should be separated by a comma. 
</p>
",

"answer" => function () use ($s2_lastPrint) {

    return $s2_lastPrint;
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
