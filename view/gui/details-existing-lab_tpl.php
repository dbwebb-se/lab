<h2>Get details for an existing lab</h2>

<?php

if ($key) {
    $res = getDetailsFromKeyOrDie($key);
    $gen_key = $res->gen_key;

    include LAB_INSTALL_PATH . "/view/gui/key-details_tpl.php";

    if ($fullMenu) {
        include LAB_INSTALL_PATH . "/view/gui/menu_tpl.php";        
    } else {
        include LAB_INSTALL_PATH . "/view/gui/link-lab-description_tpl.php";
    }
}

include LAB_INSTALL_PATH . "/view/gui/form-key_tpl.php";
