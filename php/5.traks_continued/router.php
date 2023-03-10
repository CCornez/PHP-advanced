<?php

parse_str($_SERVER["QUERY_STRING"], $args);

$args["qspart"] = explode("/", $args["qs"]);

print '<pre>';
print_r($args);
print '</pre>';

switch ($args["qspart"]) {
    case 'value':
        # code...
        break;

    default:
        # code...
        break;
}
