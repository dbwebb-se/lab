<?php
/**
 * Frontend to only view generated labs by input key.
 * Pagecontroller
 */ 
include __DIR__ . "/config.php";
include __DIR__ . "/functions.php";

$title = "View details of generated lab";
include "view/header_tpl.php";

$key = isset($_GET['key']) ? $_GET['key'] : null;

$fullMenu = false;
include "view/details-existing-lab_tpl.php";
include "view/footer_tpl.php";
