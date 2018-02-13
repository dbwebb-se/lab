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
    "points":   0,
    "correct":  0,
    "failed":   0,
    "notDone":  0,
    "answers":  [],



    "loadAnswersFromFile": function () {
        var file = path.join(__dirname, ".answer.json");
        var data = fs.readFileSync(file);
        var answers = JSON.parse(data);
        this.answers = answers;
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
        } else if (answer === this.answers.answers[question] || this.arrayCheck(answer, this.answers.answers[question])) {
            status = this.prompt + question + " CORRECT. Well done!\n" + JSON.stringify(answer) + " (" + typeof answer + ")";
            this.correct += 1;
            this.points += this.answers.points[question];
        } else {
            status = this.prompt + question + " FAIL.\n" + this.prompt + "You said:\n" + JSON.stringify(answer) + " (" + typeof answer + ")";
            if (hint) {
                status += "\n" + this.prompt + "Hint:\n" + JSON.stringify(this.answers.answers[question]) + " (" + typeof this.answers.answers[question] + ")";
            }
            this.failed += 1;
        }

        console.log(status);
    },



    "exitWithSummary": function() {
        var status;
        var colorBlue   = "\x1b[96m";
        var colorGreen  = "\x1b[92m";
        var colorYellow = "\x1b[93m";
        var colorStop   = "\x1b[0m";
        var questions = this.answers.summary.questions;
        var pass = this.answers.summary.pass;
        var passDistinct = this.answers.summary.passdistinct;
        var didPass;
        var didPassDistinct;

        status  = "Done with status ";
        status += this.answers.summary.questions;
        status += "/";
        status += this.correct;
        status += "/";
        status += this.failed;
        status += "/";
        status += this.notDone;
        status += " (Total/Correct/Failed/Not done).\n";
        status += "Points earned: ";
        status += this.points;
        status += " of ";
        status += this.answers.summary.points;
        status += "p (PASS=>";
        status += this.answers.summary.pass;
        status += "p";
        if (this.answers.summary.passdistinct) {
            status += ", PASS W DISTINCTION=>";
            status += this.answers.summary.passdistinct;
            status += "p";
        }
        status += ").";
        console.info(status);

        // Check if pass, pass w distinction or not
        var didPass = this.correct === questions;
        if (pass) {
            didPass = this.points >= pass;
        }

        didPassDistinct = null;
        if (passDistinct) {
            didPassDistinct = this.points >= passDistinct;
        }

        if (didPassDistinct) {
            console.info(colorBlue + this.prompt + "Grade: PASS WITH DISTINCTION!!! :-D" + colorStop);
            return 0;
        } else if (didPass) {
            console.info(colorGreen + this.prompt + "Grade: PASS! :-)" + colorStop);
            return 0;
        } else {
            console.info(colorYellow + this.prompt + "Grade: Thou Did Not Pass. :-|" + colorStop);
            return 42;
        }
    }
};


dbwebb.loadAnswersFromFile();

//export default dbwebb;
module.exports = dbwebb;
