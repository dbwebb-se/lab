<h2>Generate a lab</h2>
<?php 

if ($gen_key) {
    $res = getDetailsFromKeyOrDie($gen_key);

    include "view/key-details_tpl.php";
    include "view/menu_tpl.php";
} 

include "view/form-create_tpl.php";
