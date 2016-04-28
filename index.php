<?php
/**
 * Frontend to create new labs or get existing ones from the key.
 * Pagecontroller
 */ 
include __DIR__ . "/config.php";
include __DIR__ . "/functions.php";



/**
 * Check that database exists and open it
 */
if (!is_writable(__DIR__)) {
    echo "<p>You must make this directory writable. Then click <a href='?init'>this link to generate the database tables</a>.</p>";
    exit;
}

 
/**
 * Init the database, create table
 */
if (isset($_GET['init'])) {
    init();
}



/**
 * Get lab from existing key
 */
$doKey = isset($_GET['doKey']);
$key = isset($_GET['key']) ? $_GET['key'] : null;



/**
 * Generate a lab
 */
$doGenerate = isset($_GET['doGenerate']);
$action     = isset($_GET['action'])    ? $_GET['action'] : null;
$acronym    = isset($_GET['acronym'])   ? $_GET['acronym'] : null;
$course     = isset($_GET['course'])    ? $_GET['course'] : null;
$lab        = isset($_GET['lab'])       ? $_GET['lab'] : null;
$created    = date('Y-m-d H:i:s');

$gen_key = null;
if ($doGenerate) {
    $gen_key = generateKey($acronym, $course, $lab, $created);
    
    if ($action == "only-key") {
        die($gen_key);
    }
}

// Generate bundle och lab content
if ($action == "bundle") {
    $key = isset($key) ? $key : $gen_key;
    include "view/bundle_tpl.php";
    die();
}


$title = "Lab generation";
include "view/header_tpl.php";
include "view/lab-utility-menu_tpl.php";
include "view/create-lab_tpl.php";

$fullMenu = true;
include "view/details-existing-lab_tpl.php";
include "view/footer_tpl.php";
