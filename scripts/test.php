<?php

if (isset($_GET)) {
    echo strtoupper($_GET['string']);
}

if (isset($_POST)) {
    echo strtoupper($_POST['string']);
}

?>
