<?php
include $_SERVER['DOCUMENT_ROOT'] . "/config.php";
$page = "register";
$style_forms = true;
$js = ["register.js", "form-builder.js"];
include COMPONENTS_PATH . "header.php";
$registerPost = POST_REQUESTS . 'registration-post.php';
echo '<script>var registerPost = "' . $registerPost . '";</script>';
$handleUrl = GET_REQUESTS . 'companies-get.php?api_key=' . getenv('API_KEY_ADMIN');
$ch = curl_init($handleUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$companies = json_decode(curl_exec($ch));
curl_close($ch);
echo '<script>var companies = ' . json_encode($companies) . ';</script>';
?>
<div id="main-content">

</div>
<?php

include COMPONENTS_PATH . "footer.php"; ?>