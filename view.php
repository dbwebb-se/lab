<?php
error_reporting(-1);              // Report all type of errors
ini_set('display_errors', 1);     // Display all errors
ini_set('output_buffering', 0);   // Do not buffer outputs, write directly

date_default_timezone_set("UTC");



$db = new PDO("sqlite:db.sqlite");



/**
 * Generate a lab
 */
$action     = isset($_GET['action']) ? $_GET['action'] : null;
$acronym    = isset($_GET['acronym']) ? $_GET['acronym'] : null;
$course     = isset($_GET['course']) ? $_GET['course'] : null;
$lab        = isset($_GET['lab']) ? $_GET['lab'] : null;
$created    = date('Y-m-d H:i:s');
$gen_key    = md5($acronym . $course . $lab . $created);

$generate = null;

if (isset($_GET['doGenerate'])) {

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

    $gen_key = $res->gen_key;

    $generate =<<<EOD
<p>
<a href="lab.php?lab&key=$gen_key">Lab</a> | 
</p>
EOD;
}





?><!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Lab generation</title>
<link rel="stylesheet" href="style/style.css">
<style>
<?=file_get_contents("style/style.css")?>
</style>
</head>
<body>


<h1>Lab utility</h1>

<h2>Get details for an existing lab</h2>

<?php

$key = isset($_GET['key']) ? $_GET['key'] : null;

if (isset($_GET['doKey'])) {
    $sql = "
select * from lab
where 
    gen_key = ?
";
    $stmt = $db->prepare($sql);
    $stmt->execute([$key]);
    $res = $stmt->fetch(PDO::FETCH_OBJ);

    if (!$res) {
        echo "<p><b>No such key!</b><p>";
    } else {

        $gen_key = $res->gen_key;

        echo <<<EOD
<p>
Acronym: {$res->acronym}</br>
Course: {$res->course}</br>
Lab: {$res->lab}</br>
Created: {$res->created}</br>
Key: {$res->gen_key}</br>
</p>
<p>
<a href="lab.php?lab&key=$gen_key">View lab description</a> 
</p>
EOD;

    }
}

?>


<form>

<p>
    <label>Lab key:<br>
    <input type="text" style="width: 300px;" name="key" value="<?=$key?>" placeholder="Enter lab key">
    </acronym>
</p>

<p>
    <input type="submit" name="doKey" value="Submit">
</p>

</form>



</body>
</html>
