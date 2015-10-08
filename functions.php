<?php
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
    version text
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
    if ($lab == 'labtest') {
        return "config/labtest.php";
    } elseif (array_key_exists("$course/$lab", VALID_LABS)) {
        return VALID_LABS["$course/$lab"];
    }
    return false;
}



/**
 * Format the basic values
 */
function formatType($value)
{
    if (is_bool($value)) {
        $value = $value ? "true" : "false";
    } else if (is_int($value)) {
        ;
    } else if (is_string($value)) {
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