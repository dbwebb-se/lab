<?php
/**
 * Current version
 */
const VERSION = "v2.0.1x (2015-09-29)";
$timestamp_now = date('Y-m-d H:i:s');



/**
 * Error handling
 */
error_reporting(-1);              // Report all type of errors
ini_set('display_errors', 1);     // Display all errors

date_default_timezone_set("UTC");



/**
 * Open the database file and catch the exception it it fails.
 */
try {
    $dsn = "sqlite:db.sqlite";
    $db = new PDO($dsn);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Failed to connect to the database using DSN:<br>$dsn<br>";
    throw $e;
}



/**
 * All courses/labs and their configfile.
 */
const VALID_LABS = [
    "javascript1/lab1" => "config/javascript1/lab1.php",
    "javascript1/lab2" => "config/javascript1/lab2.php",
    "javascript1/lab3" => "config/javascript1/lab3.php",
    "javascript1/lab4" => "config/javascript1/lab4.php",
    "javascript1/lab5" => "config/javascript1/lab5.php",

    "python/lab1" => "config/python/lab1.php",
    "python/lab2" => "config/python/lab2.php",
    "python/lab3" => "config/python/lab3.php",
    "python/lab4" => "config/python/lab4.php",
    "python/lab5" => "config/python/lab5.php",
    "python/lab6" => "config/python/lab6.php",

    "htmlphp/lab1" => "config/htmlphp/lab1.php",
    "htmlphp/lab2" => "config/htmlphp/lab2.php",
    "htmlphp/lab3" => "config/htmlphp/lab3.php",
    "htmlphp/lab4" => "config/htmlphp/lab4.php",
    "htmlphp/lab5" => "config/htmlphp/lab5.php",

    "oophp/lab1" => "config/oophp/lab1.php",

    "linux/lab1" => "config/linux/lab1.php",

];
