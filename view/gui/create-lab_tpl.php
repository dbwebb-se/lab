<h2>Generate a lab</h2>
<?php 

if ($gen_key) {
    $res = getDetailsFromKeyOrDie($gen_key);

    include "view/gui/key-details_tpl.php";
    include "view/gui/menu_tpl.php";
} 

include "view/gui/form-create_tpl.php";
