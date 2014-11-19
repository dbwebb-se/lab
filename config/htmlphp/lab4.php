<?php

/**
 * Generate random values to use in lab.
 */
include __DIR__ . "/../random.php";

// ################### Files ##################

$books = ["Dracula", "SherlockHolmes", "SleepyHollow", "Grimm", "Frankenstein"];
$bookNr = rand_int(0, count($books)-1);
$useThisBook = $books[$bookNr];
$file1 = file_get_contents(__DIR__ . "/$useThisBook.txt");
$file2 = file_get_contents(__DIR__ . "/$useThisBook.txt", NULL, NULL, 16, 25);
$file3 = preg_split('/\r\n|\n|\r/', trim(file_get_contents(__DIR__ . "/$useThisBook.txt")));
$file3 = explode(PHP_EOL, $file1);

// ################### Date/time ##################

$dates = ["2001-05-12 11:15:17", "2004-12-06 16:14:22", "1992-11-09 12:06:44", "2009-02-01 15:34:56", "1999-01-05 09:10:32"];
$dateRand = rand_int(0, count($dates)-1);
$useThisDate = new DateTime($dates[$dateRand]);

$useThisDate2 = new DateTime($dates[$dateRand]);
$dateAdd = $useThisDate2->add(new DateInterval("P3M"));

$useThisDate3 = new DateTime($dates[$dateRand]);
$dateSub = $useThisDate3->sub(new DateInterval("P5DT3H"));

$passwords = ["myPassword", "thisIsALamePassword", "anyoneCanCrackMe", "safe@44%", "lollipop"];
$salts = ["saltAndPepper", "mySalt", "randomSalt", "saltLakeCity", "saltLicorice"];
$passRand = rand_int(0, count($passwords)-1);
$useThisSalt = $salts[$passRand];
$useThisPass = $passwords[$passRand];
$passHash = crypt($useThisPass, $useThisSalt);

$rot = str_rot13($useThisPass);
$plain = ["Cinderella", "Lady and the Tramp", "Old Yeller", "Treasure Island", "The Jungle Book"];
$decrypts = [$plain[0]=>str_rot13($plain[0]), $plain[1]=>str_rot13($plain[1]), $plain[2]=>str_rot13($plain[2]), $plain[3]=>str_rot13($plain[3]), $plain[4]=>str_rot13($plain[4])];
$presentCrypts = implode(", ", array_values($decrypts));
$presentCryptAnswer = implode(", ", array_keys($decrypts));

/**
 * Titel and introduction to the lab.
 */


return [



/**
 * Titel and introduction to the lab.
 */
"title" => "Lab 4 - Htmlphp",

"intro" => "
<p>
</p>
",


"sections" => [



/** ===================================================================================
 * New section of exercises.
 */
[
"title" => "Date and time",

"intro" => "
<p>In this section you will be working with the DateTime-object. If you manipulate the object, such as add or subtract, the original object will be changed, hence you will create new objects from the same date in thise exercises. Read more on: http://php.net/manual/en/class.datetime.php.
</p>
",

"shuffle" => false,

"questions" => [



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Use 'new DateTime()' to create a new DateTime-object from the date: '$dates[$dateRand]' Format the object to present the year-month-day, 'Y-m-d' and answer with the result.
</p>
",

"answer" => function () use($useThisDate) {

    return date_format($useThisDate, "Y-m-d");
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Create a new DateTime-object with the same parameters and add 3 months to it. Answer with the result, presented in year-month-day.
</p>
",

"answer" => function () use($dateAdd) {

    return date_format($dateAdd, "Y-m-d");
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Use one of your DateTime-objects and answer with the time, presented in 'hours:minutes:seconds'.
</p>
",

"answer" => function () use($useThisDate) {

    return date_format($useThisDate, "H:i:s");
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Create a new DateTime-object based on the same date and time and subtract 5 days and 3 hours from it. Answer with the whole date, presented in 'year-month-day hours:minutes:seconds'.
</p>
",

"answer" => function () use($dateSub) {

    return date_format($dateSub, "Y-m-d H:i:s");
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
"title" => "Working with files",

"intro" => "
<p>In this section, you will be working with the file: '$useThisBook.txt'. It contains a paragraph from a book.</p>
",

"shuffle" => false,

"questions" => [


/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Use 'file_get_contents()' to get the file as a string. Answer with the result.</p>
",

"answer" => function () use($file1) {

    return $file1;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Use 'file_get_contents()' to get 25 characters, starting on the 17th character.</p>
",

"answer" => function () use($file2) {

    return $file2;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Use a combination of 'implode()' with a space as a delimiter and 'explode()' to format the file content and remove newline characters. Answer with the result.</p>
",

"answer" => function () use($file3) {

    return implode(" ",$file3);
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
"title" => "Serialize",

"intro" => "
<p>Some intro text.
</p>
",

"shuffle" => false,

"questions" => [



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>This is a question.
</p>
",

"answer" => function () {
    
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
"title" => "Cryptography",

"intro" => "
<p>Reference to crypt: http://php.net/manual/en/function.crypt.php, rot13: http://php.net/manual/en/function.str-rot13.php.
</p>
",

"shuffle" => false,

"questions" => [



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Use crypt() to create a hash of the password: '$useThisPass' and the salt: '$useThisSalt'. Answer with the result.
</p>
",

"answer" => function () use($passHash) {

    return $passHash;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Think that your hash from last exercise is stored in a database. Create a function that checks if a password is valid and correct, comparing the stored hash and a hash created from the input. The function should take 2 arguments, a password and a salt. The function should return the boolean value 'true' if is is a match and the boolean value 'false' if they are not correct. Answer with a call to the function using your password and salt from last exercise. 
</p>
",

"answer" => function () use($passHash, $useThisSalt, $useThisPass) {

    $same = false;
    if(crypt($useThisPass, $useThisSalt) == $passHash) {
    	$same = true;
    }

    return $same;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Use ROT13 encoding on your password: '$useThisPass'. Answer with the result.
</p>
",

"answer" => function () use($rot) {

    
    return $rot;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>Use ROT13 decoding to find which movies hides in the strings: '$presentCrypts'. Answer with the result in a comma-separated string. (Each movie is comma-separated)
</p>
",

"answer" => function () use($presentCryptAnswer) {

    
    return $presentCryptAnswer;
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
"title" => "Multibyte strings",

"intro" => "
<p>Some intro text.</p>
",

"shuffle" => false,

"questions" => [



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => "
<p>This is a question.
</p>
",

"answer" => function () {

    
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
