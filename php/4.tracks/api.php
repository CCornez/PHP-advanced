<?php
require "includes/Db.class.php";
require "includes/Track.class.php";

$args = $_REQUEST;
$args['qsparts'] = explode('/', $args['qs']);

$response = new StdClass;

switch ($args['qsparts'][1]) {
    case 'tracks':
        $db = new Db();
        $track = new Track($db);
        $limit = 50;

        $filters = [];

        if (isset($args['genre'])) {
            $filters['genre'] = $args['genre'];
        }

        if (isset($args['artist_name'])) {
            $filters['artist_name'] = $args['artist_name'];
        }

        if (isset($args['track_id'])) {
            $filters['track_id'] = $args['track_id'];
        }

        $response->page = 1;
        $response->total_items = $track->getTotal($filters);
        $response->total_pages = ceil($response->total_items / $limit);

        if (
            isset($args['page']) &&
            (is_numeric($args['page'])) &&
            ($args['page'] <= $response->total_pages) &&
            ($args['page'] > 0)
        ) {
            $response->page = (int)$args['page'];
        }

        $response->results = $track->getAll(($response->page - 1) * $limit, $limit, $filters);

        if ($response->page < $response->total_pages) {
            $filters['page'] = $response->page + 1;
            $response->next_page_url = 'http://localhost/4.tracks/api/v1/tracks?' . http_build_query($filters);
        }

        if ($response->page > 1) {
            $filters['page'] = $response->page - 1;
            $response->previous_page_url = 'http://localhost/4.tracks/index.php?page=' . http_build_query($filters);
        }

        break;

    case 'track':
        if (isset($args['qsparts'][2]) && !empty($args['qsparts'][2])) {
            $db = new Db();
            $track = new Track($db);
            $response->results = $track->getById($args['qsparts'][2]);
        } else {
            $response->error = "This is not a valid endpoint.";
        }
        break;
    default:
        $response->error = "This is not a valid endpoint.";
        break;
}


header('Content-Type: application/json; charset=utf-8');


print json_encode($response);
exit;
