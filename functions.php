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
create table if not exists lab
(
    int id primary key,
    gen_key text key,
    acronym text,
    course text,
    lab text,
    version text,
    created datetime
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
function generateKey($acronym, $course, $lab, $created)
{
    global $db;

    // Check if key already exists, then use it
    $sql = "
    select * from lab
    where 
        acronym = ? AND 
        course = ? AND
        lab = ?
    ";
    $stmt = $db->prepare($sql);
    $stmt->execute([$acronym, $course, $lab]);
    $res = $stmt->fetch(PDO::FETCH_OBJ);

    // Create new key
    if (empty($res)) {
        $gen_key = md5($acronym . $course . $lab . $created);
        $sql = "
    insert into lab
    (acronym, course, lab, created, gen_key, version)
    values 
    (?, ?, ?, ?, ?, ?)
    ";
        $stmt = $db->prepare($sql);
        $stmt->execute([$acronym, $course, $lab, $created, $gen_key, VERSION]);
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
function getConfigurationFor($course, $lab)
{
    global $VALID_LABS;
    
    if ($lab == 'labtest') {
        return "config/labtest.php";
    } elseif (array_key_exists("$course/$lab", $VALID_LABS)) {
        return $VALID_LABS["$course/$lab"];
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
