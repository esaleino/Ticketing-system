<!DOCTYPE html>

<head>
    <?php
    echo '<link rel="stylesheet" href="' . CSS . 'usernav.css' . '" />';
    echo '<link rel="stylesheet" href="' . CSS . 'body.css' . '" />';
    $js[] = "usernav.js";

    $linksGeneric = [
        "linksGenericPublic" => [
            "Index" => ['path' => PAGES . "index.php", 'img' => IMG . "home.svg"],
            "Contact" => ['path' => PAGES . "contact.php", 'img' => IMG . "contact.svg"],
        ],
        "linksGenericPrivate" => [
            "Dashboard" => ["path" => PAGES . "user.php", "img" => IMG . "dashboard.svg"],
            "User Settings" => ["path" => PAGES . "user-settings.php", "img" => IMG . "settings.svg"],
        ],
    ];
    $linksByRole = [
        'admin' => [
            'Link1' => 'Link1 URL',
            'Link2' => 'Link2 URL',
        ],
        'manager' => [
            'Link1' => 'Link1 URL',
            'Link2' => 'Link2 URL',
        ],
        'poweruser' => [
            'Link1' => 'Link1 URL',
            'Link2' => 'Link2 URL',
        ],
        'supportagent' => [
            'Link1' => 'Link1 URL',
            'Link2' => 'Link2 URL',
        ],
        'technician' => [
            'Link1' => 'Link1 URL',
            'Link2' => 'Link2 URL',
        ]
    ];
    ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <nav>
        <div class="nav-frame">
            <a class="nav-a" href="javascript:void(0);" id="sidebar-button"><img class="nav-img"
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
        <div class="desktop-sidebar">
            <?php
            foreach ($linksGeneric as $link)
            {
                foreach ($link as $key => $value)
                {
                    $element_a = '<a class="sidebar-a" href="' . $value['path'] . '">' . $key . '</a>';
                    echo $element_a;
                }
            }
            ?>
        </div>
        <div class="mobile-sidebar">
            <?php
            foreach ($linksGeneric as $link)
            {
                foreach ($link as $key => $value)
                {
                    $element_img = '<img class="sidebar-img" src="' . $value['img'] . '" />';
                    $element_a = '<a class="sidebar-a" href="' . $value['path'] . '">' . $element_img . '</a>';
                    echo $element_a;
                }
            }
            ?>
        </div>
    </div>
</body>