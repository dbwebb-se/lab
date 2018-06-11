<?php



/**
 * Execute an external command, monitor its status and
 * return a string with the result separated by \n.
 *
 * @param string $command to execute.
 *
 * @return string with result from command.
 */
function execute($command)
{
    $status = null;
    $output = [];

    exec($command . " 2>&1", $output, $status);
    $output = implode("\n", $output);
    if (!empty($output)) {
        $output .= "\n";
    }

    if ($status !== 0) {
        echo "<pre>Command: $command\n";
        echo "Status: $status\n";
        echo "Output: $output\n";
        die();
    }

    return $output;
}



/**
 * Create a temporary directory, useful when creating labs
 * and in need of temporary storage.
 *
 * @param string $action true of create, false if remove.
 *
 * @return string with pathname
 */
function tempDir($action = true)
{
    static $base1 = null;
    static $base = null;
    
    if ($action) {
        // Create base for
        $base1 = tempnam("/tmp", "LAB");
        $base = "${base1}_";
        mkdir($base);
        return $base;
    } elseif ($base) {
        // Clean up
        exec("rm -rf $base");
        unlink($base1);
    }
}



/**
 * Compare items to see if they match, return selected if match, useful
 * for select option lists.
 *
 * @param string $key1
 * @param string key2
 *
 * @return string with "selected" or empty string
 */
function isSelected($key1, $key2)
{
    return $key1 == $key2
        ? "selected"
        : "";
}




/**
 * Wrap descriptive text as comments.
 *
 * @param string $key
 * @param string $wrapper
 *
 * @return Object as resultset
 */
function wrap($text, $wrapper = "\n# ")
{
    if (empty(trim($text))) {
        return "\n";
    }

    $text = preg_replace("#```\w*\n#", "", $text);
    $text = wordwrap(trim($text, "\n"), 75, "\n", true);
    $text = str_replace("\n", $wrapper, $text);
    $text = preg_replace("#[ \t]+\n#", "\n", $text);
    return "$text\n";
}




/**
 * Parse text as Markdown.
 *
 * @param String $text
 *
 * @return string as HTML text
 */
function parseMarkdown($text)
{
    global $textfilter;
    $res = $textfilter->parse($text, ["markdown"]);
    return $res->text;
}



/**
 * Get details for key or die.
 *
 * @param String $key
 *
 * @return Object as resultset
 */
function getDetailsFromKeyOrDie($key)
{
    global $db;
    
    $sql = "
        select * from lab
        where 
        gen_key = ?
    ";
    
    $stmt = $db->prepare($sql);
    $stmt->execute([$key]);
    $res = $stmt->fetch(PDO::FETCH_OBJ);

    if (!$res) {
        die("No such key");
    }
    
    return $res;
}



/**
 * Init database and create table.
 *
 * @return void
 */
function init()
{
    global $db;

    $sql = "
CREATE TABLE IF NOT EXISTS lab
(
    id INTEGER,
    gen_key TEXT KEY,
    acronym TEXT,
    course TEXT,
    lab TEXT,
    labversion TEXT,
    version TEXT,
    created DATETIME,

    PRIMARY KEY (id)
)
";

    $stmt = $db->prepare($sql);
    $stmt->execute();

    $sql = "
CREATE TABLE IF NOT EXISTS exam
(
    id INTEGER,
    course TEXT,
    courseEvent TEXT,
    type TEXT,
    target TEXT,
    description TEXT,
    timelimit TEXT,
    version TEXT,
    start DATETIME,
    stop DATETIME,

    PRIMARY KEY (id)
)
";

    $stmt = $db->prepare($sql);
    $stmt->execute();

    $sql = "
CREATE TABLE IF NOT EXISTS exam_log
(
    id INTEGER,
    action TEXT,
    acronym TEXT,
    signature TEXT,
    ts DATETIME,
    toolversion TEXT,
    examid INTEGER,

    PRIMARY KEY (id),
    FOREIGN KEY (examid) REFERENCES exam(id)
)
";
    $stmt = $db->prepare($sql);
    $stmt->execute();
}



/**
 * Create a new key, or use existing
 *
 * @return void
 */
function generateKey($acronym, $course, $lab, $labversion, $created)
{
    global $db;

    // Check if key already exists, then use it
    $sql = "
    select * from lab
    where 
        acronym = ? AND 
        course = ? AND
        lab = ? AND
        labversion = ?
    ";
    $stmt = $db->prepare($sql);
    $stmt->execute([$acronym, $course, $lab, $labversion]);
    $res = $stmt->fetch(PDO::FETCH_OBJ);

    // Create new key
    if (empty($res)) {
        $gen_key = md5($acronym . $course . $lab . $labversion . $created);
        $sql = "
    insert into lab
    (acronym, course, lab, labversion, created, gen_key, version)
    values 
    (?, ?, ?, ?, ?, ?, ?)
    ";
        $stmt = $db->prepare($sql);
        $stmt->execute([$acronym, $course, $lab, $labversion, $created, $gen_key, VERSION]);
    } else {
        $gen_key = $res->gen_key;
    }

    return $gen_key;
}



/**
 * Read configuration for lab, or die
 *
 * @return void
 */
function getConfigurationFor($course, $lab, $labversion)
{
    global $VALID_LABS;
    
    if ($lab == 'labtest') {
        return "config/labtest.php";
    } elseif (array_key_exists("$course/$lab/$labversion", $VALID_LABS)) {
        return $VALID_LABS["$course/$lab/$labversion"];
    }
    return false;
}



/**
 * Read configuration for lab, or die
 *
 * @return void
 */
function getLabType($course, $lab, $type)
{
    global $LAB_TYPE;
    
    if (!$type) {
        if ($course && $lab) {
            if (isset($LAB_TYPE[$course])) {
                if (is_array($LAB_TYPE[$course])) {
                    if (isset($LAB_TYPE[$course][$lab])) {
                        $type = $LAB_TYPE[$course][$lab];
                    }
                } else {
                    $type = $LAB_TYPE[$course];
                }
            }
        }
    }
    return $type;
}



/**
 * Format the basic values
 */
function formatType($value)
{
    if (is_bool($value)) {
        $value = $value ? "true" : "false";
    } elseif (is_int($value)) {
        ;
    } elseif (is_string($value)) {
        $value = "\"$value\"";
    }

    return $value;
}



/**
 * Format the answer for print in HTML
 */
function formatAnswerPrintable($answer)
{
    return json_encode($answer, JSON_PRETTY_PRINT);
}



/**
 * Format the answer for a JSON object
 */
function formatAnswerJSON($answer)
{
    if (defined("JSON_PRESERVE_ZERO_FRACTION")) {
        return json_encode($answer, JSON_PRETTY_PRINT | JSON_PRESERVE_ZERO_FRACTION);
    }
    return json_encode($answer, JSON_PRETTY_PRINT);
}



/**
 * List coming (and passed exams)
 */
function examList($course)
{
    global $db;

    $sqlCurrent = "
SELECT
    datetime('now', 'localtime') AS ts
;
";

    $sqlActive = "
SELECT
    *
FROM exam
WHERE
    course = ?
    AND datetime('now', 'localtime') >= start
    AND datetime('now', 'localtime') <= stop
ORDER BY start ASC
;
";

$sqlPlanned = "
SELECT
    *
FROM exam
WHERE
    course = ?
    AND start > datetime('now', 'localtime')
    AND start < datetime('now', '+13 months', 'localtime')
    AND stop IS NOT NULL
ORDER BY start ASC
;
";

$sqlPassed = "
SELECT
    *
FROM exam
WHERE
    course = ?
    AND start < date('now', 'localtime')
    AND start > date('now', '-13 months', 'localtime')
    AND stop IS NOT NULL
ORDER BY stop DESC
;
";

    $stmt = $db->prepare($sqlCurrent);
    $stmt->execute();
    $current = $stmt->fetch();

    $stmt = $db->prepare($sqlActive);
    $stmt->execute([$course]);
    $active = $stmt->fetchAll();

    $stmt = $db->prepare($sqlPlanned);
    $stmt->execute([$course]);
    $planned = $stmt->fetchAll();

    $stmt = $db->prepare($sqlPassed);
    $stmt->execute([$course]);
    $passed = $stmt->fetchAll();

    return [$current, $active, $planned, $passed];
}



/**
 * Get details of active exam.
 */
function getActiveExamDetail($course, $target)
{
    global $db;

    $sql = "
SELECT
    *
FROM exam
WHERE
    course = ?
    AND target = ?
    AND datetime('now', 'localtime') > start
    AND datetime('now', 'localtime') < stop
ORDER BY start ASC
;
";

    $stmt = $db->prepare($sql);
    $stmt->execute([$course, $target]);
    $res = $stmt->fetch();

    return $res;
}



/**
 * Log that a user is checking out the exam.
 */
function examLogCheckout($examId, $acronym, $signature)
{
    global $db;

    $sql = "
INSERT INTO exam_log
    (examId, acronym, signature, action, ts, toolversion)
VALUES
    (?, ?, ?, 'Checkout', datetime('now'), ?)
;
";

    $stmt = $db->prepare($sql);
    $stmt->execute([$examId, $acronym, $signature, VERSION]);
}



/**
 * Log that a user is checking out the exam.
 */
function examLogSeal($examId, $acronym, $signature)
{
    global $db;

    $sql = "
INSERT INTO exam_log
    (examId, acronym, signature, action, ts, toolversion)
VALUES
    (?, ?, ?, 'Seal', datetime('now'), ?)
;
";

    $stmt = $db->prepare($sql);
    $stmt->execute([$examId, $acronym, $signature, VERSION]);
}



/**
 * Get details of an exam by its id, course and courseEvent.
 */
function getExamById($id)
{
    global $db;

    $sql = "
SELECT
    *
FROM exam
WHERE
    course = ?
    AND target = ?
    AND datetime('now', 'localtime') > start
    AND datetime('now', 'localtime') < stop
ORDER BY start ASC
;
";

    $stmt = $db->prepare($sql);
    $stmt->execute([$course, $target]);
    $res = $stmt->fetch();

    return $res;
}



/**
 * Get details of active exam.
 */
function getReceiptForExam($examId, $acronym)
{
    global $db;

    $sqlExam = "
SELECT
    *,
    datetime('now', 'localtime') AS ts
FROM exam
WHERE
    id = ?
;
";

$sqlLog = "
SELECT
    *,
    datetime(ts, 'localtime') AS timestamp
FROM exam_log
WHERE
    examId = ?
    AND acronym = ?
ORDER BY ts
;
";

$sqlDuration = "
SELECT
    strftime('%s', (SELECT ts FROM exam_log WHERE examId=? AND acronym=? AND action='Seal' ORDER BY ts DESC LIMIT 1)) - strftime('%s', (SELECT ts FROM exam_log WHERE examId=? AND acronym=? AND action='Checkout' ORDER BY ts LIMIT 1)) AS duration,
    strftime('%s', datetime('now')) - strftime('%s', (SELECT ts FROM exam_log WHERE examId=? AND acronym=? AND action='Checkout' ORDER BY ts LIMIT 1)) AS ongoing
;
";

    $stmt = $db->prepare($sqlExam);
    $stmt->execute([$examId]);
    $res = $stmt->fetch();

    $stmt = $db->prepare($sqlLog);
    $stmt->execute([$examId, $acronym]);
    $log = $stmt->fetchAll();

    $stmt = $db->prepare($sqlDuration);
    $stmt->execute([$examId, $acronym, $examId, $acronym, $examId, $acronym]);
    $duration = $stmt->fetch();

    $seconds = !is_null($duration["duration"])
        ? $duration["duration"]
        : $duration["ongoing"];

    $durationText = $seconds > 86400
        ? gmdate("z H:i:s", $seconds)
        : gmdate("H:i:s", $seconds);

    $maxLength = gmdate("H:i:s", $res["timelimit"]);
    $durationText .= " ($maxLength)";

    $logText  = "| Action   | Timestamp           | Id    | Signature |\n";
    $logText .= "|----------|---------------------|-------|-----------|\n";
    foreach ($log AS $row) {
        $logText .= "| ". str_pad($row["action"], 9);
        $logText .= "| ". str_pad($row["timestamp"], 20);
        $logText .= "| ". str_pad($row["id"], 5, " ", STR_PAD_LEFT);
        $logText .= " | ". $row["signature"];
        $logText .= " |\n";
    }

    $text = <<<EOD
Receipt for ${res["course"]}:${res["target"]}
==================================

Details
----------------------------------

Id:          ${res["id"]}
What:        ${res["type"]} ${res["courseEvent"]}
Description: ${res["description"]}
Max length:  $maxLength
Active:      ${res["start"]} - ${res["stop"]}


User
----------------------------------

Acronym: $acronym


Log
----------------------------------

$logText
Duration:  $durationText
Timestamp: ${res["ts"]}


EOD;

    return $text;
}
