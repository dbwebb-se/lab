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
}   

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
    "arrayCheck": function (answer1, answer2) {
        if (answer1 instanceof Array && answer2 instanceof Array) {
            return answer1.equals(answer2)
        }
        return false;
    },
    "assert": function(question, answer, hint) {
        var element = document.getElementById("answer" + question),
            status,
            noanswer = "Replace this text with the answer or the variable holding it.",
            hint = hint || false;

        if (answer === noanswer) {
            status = question + " NOT YET DONE."
        } else if (answer === this.answers[question]
                   || this.arrayCheck(answer, this.answers[question])) {
            status = question + " CORRECT. Well done!\n" + answer;
        } else {
            status = question + " FAIL.\nYou said:\n" + answer;
            status += hint ? "\nHint:\n" + JSON.stringify(this.answers[question]) : "";
        }

        console.log(status);
        element.innerHTML = status;
    }
}

</script>
<script src="answer.js" type="text/javascript"></script>

</body>
</html>
