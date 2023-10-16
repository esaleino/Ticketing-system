<?php
// Path: config.php
if ($_SERVER['SERVER_NAME'] === '127.0.0.1')
{
    $serverName = $_SERVER['SERVER_NAME'];
    $baseUrl = 'http://' . $serverName;
}
else
{
    $serverName = 'leinoes.azurewebsites.net';
    $baseUrl = 'https://' . $serverName;
}

// set the URLS for components, pages and subfolders of components
$components = $baseUrl . '/components/';
$pages = $baseUrl . '/pages/';
$getRequests = $baseUrl . '/components/get-requests/';
$postRequests = $baseUrl . '/components/post-requests/';

// set asset URLS
$css = $baseUrl . '/assets/css/';
$js = $baseUrl . '/assets/scripts/';
$img = $baseUrl . '/assets/images/';

// define url constants
define("COMPONENTS", $components);
define("PAGES", $pages);
define("GET_REQUESTS", $getRequests);
define("POST_REQUESTS", $postRequests);
define("CSS", $css);
define("JS", $js);
define("IMG", $img);

// define path constants
define("COMPONENTS_PATH", $_SERVER['DOCUMENT_ROOT'] . '/components/');
define("PAGES_PATH", $_SERVER['DOCUMENT_ROOT'] . '/pages/');
define("GET_REQUESTS_PATH", $_SERVER['DOCUMENT_ROOT'] . '/components/get-requests/');
define("POST_REQUESTS_PATH", $_SERVER['DOCUMENT_ROOT'] . '/components/post-requests/');
define("CSS_PATH", $_SERVER['DOCUMENT_ROOT'] . '/assets/css/');
define("JS_PATH", $_SERVER['DOCUMENT_ROOT'] . '/assets/scripts/');
define("IMG_PATH", $_SERVER['DOCUMENT_ROOT'] . '/assets/images/');
?>