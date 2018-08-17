<?php
/**
 * Frontend to only view generated labs by input key.
 * Pagecontroller
 */
require __DIR__ . "/../config.php";

$title = "View details of generated lab";
require LAB_INSTALL_PATH . "/view/gui/header_tpl.php";

$key = isset($_GET['key']) ? $_GET['key'] : null;

$fullMenu = false;
require LAB_INSTALL_PATH. "/view/gui/details-existing-lab_tpl.php";
require LAB_INSTALL_PATH . "/view/gui/footer_tpl.php";
