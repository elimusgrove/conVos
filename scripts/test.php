<?php

if (isset($_GET)) {
    echo json_encode(array(strtoupper($_GET['string'])));
}

if (isset($_POST)) {
    json_encode(array(strtoupper($_POST['string'])));
}

?>
