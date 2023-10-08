<!DOCTYPE html>

<head>
    <?php
    // Set path relative to page
    $loggedin = false;
    if ($page == "index")
    {
        $root = './';
    }
    else
    {
        $root = "../";
    }
    // Set asset paths
    $css_path = $root . "assets/css/";
    $img_path = $root . "assets/img/";
    $scripts_path = $root . "assets/scripts/";
    $path_pages = $root . "pages/";
    $path_style = $css_path . "nav.css";

    if (isset($style_forms))
    {
        echo '<link rel="stylesheet" href="' . $css_path . 'forms.css" />';
    }
    if ($loggedin)
    {
        $user_page = $path_pages . "user.php";
    }
    else
    {
        $user_page = $path_pages . "login.php";
    }

    ?>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo $path_style; ?>" />
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
                <div class="frame">
                    <a class="nav-a" href="<?php echo $root ?>">
                        <img class="nav-img" src="<?php echo $img_path; ?>home.svg" />
                    </a>
                </div>
            </div>
            <div class="desktop-nav">
                <ul>
                    <li><a class="nav-a" href="<?php echo $path_pages ?>register.php">Registration</a></li>
                    <li><a class="nav-a" href="<?php echo $path_pages ?>about.php">About Us</a></li>
                    <li><a class="nav-a" href="<?php echo $path_pages ?>contact.php">Contact Us</a></li>
                    <li><a class="nav-a" href="<?php echo $user_page ?>"><img class="nav-img"
                                src="<?php echo $img_path; ?>user.svg" /></a></li>
                </ul>
            </div>
            <div class="mobile-nav">
                <div class="frame">
                    <a class="nav-a" href="<?php echo $user_page; ?>">
                        <img class="nav-img" src="<?php echo $img_path; ?>user.svg" />
                    </a>
                </div>
                <div class="frame">
                    <a class="nav-a" href="javascript:void(0);" onclick="toggleMobileMenu()"><img class="nav-img"
                            src="<?php echo $img_path; ?>list.svg" /></a>
                </div>
            </div>
        </div>
        <div class="mobile-menu" id="m-menu">
            <ul>
                <li>
                    <div class="m-row">
                        <img class="icon" src="<?php echo $img_path; ?>arrow.svg" />
                        <a href="<?php echo $path_pages ?>register.php">Registration</a>
                    </div>
                </li>
                <li>
                    <div class="m-row">
                        <img class="icon" src="<?php echo $img_path; ?>arrow.svg" />
                        <a href="<?php echo $path_pages ?>about.php">About Us</a>
                    </div>
                </li>
                <li>
                    <div class="m-row">
                        <img class="icon" src="<?php echo $img_path; ?>arrow.svg" />
                        <a href="<?php echo $path_pages ?>contact.php">Contact Us</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>