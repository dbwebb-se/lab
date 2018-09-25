<?php
/**
 * Current version
 */
define("LAB_INSTALL_PATH", realpath(__DIR__));
define("LAB_INSTALL_DIR", LAB_INSTALL_PATH);

const VERSION = "v3.1.3 (2018-09-13)";
$timestamp_now = date('Y-m-d H:i:s');




/**
 * Error handling
 */
error_reporting(-1);              // Report all type of errors
ini_set('display_errors', 1);     // Display all errors

date_default_timezone_set("UTC");

// Fix rounding issue in json encode of floats
ini_set("serialize_precision", -1);

require LAB_INSTALL_PATH . "/vendor/autoload.php";



/**
 * Open the database file and catch the exception it it fails.
 */
try {
    $dsn = "sqlite:" . LAB_INSTALL_PATH . "/data/db.sqlite";
    $db = new PDO($dsn);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Failed to connect to the database using DSN:<br>$dsn<br>";
    throw $e;
}



/**
 * All courses/labs pointing to their configfile relative LAB_INSTALL_PATH . "/config/".
 */
//const VALID_LABS = [
$VALID_LABS = [
    "javascript1/lab1/v1" => "javascript1/v1/lab1.php",
    "javascript1/lab2/v1" => "javascript1/v1/lab2.php",
    "javascript1/lab3/v1" => "javascript1/v1/lab3.php",
    "javascript1/lab4/v1" => "javascript1/v1/lab4.php",
    //"javascript1/lab5/v1" => "javascript1/lab5.php",

    "javascript1/lab1/v2" => "javascript1/v2/lab1.php",
    "javascript1/lab2/v2" => "javascript1/v2/lab2.php",
    "javascript1/lab3/v2" => "javascript1/v2/lab3.php",
    "javascript1/lab4/v2" => "javascript1/v2/lab4.php",
    "javascript1/lab5/v2" => "javascript1/v2/lab5.php",

    "python/lab1/v1" => "python/v1/lab1.php",
    "python/lab2/v1" => "python/v1/lab2.php",
    "python/lab3/v1" => "python/v1/lab3.php",
    "python/lab4/v1" => "python/v1/lab4.php",
    "python/lab5/v1" => "python/v1/lab5.php",
    "python/lab6/v1" => "python/v1/lab6.php",

    "python/lab1/v2" => "python/v2/lab1.php",
    "python/lab2/v2" => "python/v2/lab2.php",
    "python/lab3/v2" => "python/v2/lab3.php",
    "python/lab4/v2" => "python/v2/lab4.php",
    "python/lab5/v2" => "python/v2/lab5.php",
    "python/lab6/v2" => "python/v2/lab6.php",

    "python/lab1/v3" => "python/v3/lab1.php",
    "python/lab2/v3" => "python/v3/lab2.php",
    "python/lab3/v3" => "python/v3/lab3.php",
    "python/lab4/v3" => "python/v3/lab4.php",
    "python/lab5/v3" => "python/v3/lab5.php",
    "python/lab6/v3" => "python/v3/lab6.php",

    // Examination
    "python/prep/v3" => "python/v3/exam",
    "python/try1/v3" => "python/v3/exam",
    "python/try2/v3" => "python/v3/exam",
    "python/try3/v3" => "python/v3/exam",

    "oopython/lab1/v1" => "oopython/v1/lab1.php",
    "oopython/lab2/v1" => "oopython/v1/lab2.php",
    "oopython/lab3/v1" => "oopython/v1/lab3.php",
    "oopython/lab4/v1" => "oopython/v1/lab4.php",
    "oopython/lab5/v1" => "oopython/v1/lab5.php",

    "oopython/lab1/v2" => "oopython/v2/lab1.php",
    "oopython/lab2/v2" => "oopython/v2/lab2.php",
    "oopython/lab3/v2" => "oopython/v2/lab3.php",
    "oopython/lab4/v2" => "oopython/v2/lab4.php",
    "oopython/lab5/v2" => "oopython/v2/lab5.php",

    "htmlphp/lab1/v1" => "htmlphp/v1/lab1.php",
    "htmlphp/lab2/v1" => "htmlphp/v1/lab2.php",
    "htmlphp/lab3/v1" => "htmlphp/v1/lab3.php",
    "htmlphp/lab4/v1" => "htmlphp/v1/lab4.php",
    "htmlphp/lab5/v1" => "htmlphp/v1/lab5.php",
    "htmlphp/sql1/v1" => "sql/lab1.php",
    //"htmlphp/sql2/v1" => "sql/v1/lab2.php",

    "htmlphp/lab1/v2" => "htmlphp/v2/lab1.php",
    "htmlphp/lab2/v2" => "htmlphp/v2/lab2.php",
    "htmlphp/lab3/v2" => "htmlphp/v2/lab3.php",
    "htmlphp/lab4/v2" => "htmlphp/v2/lab4.php",
    "htmlphp/lab5/v2" => "htmlphp/v2/lab5.php",
    "htmlphp/lab6/v2" => "htmlphp/v2/lab6.php",
    "htmlphp/sql1/v2" => "sql/lab1.php",
    //"htmlphp/sql2/v2" => "sql/v2/lab2.php",

    //"oophp/lab1" => "oophp/lab1.php",

    "linux/bash1/v1" => "linux/v1/bash1.php",
    "linux/bash2/v1" => "linux/v1/bash2.php",
    "linux/node1/v1" => "linux/v1/node1.php",
    "linux/node2/v1" => "linux/v1/node2.php",
    "linux/node3/v1" => "linux/v1/node3.php",

    "webgl/lab1/v1" => "webgl/v1/lab1.php",
    "webgl/lab2/v1" => "webgl/v1/lab2.php",
    "webgl/lab1/v2" => "webgl/v2/lab1.php",
    "webgl/lab2/v2" => "webgl/v2/lab2.php",
    "webgl/lab3/v2" => "webgl/v2/lab3.php",
    "webgl/lab4/v2" => "webgl/v2/lab4.php",
    "webgl/lab5/v2" => "webgl/v2/lab5.php",

    "dbjs/javascript1/v1" => "dbjs/v1/javascript1.php",
    "dbjs/javascript2/v1" => "dbjs/v1/javascript2.php",
    "dbjs/sql1/v1" => "dbjs/v1/sql1.php",
    "dbjs/sql2/v1" => "dbjs/v1/sql2.php",
    "dbjs/node1/v1" => "dbjs/v1/node1.php",
    "dbjs/node2/v1" => "dbjs/v1/node2.php",

    "databas/node1/v1" => "databas/v1/node1.php",
    "databas/node2/v1" => "databas/v1/node2.php",
    "databas/exam/v1" => "databas/v1/exam",
];

// Type of lab
$LAB_TYPE = [
    "htmlphp"      => [
        "lab1" => "php",
        "lab2" => "php",
        "lab3" => "php",
        "lab4" => "php",
        "lab5" => "php",
        "lab6" => "php",
        "sql1" => "sqlite",
        "sql2" => "sqlite",
    ],
    "oophp"      => "php",
    "javascript1" => "javascript",
    "webgl"      => "javascript",
    "python"     => "python",
    "oopython"   => "python",
    "dbjs" => [
        "javascript1" => "javascript",
        "javascript2" => "javascript",
        "sql1" => "sqlite",
        "sql2" => "sqlite",
        "node1" => "node",
        "node2" => "node",
    ],
    "databas" => [
        "node1" => "node",
        "node2" => "node",
    ],
    "linux"      => [
        "bash1" => "bash",
        "bash2" => "bash",
        "node1" => "node",
        "node2" => "node",
    ],
];
