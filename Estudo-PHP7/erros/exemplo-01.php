<?php

function error_handler($code, $message, $file, $line) {

    echo json_encode(array(
        "Code" => $code,
        "Message" => $message,
        "File" => $file,
        "Line" => $line
    ));
}

set_error_handler("error_handler");
$total = 100 / 0;

?>