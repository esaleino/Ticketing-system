<!DOCTYPE html>

<head>
    <?php
    // Set path relative to page
    if ($page == "index") {
        $root = './';
    } else {
        $root = "../";
    }
    // Set asset paths
    $css_path = $root . "assets/css/";
    $img_path = $root . "assets/img/";
    $scripts_path = $root . "assets/scripts/";
    $path_pages = $root . "pages/";
    $path_style = $css_path . "style.css";
    ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo $path_style; ?>" />
    <script>
        function toggleMobileMenu() {
            var mobileMenu = document.querySelector('.mobile-menu');
            mobileMenu.style.display = (mobileMenu.style.display === 'block') ? 'none' : 'block';
        }
    </script>
</head>

<body>
    <nav>
        <div class="left">
            <div class="frame">
                <a href="<?php echo $root ?>"><img class="img" src="<?php echo $img_path; ?>home.png" /></a>
            </div>
        </div>
        <div class="desktop-nav">
            <ul>
                <li><a href="<?php echo $path_pages ?>register.php">Registration</a></li>
                <li><a href="<?php echo $path_pages ?>about.php">About Us</a></li>
                <li><a href="<?php echo $path_pages ?>contact.php">Contact Us</a></li>
                <li><img class="img" src="<?php echo $img_path; ?>user.png" /></li>
            </ul>
        </div>
        <div class="mobile-nav">
            <div class="frame">
                <img class="img" src="<?php echo $img_path; ?>user.png" />
            </div>
            <div class="frame" onclick="toggleMobileMenu()">
                <img class="img" src="<?php echo $img_path; ?>list.png" />
            </div>
        </div>
    </nav>