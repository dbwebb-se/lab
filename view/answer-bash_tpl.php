#!/usr/bin/env bash

<?php
$currentVersion = VERSION;
echo <<< EOD
#
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

<?= $header ?>

. .dbwebb.bash
echo "${PROMPT}Ready to begin."



<?php 
$sectionId = 0;
?>
# ==========================================================================
# <?=$title?> 
# 
# <?= wrap($intro) ?>
#



<?php 
foreach ($sections as $section) {
    $sectionId++;
    $questionId = 0;
?>
# --------------------------------------------------------------------------
# Section <?=$sectionId?>. <?=$section['title']?> 
# 
# <?= wrap($section['intro']) ?>
#



<?php
    foreach ($section['questions'] as $question) {
        $questionId++;

        // Get points
        $points = null;
        if (isset($question["points"])) {
            $points = " (${question["points"]} points)";
        }
?>
#
# Exercise <?="$sectionId.$questionId$points"?> 
# 
# <?= wrap($question['text']) ?>
#
# Write your code below and put the answer into the variable ANSWER.
#






ANSWER="Replace this text with the variable holding the answer."

# I will now test your answer - change false to true to get a hint.
assertEqual "<?="$sectionId.$questionId"?>" false

<?php 
    }
}
?>

exitWithSummary
