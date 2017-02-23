<?php

/**
 * Generate random values to use in lab.
 */
include __DIR__ . "/../random.php";

// Settings
$base = __DIR__ . "/lab3_extra";
$file = "ircLog.txt";

//SECTION 1 ****************************************************
$arrayTwister = ["how", "can", "clam", "cram", "clean", "cream", "can"];
$s1_twisterWord = $arrayTwister[rand_int(0, count($arrayTwister) - 1)];



return [

/**
 * Titel and introduction to the lab.
 */
"title" => "Lab 3 - oopython",

"intro" => <<<EOD
If you need to peek at examples or just want to know more, take a look at the page: https://docs.python.org/3/howto/regex.html. Here you will find everything this lab will go through and much more.
EOD
,

"header" => <<<EOD
# pylint: disable=line-too-long
# pylint: disable=unused-import
import re
# pylint: enable=unused-import
#
TEXTFILE = open('ircLog.txt', 'r')
IRCLOG = TEXTFILE.read()
TEXTFILE.close()
EOD
,

"passPercentage" => 80/100,
"passDistinctPercentage" => 100/100,

"sections" => [



/** ===================================================================================
 * New section of exercises.
 */
[
"title" => "Regular expressions",

"intro" => <<<EOD

The lab consists of three sections. In section one you will practice regex on strings. In section two you will practice regex on the content from a file, the irc log. In section three you will practice on replacing text in strings.
In section two, use your patterns on the variable `IRCLOG`.

Use double backslashes (`\\`) or raw string notation to avoid validation errors.

Answer with the result from the re functions unless specified differently in the assignment.
EOD
,

"shuffle" => false,

"questions" => [



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Write a pattern that matches the word `$s1_twisterWord` in the sentence  
'how can a clam cram in a clean cream can?'.

Use the re modules findall function.
EOD
,

"points" => 1,

"answer" => function () use ($s1_twisterWord) {
    if ($s1_twisterWord == "can") {
        $result = ["can", "can"];
    } else {
        $result = [$s1_twisterWord];
    }
    return $result;
},

],


/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Write a pattern that only matches the words that start with a *big letter* in the sentence  
'Droskkusken Max kuskar med Fuxar och fuskar med droskkusktaxan.'.

Use the re modules findall function.
EOD
,

"points" => 1,

"answer" => function () {

    return ['Droskkusken', 'Max', 'Fuxar'];
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Write a pattern that only matches the `digits` in the string  
'hej123ko whatup"563" koll726kolla'.

Use the re modules findall function.
EOD
,

"points" => 1,

"answer" => function ()  {

    return ['123', '563', '726'];
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Write a pattern that matches the characters `()[] and {}` and `the words inside`, in the string  
'[kossor],(blommor),{skor},kossor,blommor,skor'.


Use the re modules findall function.
EOD
,

"points" => 1,

"answer" => function () {

    return ['[kossor]', '(blommor)', '{skor}'];
},

],




/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Write a pattern that matches the scheme, the host and the port(if present) from the urls in the string  
'https://dbwebb.se/kunskap/uml#sequence, ftp://bth.com:32/files/im.jpeg, file://localhost:8585/zipit, http://v2-dbwebb.se/do%hack'.

A tip, create a group for each element. From the first url we want https and dbwebb.se from the second url we want ftp, bth.com and 32 and so on.

Use the re modules findall function. Convert the result to a string and answer with it.
EOD
,

"points" => 2,

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
"title" => "Regex on content from a file",

"intro" => <<<EOD
Use the re modules findall function with the variable `IRCLOG`.
EOD
,

"shuffle" => false,

"questions" => [



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Find the whole line where someone talks about `Kaffe`.

Answer with the whole line.
EOD
,

"points" => 1,

"answer" => function () {

	return ["11:39 <+xt9> Kaffemetoden :)"];

},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Find all the lines where `feeloor` joins or quits.

Answer with all the lines.
EOD
,

"points" => 1,

"answer" => function () {

    return ["09:47 -!- feeloor_ [~felix@c-83-233-58-114.cust.bredband2.com] has joined #db-o-webb", "09:49 -!- feeloor [~felix@c-83-233-58-114.cust.bredband2.com] has quit [Ping timeout: 240 seconds]", "19:10 -!- feeloor_ [~felix@c-83-233-58-114.cust.bredband2.com] has quit [Ping timeout: 240 seconds]", "19:11 -!- feeloor [~felix@c-83-233-58-114.cust.bredband2.com] has joined #db-o-webb"];
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
At what time interval did `Trekka12` have a `genombrott` with his `snakespel`?

Answer with the time interval.
EOD
,

"points" => 2,

"answer" => function () {

    return ["23:00-01:30"];

},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Find the two users who talk to `eline` about `git`/`Git`.

Answer with the two usernames.
EOD
,

"points" => 1,

"answer" => function () {

    return ["MollyPorph", "xt9"];

},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Find all the users who talk about themselves.

(Example: `17:03 < Aurora> här skriver Aurora om sig själv`)

Tip, create a group and reference to it.
Answer with the usernames.
EOD
,

"points" => 2,

"answer" => function () {

    return ["emil", "mos"];

},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Find the users who have atleast one digit in their name and have made a forum post in the category `oophp`.

Tip, marvin says when someone makes a forum post.
Answer with the usernames.
EOD
,

"points" => 2,

"answer" => function () {

    return ["rala14", "saham-3"];

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
'I  know\t      H.T.M.L. \tHow To      Meet Ladies'.

One space between each word.
EOD
,

"points" => 1,

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

"points" => 1,

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

"points" => 1,

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
"#Did you back up the system?\\n\\nprint('hello world')".
EOD
,

"points" => 1,

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
'Ross McFluff: 0456-45324: 155 Elm Street\\nRonald Heathmore: 5543-23464: 445 Finley Avenue'.  
For each person it should look like this:  
'Contact\nName: xx yy\nPhone number: 0000-00000\nAddress: 000 zzz zzz'.
EOD
,

"points" => 3,

"answer" => function () {

    return "Contact
Name: Ross McFluff
Phone number: 0456-45324
Address: 155 Elm Street
Contact
Name: Ronald Heathmore
Phone number: 5543-23464
Address: 445 Finley Avenue";

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
