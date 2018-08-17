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
<p>Solve the exercises in the file <code>answer.js</code> and reload this file to see the outcome. Check the development console for errors and use it for your own debugging.</p>

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

    "answers": <?php
$sectionId = 0;
$numQuestions = 0;
$sumPoints = null;
$json = "";
foreach ($sections as $section) {
    $sectionId++;
    $questionId = 0;

    foreach ($section['questions'] as $question) {
        $numQuestions++;
        $questionId++;

        if (isset($question['points'])) {
            $points = $question['points'];
            $sumPoints += $points;
            $data["points"]["$sectionId.$questionId"] = $points;
        }

        $data["answers"]["$sectionId.$questionId"] = $question['answer']();
    }
}

$pass = null;
if (isset($passPercentage) && !is_null($passPercentage)) {
    $pass = floor($sumPoints * $passPercentage);
}

$passdistinct = null;
if (isset($passDistinctPercentage) && !is_null($passDistinctPercentage)) {
    $passdistinct = floor($sumPoints * $passDistinctPercentage);
}

$data["summary"]["questions"] = $numQuestions;
$data["summary"]["points"] = $sumPoints;
$data["summary"]["pass"] = $pass;
$data["summary"]["passdistinct"] = $passdistinct;

$options = JSON_PRETTY_PRINT;
if (defined("JSON_PRESERVE_ZERO_FRACTION")) {
    $options = JSON_PRETTY_PRINT | JSON_PRESERVE_ZERO_FRACTION;
}

echo json_encode($data, $options);
?>,
    "correct": 0,
    "failed": 0,
    "notDone": 0,
    "points": 0,

    "arrayCheck": function (answer1, answer2) {
        if (answer1 instanceof Array && answer2 instanceof Array) {
            return answer1.equals(answer2);
        }
        return false;
    },

    "assert": function (question, answer, hint) {
        var element = document.getElementById("answer" + question),
            status,
            noanswer = "Replace this text with the variable holding the answer.";

        hint = hint || false;

        if (answer === noanswer) {
            status = question + " NOT YET DONE.";
            window.dbwebb.notDone += 1;
        } else if (answer === this.answers.answers[question]
                   || this.arrayCheck(answer, this.answers.answers[question])) {
            status = question + " CORRECT. Well done!\n" + JSON.stringify(answer) + " (" + typeof answer + ")";
            window.dbwebb.correct += 1;
            window.dbwebb.points += this.answers.points[question];
        } else {
            status = question + " FAIL.\nYou said:\n" + JSON.stringify(answer) + " (" + typeof answer + ")";
            if (hint) {
                status += "\nHint:\n" + JSON.stringify(this.answers.answers[question]) + " (" + typeof this.answers.answers[question] + ")";
            }
            window.dbwebb.failed += 1;
        }

        console.log(status);
        element.innerHTML = status;
    },

    "exitWithSummary": function() {
        var element = document.getElementById("summary");
        var status;
        var questions = window.dbwebb.answers.summary.questions;
        var pass = window.dbwebb.answers.summary.pass;
        var passDistinct = window.dbwebb.answers.summary.passdistinct;
        var didPass;
        var didPassDistinct;

        status  = "Done with status ";
        status += Object.keys(window.dbwebb.answers.answers).length;
        status += "/";
        status += window.dbwebb.correct;
        status += "/";
        status += window.dbwebb.failed;
        status += "/";
        status += window.dbwebb.notDone;
        status += " (Total/Correct/Failed/Not done).<br><br>";
        status += "Points earned: ";
        status += window.dbwebb.points;
        status += " of ";
        status += window.dbwebb.answers.summary.points;
        status += "p ";
        status += " (PASS=>";
        status += window.dbwebb.answers.summary.pass;
        status += "p";
        if (window.dbwebb.answers.summary.passdistinct) {
            status += ", PASS W DISTINCTION=>";
            status += window.dbwebb.answers.summary.passdistinct;
            status += "p";
        }
        status += ").<br><br>";

        // Check if pass, pass w distinction or not
        var didPass = window.dbwebb.correct === questions;
        if (pass) {
            didPass = window.dbwebb.points >= pass;
        }

        didPassDistinct = null;
        if (passDistinct) {
            didPassDistinct = window.dbwebb.points >= passDistinct;
        }

        if (didPassDistinct) {
            status += "<span class='passdistinct'>Grade: PASS WITH DISTINCTION!!! :-D</span>";
        } else if (didPass) {
            status += "<span class='pass'>Grade: PASS! :-)</span>";
        } else {
            status += "<span class='nopass'>Grade: Thou Did Not Pass. :-|</span>";
        }

        console.log(status);
        element.innerHTML = status;
    }
};

</script>
<script src="answer.js" type="text/javascript"></script>

</body>
</html>
