<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?=$title?></title>
<style>
<?=file_get_contents(LAB_INSTALL_PATH . "/htdocs/style/style.css")?>
</style>
</head>
<body>

<pre><?="
$key
$course
$lab
$labversion
$acronym
$created
$version
" ?>
</pre>

<p><i>Generated <?=$timestamp_now?> by <a href="https://github.com/dbwebb-se/lab">dbwebb lab-utility</a> <?=VERSION?>.</i></p>
<hr>

<h1><?=$title?></h1>
<?=parseMarkdown($intro)?>

<?php 
$sectionId = 0;

foreach ($sections as $section) :
$sectionId++;
$questionId = 0;
?>

<h2><?=$sectionId . ". " . $section['title']?></h2>
<?=parseMarkdown($section['intro'])?>

<?php 
foreach ($section['questions'] as $question) :
$questionId++;
?>

<?php
$points = null;
if (isset($question["points"])) {
    $points = " (${question["points"]} points)";
}
?>
<h3>Exercise <?="$sectionId.$questionId$points"?></h3>
<?= parseMarkdown($question['text']) ?>


<?php if ($doAnswers) : ?>

<h4>Answer</h4>

<?php
// How to format the answers
if (!isset($answerFormat)) {
    $answerFormat = "json";
}

$answer = null;
if ($answerFormat == "json") {
    $answer = formatAnswerPrintable($question['answer']())
        . " ("
        . gettype($question['answer']())
        . ")";
}
elseif ($answerFormat == "text") {
    $answer = $question['answer']();
}
?>
<?= parseMarkdown("```\n$answer\n```") ?>

<?php endif; // $doAnswers ?>



<?php endforeach; // Questions ?>

<?php endforeach; // Sections  ?>

<hr>
<code><?=$key?></code>

</body>
</html>
