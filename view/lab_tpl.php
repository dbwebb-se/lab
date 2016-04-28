<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?=$title?></title>
<style>
<?=file_get_contents("style/style.css")?>
</style>
</head>
<body>

<pre><?="
$key
$course
$lab
$acronym
$created
$version
" ?>
</pre>

<p><i>Generated <?=$timestamp_now?> by <a href="https://github.com/mosbth/lab">dbwebb lab-utility</a> <?=VERSION?>.</i></p>
<hr>

<h1><?=$title?></h1>
<?=$intro?>

<?php 
// How to format the answers
if (!isset($answerFormat)) {
    $answerFormat = "json";
}

$sectionId = 0;

foreach ($sections as $section) :
$sectionId++;
$questionId = 0;
?>

<h2><?=$sectionId . ". " . $section['title']?></h2>
<?=$section['intro']?>

<?php 
foreach ($section['questions'] as $question) :
$questionId++;
?>

<?php
$points = null;
if (isset($question["points"])) {
    $points = " (${question["points"]} poäng)";
}
?>
<h3>Exercise <?="$sectionId.$questionId$points"?></h3>
<?=$question['text']?>


<?php if ($doAnswers) : ?>

<h4>Answer</h4>

<?php if ($answerFormat == "json") : ?>
<pre><?= formatAnswerPrintable($question['answer']()) . " (" . gettype($question['answer']()) . ")" ?></pre>

<?php elseif ($answerFormat == "text") : ?>
<pre><?= $question['answer']() ?></pre>

<?php endif; ?>
<?php endif; ?>



<?php endforeach; ?>

<?php endforeach; ?>

<hr>
<code><?=$key?></code>

</body>
</html>
