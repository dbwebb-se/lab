<?="<?php\n"?>
/**
 * @preserve <?=$key?>
 */

// Set error reporting to verbose
error_reporting(-1);              // Report all type of errors
ini_set('display_errors', 1);     // Display all errors

// Load and create object with lab utilities
require __DIR__ . "/CDbwebb.php";
$dbwebb = new CDbwebb();



<?php 
$sectionId = 0;
?>


/** ===================================================================
 * <?=$title?>
 *
 * <?=wordwrap(trim(strip_tags($intro), "\n"), 75, "\n * ", true)?>
 *
 */

<?php 
foreach ($sections as $section) {
    $sectionId++;
    $questionId = 0;
?>


/** -------------------------------------------------------------------
 * Section <?=$sectionId?>. <?=$section['title']?>
 *
 * <?=wordwrap(trim(strip_tags($section['intro']), "\n"), 75, "\n * ", true)?>
 *
 */

<?php 
    foreach ($section['questions'] as $question) {
        $questionId++;
?>


/**
 * Exercise <?="$sectionId.$questionId"?>
 *
 * <?=wordwrap(trim(strip_tags($question['text']), "\n"), 75, "\n * ", true)?>
 *
 * Write your code below and put the answer into the variable ANSWER.
 */




$ANSWER = "Replace this text with the variable holding the answer.";

// Is the answer as expected?
// When you get stuck - change false to true to get a hint.
echo $dbwebb->assertEqual("<?="$sectionId.$questionId"?>", $ANSWER, false);

<?php 
    }
}
?>


// Wrap it up
exit($dbwebb->exitWithSummary());
