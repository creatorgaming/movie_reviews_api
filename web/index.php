<?php
    $data = file_get_contents('php://input');
    $decoded = json_decode($data,false);
    echo $decoded->demo;
    //dsasfasd
?>
