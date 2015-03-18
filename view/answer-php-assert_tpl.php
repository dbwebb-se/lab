<?="<?php\n"?>
/**
 * PHP dbwebb class for asserting and auto correcting labs.
 *
 * It reads the answers from a json-file and use it
 * for checking with assertEqual().
 *
 */
class CDbwebb
{
    /**
     * Constructor, init by reading json-file with answers.
     *
     */
    public function __construct()
    {
        $this->answers = json_decode(file_get_contents("answer.json"), true);
        $this->correct = 0;
        $this->failed  = 0;
        $this->notDone = 0;
        $this->jsonOptions = JSON_PRETTY_PRINT;

        if (php_sapi_name() == "cli") {
            $this->pre    = null;
            $this->preEnd = null;
        } else {
            $this->pre    = "<pre>";
            $this->preEnd = "</pre>";
        }

        echo "{$this->pre}Ready to begin.\n";
    }
    
    

    /**
     * Check if the answer is correct or not, present a hint if asked for.
     *
     * @param string  $question the id of the question
     * @param mixed   $answer   the answer to test
     * @param boolean $hint     true to show a hint, false to not (default)
     *
     * @return string representing if the answer was correct or not
     */
    public function assertEqual($question, $answer, $hint = false)
    {
        $status   = null;
        $noanswer = "Replace this text with the variable holding the answer.";
        $correct  = $this->answers["answers"][$question];

        if ($answer === $noanswer) {

            $status = $question . " NOT YET DONE.";
            $this->notDone += 1;
            
        } elseif ($answer === $correct) {

            $status = $question . " CORRECT. Well done!\n"
                . json_encode($answer, $this->jsonOptions);
            $this->correct += 1;
                        
        } else {

            $status = $question . " FAIL.\nYou said:\n"
                . json_encode($answer, $this->jsonOptions)
                . " (" . gettype($answer) . ")";
            $status .= $hint
                ? "\nHint:\n" . json_encode($correct) . " (" . gettype($correct) . ")"
                : "";
            $this->failed += 1;
            
        }

        return $status . "\n";
    }

            
    
    /**
     * Print a exit message with the result of all tests.
     *
     * @return boolean true if all answers are correct, else false
     */
    public function printSummary()
    {
        $total = count($this->answers["answers"]);
        echo "Done with status {$total}/{$this->correct}/{$this->failed}/"
            . "{$this->notDone} (Total/Correct/Failed/Not done).\n{$this->preEnd}";
        return ($total == $this->correct);
    }
}
