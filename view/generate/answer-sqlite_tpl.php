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

<?php if (isset($header)) echo $header ?>

. .dbwebb.bash
echo "${PROMPT}Ready to begin."
checkCommandOrAbort "sqlite3"



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
#"""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""
# Exercise <?="$sectionId.$questionId$points"?> 
# 
# <?= wrap($question['text']) ?>
#
# Write your SQL-statement(s) below, the last statement will be your final
# ANSWER. Change false to true to get verbose output of your SQL query and
# view its result.
#

#SQL 'Uncomment this and replace this text with your SQL statement' false






# I will now test your answer - change false to true to get a hint.
assertEqual '<?="$sectionId.$questionId"?>' false

<?php 
    }
}
?>

exitWithSummary
