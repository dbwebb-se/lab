<pre><?php

$base1 = tempnam("/tmp", "LAB");
$base = "${base1}_";
$dir = "$base/.answer";
$tar = "$base/answer.tar";

mkdir($base);
mkdir($dir);

file_put_contents("$dir/key", $key);

// Write all answers to file
$sectionId = 0;
foreach ($sections as $section) {
    $sectionId++;
    $questionId = 0;

    foreach ($section['questions'] as $question) {
        $questionId++;
        $answer = formatAnswerJSON($question['answer']());
        file_put_contents("$dir/$sectionId.$questionId", $answer);
    }
}


// Gather it all in a tar file
system("cd $base && tar cf answer.tar .answer");
//var_dump(system("ls -lRa $base"));

// Deliver
header('Content-type: archive/tar');
header('Content-Disposition: attachment; filename="answer.tar"');
readfile("$base/answer.tar");

// Clean up
//exec("rm -rf $base");
unlink($base1);
