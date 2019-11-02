<?php

if (isset($_GET)) {
    var_dump(array(strtoupper($_GET['string'])));
}

if (isset($_POST)) {
    var_dump(array(strtoupper($_POST['string'])));
}

?>
