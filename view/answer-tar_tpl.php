<?php

$base1 = tempnam("/tmp", "LAB");
$base = "${base1}_";
$dir = "$base/.answer";
$tar = "$base/answer.tar";

mkdir($base);
mkdir($dir);

file_put_contents("$dir/key", $key);

// Write all answers to file
$sectionId = 0;
$sumPoints = null;
foreach ($sections as $section) {
    $sectionId++;
    $questionId = 0;

    foreach ($section['questions'] as $question) {
        $questionId++;
        $answer = $question['answer']();
        file_put_contents("$dir/$sectionId.$questionId", $answer);

        if (isset($question['points'])) {
            $points = $question['points'];
            $sumPoints += $points;
            file_put_contents("$dir/$sectionId.$questionId.points", $points);
        }
    }
}

// Summary
file_put_contents("$dir/summary.total", $questionId);
if ($sumPoints) {
    file_put_contents("$dir/summary.points", $sumPoints);
}
if (isset($passPercentage) && !is_null($passPercentage)) {
    file_put_contents("$dir/summary.pass", floor($sumPoints * $passPercentage));
}
if (isset($passDistinctPercentage) && !is_null($passDistinctPercentage)) {
    file_put_contents("$dir/summary.passdistinct", floor($sumPoints * $passDistinctPercentage));
}

// Gather it all in a tar file
system("cd $base && tar cf answer.tar .answer");
//var_dump(system("ls -lRa $base"));

// Deliver
header('Content-type: archive/tar');
header('Content-Disposition: attachment; filename="answer.tar"');
readfile("$base/answer.tar");

// Clean up
exec("rm -rf $base");
unlink($base1);
