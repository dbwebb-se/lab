<?php

/**
 * Generate random values to use in lab.
 */
include LAB_INSTALL_DIR . "/config/random.php";


// Settings
$base = __DIR__ . "/bash1_extra";
$tmpBase = "/tmp";


// For shell exec to get correct
putenv('LANG=C.UTF-8');



return [



/**
 * Titel and introduction to the lab.
 */
"answerFormat" => "text",

"title" => "Bash 1 - linux",

"intro" => "
A lab where you use Unix commands to list, find, and change i directory structure.

The entire lab uses the apache2 configuration directory from '/etc/apache2' in linux installations.
",

"header" => null,

"passPercentage" => 100/100,
"passDistinctPercentage" => 100/100,

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
"title" => "ls",

"intro" => <<<EOD

In this section we use the `ls` command to list files in the directory structure.

EOD
,

"shuffle" => false,

"questions" => [



/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD

Use the command `ls` to list the files in the `apache2` directory, list one file per line.

Tip: Use the command `man ls` to see the flags that can be used for the `ls` command.

EOD
,

"points" => 1,

"answer" => function () use ($base) {
    return execute("cd $base && ls -1 ./apache2");
},

],



/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD

Use the command `ls` to list the files in the `apache2` directory. Use a flag so every directory gets a slash (`/`) after the name, list one file per line.

Tip: Use the command `man ls` to see the flags that can be used for the `ls` command.

EOD
,

"points" => 1,

"answer" => function () use ($base) {
    return execute("cd $base && ls -1p ./apache2");
},

],



/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD

First change directory to `apache2/mods-available` and use the `ls` command to list the files in the directory.

List only files beginning with 'a' and have the file extension '.conf'. List one file per line.

You can use `&&` to chain two or more commands on the same line.

Tip: Use a wildcard `*` to match against more than one file.

EOD
,

"points" => 1,

"answer" => function () use ($base) {
    return execute("cd $base && cd ./apache2/mods-available/ && ls -1 a*.conf");
},

],



/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD

List all, even hidden, files and directories in the `apache2/sites-available` directory. List one file per line.

EOD
,

"points" => 1,

"answer" => function () use ($base) {
    return execute("cd $base && ls -1a ./apache2/sites-available");
},

],



/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD

List files and directories in `apache2/conf-available`, sort the files in file size order with the smallest file first.

List one file per line.

Do not show hidden files.

EOD
,

"points" => 1,

"answer" => function () use ($base) {
    return execute("cd $base && ls -1rS ./apache2/conf-available");
},

],



/** ---------------------------------------------------------------------------
 * Closing up this section.
 */
], // EOF questions
], // EOF section



/** ===========================================================================
 * New section of exercises.
 */
[
"title" => "file",

"intro" => <<<EOD

In this section we will use the `file` command to get information on the files in the directory structure.

EOD
,

"shuffle" => false,

"questions" => [



/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD

Use the `file` command to show the file name and type for the files and directories in `apache2`.

EOD
,

"points" => 1,

"answer" => function () use ($base) {
    return execute("cd $base && file apache2/*");
},

],



/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD

Use the `file` command to show only the file type for the files and directories in `apache2`.

EOD
,

"points" => 1,

"answer" => function () use ($base) {
    return execute("cd $base && file -b apache2/*");
},

],



/** ---------------------------------------------------------------------------
 * Closing up this section.
 */
], // EOF questions
], // EOF section



/** ===========================================================================
 * New section of exercises.
 */
[
"title" => "cp, mv, mkdir och rm",

"intro" => <<<EOD

In this section we use the `cp`, `mv`, `mkdir` and `rm` to change in the directory structure.

EOD
,

"shuffle" => false,

"questions" => [



/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD

Use the `mkdir` command to create a directory called `backup/` if the directory does not exist.

Copy all files with the file extension `.conf` from `apache2/mods-available` to a new directory `backup/conf/`, create the directory if it does not exist.

Lista the files in the new directory `backup/conf/`, sort the files according to file size, with the biggest file first. List one file per line.

Tip: Use `&&` to execute more than one command and `man mkdir` to find the correct flag.

EOD
,

"points" => 1,

"answer" => function () use ($base, $tmpBase) {
    execute("cd $tmpBase && mkdir -p backup && mkdir -p backup/conf");
    execute("cd $base && cp apache2/mods-available/*.conf $tmpBase/backup/conf");
    return execute("cd $tmpBase && ls -1S ./backup/conf");
},

],



/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD

Use the `mkdir` command to create a new subdirectory `backup/php/` if it does not exist.

Use the `mv` command to move all files beginning with 'php' from `backup/conf/` to the new directory.

List the files in the `backup/conf/` directory. List one file per line.

EOD
,

"points" => 1,

"answer" => function () use ($base, $tmpBase) {
    return execute("cd $tmpBase && mkdir -p backup/php && mv backup/conf/php* backup/php && ls -1 ./backup/conf");
},

],



/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD

Remove all files the begins with 'proxy' from `backup/conf/`.

List the files in the `backup/conf/` directory. List one file per line.

EOD
,

"points" => 1,

"answer" => function () use ($base, $tmpBase) {
    return execute("cd $tmpBase && rm backup/conf/proxy* && ls -1 ./backup/conf");
},

],



/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD

Use the `cp` command to copy all files from the `backup/php/` directory to the `backup/` directory.

Remove the entire `backup/php/` directory.

List files and directories in the `backup/` directory, use a flag so that all directories gets a slash (`/`) at the end of the file name. List one file per line.

EOD
,

"points" => 1,

"answer" => function () use ($base, $tmpBase) {
    return execute("cd $tmpBase && cp backup/php/* backup/ && rm -rf backup/php && ls -1p ./backup/");
},

],



/** ---------------------------------------------------------------------------
 * Closing up this section.
 */
], // EOF questions
], // EOF section



/** ===========================================================================
 * New section of exercises.
 */
[
"title" => "find",

"intro" => <<<EOD

In this section we use the `find` to find files and directories in a directory structure.

In this section you work with the original directory `apache2/`.

EOD
,

"shuffle" => false,

"questions" => [



/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD

Use the `find` command to find the `apache2.conf` file in the `apache2/` directory.

EOD
,

"points" => 1,

"answer" => function () use ($base) {
    return execute("cd $base && find apache2 -name 'apache2.conf'");
},

],



/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD

Use the `find` command to find all empty files in the `apache2/` directory.

EOD
,

"points" => 1,

"answer" => function () use ($base) {
    return execute("cd $base && find apache2 -type f -empty");
},

],



/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD

Use the `find` command to find all directories which have 'conf' in the file name in the `apache2/` directory.

Search only in the `apache2/` directory and not inte subdirectories.

EOD
,

"points" => 1,

"answer" => function () use ($base) {
    return execute("cd $base && find apache2 -maxdepth 1 -type d -name '*conf*'");
},

],



/** ---------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD

Use the `find` command to find all files which contain 'ssl' in the name and has the file extension '.conf'.

Search only in the `apache2/sites-available` and `apache2/mods-available` directories.

EOD
,

"points" => 1,

"answer" => function () use ($base) {
    return execute("cd $base && find apache2/sites-available apache2/mods-available -type f -name '*ssl*.conf'");
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
