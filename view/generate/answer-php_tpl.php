<?="<?php\n"?>

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

// Set error reporting to verbose
error_reporting(-1);              // Report all type of errors
ini_set('display_errors', 1);     // Display all errors

// Load and create object with lab utilities
require __DIR__ . "/.Dbwebb.php";
$dbwebb = new Dbwebb();



<?php
$sectionId = 0;
?>
/** ===================================================================
 * <?= $title . "\n" ?>
 *
 * <?= wrap($intro, "\n * ") ?>
 *
 */



<?php
foreach ($sections as $section) {
    $sectionId++;
    $questionId = 0;
?>
/** -------------------------------------------------------------------
 * Section <?= $sectionId ?> . <?= $section['title'] . "\n" ?>
 *
 * <?= wrap($section['intro'], "\n * ") ?>
 *
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






$ANSWER = "Replace this text with the variable holding the answer.";

// I will now test your answer - change false to true to get a hint.
echo $dbwebb->assertEqual("<?="$sectionId.$questionId"?>", $ANSWER, false);

<?php
    }
}
?>

// Wrap it up
exit($dbwebb->exitWithSummary());
