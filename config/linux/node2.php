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
    $objectString .= "$key = $value\n";
}



// SECTION 3 ****************************************************
$allCryptoStrings = ["So close, no matter how far",
                    "Couldnt be much more from the heart",
                    "Forever trusting who we are",
                    "And nothing else matters",
                    "Never opened myself this way",
                    "Life is ours, we live it our way",
                    "All these words I dont just say",
                    "And nothing else matters"];
$cryptoRandomIndex = rand_int(0, count($allCryptoStrings) - 4);
$cryptoStrings = [$allCryptoStrings[$cryptoRandomIndex],
                    $allCryptoStrings[$cryptoRandomIndex + 1],
                    $allCryptoStrings[$cryptoRandomIndex + 2],
                    $allCryptoStrings[$cryptoRandomIndex + 3]];

$cryptoString1 = $cryptoStrings[0];
$cryptoStringsString = "'" . implode("', '", $cryptoStrings) . "'";

$hmacedStrings = ["2sQc86l8abV9vEACt5ayaTOaSQ6cUKQnCF3LwNVwIUc="];



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
Start by requiring the filesystem module `fs` and assign the module to a variable called `fs`.

Use the new `fs` variable and the function `readFileSync` to read the entire `$file` in UTF-8 encoding into a variable. Answer with the number of characters in the file.
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
Write line number $lineNumber of `$file` to a new file synchronously that you create called `$highlightsFile`. Replace `$highlightsFile` if it already exists.
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
Start by requiring the querystring module `querystring` and assign the module to a variable called `querystring`.

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

```json
$objectString
```

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
Start by requiring the crypto module `crypto` and assign the module to a variable called `crypto`.

Use the new `crypto` variable to create a hash of '$cryptoString1' using the `sha256` algorithm.

Answer with a digest of the hash in `hex` format.
EOD
,

"answer" => function () use ($cryptoString1){
    return hash("sha256", $cryptoString1);
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Create an array called `cryptoStrings` holding the strings $cryptoStringsString.

Use filter to create an array only containing elements that has the string 'nothing else matters' in them.

Answer with the array.
EOD
,

"answer" => function () use ($cryptoStrings){
    $return_arr = [];
    for ($i = 0; $i < count($cryptoStrings); $i++) {
        if (strpos($cryptoStrings[$i], 'nothing else matters') !== false) {
            $return_arr[] = $cryptoStrings[$i];
        }
    }

    return $return_arr;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Use the array from above only containing elements with 'nothing else matters'.

For the elements in the array create a hex digest of a hash created with with the `sha256` algorithm of each element.

Answer with the array of hashes.
EOD
,

"answer" => function () use ($cryptoStrings){
    $return_arr = [];
    for ($i = 0; $i < count($cryptoStrings); $i++) {
        if (strpos($cryptoStrings[$i], 'nothing else matters') !== false) {
            $return_arr[] = hash("sha256", $cryptoStrings[$i]);
        }
    }

    return $return_arr;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Using `cryptoStrings` create a hash of the elements containing both an 'i', an 'e' and a 'm', check both capital and non-capital letters.

For the remaining elements create a hex digest of a hash created with with the `sha256` algorithm of each remaining element.

Answer with the array of hashes.
EOD
,

"answer" => function () use ($cryptoStrings){
    $return_arr = [];
    for ($i = 0; $i < count($cryptoStrings); $i++) {
        if (strpos(strtolower($cryptoStrings[$i]), 'i') !== false && strpos(strtolower($cryptoStrings[$i]), 'e') !== false && strpos(strtolower($cryptoStrings[$i]), 'm') !== false) {
            $return_arr[] = hash("sha256", $cryptoStrings[$i]);
        }
    }

    return $return_arr;
},

],



/** -----------------------------------------------------------------------------------
 * A question.
 */
[

"text" => <<<EOD
Using the same `cryptoStrings` array from above, create a hash of the elements containing 'matters', check both capital and non-capital letters.

For the remaining elements create a HMAC using the `sha256` algorithm and the secret 'metallica' for each element. Create a `base64` digest of the HMAC for each element.

Answer with the array of HMACs.
EOD
,

"answer" => function () use ($hmacedStrings) {
    return $hmacedStrings;
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
