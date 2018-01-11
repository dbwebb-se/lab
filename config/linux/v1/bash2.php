<?php

/**
 * Generate random values to use in lab.
 */
include LAB_INSTALL_DIR . "/config/random.php";


// Settings
$base = __DIR__ . "/bash2_extra";
$file = "ircLog.txt";


// For shell exec to get correct
putenv('LANG=C.UTF-8');



return [



/**
 * Titel and introduction to the lab.
 */
"answerFormat" => "text",

"title" => "Lab 2 - linux",

"intro" => "
A lab where you use Unix tools available from the command line interface together with a little Bash, to find and handle information in a [IRC loggfil](ircLog.txt).
",

"header" => null,

"passPercentage" => 10/19,
"passDistinctPercentage" => 19/19,

/*
"grades" => [
    "pass" => 60/100,
    "pass-distinct" => 100/100,
]
*/

"sections" => [



/** ===========================================================================
 * New section of exercises.
 */
[
"title" => "Bash",

"intro" => <<<EOD
Train Linux commands and use them together with Bash.

I this exercise you will mainly use comands like `grep`, `wc`, `head` and `tail` to search for information in a log file from the irc-chat.

Then you combine the output of the commands to variables in Bash. Use the man-pages when needed to find information on how to solve the exercises.

EOD
,

"shuffle" => false,

"questions" => [



/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD

Create a variable named `FILE` and give it the value `$file`.

Answer with the value of `\$FILE`.

EOD
,

"points" => 1,

"answer" => function () use ($file) {

    return $file;
},

],



/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD

Use the `wc` command to count the number of lines in the irc log. Show only the number of lines and the name of the file, seperated by a space.

Save the answer in a variable and answer with that variable.

EOD
,

"points" => 1,

"answer" => function () use ($base, $file) {
    return exec("cd $base && wc -l $file");
    //return trim(exec("cd $base && wc -l $file")); // Mac OS
},

],



/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD

Use `wc` together with `cut` to count the number of words in the irc log.

Save only the number of words in a variable and answer with the variable.

Tip: Use the pipe (`|`) command.

EOD
,

"points" => 1,

"answer" => function () use ($base, $file) {
    return exec("cd $base &&  wc -w $file | cut -d' ' -f1");
},

],



/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD

Find the row with 'pansars' opinion of 'notepad'.

Save the answer in a variable and answer with that variable.

EOD
,

"points" => 1,

"answer" => function () use ($base, $file) {
    return exec("cd $base && cat $file | grep pansar | grep notepad");
},

],



/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD

Find the last four rows in the logfile.

EOD
,

"points" => 1,

"answer" => function () use ($base, $file) {
    //$res = [];
    //exec("cd $base && tail -4 $file", $res);
    //return implode("\n", $res) . "\n";
    return execute("cd $base && tail -4 $file");
},

],



/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD

When was the log opened for the first time? Hint: 'Log opened'.

Answer with the row that says when the log was opened for the first time.

EOD
,

"points" => 1,

"answer" => function () use ($base, $file) {
    return exec("cd $base && grep 'Log opened' $file | head -1");
},

],



/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD

What does the third line where 'wasa' says something say?

EOD
,

"points" => 1,

"answer" => function () use ($base, $file) {
    return exec("cd $base && grep '<@wasa>' $file | head -3 | tail -1");
},

],



/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD

How many lines is logged at the time 11:15?

EOD
,

"points" => 1,

"answer" => function () use ($base, $file) {
    return exec("cd $base && grep '11:15' $file | wc -l");
},

],



/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD

Find the first row where 'pansar' says something when the time is 07:48.

EOD
,

"points" => 1,

"answer" => function () use ($base, $file) {
    return exec("cd $base && grep 07:48 $file | grep pansar | head -1");
},

],



/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD

Find the first 10 lines from 'Wed Jun 17 2015'.

EOD
,

"points" => 1,

"answer" => function () use ($base, $file) {
    $res = [];
    exec("cd $base && grep -A 10 'Day changed Wed Jun 17 2015' $file | tail -10", $res);
    return implode("\n", $res);
},

],



/** ---------------------------------------------------------------------------
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
Solve these optional questions to earn extra points.
EOD
,

"shuffle" => false,

"questions" => [



/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD

Find the lines that are from the 'forum' and contains details about 'projektet' and 'htmlphp'.

EOD
,

"points" => 3,

"answer" => function () use ($base, $file) {
    $res = [];
    exec("cd $base && grep Forum $file | grep htmlphp | grep projektet", $res);
    return implode("\n", $res);
},

],



/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD

What did 'Bobbzorzen' say on the line, two lines before he said 'cewl'?

EOD
,

"points" => 3,

"answer" => function () use ($base, $file) {
    return exec("cd $base && grep '<@Bobbzorzen>' $file | grep -B 2 cewl | head -1");
},

],



/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD

How many words are there in the fourth to ninth row, under the day 'Mon Jun 08 2015'?

EOD
,

"points" => 3,

"answer" => function () use ($base, $file) {
    return exec("cd $base && grep -A 9 'Mon Jun 08 2015' $file | tail -6 | wc -w");
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
