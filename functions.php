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
gen_key string key,
acronym string,
course string,
lab string,
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
    (acronym, course, lab, created, gen_key)
    values 
    (?, ?, ?, ?, ?)
    ";
        $stmt = $db->prepare($sql);
        $stmt->execute([$acronym, $course, $lab, $created, $gen_key]);
    } else {
        $gen_key = $res->gen_key;
    }
    
    return $gen_key;
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

    if (is_bool($answer)) {
        $answer = $answer ? "true" : "false";
    } else if (is_array($answer)) {
        $answer = formatArray($answer);
    }

    return $answer;
}



/**
 * Format the answer for a JSON object
 */
function formatAnswerJSON($answer)
{
    return json_encode($answer, JSON_PRETTY_PRINT);
}
