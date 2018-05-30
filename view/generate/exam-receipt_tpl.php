<?php

// Check incoming
$examId = isset($_GET["examId"]) ? $_GET["examId"] : null;
$examId or die("404: Missing id details in request.\n");
$acronym or die("404: Missing acronym in request.\n");

// Prepare the content
header("Content-type: text/plain; charset=utf-8");
echo getReceiptForExam($examId, $acronym);
