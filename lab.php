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



// Generate
if ($course == 'javascript1' && $lab == 'lab1') {
    
    extract(include "config/javascript1/lab1.php");
    // shuffle questions

} else if ($course == 'javascript1' && $lab == 'lab2') {
    
    extract(include "config/javascript1/lab2.php");
    // shuffle questions

} else if ($course == 'javascript1' && $lab == 'lab3') {
    
    extract(include "config/javascript1/lab3.php");
    // shuffle questions

} else if ($course == 'javascript1' && $lab == 'lab4') {
    
    extract(include "config/javascript1/lab4.php");
    // shuffle questions

} else if ($course == 'javascript1' && $lab == 'lab5') {
    
    extract(include "config/javascript1/lab5.php");
    // shuffle questions

} else if ($course == 'python' && $lab == 'lab1') {
    
    extract(include "config/python/lab1.php");
    // shuffle questions

} else if ($course == 'python' && $lab == 'lab2') {
    
    extract(include "config/python/lab2.php");
    // shuffle questions

} else if ($course == 'python' && $lab == 'lab3') {
    
    extract(include "config/python/lab3.php");
    // shuffle questions

} else if ($course == 'python' && $lab == 'lab4') {
    
    extract(include "config/python/lab4.php");
    // shuffle questions

} else if ($course == 'python' && $lab == 'lab5') {
    
    extract(include "config/python/lab5.php");
    // shuffle questions

} else if ($course == 'python' && $lab == 'lab6') {
    
    extract(include "config/python/lab6.php");
    // shuffle questions

} else if ($course == 'htmlphp' && $lab == 'lab1') {
    
    extract(include "config/htmlphp/lab1.php");
    // shuffle questions

} else if ($course == 'htmlphp' && $lab == 'lab2') {
    
    extract(include "config/htmlphp/lab2.php");
    // shuffle questions

} else if ($course == 'htmlphp' && $lab == 'lab3') {
    
    extract(include "config/htmlphp/lab3.php");
    // shuffle questions

} else if ($course == 'htmlphp' && $lab == 'lab4') {
    
    extract(include "config/htmlphp/lab4.php");
    // shuffle questions

} else if ($course == 'htmlphp' && $lab == 'lab5') {
    
    extract(include "config/htmlphp/lab5.php");
    // shuffle questions

} else if ($lab == 'labtest') {
    
    extract(include "config/labtest.php");
    // shuffle questions

} else {
    die("Not a valid combination.");
}



if ($doLab && $doAnswers) {
    include "view/lab_tpl.php";
} else if ($doLab) {
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
} else if ($doAnswerJson) {
    include "view/answer-json_tpl.php";
} else if ($doAnswerExtra) {
    include "view/answer-extra_tpl.php";
} else {
    die("Nothing to do.");
}
