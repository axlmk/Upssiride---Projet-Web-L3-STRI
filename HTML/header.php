<?php
    require_once 'functions/auth.php';
?>
    <head>
        <link rel="stylesheet" href="style/style.css"/>
    </head>

    <div class='header'>
         <a href="index.php" title="logo">
             <img src="Pictures_site/logo.svg" alt="logo" id="logo">
         </a>
         <nav>
            <ul>
                <li><a href="index.php">New Ride</a></li>
                <li>
                    <a href="my_rides.php" id="notified">
                        My Rides<img src="Pictures_site/notification.svg" alt="notification" class="notification">
                    </a>
                </li>
                <li><a href="sponsors.php">Sponsors</a></li>
                <?php if (is_connected()): ?>
                    <li><a href="my_account.php">Account</a></li>
                    <li><a href="scripts/logout.php">Log out</a></li>
                <?php else: ?>
                    <li><a href="connection.php">Log in</a></li>
                    <li><a href="register.php">Sign up</a></li>
                <?php endif ?>
            </ul>
        </nav>
    </div>
    <div class="empty_block">
        &nbsp;
    </div>
