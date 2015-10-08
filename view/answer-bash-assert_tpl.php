#!/usr/bin/env bash
#
# Bash dbwebb module for asserting and auto correcting labs.
#
# It reads the answers from a json-file and use it
# for checking with assertEqual().
#



#
# Init by reading file with answers.
#
LAB_answers= json.load(open(answersFileName))
LAB_correct=0
LAB_failed=0
LAB_notDone=0



#
# Assert if equal with expected answer.
# Check if the answer is correct or not, present a hint if asked for.
#
# question, answer, hint
#
function assertEqual
{
    status = None
    noanswer = "Replace this text with the variable holding the answer."

    if answer == noanswer:
        status = question + " NOT YET DONE."
        self.notDone += 1
    
    elif answer == self.answers["answers"][question]:
        status = question + " CORRECT. Well done!\n" + json.dumps(answer)
        self.correct += 1
    
    else:
        status = question + " FAIL.\nYou said:\n" + json.dumps(answer)
        status += "\nHint:\n" + json.dumps(self.answers["answers"][question]) if hint else ""
        self.failed += 1

    return status
}        



#
# Exit with a summary.
# Print a exit message with the result of all tests.
# Exit with status 0 if all tasks are solved, else exit with status 1.
#
function exitWithSummary
{
        local msg="Done with status %d/%d/%d/%d (Total/Correct/Failed/Not done)."
        
        local total=10 #len(self.answers["answers"])

        printf($msg % $total, $LAB_correct, $LAB_failed, $LAB_notDone)

        if [ $total -eq $LAB_correct ]; then 
            exit 0
        else
            exit 1
        fi
}
