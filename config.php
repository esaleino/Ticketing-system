<?php
// Path: config.php
if (isset($_SERVER['HTTP_X_FORWARDED_HOST']))
{
    $serverName = $_SERVER['HTTP_X_FORWARDED_HOST'];
}
else
{
    $serverName = $_SERVER['SERVER_NAME'];
}
$isSecure = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') || $_SERVER['SERVER_PORT'] == 443;
$baseUrl = ($isSecure ? 'https://' : 'http://') . $serverName;

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