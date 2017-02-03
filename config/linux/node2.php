<?php

/**
 * Generate random values to use in lab.
 */
include __DIR__ . "/../random.php";

// Mixed variables n stuff

// SECTION 1 ****************************************************
$base = __DIR__ . "/node2_extra/";
$file = "ircLog.txt";
$highlightsFile = "highlights.txt";
$lineNumber = 4;



// SECTION 2 ****************************************************
$queryStrings = ["first_name=Neil&last_name=Armstrong&mission=Apollo11",
                    "first_name=Pete&last_name=Conrad&mission=Apollo12",
                    "first_name=Jim&last_name=Lovell&mission=Apollo13",];
$queryStringIndex = rand_int(0, count($queryStrings) - 1);
$queryString = $queryStrings[$queryStringIndex];
$queryKey = "mission";


function assembleObject ($keys, $values) {
    $return_arr = [];
    foreach ($keys as $index => $key) {
        $value = $values[$index];
        if (is_array($value)) {
            $value = $value[rand_int(0, count($value) - 1)];
        }

        $return_arr[$key] = $value;
    }
    return $return_arr;
}

$keys = ["url", "id", "payload", "type"];
$values = ["https://dbwebb.se/", ["42", "17", "414", "415"], "aHR0cHM6Ly9kYndlYmIuc2Uv", ["csv", "json", "xml"]];
$object = assembleObject($keys, $values);
$objectString = "";
foreach ($object as $key => $value) {
    $objectString .= "$key = $value\n<br>";
}



// SECTION 3 ****************************************************
$cryptoStrings = ["So close, no matter how far", "Couldn't be much more from the heart", "Forever trusting who we are", "And nothing else matters", "Never opened myself this way", "Life is ours, we live it our way", "All these words I don't just say", "And nothing else matters"];
$cryptoRandomIndex = rand_int(0, count($cryptoStrings) - 2);
$cryptoString1 = $cryptoStrings[$cryptoRandomIndex];
$cryptoString2 = $cryptoStrings[$cryptoRandomIndex + 1];

return [



/**
 * Titel and introduction to the lab.
 */
"title" => "Lab 4 - JavaScript with Nodejs",

"intro" => <<<EOD
JavaScript using nodejs. These exercises are directed at the [nodejs api](https://nodejs.org/api/) and how to use the api documentation during coding.
EOD
,


"sections" => [



/** ===================================================================================
 * New section of exercises.
 */
[
"title" => "Filesystem",

"intro" => <<<EOD
This section is about the built-in module filesystem and how to read files synchronously.
EOD
,

"shuffle" => false,

"questions" => [



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Start by require the filesystem module `fs` and assign the module to a variable called `fs`.

Use the new `fs` variable and the function `readFileSync` to read the entire `$file` into a variable in UTF-8 encoding. Answer with the number of characters in the file.
EOD
,

"answer" => function () use ($base, $file){
    $text = utf8_decode(file_get_contents($base.$file));

    return strlen($text);
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Use your variable from the exercise above and answer with the contents on line $lineNumber.
EOD
,

"answer" => function () use ($base, $file, $lineNumber){
    $text = file_get_contents($base.$file);
    $textArray = explode("\n", $text);
    return stripslashes($textArray[$lineNumber - 1]);
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Write the third row of `$file` to a new file that you create called `$highlightsFile`. Replace `$highlightsFile` if it already exists.
Answer with characters 7 through 10 from `$highlightsFile`.
EOD
,

"answer" => function () use ($base, $file, $lineNumber, $highlightsFile) {
    $text = file_get_contents($base.$file);
    $textArray = explode("\n", $text);
    return substr(stripslashes($textArray[$lineNumber - 1]), 6, 3);
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
"title" => "querystring",

"intro" => <<<EOD
This section is about the built-in module querystring and how to parse query strings.
EOD
,

"shuffle" => false,

"questions" => [



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Start by require the querystring module `querystring` and assign the module to a variable called `querystring`.

Use the new `querystring` variable and to parse to parse a query string '$queryString'. Answer with the the value of $queryKey.
EOD
,

"answer" => function () use ($queryString, $queryKey){
    parse_str($queryString, $parsedStrings);
    return $parsedStrings[$queryKey];
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Use the parsed query string from above to concatenate the astronaut's fullname with the string ' was on the ' and the mission that the astronaut was on.
EOD
,

"answer" => function () use ($queryString){
    parse_str($queryString, $parsedStrings);
    return $parsedStrings["first_name"] . " " . $parsedStrings["last_name"] . ' was on the ' . $parsedStrings["mission"];
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Create a javascript object with the following attributes and values:

$objectString

Encode the javascript object as a querystring.

EOD
,

"answer" => function () use ($object) {
    return http_build_query($object);
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
"title" => "crypto",

"intro" => <<<EOD
This section is about the built-in module crypto and how to encrypt and decrypt data with nodejs.
EOD
,

"shuffle" => false,

"questions" => [



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Start by require the crypto module `crypto` and assign the module to a variable called `crypto`.

Use the new `crypto` variable to create a hash of '$cryptoString1' using the `sha256` algorithm.

Answer with a digest of the hash in `hex` format.
EOD
,

"answer" => function () use ($cryptoString1){
    return hash("sha256", $cryptoString1);
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
