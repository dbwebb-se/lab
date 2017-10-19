<?php
$currentVersion = VERSION;
echo <<< EOD
/**
 * @preserve $key
 *
 * $key
 * $course
 * $lab
 * $labversion
 * $acronym
 * $created
 * $version
 *
 * Generated $timestamp_now by dbwebb lab-utility $currentVersion.
 * https://github.com/mosbth/lab
 */
EOD;
?>

<?php if (isset($header)) echo $header ?>

/*jshint maxcomplexity:false */
/* eslint-disable indent */
/* jscs:disable indent */
(function (dbwebb) {
"use strict";

var ANSWER = null;

console.log("Ready to begin.");


<?php
$sectionId = 0;

?>
/** ======================================================================
 * <?= $title . "\n" ?>
 *
<?php if ($intro) : ?>
 * <?= wrap($intro, "\n * ") ?>
 *
<?php endif; ?>
 */



<?php
foreach ($sections as $section) {
    $sectionId++;
    $questionId = 0;
?>
/** ----------------------------------------------------------------------
 * Section <?= $sectionId ?> . <?= $section['title'] . "\n" ?>
 *
<?php if ($section['intro']) : ?>
 * <?= wrap($section['intro'], "\n * ") ?>
 *
<?php endif; ?>
 */



<?php
    foreach ($section['questions'] as $question) {
        $questionId++;

        // Get points
        $points = null;
        if (isset($question["points"])) {
            $points = " (${question["points"]} points)";
        }
?>
/**
 * Exercise <?= "$sectionId.$questionId$points\n" ?>
 *
 * <?= wrap($question['text'], "\n * ") ?>
 *
 * Write your code below and put the answer into the variable ANSWER.
 */






ANSWER = "Replace this text with the variable holding the answer.";

// I will now test your answer - change false to true to get a hint.
dbwebb.assert("<?="$sectionId.$questionId"?>", ANSWER, false);

<?php
    }
}
?>

console.log(dbwebb.exitWithSummary());
}(window.dbwebb));
