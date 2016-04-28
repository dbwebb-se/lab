<?php

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

// Define what types of labs that exists and combine accordingly
$labCommon = [
    ["filename" => "instruction.html", "action" => "lab"],
    ["filename" => "extra.tar", "action" => "answer-extra"],
];

$labPerType = [
    "bash" => [
        ["filename" => "answer.bash", "action" => "answer-bash", "mode" => "755"],
        ["filename" => ".dbwebb.bash", "action" => "answer-bash-assert"],
        ["filename" => "answer.tar",  "action" => "answer-tar"],
    ]
];

// Default types, guessed from course and lab
$defaultType = [
    "htmlphp"    => "php",
    "oophp"      => "php",
    "javascrip1" => "javascript",
    "webgl"      => "javascript",
    "python"     => "python",
    "oopython"   => "python",
    "linux"      => [
        "lab1" => "bash",
    ],
];

// Get type of lab and generate it
$type = isset($_GET["type"]) ? $_GET["type"] : null;

if (!$type) {
    if ($course && $lab) {
        if (isset($defaultType[$course])) {
            if (is_array($defaultType[$course])) {
                if (isset($defaultType[$course][$lab])) {
                    $type = $defaultType[$course][$lab];
                }
            } else {
                $type = $defaultType[$course];
            }
        }
    }
}

$type or die("Missing type of bundle to create.");


// Generate all lab parts and save as files
$labs = array_merge($labCommon, $labPerType[$type]);
$keyPart = "key=$key";
foreach ($labs as $lab) {
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
