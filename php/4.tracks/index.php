<?php

spl_autoload_register(function ($class_name) {
    require_once $_SERVER["DOCUMENT_ROOT"] . $_SERVER["REQUEST_URI"] . 'includes/' . $class_name . '.class.php';
});

$tracks = Db::getData();

print "<pre>";
print_r($tracks);
