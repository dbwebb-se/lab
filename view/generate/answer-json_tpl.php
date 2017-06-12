<?php
/**
 * Generate JSON response file.
 */

$data = [
    "details" => "Generated for $acronym at $created.",
    "key" => $key,
    "summary" => []
];

$sectionId = 0;
$numQuestions = 0;
$sumPoints = null;
$json = "";
foreach ($sections as $section) {
    $sectionId++;
    $questionId = 0;

    foreach ($section['questions'] as $question) {
        $numQuestions++;
        $questionId++;

        if (isset($question['points'])) {
            $points = $question['points'];
            $sumPoints += $points;
            $data["points"]["$sectionId.$questionId"] = $points;
        }

        $data["answers"]["$sectionId.$questionId"] = $question['answer']();
    }
}

$pass = null;
if (isset($passPercentage) && !is_null($passPercentage)) {
    $pass = floor($sumPoints * $passPercentage);
}

$passdistinct = null;
if (isset($passDistinctPercentage) && !is_null($passDistinctPercentage)) {
    $passdistinct = floor($sumPoints * $passDistinctPercentage);
}

$data["summary"]["questions"] = $numQuestions;
$data["summary"]["points"] = $sumPoints;
$data["summary"]["pass"] = $pass;
$data["summary"]["passdistinct"] = $passdistinct;

$options = JSON_PRETTY_PRINT;
if (defined("JSON_PRESERVE_ZERO_FRACTION")) {
    $options = JSON_PRETTY_PRINT | JSON_PRESERVE_ZERO_FRACTION;
}

echo json_encode($data, $options);
