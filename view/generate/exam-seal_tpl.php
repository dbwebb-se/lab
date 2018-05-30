<?php

// Check incoming
$examId = isset($_GET["examId"]) ? $_GET["examId"] : null;
$examId or die("404: Missing id details in request.\n");
$acronym or die("404: Missing acronym in request.\n");

// Get the signature
$signature = isset($_GET["signature"]) ? $_GET["signature"] : null;

// Create log entry for sealing exam
examLogSeal($examId, $acronym, $signature);

// Create base for
$base1 = tempnam("/tmp", "EXAM");
$base = "${base1}_";
$bundle = "exam.tar";
mkdir($base);
mkdir("$base/.dbwebb_exam");

// Prepare the content
file_put_contents("$base/.dbwebb_exam/RECEIPT.md", getReceiptForExam($examId, $acronym));
system("cd $base/.dbwebb_exam/ && sha1sum RECEIPT.md > RECEIPT.md.sha1");

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
