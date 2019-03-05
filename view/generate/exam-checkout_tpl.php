<?php

// Check incoming
$course or die("404: Missing course details in request.\n");
$target or die("404: Missing target details in request.\n");
$labversion or die("404: Missing version details in request.\n");
$acronym or die("404: Missing acronym in request.\n");

// Check if valid combination and then create paths to source.
$source = getConfigurationFor($course, $target, $labversion);
$source or die("404: Invalid combination of course, target and version.\n");

// Get the signature
$signature = isset($_GET["signature"]) ? $_GET["signature"] : null;

// Get details on active exam in database
$res = getActiveExamDetail($course, $target);
if (empty($res)) {
    die("404: There is no active exam.\n");
}

$source = "$source/${res["target"]}";
if (!is_dir($source)) {
    die("404: There is no source for the course event '$source'.");
} 

// Only check if there is an active exam
$checkIfActive = isset($_GET["checkIfActive"]) ? true : false;
if ($checkIfActive) {
    header("Content-type: text/plain");
    die("ACTIVE: ${res["type"]} - ${res["description"]} (${res["courseEvent"]}/${res["target"]})");
}

// Create log entry for checking out exam
$examId = $res["id"];
examLogCheckout($examId, $acronym, $signature);

// Create base for
$base1 = tempnam("/tmp", "EXAM");
$base = "${base1}_";
$dir = ".dbwebb/exam";
$bundle = "exam.tar";
mkdir("$base/$dir/receipt", 0755, true);

// Prepare the content
system("cp -r $source/* $base/");
system("cp -r $source/.??* $base/");

file_put_contents("$base/$dir/id.md", "ID: $examId\ntarget: ${res["target"]}\nacronym: $acronym\n");
#system("cd $base/$dir && sha1sum id.md > id.md.sha1");

$ts = date('YmdHis');
file_put_contents("$base/$dir/receipt/$ts.md", getReceiptForExam($examId, $acronym));
#system("cd $base/$dir/receipt && sha1sum $ts.md > $ts.md.sha1");

// Gather it all in a tar file
system("cd $base && tar cf $bundle .");

// Deliver
header("Content-type: archive/tar");
header("Content-Disposition: attachment; filename=\"$bundle\"");
readfile("$base/$bundle");

// header("Content-type: text/plain");
// var_dump(system("ls -lRa $base"));
// readfile("$base/$bundle");

// Clean up
exec("rm -rf $base");
unlink($base1);
