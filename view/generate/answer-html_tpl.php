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
<p>Solve the exercises in the file <code>answer.js</code> and reload this file to see the outcome. Check the console for errors.</p>

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

<p id="summary"></p>

<hr>
<code><?=$key?></code>

<script type="text/javascript">

Array.prototype.equals = function (array) {
    // if the other array is a falsy value, return
    if (!array)
        return false;

    // compare lengths - can save a lot of time
    if (this.length != array.length)
        return false;

    for (var i = 0, l = this.length; i < l; i++) {
        // Check if we have nested arrays
        if (this[i] instanceof Array && array[i] instanceof Array) {
            // recurse into the nested arrays
            if (!this[i].equals(array[i]))
                return false;
        }
        else if (this[i] !== array[i]) {
            // Warning - two different object instances will never be equal: {x:20} != {x:20}
            return false;
        }
    }
    return true;
};

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
    "correct": 0,
    "failed": 0,
    "notDone": 0,
    "arrayCheck": function (answer1, answer2) {
        if (answer1 instanceof Array && answer2 instanceof Array) {
            return answer1.equals(answer2);
        }
        return false;
    },
    "assert": function(question, answer, hint) {
        var element = document.getElementById("answer" + question),
            status,
            noanswer = "Replace this text with the variable holding the answer.";

        hint = hint || false;

        if (answer === noanswer) {
            status = question + " NOT YET DONE.";
            window.dbwebb.notDone += 1;
        } else if (answer === this.answers[question]
                   || this.arrayCheck(answer, this.answers[question])) {
            status = question + " CORRECT. Well done!\n" + JSON.stringify(answer) + " (" + typeof answer + ")";
            window.dbwebb.correct += 1;
        } else {
            status = question + " FAIL.\nYou said:\n" + JSON.stringify(answer) + " (" + typeof answer + ")";
            if (hint) {
                status += "\nHint:\n" + JSON.stringify(this.answers[question]) + " (" + typeof this.answers[question] + ")";
            }
            window.dbwebb.failed += 1;
        }

        console.log(status);
        element.innerHTML = status;
    },
    "exitWithSummary": function() {
        var element = document.getElementById("summary"),
            status;

        status  = "Done with status ";
        status += Object.keys(window.dbwebb.answers).length;
        status += "/";
        status += window.dbwebb.correct;
        status += "/";
        status += window.dbwebb.failed;
        status += "/";
        status += window.dbwebb.notDone;
        status += " (Total/Correct/Failed/Not done).";

        console.log(status);
        element.innerHTML = status;
    }
};

</script>
<script src="answer.js" type="text/javascript"></script>

</body>
</html>
