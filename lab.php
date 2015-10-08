<?php
/**
 * Frontend to generate new labs and utilities.
 * Pagecontroller
 */ 
include __DIR__ . "/config.php";
include __DIR__ . "/functions.php";



// Incoming
$doLab              = isset($_GET['lab'])               ? true : false;
$doAnswers          = isset($_GET['answers'])           ? true : false;
$doAnswerHtml       = isset($_GET['answer-html'])       ? true : false;
$doAnswerJs         = isset($_GET['answer-js'])         ? true : false;
$doAnswerPhp        = isset($_GET['answer-php'])        ? true : false;
$doAnswerPhpAssert  = isset($_GET['answer-php-assert']) ? true : false;
$doAnswerPy         = isset($_GET['answer-py'])         ? true : false;
$doAnswerPyAssert   = isset($_GET['answer-py-assert'])  ? true : false;
$doAnswerBash       = isset($_GET['answer-bash'])       ? true : false;
$doAnswerBashAssert = isset($_GET['answer-bash-assert']) ? true : false;
$doAnswerJson       = isset($_GET['answer-json'])       ? true : false;
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
    || $doAnswerJson
    || $doAnswerExtra)
        or die("Missing what to do.");
isset($key) or die("No key supplied.");



// Get the details to generate the lab
define("KEY", $key);
$res        = getDetailsFromKeyOrDie($key);
$acronym    = $res->acronym;
$course     = $res->course;
$lab        = $res->lab;
$created    = $res->created;
$version    = $res->version;



// Read configuration for lab
$configFile = getConfigurationFor($course, $lab);

if ($configFile === false) {
    die("Not a valid combination.");
}

extract(include $configFile);
// shuffle questions


// Apply the config to the choosen view
if ($doLab) {
    include "view/lab_tpl.php";
} else if ($doAnswers) {
    include "view/answers_tpl.php";
} else if ($doAnswerHtml) {
    include "view/answer-html_tpl.php";
} else if ($doAnswerJs) {
    include "view/answer-js_tpl.php";
} else if ($doAnswerPhp) {
    include "view/answer-php_tpl.php";
} else if ($doAnswerPhpAssert) {
    include "view/answer-php-assert_tpl.php";
} else if ($doAnswerPy) {
    include "view/answer-py_tpl.php";
} else if ($doAnswerPyAssert) {
    include "view/answer-py-assert_tpl.php";
} else if ($doAnswerBash) {
    include "view/answer-bash_tpl.php";
} else if ($doAnswerBashAssert) {
    include "view/answer-bash-assert_tpl.php";
} else if ($doAnswerJson) {
    include "view/answer-json_tpl.php";
} else if ($doAnswerExtra) {
    include "view/answer-extra_tpl.php";
} else {
    die("Nothing to do.");
}
