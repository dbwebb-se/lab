<?php

// Support if only accessed by key
if (is_null($lab)) {
    $res = getDetailsFromKeyOrDie($key);
    $course = $res->course;
    $lab = $res->lab;
    $labversion = $res->labversion;
}

// Check if valid combination and then create paths to source.
$srcLab = getConfigurationFor($course, $lab, $labversion);
if ($srcLab === false) {
    die("Invalid combination of course and lab.");
}
$srcLabName = basename($srcLab, ".php");
$srcLabExtra = dirname($srcLab) . "/${srcLabName}_extra";

// Create base for
$base1 = tempnam("/tmp", "LAB");
$base = "${base1}_";
$bundle = "bundle.tar";
mkdir($base);

// Create base url from request
$baseurl = $_SERVER["REQUEST_SCHEME"]
    . "://"
    . $_SERVER["HTTP_HOST"]
    . dirname($_SERVER["SCRIPT_NAME"])
    . "/lab.php";

// General items to create for all labs
$labCommon = [
    ["filename" => "instruction.html", "action" => "lab"],
    //["filename" => "extra.tar", "action" => "answer-extra"], //OBSOLETE
    ["dirname" => __DIR__ . "/../../$srcLabExtra"],
];

//Specific items to create
$labPerType = [
    "bash" => [
        ["filename" => "answer.bash", "action" => "answer-bash", "mode" => "755"],
        ["filename" => ".dbwebb.bash", "action" => "answer-bash-assert"],
        ["filename" => "answer.tar",  "action" => "answer-tar"],
    ],
    "sqlite" => [
        ["filename" => "answer.bash", "action" => "answer-sqlite", "mode" => "755"],
        ["filename" => ".dbwebb.bash", "action" => "answer-bash-assert"],
        ["filename" => "answer.tar",  "action" => "answer-tar"],
    ],
    "python" => [
        ["filename" => "answer.py", "action" => "answer-py", "mode" => "755"],
        ["filename" => "dbwebb.py", "action" => "answer-py-assert"],
        //["filename" => ".answer.json",  "action" => "answer-json"],
        ["filename" => ".answer.json",  "action" => "answer-json"],
    ],
    "php" => [
        ["filename" => "answer.php", "action" => "answer-php", "mode" => "755"],
        //["filename" => ".CDbwebb.php", "action" => "answer-php-assert"],
        //["filename" => ".answer.json",  "action" => "answer-json"],
        ["filename" => ".Dbwebb.php", "action" => "answer-php-assert"],
        ["filename" => ".answer.json",  "action" => "answer-json"],
    ],
    "javascript" => [
        ["filename" => "answer.html", "action" => "answer-html"],
        ["filename" => "answer.js",  "action" => "answer-js"],
    ],
    "node" => [
        ["filename" => "answer.js",  "action" => "answer-node", "mode" => "755"],
        ["filename" => ".dbwebb.js", "action" => "answer-node-assert"],
        ["filename" => ".answer.json",  "action" => "answer-json"],
    ],
];

// Get type of lab and generate it
$type = isset($_GET["type"]) ? $_GET["type"] : null;
$type = getLabType($course, $lab, $type);
$type or die("Missing type of bundle to create.");


// Generate all lab parts and save as files
$labs = array_merge($labCommon, $labPerType[$type]);
$keyPart = "key=$key";
foreach ($labs as $lab) {
    if (isset($lab["dirname"])) {
        if (is_dir($lab["dirname"])) {
            system("cp -r ${lab["dirname"]}/* $base/");
        }
        continue;
    }

    $url = "$baseurl?$keyPart&${lab["action"]}";
    $content = file_get_contents($url);
    file_put_contents("$base/${lab["filename"]}", $content);

    if (isset($lab["mode"])) {
        system("chmod ${lab["mode"]} $base/${lab["filename"]}");
    }

    if (substr($lab["filename"], -4) == ".tar") {
        system("cd $base && tar xf ${lab["filename"]} && rm ${lab["filename"]}");
    }
}

// Gather it all in a tar file
system("cd $base && tar cf $bundle .");
//var_dump(system("ls -lRa $base"));

// Deliver
header("Content-type: archive/tar");
header("Content-Disposition: attachment; filename=\"$bundle\"");
readfile("$base/$bundle");

// Clean up
exec("rm -rf $base");
unlink($base1);
