<?php

if (isset($_GET)) {
    echo array(strtoupper($_GET['string']));
}

if (isset($_POST)) {
    echo array(strtoupper($_POST['string']));
}

?>
