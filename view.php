<?php
/**
 * Frontend to only view generated labs by input key.
 * Pagecontroller
 */ 
include __DIR__ . "/config.php";
include __DIR__ . "/functions.php";

$title = "View details of generated lab";
include "view/gui/header_tpl.php";

$key = isset($_GET['key']) ? $_GET['key'] : null;

$fullMenu = false;
include "view/gui/details-existing-lab_tpl.php";
include "view/gui/footer_tpl.php";
