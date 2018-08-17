<?php
/**
 * Frontend to create new labs or get existing ones from the key.
 * Pagecontroller
 */
include __DIR__ . "/../config.php";



/**
 * Check that database exists and open it
 */
if (!is_writable(LAB_INSTALL_PATH . "/data")) {
    echo "<p>You must make the 'data/' directory writable. Then click <a href='?init'>this link to generate the database tables</a>.</p>";
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
$target     = isset($_GET['target'])    ? $_GET['target'] : null;
$lab        = isset($_GET['lab'])       ? $_GET['lab'] : null;
$labversion = isset($_GET['version']) && !empty($_GET['version'])
    ? $_GET['version']
    : "v1";
$created    = date('Y-m-d H:i:s');

$gen_key = null;
if ($doGenerate) {
    $gen_key = generateKey($acronym, $course, $lab, $labversion, $created);
    
    if ($action == "only-key") {
        die($gen_key);
    }
}

// Generate bundle och lab content
if ($action == "bundle") {
    $key = isset($key) ? $key : $gen_key;
    include LAB_INSTALL_PATH . "/view/generate/bundle_tpl.php";
    exit();
}

// View exam details
if ($action == "exam-list") {
    include LAB_INSTALL_PATH . "/view/generate/exam-list_tpl.php";
    exit();
}

// Checkout exam
if ($action == "exam-checkout") {
    include LAB_INSTALL_PATH . "/view/generate/exam-checkout_tpl.php";
    exit();
}

// Seal exam
if ($action == "exam-seal") {
    include LAB_INSTALL_PATH . "/view/generate/exam-seal_tpl.php";
    exit();
}

// REceipt for exam
if ($action == "exam-receipt") {
    include LAB_INSTALL_PATH . "/view/generate/exam-receipt_tpl.php";
    exit();
}

$title = "Lab generation";
include LAB_INSTALL_PATH . "/view/gui/header_tpl.php";
include LAB_INSTALL_PATH . "/view/gui/lab-utility-menu_tpl.php";
include LAB_INSTALL_PATH . "/view/gui/create-lab_tpl.php";

$fullMenu = true;
include LAB_INSTALL_PATH . "/view/gui/details-existing-lab_tpl.php";
include LAB_INSTALL_PATH . "/view/gui/footer_tpl.php";
