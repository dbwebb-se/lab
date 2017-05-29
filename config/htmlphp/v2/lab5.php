<?php

/**
 * Generate random values to use in lab.
 */
include __DIR__ . "/../random.php";

// ################### Files ##################

$books = ["SherlockHolmes", "SleepyHollow", "Grimm", "Frankenstein"];
$bookNr = rand_int(0, count($books)-1);
$useThisBook = $books[$bookNr];
$file1 = file_get_contents(__DIR__ . "/lab4_extra/$useThisBook.txt");
$file2 = file_get_contents(__DIR__ . "/lab4_extra/$useThisBook.txt", NULL, NULL, 16, 25);
$file3 = explode(PHP_EOL, $file1);

$numbers = [
[rand_int(3,100),rand_int(3,100),rand_int(3,100),rand_int(3,100),rand_int(3,100),rand_int(3,100),rand_int(3,100)],
[rand_int(3,100),rand_int(3,100),rand_int(3,100),rand_int(3,100),rand_int(3,100),rand_int(3,100),rand_int(3,100)],
[rand_int(3,100),rand_int(3,100),rand_int(3,100),rand_int(3,100),rand_int(3,100),rand_int(3,100),rand_int(3,100)],
[rand_int(3,100),rand_int(3,100),rand_int(3,100),rand_int(3,100),rand_int(3,100),rand_int(3,100),rand_int(3,100)],
[rand_int(3,100),rand_int(3,100),rand_int(3,100),rand_int(3,100),rand_int(3,100),rand_int(3,100),rand_int(3,100)]
];
$nrRand = rand_int(0, count($numbers)-1);
$useThisNrs = $numbers[$nrRand];
$nrsPrint = implode(", ", $useThisNrs);

//file_put_contents(__DIR__ . "/temp.txt", $file1);
//$file4 = file_get_contents(__DIR__ . "/temp.txt");
$file4 = $file1;
//file_put_contents(__DIR__ . "/temp.txt", $nrsPrint);
$file5 = explode(", ", $nrsPrint);   // new
// $file5 = explode(", ", file_get_contents(__DIR__ . "/temp.txt"));
array_push($file5, "$nrRand");

$sentances = [
    ["No matter how hard I try, I never seem to run out of bad ideas.", rand_int(10, 500), rand_float(20, 500, 2)],
    ["A green apple is not orange.", rand_int(10, 500), rand_float(20, 500, 2)],
    ["A fish with no eye is called a fsh.", rand_int(10, 500), rand_float(20, 500, 2)],
    ["People say nothing is impossible, but I do nothing every day.", rand_int(10, 500), rand_float(20, 500, 2)],
    ["Future depends on your dreams, so go to sleep.", rand_int(10, 500), rand_float(20, 500, 2)],
    ["I stepped on a cornflake and now I am a cereal killer.", rand_int(10, 500), rand_float(20, 500, 2)],
    ["Never trust an atom. They make up everything.", rand_int(10, 500), rand_float(20, 500, 2)],
    ["What happens if you get scared half to death twice?", rand_int(10, 500), rand_float(20, 500, 2)]
];

$sentRand = rand_int(0, count($sentances)-1);
$useThisSent = $sentances[$sentRand];
$useThisSentPrint = implode(", ", $useThisSent);
$file6 = unserialize(file_get_contents(__DIR__ . "/lab4_extra/serialized.txt"));
// $file6 = serialize($useThisSent);
// $file6 = unserialize($file6);
//file_put_contents(__DIR__ . "/temp.txt", $file6);
//$file6 = unserialize(file_get_contents(__DIR__ . "/temp.txt"));

$encodingWords = ["övergångsställe", "skärgårdsö", "räksmörgås", "förmånsrätt", "björnbärssås"];
$encRand = rand_int(0, count($encodingWords)-1);
$useThisEnc = $encodingWords[$encRand];
mb_internal_encoding("ISO-8859-1");                                 // set encoding to iso-8859-1
$encAns1 = mb_internal_encoding();                                  // answer 1 = get encoding
$encAns2 = strlen($useThisEnc) . ", " . mb_strlen($useThisEnc);     // answer 2 = strlen and mb_strlen
mb_internal_encoding("UTF-8");                                      // set encoding to utf-8
$encAns3 = strlen($useThisEnc) . ", " . mb_strlen($useThisEnc);     // answer 3 = strlen and mb_strlen



// ################### Date/time ##################

$dates = ["2001-05-12 11:15:17", "2004-12-06 16:14:22", "1992-11-09 12:06:44", "2009-02-01 15:34:56", "1999-01-05 09:10:32"];
$dateRand = rand_int(0, count($dates)-1);
$useThisDate = new DateTime($dates[$dateRand]);

$useThisDate2 = new DateTime($dates[$dateRand]);
$dateAdd = $useThisDate2->add(new DateInterval("P3M"));

$useThisDate3 = new DateTime($dates[$dateRand]);
$dateSub = $useThisDate3->sub(new DateInterval("P5DT3H"));

$passwords = ["myPassword", "thisIsALamePassword", "anyoneCanCrackMe", "safe@44%", "lollipop"];
$passRand = rand_int(0, count($passwords)-1);
$useThisPass = $passwords[$passRand];
$passHash = password_hash($useThisPass, PASSWORD_DEFAULT);
$passResult = password_verify($useThisPass, $passHash);

$rot = str_rot13($useThisPass);
$plain = ["Cinderella", "Lady and the Tramp", "Old Yeller", "Treasure Island", "The Jungle Book"];
$decrypts = [$plain[0]=>str_rot13($plain[0]), $plain[1]=>str_rot13($plain[1]), $plain[2]=>str_rot13($plain[2]), $plain[3]=>str_rot13($plain[3]), $plain[4]=>str_rot13($plain[4])];
$presentCrypts = implode(", ", array_values($decrypts));
//$presentCryptAnswer = implode(", ", array_keys($decrypts));

$mdFive = md5($useThisPass);



/**
 * Titel and introduction to the lab.
 */


return [



/**
 * Titel and introduction to the lab.
 */
"title" => "Lab 4 - Htmlphp",

"intro" => <<<EOD
This lab pretty much deals with getting youreself acquainted with the PHP Manual. Search, find and read. It will be fun.
EOD
,


"sections" => [



/** ===================================================================================
 * New section of exercises.
 */
[
"title" => "Date and time",

"intro" => <<<EOD
In this section you will be working with the DateTime-object. If you manipulate the object, such as add or subtract, the original object will be changed, hence you will create new objects from the same date in these exercises.

Read more on [datetime in the manual](http://php.net/manual/en/class.datetime.php).
EOD
,

"shuffle" => false,

"questions" => [



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Use 'new DateTime()' to create a new DateTime-object from the date: '$dates[$dateRand]' Format the object to present the year-month-day, 'Y-m-d' and answer with the result.
EOD
,

"answer" => function () use($useThisDate) {

    return date_format($useThisDate, "Y-m-d");
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Create a new DateTime-object with the same parameters and add 3 months to it. Answer with the result, presented in the format: 'Y-m-d'.
EOD
,

"answer" => function () use($dateAdd) {

    return date_format($dateAdd, "Y-m-d");
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Use one of your DateTime-objects and answer with the time, presented in the format: hours:minutes:seconds.
EOD
,

"answer" => function () use($useThisDate) {

    return date_format($useThisDate, "H:i:s");
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Create a new DateTime-object based on the same date and time and subtract 5 days and 3 hours from it. Answer with the whole date, presented in the format: 'Y-m-d hours:minutes:seconds'.
EOD
,

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

"intro" => <<<EOD
In this section, you will be working with the file: '[$useThisBook.txt]($useThisBook.txt)'. It contains a paragraph from a book and can be found in the lab folder.
EOD
,

"shuffle" => false,

"questions" => [


/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Use 'file_get_contents()' to get the file as a string. Save it to a variable called 'fileAsString'. Answer with the variable.
EOD
,

"answer" => function () use($file1) {

    return $file1;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Use 'file_get_contents()' to get 25 characters, starting on the 17th character.
EOD
,

"answer" => function () use($file2) {

    return $file2;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Use a combination of 'implode()' with a space as a delimiter and 'explode()' to format the file content and remove newline characters. Answer with the result.
EOD
,

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

"intro" => <<<EOD
EOD
,

"shuffle" => false,

"questions" => [



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Use the file 'serialized.txt' in your lab folder and read it, unserialize it and put the result in your answer.

(Take a peek into your '[serialized.txt](serialized.txt)' to see how a serialized array looks)
EOD
,

"answer" => function () use($file6){
    return $file6;
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

"intro" => <<<EOD
Reference to [password_hash](http://php.net/manual/en/function.password-hash.php) and [rot13](http://php.net/manual/en/function.str-rot13.php).
EOD
,

"shuffle" => false,

"questions" => [



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Use `password_hash()` with the DEFAULT algorithm to create a hash of the password: '$useThisPass'. Test `password_verify()` with different passwords to see what it returns. Answer with the result, using '$useThisPass'.
EOD
,

"answer" => function () use($passResult) {

    return $passResult;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Use ROT13 encoding on your password: '$useThisPass'. Answer with the result.
EOD
,

"answer" => function () use($rot) {


    return $rot;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Use ROT13 decoding to find which movies hides in the string:

> "$presentCrypts"

Each movie is comma-separated in the string above.

Answer with an array containing all answers.
EOD
,

"answer" => function () use($plain) {


    return $plain;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Calculate the hash of the password '$useThisPass' with md5. Answer with the hash.
EOD
,

"answer" => function () use($mdFive) {


    return $mdFive;
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

"intro" => <<<EOD
EOD
,

"shuffle" => false,

"questions" => [



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Set the internal encoding to 'ISO-8859-1'. Answer with the result of `mb_internal_encoding()`.
EOD
,

"answer" => function () use($encAns1) {

    return $encAns1;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Check the `strlen()` and `mb_strlen()` of the word '$useThisEnc'. Answer with the two results as a comma and space-separated string.
EOD
,

"answer" => function () use($encAns2) {

    return $encAns2;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Set the internal encoding to 'UTF-8' and check the `strlen()` and `mb_strlen()` of the word '$useThisEnc'. Answer with the two results as a comma-separated string.
EOD
,

"answer" => function () use($encAns3) {

    return $encAns3;
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
