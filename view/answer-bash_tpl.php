#!/usr/bin/env bash

<?php
function printLines() {
    global $lines;

    foreach($lines as $line) {
            echo "# $line";
    }
    echo "\n";
}

$currentVersion = VERSION;
echo <<< EOD
# $key
# $course
# $lab
# $acronym
# $created
# $version
#
# Generated $timestamp_now by dbwebb lab-utility $currentVersion.
# https://github.com/mosbth/lab
#
EOD;
?>

. .dbwebb.bash
echo "${PROMPT}Ready to begin."


<?php 
$sectionId = 0;
$description = wordwrap(trim(strip_tags($intro), "\n"), 75, "\n", true);
$lines = explode("\n", $description);
?>
# ==========================================================================
# <?=$title?> 
# 
<?php printLines(); ?>
#

<?php 
foreach ($sections as $section) {
    $sectionId++;
    $questionId = 0;

    $description = wordwrap(trim(strip_tags($section['intro']), "\n"), 75, "\n", true);
    $lines = explode("\n", $description);
?>
# --------------------------------------------------------------------------
# Section <?=$sectionId?>. <?=$section['title']?> 
# 
<?php printLines(); ?>
#


<?php
    foreach ($section['questions'] as $question) {
        $questionId++;
        $description = wordwrap(trim(strip_tags($question['text']), "\n"), 75, "\n", true);
        $lines = explode("\n", $description);

        // Get points
        $points = null;
        if (isset($question["points"])) {
            $points = " (${question["points"]} poäng)";
        }

?>
#
# Exercise <?="$sectionId.$questionId$points"?> 
# 
<?php printLines(); ?>
#
# Write your code below and put the answer into the variable ANSWER.
#





ANSWER="Replace this text with the variable holding the answer."

# Is the answer as expected?
# When you get stuck - change false to true to get a hint.
assertEqual "<?="$sectionId.$questionId"?>" false

<?php 
    }
}
?>

exitWithSummary
