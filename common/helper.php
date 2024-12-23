<?php
if (!function_exists('require_file')) {
    function require_file($pathFoder) {
        $scandirfiles = scandir($pathFoder);
        $files = array_diff($scandirfiles,['.','..']);
        foreach($files as $file) {
            require_once $pathFoder . $file;
        }
    }
}

if(!function_exists('debug')) {
    function debug($data) {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
        die;
    }
}

if(!function_exists('e404')) {
    function e404() {
        echo "404 - Not found";
        die;
    }
}?>