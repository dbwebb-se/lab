<h2>Get details for an existing lab</h2>

<?php

if ($key) {
    $res = getDetailsFromKeyOrDie($key);
    $gen_key = $res->gen_key;

    include "view/key-details_tpl.php";

    if ($fullMenu) {
        include "view/menu_tpl.php";        
    } else {
        include "view/link-lab-description_tpl.php";
    }
}

include "view/form-key_tpl.php";
