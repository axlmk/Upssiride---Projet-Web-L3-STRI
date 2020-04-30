<?php
    require_once 'functions/auth.php';
?>
    <link rel="stylesheet" href="style/style.css"/>
    <div class='header'>
         <head>
         </head>
         <a href="#" title="logo">
            <div id="logo">
             <img src="Pictures_site/logo_resized.png" alt="logo">
            </div>
        </a>
        <nav>
            <ul>
                <li><a href="dashboard.php">New Ride</a></li>
                <li><a href="my_rides">My Rides</a></li>
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