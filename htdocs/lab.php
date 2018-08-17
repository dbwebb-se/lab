<?php
/**
 * Frontend to generate new labs and utilities.
 * Pagecontroller
 */
require __DIR__ . "/../config.php";

$textfilter = new \Mos\TextFilter\CTextFilter();


// Incoming
$doLab              = isset($_GET['lab'])               ? true : false;
$doAnswers          = isset($_GET['answers'])           ? true : false;
$doAnswerHtml       = isset($_GET['answer-html'])       ? true : false;
$doAnswerJs         = isset($_GET['answer-js'])         ? true : false;
$doAnswerPhp        = isset($_GET['answer-php'])        ? true : false;
$doAnswerPhpAssert  = isset($_GET['answer-php-assert']) ? true : false;
$doAnswerPy         = isset($_GET['answer-py'])         ? true : false;
$doAnswerPyAssert   = isset($_GET['answer-py-assert'])  ? true : false;
$doAnswerSQLite     = isset($_GET['answer-sqlite'])     ? true : false;
$doAnswerBash       = isset($_GET['answer-bash'])       ? true : false;
$doAnswerBashAssert = isset($_GET['answer-bash-assert']) ? true : false;
$doAnswerNode       = isset($_GET['answer-node'])       ? true : false;
$doAnswerNodeAssert = isset($_GET['answer-node-assert']) ? true : false;
$doAnswerJson       = isset($_GET['answer-json'])       ? true : false;
$doAnswerTar        = isset($_GET['answer-tar'])        ? true : false;
$doAnswerExtra      = isset($_GET['answer-extra'])      ? true : false;

$key                = isset($_GET['key']) ? $_GET['key'] : null;



// Check or die
($doLab
    || $doAnswers
    || $doAnswerHtml
    || $doAnswerJs
    || $doAnswerPhp
    || $doAnswerPhpAssert
    || $doAnswerPy
    || $doAnswerPyAssert
    || $doAnswerBash
    || $doAnswerBashAssert
    || $doAnswerSQLite
    || $doAnswerNode
    || $doAnswerNodeAssert
    || $doAnswerJson
    || $doAnswerTar
    || $doAnswerExtra)
        or die("Missing what to do.");
isset($key) or die("No key supplied.");



// Get the details to generate the lab
define("KEY", $key);
$res        = getDetailsFromKeyOrDie($key);
$acronym    = $res->acronym;
$course     = $res->course;
$lab        = $res->lab;
$labversion = $res->labversion;
$created    = $res->created;
$version    = empty($res->version) ? "No version provided" : $res->version;



// Read configuration for lab
$configFile = getConfigurationFor($course, $lab, $labversion);

if ($configFile === false) {
    die("Not a valid combination.");
}

extract(require $configFile);
// shuffle questions


// Apply the config to the choosen view
if ($doLab) {
    require LAB_INSTALL_PATH . "/view/generate/lab_tpl.php";
} elseif ($doAnswerPhp) {
    require LAB_INSTALL_PATH . "/view/generate/answer-php_tpl.php";
} elseif ($doAnswerPhpAssert) {
    require LAB_INSTALL_PATH . "/view/generate/answer-php-assert_tpl.php";
} elseif ($doAnswerPy) {
    require LAB_INSTALL_PATH . "/view/generate/answer-py_tpl.php";
} elseif ($doAnswerPyAssert) {
    require LAB_INSTALL_PATH . "/view/generate/answer-py-assert_tpl.php";
} elseif ($doAnswerBash) {
    require LAB_INSTALL_PATH . "/view/generate/answer-bash_tpl.php";
} elseif ($doAnswerBashAssert) {
    require LAB_INSTALL_PATH . "/view/generate/answer-bash-assert_tpl.php";
} elseif ($doAnswerSQLite) {
    require LAB_INSTALL_PATH . "/view/generate/answer-sqlite_tpl.php";
} elseif ($doAnswerNode) {
    require LAB_INSTALL_PATH . "/view/generate/answer-node_tpl.php";
} elseif ($doAnswerNodeAssert) {
    require LAB_INSTALL_PATH . "/view/generate/answer-node-assert_tpl.php";
} elseif ($doAnswerJson) {
    require LAB_INSTALL_PATH . "/view/generate/answer-json_tpl.php";
} elseif ($doAnswerHtml) {
    require LAB_INSTALL_PATH . "/view/generate/answer-html_tpl.php";
} elseif ($doAnswerJs) {
    require LAB_INSTALL_PATH . "/view/generate/answer-js_tpl.php";
} elseif ($doAnswerTar) {
    require LAB_INSTALL_PATH . "/view/generate/answer-tar_tpl.php";

} elseif ($doAnswers) {
    require LAB_INSTALL_PATH . "/view/answers_tpl.php";
} elseif ($doAnswerExtra) {
    require LAB_INSTALL_PATH . "/view/answer-extra_tpl.php";
} else {
    die("Nothing to do.");
}

// Remove tempdir if any
tempDir(false);
