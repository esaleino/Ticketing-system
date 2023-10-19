<!DOCTYPE html>

<head>
    <?php
    echo '<link rel="stylesheet" href="' . CSS . 'usernav.css' . '" />';
    echo '<link rel="stylesheet" href="' . CSS . 'body.css' . '" />';
    ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <nav>
        <div class="nav-frame">
            <a class="nav-a" href="javascript:void(0);" onclick="toggleMobileMenu()"><img class="nav-img"
                    src="<?php echo IMG; ?>list.svg" /></a>
        </div>
        <div class="nav-frame">
            <a class="nav-a" href="<?php echo PAGES . 'logout.php' ?>"><img class="nav-img"
                    src="<?php echo IMG; ?>logout.svg" /></a>
        </div>
        <!-- echo '<img class="frame" src="' . IMG . 'list.svg' . '" />'; -->
        <!-- echo '<img class="frame" src="' . IMG . 'logout.svg' . '" />';  -->


    </nav>
    <div id="sidebar">
        <a href="<?php echo INDEX ?>">Link 1</a>
        <a href="#">Link 2</a>
        <a href="#">Link 3</a>
    </div>

    <div id="main-content">
        <h1>Main Content</h1>
        <p>This is the main content of your page.</p>
    </div>
    <script>
        // JavaScript to handle the menu button click
        const menuButton = document.getElementById('menu-button');
        const sidebar = document.getElementById('sidebar');
        const mainContent = document.getElementById('main-content');

        function toggleMobileMenu() {
            if (sidebar.style.width === '250px') {
                sidebar.style.width = '0';
                mainContent.style.marginLeft = '0';
            } else {
                sidebar.style.width = '250px';
                mainContent.style.marginLeft = '250px';
            }
        }
    </script>
</body>