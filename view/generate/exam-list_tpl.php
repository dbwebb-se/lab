<?php

/**
 * Print details for exam
 */
function printExamDetails($type, $res) {
    $html = "";

    if (empty($res)) {
        return;
    }

    foreach ($res AS $row) {
        $html .= "\n";
        $html .= "Id:          {$row["target"]}\n";
        $html .= "Description: {$row["description"]}\n";
        $html .= "What:        {$row["type"]}\n";
        $html .= "Where:       {$row["courseEvent"]}/{$row["target"]}\n";
        $html .= "Length:      " . gmdate("H:i:s", $row["timelimit"]) . "\n";
        $html .= "Duration:    {$row["start"]} - {$row["stop"]}\n";
    }

    echo <<< EOD
$type
-------------------------------------------------------
$html

EOD;
}



// Check incoming
if (!$course) {
    die("404: Missing course details in query.\n");
}

// Get list of exams
list($current, $active, $planned, $passed) = examList($course);


// Deliver
header("Content-type: text/plain; charset=utf-8");
echo "Active, planned and passed events for course '$course'.\n";
echo "================= ${current["ts"]} =================\n\n";
if (empty($active) && empty($planned) && empty($passed)) {
    echo "There are no active, planned nor passed events.\n";
}
printExamDetails("ACTIVE", $active);
printExamDetails("PLANNED", $planned);
printExamDetails("PASSED", $passed);
