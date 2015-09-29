<?php
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
