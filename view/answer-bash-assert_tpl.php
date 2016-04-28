#!/usr/bin/env bash
#
# Bash dbwebb module for asserting and auto correcting labs.
#
# It reads the answers from files in a directory
# for checking with assertEqual().
#
ANSWERS=".answer"
PROMPT=">>> "


#
# Init by reading file with answers.
#
LAB_answers=1 # json.load(open(answersFileName))
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
    local question=$1
    local hint=$2
    local noanswer="Replace this text with the variable holding the answer."

    if [ "$ANSWER" = "$noanswer" ]; then
        echo "${PROMPT}$question NOT YET DONE."
        ((LAB_notDone++))
    
    elif [ $ANSWER ]; then #answer == self.answers["answers"][question] ]; then
        echo "${PROMPT}$question CORRECT. Well done!" # + json.dumps(answer)
        ((LAB_correct++))
    
    else
        printf "${PROMPT}%s FAIL.\nYou said:\n" $question # + json.dumps(answer)
        #status += "\nHint:\n" #+ json.dumps(self.answers["answers"][question]) if hint else ""
        ((LAB_failed++))
    fi
}



#
# Exit with a summary.
# Print a exit message with the result of all tests.
# Exit with status 0 if all tasks are solved, else exit with status 1.
#
function exitWithSummary
{
    printf "${PROMPT}Done with status %d/%d/%d/%d (Total/Correct/Failed/Not done).\n" $LAB_answers $LAB_correct $LAB_failed $LAB_notDone

    exit $(( $LAB_answers == $LAB_correct ? 0 : 1 ))
}
