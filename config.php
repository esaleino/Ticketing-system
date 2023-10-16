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
$assets = $baseUrl . '/assets/';
$getRequests = $baseUrl . '/components/get-requests/';
$postRequests = $baseUrl . '/components/post-requests/';

// set paths for components, pages and subfolders of components
$componentsPath = $_SERVER['DOCUMENT_ROOT'] . '/components/';
$pagesPath = $_SERVER['DOCUMENT_ROOT'] . '/pages/';
$assetsPath = $_SERVER['DOCUMENT_ROOT'] . '/assets/';

// set asset URLS
$css = $assets . 'css/';
$js = $assets . 'scripts/';
$img = $assets . 'images/';

// define url constants
define("COMPONENTS", $components);
define("PAGES", $pages);
define("GET_REQUESTS", $getRequests);
define("POST_REQUESTS", $postRequests);
define("CSS", $css);
define("JS", $js);
define("IMG", $img);

// define path constants
define("COMPONENTS_PATH", $componentsPath);
define("PAGES_PATH", $pagesPath);
define("GET_REQUESTS_PATH", $componentsPath . 'get-requests/');
define("POST_REQUESTS_PATH", $componentsPath . 'post-requests/');
define("CSS_PATH", $assetsPath . 'css/');
define("JS_PATH", $assetsPath . 'scripts/');
define("IMG_PATH", $assetsPath . 'images/');
define("HANDLERS_PATH", $componentsPath . '/handlers/');
?>