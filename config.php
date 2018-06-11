<?php
/**
 * Current version
 */
const VERSION = "v2.4.0 (2018-05-30)";
$timestamp_now = date('Y-m-d H:i:s');

const LAB_INSTALL_DIR = __DIR__;



/**
 * Error handling
 */
error_reporting(-1);              // Report all type of errors
ini_set('display_errors', 1);     // Display all errors

date_default_timezone_set("UTC");

require LAB_INSTALL_DIR . "/vendor/autoload.php";


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
//const VALID_LABS = [
$VALID_LABS = [
    "javascript1/lab1/v1" => "config/javascript1/v1/lab1.php",
    "javascript1/lab2/v1" => "config/javascript1/v1/lab2.php",
    "javascript1/lab3/v1" => "config/javascript1/v1/lab3.php",
    "javascript1/lab4/v1" => "config/javascript1/v1/lab4.php",
    //"javascript1/lab5/v1" => "config/javascript1/lab5.php",

    "javascript1/lab1/v2" => "config/javascript1/v2/lab1.php",
    "javascript1/lab2/v2" => "config/javascript1/v2/lab2.php",
    "javascript1/lab3/v2" => "config/javascript1/v2/lab3.php",
    "javascript1/lab4/v2" => "config/javascript1/v2/lab4.php",
    "javascript1/lab5/v2" => "config/javascript1/v2/lab5.php",

    "python/lab1/v1" => "config/python/v1/lab1.php",
    "python/lab2/v1" => "config/python/v1/lab2.php",
    "python/lab3/v1" => "config/python/v1/lab3.php",
    "python/lab4/v1" => "config/python/v1/lab4.php",
    "python/lab5/v1" => "config/python/v1/lab5.php",
    "python/lab6/v1" => "config/python/v1/lab6.php",

    "python/lab1/v2" => "config/python/v2/lab1.php",
    "python/lab2/v2" => "config/python/v2/lab2.php",
    "python/lab3/v2" => "config/python/v2/lab3.php",
    "python/lab4/v2" => "config/python/v2/lab4.php",
    "python/lab5/v2" => "config/python/v2/lab5.php",
    "python/lab6/v2" => "config/python/v2/lab6.php",

    "python/lab1/v3" => "config/python/v3/lab1.php",
    "python/lab2/v3" => "config/python/v3/lab2.php",
    "python/lab3/v3" => "config/python/v3/lab3.php",
    "python/lab4/v3" => "config/python/v3/lab4.php",
    "python/lab5/v3" => "config/python/v3/lab5.php",
    "python/lab6/v3" => "config/python/v3/lab6.php",

    "oopython/lab1/v1" => "config/oopython/v1/lab1.php",
    "oopython/lab2/v1" => "config/oopython/v1/lab2.php",
    "oopython/lab3/v1" => "config/oopython/v1/lab3.php",
    "oopython/lab4/v1" => "config/oopython/v1/lab4.php",
    "oopython/lab5/v1" => "config/oopython/v1/lab5.php",

    "oopython/lab1/v2" => "config/oopython/v2/lab1.php",
    "oopython/lab2/v2" => "config/oopython/v2/lab2.php",
    "oopython/lab3/v2" => "config/oopython/v2/lab3.php",
    "oopython/lab4/v2" => "config/oopython/v2/lab4.php",
    "oopython/lab5/v2" => "config/oopython/v2/lab5.php",

    "htmlphp/lab1/v1" => "config/htmlphp/v1/lab1.php",
    "htmlphp/lab2/v1" => "config/htmlphp/v1/lab2.php",
    "htmlphp/lab3/v1" => "config/htmlphp/v1/lab3.php",
    "htmlphp/lab4/v1" => "config/htmlphp/v1/lab4.php",
    "htmlphp/lab5/v1" => "config/htmlphp/v1/lab5.php",
    "htmlphp/sql1/v1" => "config/sql/lab1.php",
    //"htmlphp/sql2/v1" => "config/sql/v1/lab2.php",

    "htmlphp/lab1/v2" => "config/htmlphp/v2/lab1.php",
    "htmlphp/lab2/v2" => "config/htmlphp/v2/lab2.php",
    "htmlphp/lab3/v2" => "config/htmlphp/v2/lab3.php",
    "htmlphp/lab4/v2" => "config/htmlphp/v2/lab4.php",
    "htmlphp/lab5/v2" => "config/htmlphp/v2/lab5.php",
    "htmlphp/lab6/v2" => "config/htmlphp/v2/lab6.php",
    "htmlphp/sql1/v2" => "config/sql/lab1.php",
    //"htmlphp/sql2/v2" => "config/sql/v2/lab2.php",

    //"oophp/lab1" => "config/oophp/lab1.php",

    "linux/bash1/v1" => "config/linux/v1/bash1.php",
    "linux/bash2/v1" => "config/linux/v1/bash2.php",
    "linux/node1/v1" => "config/linux/v1/node1.php",
    "linux/node2/v1" => "config/linux/v1/node2.php",
    "linux/node3/v1" => "config/linux/v1/node3.php",

    "webgl/lab1/v1" => "config/webgl/v1/lab1.php",
    "webgl/lab2/v1" => "config/webgl/v1/lab2.php",
    "webgl/lab1/v2" => "config/webgl/v2/lab1.php",
    "webgl/lab2/v2" => "config/webgl/v2/lab2.php",
    "webgl/lab3/v2" => "config/webgl/v2/lab3.php",
    "webgl/lab4/v2" => "config/webgl/v2/lab4.php",
    "webgl/lab5/v2" => "config/webgl/v2/lab5.php",

    "dbjs/javascript1/v1" => "config/dbjs/v1/javascript1.php",
    "dbjs/javascript2/v1" => "config/dbjs/v1/javascript2.php",
    "dbjs/sql1/v1" => "config/dbjs/v1/sql1.php",
    "dbjs/sql2/v1" => "config/dbjs/v1/sql2.php",
    "dbjs/node1/v1" => "config/dbjs/v1/node1.php",
    "dbjs/node2/v1" => "config/dbjs/v1/node2.php",

    "databas/node1/v1" => "config/databas/v1/node1.php",
    "databas/node2/v1" => "config/databas/v1/node2.php",
    "databas/exam/v1" => "config/databas/v1/exam",
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
