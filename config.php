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
$css_url = $assets . 'css/';
$js_url = $assets . 'scripts/';
$img_url = $assets . 'img/';

// define url constants
define("INDEX", $baseUrl);
define("COMPONENTS", $components);
define("PAGES", $pages);
define("GET_REQUESTS", $getRequests);
define("POST_REQUESTS", $postRequests);
define("CSS", $css_url);
define("JS", $js_url);
define("IMG", $img_url);

// define path constants
define("COMPONENTS_PATH", $componentsPath);
define("PAGES_PATH", $pagesPath);
define("GET_REQUESTS_PATH", $componentsPath . 'get-requests/');
define("POST_REQUESTS_PATH", $componentsPath . 'post-requests/');
define("QUERIES_PATH", $componentsPath . 'queries/');
define("CSS_PATH", $assetsPath . 'css/');
define("JS_PATH", $assetsPath . 'scripts/');
define("IMG_PATH", $assetsPath . 'images/');
define("HANDLERS_PATH", $componentsPath . '/handlers/');
define("VALIDATIONS_PATH", $componentsPath . '/validations/');
define("PRIVATE_PATH", $_SERVER['DOCUMENT_ROOT'] . '/private/');
?>