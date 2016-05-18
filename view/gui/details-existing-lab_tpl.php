<h2>Get details for an existing lab</h2>

<?php

if ($key) {
    $res = getDetailsFromKeyOrDie($key);
    $gen_key = $res->gen_key;

    include "view/gui/key-details_tpl.php";

    if ($fullMenu) {
        include "view/gui/menu_tpl.php";        
    } else {
        include "view/gui/link-lab-description_tpl.php";
    }
}

include "view/gui/form-key_tpl.php";
