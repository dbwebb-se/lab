#!/usr/bin/env python3

"""
<?="$key
$course
$lab
$labversion
$acronym
$created
$version
"?>

Generated <?=$timestamp_now?> by dbwebb lab-utility <?=VERSION?>.
https://github.com/dbwebb-se/lab
"""

from dbwebb import Dbwebb

<?php if (isset($header)) echo $header ?>

# pylint: disable=invalid-name

dbwebb = Dbwebb()
dbwebb.ready_to_begin()



<?php
$sectionId = 0;
?>
# ==========================================================================
# <?= "$title\n" ?>
#
# <?= wrap($intro) ?>
#



<?php
foreach ($sections as $section) {
    $sectionId++;
    $questionId = 0;
?>
# --------------------------------------------------------------------------
# Section <?= "$sectionId. ${section['title']}\n" ?>
#
#<?= wrap(" ${section['intro']}") ?>
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
# """"""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""""
# Exercise <?= "$sectionId.$questionId$points\n" ?>
#
# <?= wrap($question['text']) ?>
#
# Write your code below and put the answer into the variable ANSWER.
#






ANSWER = "Replace this text with the variable holding the answer."

# I will now test your answer - change false to true to get a hint.
dbwebb.assert_equal("<?="$sectionId.$questionId"?>", ANSWER, False)

<?php
    }
}
?>

dbwebb.exit_with_summary()
