<?php

$base = tempnam("/tmp", "LAB");
$dir = "$base/.answer";
$tar = "$base/answer.tar";

mkdir($base);
mkdir($dir);

file_put_contents("$dir/key", $key);

foreach ($sections as $section) {
    foreach ($section['questions'] as $question) {
        $text .= formatAnswerPrintable($question['answer']()) . "\n";
    }
}

foreach ($sections as $section) {
    $sectionId++;
    $questionId = 0;

    foreach ($section['questions'] as $question) {
        $questionId++;
        $answer = formatAnswerJSON($question['answer']());
        $json .= "\t\t\"$sectionId.$questionId\":\t\t$answer,\n";
    }
}


header('Content-type: archive/tar');
header('Content-Disposition: attachment; filename="extra.tar"');
readfile();
