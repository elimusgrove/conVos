<?php

if (isset($_GET)) {
    echo json_encode(array('string'=>strtoupper($_GET['string'])));
}

//if (isset($_POST)) {
//    echo json_encode(array(strtoupper($_POST['string'])));
//}

?>
