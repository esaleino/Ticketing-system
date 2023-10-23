<?php
include $_SERVER['DOCUMENT_ROOT'] . "/config.php";
$handleUrl = POST_REQUESTS . 'verify-post.php?token=' . $_GET['token'];
$ch = curl_init($handleUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = json_decode(curl_exec($ch));
curl_close($ch);
var_dump($result);
?>