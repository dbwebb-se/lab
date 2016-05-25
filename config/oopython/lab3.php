<?php

/**
 * Generate random values to use in lab.
 */
include __DIR__ . "/../random.php";

// Settings
$base = __DIR__ . "/lab3_extra";
$file = "regexOnLists.py";

//SECTION 1 ****************************************************
$arrayTwister = ["how", "can", "clam", "cram", "clean", "cream", "can"];
$s1_twisterWord = $arrayTwister[rand_int(0, count($arrayTwister) - 1)];



return [

/**
 * Titel and introduction to the lab.
 */
"title" => "Lab 3 - oopython",

"intro" => <<<EOD
If you need to peek at examples or just want to know more, take a look at the page: https://docs.python.org/2/howto/regex.html. Here you will find everything this lab will go through and much more.
EOD
,

"header" => <<<EOD
import re
import regexOnLists as reg
EOD
,

"sections" => [



/** ===================================================================================
 * New section of exercises.
 */
[
"title" => "Regular expressions",

"intro" => <<<EOD
For the exercises where you should match a pattern on strings in lists use  
'reg.regexOnLists(pattern, matchList, dontMatchList)'.  
Unless it says in the exercise to send an argument for the index parameter dont. Copy the lists from the exercise description and send as arguments.

Answer with the result from the function.
EOD
,

"shuffle" => false,

"questions" => [



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Write a pattern that matches the word '$s1_twisterWord' in the sentence  
'how can a clam cram in a clean cream can?'.

Use the re modules findall function.
EOD
,

"answer" => function () use ($s1_twisterWord) {

    $result = [$s1_twisterWord];
    return $result;
},

],


/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Write a pattern that only matches the words that starts with a big letter in the sentence  
'Droskkusken Max kuskar med Fuxar och fuskar med droskkusktaxan.'.

Use the re modules findall function.
EOD
,

"answer" => function () {

    return ['Droskkusken', 'Max', 'Fuxar'];
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Write a pattern that matches the words in the string  
'look, book, hook'  
but not the words in the string  
'cookoff, booklet, hooked'.

Use the re modules findall function.
EOD
,

"answer" => function () {

    return ['look', 'book', 'hook'];
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Write a pattern that matches only the digits in the string  
'hej123ko whatup'563' koll726kolla'.

Use the re modules findall function.
EOD
,

"answer" => function ()  {

    return ['123', '563', '726'];
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Write a pattern that matches the characters between the commas in the string  
'[kossor],(blommor),{skor}'  
and not the characters between the commas in the string  
'kossor,blommor,skor'.

Use the re modules findall function.
EOD
,

"answer" => function () {

    return ['[kossor]', '(blommor)', '{skor}'];
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Write a pattern that matches the words in the string  
'mat, kol, leg'  
and not the words in the string  
'bil, vid, och'.

Use the re modules findall function.
EOD
,

"answer" => function () {

    return ['mat', 'kol', 'leg'];
},

],

/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Write a pattern that matches the words in the list  
['barbary', 'froufrou', 'mathematic']  
and doesnt match the words in the list  
['damnably', 'corundum', 'pouchlike'].

Use the regexOnList function.
EOD
,

"answer" => function (){

    return ['damnably', 'corundum', 'pouchlike'];
},

],

/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Write a pattern that matches a username. It can contain the letters 'a' to 'z',  the numbers '0' to '9', underscore, a hyphen and it can be 4 to 14 letters long.  
It should match the words in the list  
['user93namne_', 'froufrou', '4stuff-65_dg']  
and not match  
['d3y', 'corundum.423', 'gdsgpouchlikefdsfdsf'].

Use the regexOnList function.
EOD
,

"answer" => function () {

    return ['user93namne_', 'froufrou', '4stuff-65_dg'];
},

],


/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Write a pattern that matches the emails in the list  
['zeldah.-92@dbwebb.se', 'lew53@dbwebb.com', 'mos_@dbwebb.net']  
and doesnt match the emails in the list  
['fake#29@db-webb.se', 'stealth@dbw_ebb.s', 'master@db.webb.net'].

Use the regexOnList function.
EOD
,

"answer" => function () {

	return ['zeldah.-92@dbwebb.se', 'lew53@dbwebb.com', 'mos_@dbwebb.net'];
},

],


/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Write a patterna that matches the html tags in the list  
`['<a href="http://dbwebb.se">Dbwebb</a>', '<div>Outer<span>inner</span></div>']`  
and doesnt match the tags in the list  
`['<a>a link</b>', '<p>Outer<span>in<br>ner</p></span>']`.

Use the regexOnList function.
EOD
,

"answer" => function () {


	return ['<a href="http://dbwebb.se">Dbwebb</a>', '<div>Outer<span>inner</span></div>'];
},

],


/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Write a pattern that matches the last names in the list  
['Andreas Arnesson', 'Siv Ohlsson', 'Lena Johansson']  
and doesnt match the ones in the list  
['Oskar Stenstrom', 'Konrad Ohman', 'Nellie Forsberg'].

Use the regexOnList function.  
Add '1' as index argument for the regexOnList function.
EOD
,

"answer" => function () {

	return ['Arnesson', 'Ohlsson', 'Johansson'];
},

],


/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Write a pattern tha matches the expiry date formats from the list  
['09/10', '05-2010', '07-20', '10/1999']  
and doesnt match the date in the list  
['001-11', '10.15', '01/115', '13-2001'].

Use the regexOnList function.
EOD
,

"answer" => function () {

	return ['09/10', '05-2010', '07-20', '10/1999'];
},

],


/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Write a pattern tha matches the scheme, the host and the port(if present) from the urls in the string  
'https://dbwebb.se/kunskap/uml#sequence, ftp://bth.com:32/files/im.jpeg, file://localhost:8585/zipit, http://v2-dbwebb.se/do%hack'.

A tip, create a group for each element. From the first url we want https and dbwebb.se from the second url we want ftp, bth.com and 32.

Use the re modules findall function. Format the result in to a string and answer with that.
EOD
,

"answer" => function () {

	return "[('https', 'dbwebb.se', ''), ('ftp', 'bth.com', '32'), ('file', 'localhost', '8585'), ('http', 'v2-dbwebb.se', '')]";
},

],

],
/**
 * Closing up this section.
 */
], // EOF questions



/** ===================================================================================
 * New section of exercises.
 */
[
"title" => "Search and replace",

"intro" => <<<EOD
Use the re modules sub function for all the exercises.
EOD
,

"shuffle" => false,

"questions" => [



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Use the sub function to fix the whitespaces in the sentence  
'I \nknow\t      H.T.M.L.\n How To      Meet Ladies\t '. 

One space between each word.
EOD
,

"answer" => function () {

	return "I know H.T.M.L. How To Meet Ladies";

},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Use the sub function to switch the place of the numbers and letters in the string  
'abc123 efg456'  
and also add a space between them, so it becomes '123 abc 456 efg'
EOD
,

"answer" => function () {

    return "123 abc 456 efg";
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Use the sub function to remove the last three characters from the string  
'Hello world!-.1'.
EOD
,

"answer" => function () {

    return "Hello world!";

},

],


/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Use the sub function to remove the commented and the empty line from the string  
'#Did you back up the system?\n\nprint('hello world')'.
EOD
,

"answer" => function () {

    return "print('hello world')";

},

],


/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Use the sub function to format the string  
'Ross McFluff: 0456-45324: 155 Elm Street\nRonald Heathmore: 5543-23464: 445 Finley Avenue'.  
For each person it should look like this:  
'Contact\nName: xx yy\nPhone number: 0000-00000\nAdress: 000 zzz zzz'.
EOD
,

"answer" => function () {

    return "Contact
Name: Ross McFluff
Phonenumber: 0456-45324
Adress: 155 Elm Street
Contact
Name: Ronald Heathmore
Phonenumber: 5543-23464
Adress: 445 Finley Avenue";

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
