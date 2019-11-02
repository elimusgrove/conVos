<?php

if (isset($_GET)) {
    echo json_encode(array('value'=>array(strtoupper($_GET['string']), 'Conley has no balls')));
}

?>
