<?php

// spl_autoload_register(function ($class_name) {
//     require_once $_SERVER["DOCUMENT_ROOT"] . $_SERVER["REQUEST_URI"] . 'includes/' . $class_name . '.class.php';
// });

require "includes/Db.class.php";
require "includes/Track.class.php";

$db = new Db();
$tracks = new Track($db);

$page = 1;
$limit = 50;
$total = $tracks->getTotal()[0]->total;
$pages = ceil($total / $limit);


if (isset($_GET['page']) && (is_numeric($_GET['page']))) {
    $page = (int)$_GET['page'];
}


$return = (object)[
    'page' => $page,
    'total' => $total,
    'pages' => $pages,
    // 'next_page_url' => 
    'results' => $tracks->getAll(($page - 1) * $limit, $limit)
];

if ($page < $pages) {
    $return->next_page_url = 'http://localhost/230217/index.php?page=' . $page + 1;
}
if ($page > 1) {
    $return->previous_page_url = 'http://localhost/230217/index.php?page=' . $page - 1;
}



// print "<pre>";
// var_dump($return);

header('Content-Type: application/json; charset=utf-8');
print json_encode($return);
