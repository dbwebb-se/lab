<h2>Generate a lab</h2>
<?php 

if ($gen_key) {
    $res = getDetailsFromKeyOrDie($gen_key);

    include LAB_INSTALL_PATH . "/view/gui/key-details_tpl.php";
    include LAB_INSTALL_PATH . "/view/gui/menu_tpl.php";
} 

include LAB_INSTALL_PATH . "/view/gui/form-create_tpl.php";
