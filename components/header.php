<!DOCTYPE html>

<head>
    <?php
    session_start();
    // Set path relative to page
    $loggedin = false;
    $root = "";
    // Set asset paths
    if ($page == "index")
    {
        $root = "./";
    }
    else
    {
        $root = "../";
    }
    $Paths = array(
        'css' => $root . "assets/css/",
        'img' => $root . "assets/img/",
        'scripts' => $root . "assets/scripts/",
        'pages' => $root . "pages/",
        'navStyle' => $root . "assets/css/nav.css",
    );
    /* $assets_path = APP_ROOT . "/assets/";
    $css_path = $root . "/assets/css/";
    $img_path = $root . "/assets/img/";
    $scripts_path = $root . "assets/scripts/";
    $path_pages = $root . "pages/";
    $path_style = $css_path . "nav.css"; */

    if (isset($style_forms))
    {
        echo '<link rel="stylesheet" href="' . $Paths['css'] . 'forms.css" />';
    }

    if ($loggedin)
    {
        $user_page = $Paths['pages'] . "user.php";
    }
    else
    {
        $user_page = $Paths['pages'] . "login.php";
    }

    ?>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo $Paths['navStyle']; ?>" />
    <script>
        function toggleMobileMenu() {
            var mobileMenu = document.querySelector('#m-menu');
            mobileMenu.style.display = (mobileMenu.style.display === 'block') ? 'none' : 'block';
        }
    </script>
</head>

<body>
    <nav>
        <div class="nav-row">
            <div class="left">
                <div class="nav-frame">
                    <a class="nav-a" href="<?php echo $root ?>">
                        <img class="nav-img" src="<?php echo $Paths['img']; ?>home.svg" />
                    </a>
                </div>
            </div>
            <div class="desktop-nav">
                <ul>
                    <li><a class="nav-a" href="<?php echo $Paths['pages'] ?>register.php">Registration</a></li>
                    <li><a class="nav-a" href="<?php echo $Paths['pages'] ?>about.php">About Us</a></li>
                    <li><a class="nav-a" href="<?php echo $Paths['pages'] ?>contact.php">Contact Us</a></li>
                    <li><a class="nav-a" href="<?php echo $user_page ?>"><img class="nav-img"
                                src="<?php echo $Paths['img']; ?>user.svg" /></a></li>
                </ul>
            </div>
            <div class="mobile-nav">
                <div class="nav-frame">
                    <a class="nav-a" href="<?php echo $user_page; ?>">
                        <img class="nav-img" src="<?php echo $Paths['img']; ?>user.svg" />
                    </a>
                </div>
                <div class="nav-frame">
                    <a class="nav-a" href="javascript:void(0);" onclick="toggleMobileMenu()"><img class="nav-img"
                            src="<?php echo $Paths['img']; ?>list.svg" /></a>
                </div>
            </div>
        </div>
        <div class="mobile-menu" id="m-menu">
            <ul>
                <li>
                    <div class="m-row">
                        <img class="icon" src="<?php echo $Paths['img']; ?>arrow.svg" />
                        <a href="<?php echo $Paths['pages'] ?>register.php">Registration</a>
                    </div>
                </li>
                <li>
                    <div class="m-row">
                        <img class="icon" src="<?php echo $Paths['img']; ?>arrow.svg" />
                        <a href="<?php echo $Paths['pages'] ?>about.php">About Us</a>
                    </div>
                </li>
                <li>
                    <div class="m-row">
                        <img class="icon" src="<?php echo $Paths['img']; ?>arrow.svg" />
                        <a href="<?php echo $Paths['pages'] ?>contact.php">Contact Us</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>