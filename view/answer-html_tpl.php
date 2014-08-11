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

<code><?=$key?></code>
<p><i>Generated for <?=$acronym?> at <?=$created?>.</i></p>
<hr>
<h1><?=$title?></h1>
<p>Solve the exercises in the file <code>answer.js</code> and reload this file to se the outcome. Check the console for errors.</p>

<?php
$sectionId = 0;
foreach ($sections as $section) {
    $sectionId++;
    $questionId = 0;

    foreach ($section['questions'] as $question) {
        $questionId++;

        echo "<div id=\"answer$sectionId.$questionId\" class=\"answer\"></div>\n";
    }
}?>


<hr>
<p><i>Generated for <?=$acronym?> at <?=$created?>.</i></p>
<code><?=$key?></code>

<script type="text/javascript">

window.dbwebb = {

    "answers": {
    
        <?php 
        $sectionId = 0;
        foreach ($sections as $section) {
            $sectionId++;
            $questionId = 0;

            foreach ($section['questions'] as $question) {
                $questionId++;
                $answer = formatAnswerJSON($question['answer']());
                echo "\t\t\"$sectionId.$questionId\": $answer,\n";
            }
        }?>

    },
    "assert": function(question, answer, hint) {
        var element = document.getElementById("answer" + question),
            status,
            noanswer = "Replace this text with the answer or the variable holding it.",
            hint = hint || false;

        if (answer === noanswer) {
            status = question + " NOT YET DONE."
        } else if (answer === this.answers[question]) {
            status = question + " CORRECT. Well done!\n" + answer;
        } else {
            status = question + " FAIL.\nYou said:\n" + answer;
            status += hint ? "\nHint:\n" + this.answers[question] : "";
        }

        console.log(status);
        element.innerHTML = status;
    }
}

</script>
<script src="answer.js" type="text/javascript"></script>

</body>
</html>
