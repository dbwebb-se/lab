#!/usr/bin/env python3
# -*- coding: utf-8 -*-

"""
<?="$key
$course
$lab
$acronym
$created
$version
"?>

Generated <?=$timestamp_now?> by dbwebb lab-utility <?=VERSION?>.
https://github.com/mosbth/lab
"""

<?php if (isset($header)) echo $header ?>

from Dbwebb import Dbwebb

dbwebb = Dbwebb()
print(">>> Ready to begin.")



<?php 
$sectionId = 0;
?>
"""
==========================================================================
<?= $title ?> 
 
<?= wrap($intro, "\n") ?> 
"""



<?php 
foreach ($sections as $section) {
    $sectionId++;
    $questionId = 0;
?>
"""
--------------------------------------------------------------------------
Section <?=$sectionId?>. <?=$section['title']?> 
 
<?= wrap($section['intro'], "\n") ?> 
"""



<?php 
    foreach ($section['questions'] as $question) {
        $questionId++;

        // Get points
        $points = null;
        if (isset($question["points"])) {
            $points = " (${question["points"]} points)";
        }
?>
"""
Exercise <?="$sectionId.$questionId$points"?> 
 
<?= wrap($question['text'], "\n") ?> 

Write your code below and put the answer into the variable ANSWER.
"""






ANSWER = "Replace this text with the variable holding the answer."

# I will now test your answer - change false to true to get a hint.
print(dbwebb.assertEqual("<?="$sectionId.$questionId"?>", ANSWER, False))

<?php 
    }
}
?>

dbwebb.exitWithSummary()
