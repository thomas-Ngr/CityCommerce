<?php
session_start();
require_once 'lib/constants.php';
require_once 'lib/utils.php';

/*
 * ROUTER
 */

$base_url = explode('?' , $_SERVER['REQUEST_URI'])[0];
$base_url = rtrim($base_url, "/");

$routes = json_decode(file_get_contents('routes.json', 'r'), true);
$routes = sortRoutesByURLLength($routes);

foreach ($routes as $route) {
    $url_match = str_contains($base_url, $route['url']);
    $method_match = $route['method'] === $_SERVER['REQUEST_METHOD'];

    if ( $url_match && $method_match ) {
        $given_parameters = splitGivenParameters($base_url, $route);
        $params = extract_parameters($given_parameters, $route['expected_parameters']);
        include $route['file'];
        break;
    }
}

function splitGivenParameters($base_url, $route) {
    if ($route['method'] === 'GET') {
        $trimmed_parameters = str_replace($route['url'] , '', $base_url);
        $trimmed_parameters = ltrim($trimmed_parameters, '/');
        if ($trimmed_parameters !== "") {
            return explode( '/', $trimmed_parameters);
        }
    }
    return [];
}

function sortRoutesByURLLength($routes) {
    function longestRoute($a, $b) {
        if(strlen($a['url']) == strlen($b['url'])) {
            return 0 ;
        }
        return (strlen($a['url']) > strlen($b['url'])) ? -1 : 1;
    }
    usort($routes, 'longestRoute');
    return $routes;
}

function extract_parameters($parameters, $expected_parameters) {
    $params = [];
    if (count($parameters) != count ($expected_parameters)) {
        throw new Error('Error : number of parameters is wrong');
    }
    foreach ($expected_parameters as $pos => $key) {
        $params[$key] = $parameters[$pos];
    }
    return $params;
}

