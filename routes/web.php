<?php

require 'vendor/autoload.php';

use App\Controllers\TaskController;

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

$query = [];
parse_str(parse_url($_SERVER['REQUEST_URI'])['query'] ?? '', $query);


$controller = new TaskController();

$routes = [
    '/' => fn() => $controller->index(),
    '/task1' => fn() => $controller->indexTask1(),
    '/task2' => fn() => $controller->indexTask2(),
    '/getChildCategory' => fn() => $controller->getChildCategoryDetails($query),
];

if (array_key_exists($uri, $routes)) {
    $routes[$uri]();
} else {
    http_response_code(404);
    echo "Sorry, Not found";
    die();
}