<?php

function debug($data, $exit = false) {
    echo "<pre style='background: #000; color: #fff; margin-top:150px;'>";
    print_r($data);
    echo "</pre>";

    if ($exit) {
        exit;
    }
}

?>