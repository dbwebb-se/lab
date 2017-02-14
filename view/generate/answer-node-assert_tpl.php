/**
 * Dbwebb lab assert using nodejs as base.
 */
"use strict";

var fs      = require('fs');
var path    = require('path');


/**
 * Compare arrays.
 */
/* jshint freeze: false */
Array.prototype.equals = function (array) {
    // if the other array is a falsy value, return
    if (!array) {
        return false;
    }

    // compare lengths - can save a lot of time
    if (this.length != array.length) {
        return false;
    }

    for (var i = 0, l = this.length; i < l; i++) {
        // Check if we have nested arrays
        if (this[i] instanceof Array && array[i] instanceof Array) {
            // recurse into the nested arrays
            if (!this[i].equals(array[i])) {
                return false;
            }
        }
        else if (this[i] !== array[i]) {
            // Warning - two different object instances will never be equal: {x:20} != {x:20}
            return false;
        }
    }
    return true;
};
/* jshint freeze: true */



var dbwebb = {

    "prompt":   ">>> ",
    "correct":  0,
    "failed":   0,
    "notDone":  0,
    "answers":  [],



    "loadAnswersFromFile": function () {
        var file = path.join(__dirname, ".answer.json");
        var data = fs.readFileSync(file);
        var answers = JSON.parse(data);
        this.answers = answers.answers;
    },



    "arrayCheck": function (answer1, answer2) {
        if (answer1 instanceof Array && answer2 instanceof Array) {
            return answer1.equals(answer2);
        }
        return false;
    },



    "assert": function(question, answer, hint) {
        var status;
        var noanswer = "Replace this text with the variable holding the answer.";

        hint = hint || false;

        if (answer === noanswer) {
            status = this.prompt + question + " NOT YET DONE.";
            this.notDone += 1;
        } else if (answer === this.answers[question] || this.arrayCheck(answer, this.answers[question])) {
            status = this.prompt + question + " CORRECT. Well done!\n" + JSON.stringify(answer) + " (" + typeof answer + ")";
            this.correct += 1;
        } else {
            status = this.prompt + question + " FAIL.\n" + this.prompt + "You said:\n" + JSON.stringify(answer) + " (" + typeof answer + ")";
            if (hint) {
                status += "\n" + this.prompt + "Hint:\n" + JSON.stringify(this.answers[question]) + " (" + typeof this.answers[question] + ")";
            }
            this.failed += 1;
        }

        console.log(status);
    },



    "exitWithSummary": function() {
        var status;
        var numberOfQuestions = Object.keys(this.answers).length;
        var done = numberOfQuestions - this.correct;
        var colorGreen  = "\x1b[92m";
        var colorYellow = "\x1b[93m";
        var colorStop   = "\x1b[0m";

        status  = this.prompt + "Done with status ";
        status += numberOfQuestions;
        status += "/";
        status += this.correct;
        status += "/";
        status += this.failed;
        status += "/";
        status += this.notDone;
        status += " (Total/Correct/Failed/Not done).";

        console.log(status);

        if (done === 0) {
            console.log(colorGreen + this.prompt + "Grade: PASS! :-)" + colorStop);
            return 0;
        } else {
            console.log(colorYellow + this.prompt + "Grade: Thou Did Not Pass. :-|" + colorStop);
            return 42;
        }
    }
};


dbwebb.loadAnswersFromFile();

//export default dbwebb;
module.exports = dbwebb;
